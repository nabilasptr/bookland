<?php
$fiturMember = [
  "Naura Soffin Fadhilah_2311103055" => "Cari Buku",
  "Nabila Widad Putri_2311103051" => "Kategori Buku",
  "Yulia Margareth Sirait_2311103045" => "Rekomendasi",
  "Dalila Nada_2311103003" => "Katalog"
];

$fiturPemilik = [];
foreach ($fiturMember as $nama_nim => $fitur) {
  $fiturPemilik[$fitur] = $nama_nim;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style2.css" />
  <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
  <title>BookLand</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <a href="#" class="logo">BookLand</a>
      <div class="nav-links">
        <a href="#" class="nav-link" onclick="showPopup('Kategori Buku')">Kategori buku</a>
        <a href="#" class="nav-link" onclick="showPopup('Rekomendasi')">Rekomendasi</a>
        <a href="#" class="nav-link" onclick="showPopup('Katalog')">Katalog</a>
      </div>
      <div class="buttons">
        <a href="index.html" class="btn btn-login">Login</a>
        <a href="index.html" class="btn btn-signup">Signup</a>
      </div>
    </nav>
  </header>
  <section class="textbook-marketplace">
    <div class="marketplace-content">
      <div class="marketplace-text">
        <h2>Temukan buku yang Anda cari dengan lebih mudah!...</h2>
        <div class="marketplace-search">
          <input type="text" placeholder="Search..." class="marketplace-input" />
          <button class="marketplace-button" onclick="showPopup('Cari Buku')">Search</button>
        </div>
      </div>
      <div class="marketplace-image">
        <img src="Book.jpeg" alt="Stack of books" class="books-stack" />
      </div>
    </div>
  </section>


  <script>
    const fiturPemilik = <?php echo json_encode($fiturPemilik); ?>;

    function showPopup(fitur) {
      const pemilik = fiturPemilik[fitur] || "Tidak diketahui";
      alert(`Fitur "${fitur}" dibuat oleh: ${pemilik}`);
    }
  </script>
</body>

</html>