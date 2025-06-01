<footer class="bg-[#d62828] text-white mt-52">
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start">
            <div class="mb-6 md:mb-0">
                <h1 class="text-3xl font-bold">Book<br>Land</h1>
                <p class="mt-2 text-right md:text-left md:mt-0 text-sm font-medium">Toko Buku Favorit Kaum Bibliophile
                </p>
            </div>
        </div>
    </div>

    <div class="bg-gray-200 text-black">
        <div class="container mx-auto px-4 py-8 grid grid-cols-2 md:grid-cols-5 gap-8 text-sm">
            <!-- Produk BookLand -->
            <div>
                <h3 class="font-bold mb-2">Produk BookLand</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">BookLand Affiliate</a></li>
                    <li><a href="#" class="hover:underline">Mitra BookLand</a></li>
                </ul>
            </div>

            <!-- Informasi Berbelanja -->
            <div>
                <h3 class="font-bold mb-2">Informasi Berbelanja</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">Berbelanja</a></li>
                    <li><a href="#" class="hover:underline">Pembayaran</a></li>
                    <li><a href="#" class="hover:underline">Pengiriman</a></li>
                </ul>
            </div>

            <!-- Tentang BookLand -->
            <div>
                <h3 class="font-bold mb-2">Tentang BookLand</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#" class="hover:underline">Toko Kami</a></li>
                </ul>
            </div>

            <!-- Lainnya -->
            <div>
                <h3 class="font-bold mb-2">Lainnya</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">Blog</a></li>
                    <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:underline">FAQ</a></li>
                    <li><a href="#" class="hover:underline">Kerja Sama</a></li>
                </ul>
            </div>

            <!-- Aplikasi -->
            <div class="col-span-2 md:col-span-1 text-center md:text-left">
                <h3 class="font-bold mb-2">Aplikasi Seluler Kami</h3>
                <p class="text-xs mb-2">Download aplikasi BookLand.com yang tersedia di seluruh perangkat iOS dan
                    Android</p>
                <div class="flex justify-center md:justify-start space-x-2">
                    <img src="{{ asset('images/appstore.png') }}" alt="App Store" class="h-10">
                    <img src="{{ asset('images/playstore.png') }}" alt="Google Play" class="h-10">
                </div>
            </div>
        </div>

        <!-- Bottom -->
        <div
            class="border-t border-gray-300 text-center text-sm py-4 px-4 flex flex-col md:flex-row items-center justify-between bg-gray-100">
            <span>© 2025 PT BookLand</span>
            <div class="flex space-x-4 mt-2 md:mt-0">
                <a href="#"><i class="fab fa-facebook text-xl"></i></a>
                <a href="#"><i class="fab fa-instagram text-xl"></i></a>
                <a href="#"><i class="fab fa-envelope text-xl"></i></a>
                <a href="#"><i class="fab fa-tiktok text-xl"></i></a>
            </div>
        </div>
    </div>
</footer>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        toggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    });
</script>

<script>
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    let currentIndex = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.opacity = i === index ? '1' : '0';
            slide.style.zIndex = i === index ? '10' : '0';
            dots[i].classList.toggle('bg-white', i === index);
            dots[i].classList.toggle('bg-gray-400', i !== index);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    }

    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            currentIndex = i;
            showSlide(currentIndex);
        });
    });

    // Auto play
    setInterval(nextSlide, 5000);
</script>

<script>
    let quantity = 1;
    const quantityDisplay = document.getElementById('quantity');
    const quantityInput = document.getElementById('quantityInput');

    function increaseQuantity() {
        quantity++;
        quantityDisplay.textContent = quantity;
        quantityInput.value = quantity;
    }

    function decreaseQuantity() {
        if (quantity > 1) {
            quantity--;
            quantityDisplay.textContent = quantity;
            quantityInput.value = quantity;
        }
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const userButton = document.getElementById("user-menu-button");
        const dropdown = document.getElementById("user-dropdown");

        userButton.addEventListener("click", function(e) {
            e.stopPropagation(); // Mencegah klik ini menutup dropdown langsung
            dropdown.classList.toggle("hidden");
        });

        // Tutup dropdown jika klik di luar
        document.addEventListener("click", function(e) {
            if (!dropdown.contains(e.target) && !userButton.contains(e.target)) {
                dropdown.classList.add("hidden");
            }
        });
    });
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
document.querySelectorAll('.favorite-form').forEach(form => {
    const btn = form.querySelector('.favorite-btn');
    btn.addEventListener('click', function() {
        // Toggle warna dan icon
        const isFavorited = btn.getAttribute('aria-pressed') === 'true';

        if (isFavorited) {
            btn.setAttribute('aria-pressed', 'false');
            btn.textContent = '🤍 Favorit';
            btn.classList.remove('text-red-600');
            btn.classList.add('text-gray-500');
        } else {
            btn.setAttribute('aria-pressed', 'true');
            btn.textContent = '❤️ Favorit';
            btn.classList.remove('text-gray-500');
            btn.classList.add('text-red-600');
        }

        // Submit form via fetch/ajax supaya halaman gak reload
        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: new URLSearchParams(new FormData(form))
        }).then(response => {
            if (!response.ok) {
                // Kalau error, rollback toggle
                if (btn.getAttribute('aria-pressed') === 'true') {
                    btn.setAttribute('aria-pressed', 'false');
                    btn.textContent = '🤍 Favorit';
                    btn.classList.remove('text-red-600');
                    btn.classList.add('text-gray-500');
                } else {
                    btn.setAttribute('aria-pressed', 'true');
                    btn.textContent = '❤️ Favorit';
                    btn.classList.remove('text-gray-500');
                    btn.classList.add('text-red-600');
                }
                alert('Gagal mengubah favorit.');
            }
        }).catch(() => {
            alert('Gagal mengubah favorit.');
        });

    });
});
</script>

<script>
    setTimeout(function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.classList.add('opacity-0'); // Mulai fade-out
            setTimeout(() => alert.remove(), 500); // Hapus elemen dari DOM setelah animasi
        }
    }, 5000); // 5000ms = 5 detik
</script>


