<?php
session_start();
ob_start();
// Mengecek session
if (empty($_SESSION['username'])) {
  echo "<script>alert('Anda harus login terlebih dahulu')</script>";
  echo "<meta http-equiv='refresh' content='0; url=login.php'>";
} else {
  $username = $_SESSION['username'];
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Makanan Khas Sulawesi Selatan</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>

  <body>
    <header> Makanan Khas </header>
    <div class="container">
      <!-- Sidebar -->
      <aside class="sidebar">
        <nav>
          <ul>
            <li><a href=index.php>Dashboard</a></li>
            <li><a href="tabel_makanan.php">Makanan Khas</a></li>
            <li><a href="tabel_wisata.php">Objek Wisata</a></li>
            <li><a href=logout.php>Keluar</a></li>
          </ul>
        </nav>
      </aside>
      <!-- Konten Utama -->
      <section class="content">
        <h1>Daftar Makanan Khas Sulawesi Selatan</h1>
        <!-- Tombol Tambah -->
        <div class="add-button">
          <button onclick="location.href='tambah_wisata.html'">Tambah</button>
        </div>
        <!-- Tabel Informasi Makanan -->
        <table id="food-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Objek Wisata</th>
              <th>Gambar</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Pantai Losari</td>
              <td><img src="assets/pantai-losari.jpeg" alt="Pantai losari" width="100"></td>
              <td>Tempat wisata yang populer di makassar yang berada di Pinggir pantai yang bernama pantai losari </td>
              <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Hapus</button>

              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Bugis Waterpark</td>
              <td><img src="assets/bugis_waterpark.jpeg" alt="bugis waterpark" width="100"></td>
              <td>Tempat wisata permandian yang populer di sulaweis selatan yang berada di makassar</td>
              <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Hapus</button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Bantimurung</td>
              <td><img src="assets/bantimurung.jpeg" alt="bantimurung" width="100"></td>
              <td>Tempat wisata populer air terjun dan kupu-kupu yang berada di kab maros </td>
              <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
    </div>
  </body>

  </html>
<?php
}
?>