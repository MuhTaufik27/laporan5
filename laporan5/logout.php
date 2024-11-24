<?php
session_start();
session_destroy();

// Hapus cookies
setcookie('username', '', time() - 3600, "/"); // Menghapus cookie username
setcookie('password', '', time() - 3600, "/"); // Menghapus cookie password

// Pesan logout
echo "<script>alert('Anda telah logout');</script>";
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
?>
