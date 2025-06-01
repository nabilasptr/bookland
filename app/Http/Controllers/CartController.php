<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Tampilkan halaman keranjang
    public function index()
    {
        $cartItems = Cart::with('book')->where('user_id', auth()->id())->get();

        $totalQuantity = $cartItems->sum('quantity');
        $subtotal = $cartItems->sum(function ($item) {
            return $item->book->price * $item->quantity;
        });

        return view('cart.index', compact(
            'cartItems',
            'totalQuantity',
            'subtotal'
        ));
    }



    // Tambah produk ke keranjang
    public function add(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::where('user_id', auth()->id())
            ->where('book_id', $request->book_id)
            ->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'book_id' => $request->book_id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }


    // Update quantity keranjang
    public function update(Request $request, $id)
    {
        $cart = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        if ($request->has('increase')) {
            $cart->quantity += 1;
        } elseif ($request->has('decrease')) {
            if ($cart->quantity > 1) {
                $cart->quantity -= 1;
            }
        } else {
            // fallback untuk input manual
            $request->validate([
                'quantity' => 'required|integer|min:1'
            ]);
            $cart->quantity = $request->quantity;
        }

        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Jumlah produk di keranjang diperbarui');
    }


    // Hapus item dari keranjang
    public function destroy($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Produk di keranjang dihapus');
    }

    // Checkout: pindahkan cart ke order dan order_items
    public function checkout()
    {
        $userId = auth()->id();
        $cartItems = Cart::with('book')->where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong, tidak bisa checkout.');
        }

        DB::beginTransaction();

        try {
            $totalPrice = $cartItems->sum(function ($item) {
                return $item->book->price * $item->quantity;
            });

            // Buat order
            $order = Order::create([
                'user_id' => $userId,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            // Buat order_items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $item->book_id,
                    'quantity' => $item->quantity,
                    'price' => $item->book->price,
                ]);
            }

            // Kosongkan keranjang user
            Cart::where('user_id', $userId)->delete();

            DB::commit();

            return redirect()->route('page.home', $order->id)->with('success', 'Checkout berhasil!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Terjadi kesalahan saat checkout: ' . $e->getMessage());
        }
    }




}
