<?php
session_start();

// Daftar username dan password
$users = [
    'Admin' => 'Admin',
    'anita' => 'pass@anitA2',
    'sapta' => 'pass@saptA3',
    'xxx*'  => 'yyy*'
];

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']); // Periksa apakah Remember Me dicentang

    // Validasi input kosong
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan Password belum diisi');</script>";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        exit;
    }

    // Cek username dan password
    if (isset($users[$username]) && $users[$username] === $password) {
        // Login berhasil, simpan data ke session
        $_SESSION['login'] = 1;
        $_SESSION['username'] = $username;

        // Jika Remember Me dicentang, simpan data di cookie
        if ($remember) {
            setcookie('username', $username, time() + (7 * 24 * 60 * 60), "/"); // Cookie berlaku 7 hari
            setcookie('password', $password, time() + (7 * 24 * 60 * 60), "/");
        }

        // Redirect ke index.php
        header('Location: index.php');
        exit;
    } else {
        // Login gagal
        echo "<script>alert('Login Gagal, Silahkan Coba Lagi');</script>";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        exit;
    }
}
?>
