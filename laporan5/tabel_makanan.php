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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Makanan Khas Sulawesi Selatan</title>
    <link rel="stylesheet" href="assets/style.css" />
  </head>
  <body>
    <header>Makanan Khas</header>
    <div class="container">
      <!-- Sidebar -->
      <aside class="sidebar">
        <nav>
          <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="tabel-makanan.php">Makanan Khas</a></li>
            <li><a href="tabel_wisata.php">Objek Wisata</a></li>
            <li><a href="logout.php">Keluar</a></li>
          </ul>
        </nav>
      </aside>
      <!-- Konten Utama -->
      <section class="content">
        <h1>Daftar Makanan Khas Sulawesi Selatan</h1>
        <!-- Formulir Tambah Makanan -->
        <form id="food-form">
          <h2>Tambah Makanan Khas</h2>
          <label for="food-name">Nama Makanan:</label>
          <input
            type="text"
            id="food-name"
            name="food-name"
            placeholder="Masukkan nama makanan..."
          />
          <label for="food-desc">Deskripsi Makanan:</label>
          <input
            type="text"
            id="food-desc"
            name="food-desc"
            placeholder="Masukkan deskripsi makanan..."
          />
          <label for="food-image">Gambar Makanan:</label>
          <input type="file" id="food-image" name="food-image" />
          <div class="add-button">
            <button type="submit">Tambah</button>
          </div>
        </form>
        <!-- Tombol Tambah -->

        <!-- Tabel Informasi Makanan -->
        <table id="food-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Makanan</th>
              <th>Gambar</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Coto Makassar</td>
              <td>
                <img
                  src="assets/coto-makassar.jpg"
                  alt="Coto Makassar"
                  width="100"
                />
              </td>
              <td>
                Hidangan sup tradisional khas Makassar, terbuat dari daging sapi
                dan rempah khas.
              </td>
              <td>
                <button class="edit-btn" onclick="editRow(this)">Edit</button>
                <button class="delete-btn" onclick="deleteRow(this)">
                  Hapus
                </button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Pallubasa</td>
              <td>
                <img src="assets/pallubasa.jpg" alt="Pallubasa" width="100" />
              </td>
              <td>
                Makanan khas Makassar, mirip dengan Coto Makassar namun dengan
                tambahan kelapa parut.
              </td>
              <td>
                <button class="edit-btn" onclick="editRow(this)">Edit</button>
                <button class="delete-btn" onclick="deleteRow(this)">
                  Hapus
                </button>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>Pisang Ijo</td>
              <td>
                <img src="assets/pisang-ijo.jpg" alt="Pisang Ijo" width="100" />
              </td>
              <td>
                Hidangan penutup berbahan dasar pisang yang dibalut dengan
                adonan tepung berwarna hijau.
              </td>
              <td>
                <button class="edit-btn" onclick="editRow(this)">Edit</button>
                <button class="delete-btn" onclick="deleteRow(this)">
                  Hapus
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
    </div>
    <script>
      // variabel untuk menyimpan referensi baris yang sedang diedit
      let editingRow = null;
    
      // Mengakses elemen
      const foodForm = document.getElementById("food-form");
      const submitButton = foodForm.querySelector("button[type='submit']");
      const foodTable = document
        .getElementById("food-table")
        .getElementsByTagName("tbody")[0];
    
      // Fungsi yang dijalankan saat form disubmit
      foodForm.addEventListener("submit", function (e) {
        e.preventDefault();
        
        const foodName = document.getElementById("food-name").value;
        const foodDesc = document.getElementById("food-desc").value;
        const foodImage = document.getElementById("food-image").files[0];
    
        if (foodName && foodDesc && (foodImage || editingRow)) {
          if (editingRow) {
            // Update data di baris yang dipilih
            editingRow.cells[1].textContent = foodName;
            editingRow.cells[3].textContent = foodDesc;
    
            // Update gambar jika ada file yang diunggah
            if (foodImage) {
              const reader = new FileReader();
              reader.onload = function (e) {
                editingRow.cells[2].innerHTML = `<img src="${e.target.result}" alt="${foodName}" width="100">`;
              };
              reader.readAsDataURL(foodImage);
            }
    
            // Reset form dan tombol
            foodForm.reset();
            submitButton.textContent = "Tambah";
            editingRow = null;
          } else {
            // Tambah data baru ke tabel jika tidak dalam mode edit
            const newRow = foodTable.insertRow();
            const cellNo = newRow.insertCell(0);
            const cellName = newRow.insertCell(1);
            const cellImage = newRow.insertCell(2);
            const cellDesc = newRow.insertCell(3);
            const cellAction = newRow.insertCell(4);
    
            cellNo.textContent = foodTable.rows.length;
            cellName.textContent = foodName;
    
            const reader = new FileReader();
            reader.onload = function (e) {
              cellImage.innerHTML = `<img src="${e.target.result}" alt="${foodName}" width="100">`;
            };
            reader.readAsDataURL(foodImage);
    
            cellDesc.textContent = foodDesc;
            cellAction.innerHTML = `
              <button class="edit-btn" onclick="editRow(this)">Edit</button>
              <button class="delete-btn" onclick="deleteRow(this)">Hapus</button>
            `;
    
            // Reset form
            foodForm.reset();
          }
        } else {
          alert("Nama, Deskripsi, dan Gambar (untuk entri baru) harus diisi.");
        }
      });
    
      // Fungsi untuk mengisi form dengan data dari baris yang akan diedit
      function editRow(button) {
        editingRow = button.parentElement.parentElement;
        document.getElementById("food-name").value = editingRow.cells[1].textContent;
        document.getElementById("food-desc").value = editingRow.cells[3].textContent;
    
        submitButton.textContent = "Simpan";
      }
    
      // Fungsi untuk menghapus baris
      function deleteRow(button) {
        const confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
        if (confirmation) {
          const row = button.parentElement.parentElement;
          row.parentElement.removeChild(row);
    
          const rows = foodTable.rows;
          for (let i = 0; i < rows.length; i++) {
            rows[i].cells[0].textContent = i + 1;
          }
        }
      }
    </script>
    
  </body>
</html>
<?php
    }
?>