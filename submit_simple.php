<?php
require_once 'config_simple.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    if (!empty($nama) && !empty($email) && !empty($pesan) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (saveMessage($conn, $nama, $email, $pesan)) {
            $_SESSION['notification'] = 'Pesan terkirim!';
        } else {
            $_SESSION['notification'] = 'Gagal mengirim pesan.';
        }
    } else {
        $_SESSION['notification'] = 'Mohon isi semua data dengan benar.';
    }
}

header('Location: index_simple.php#contact');
exit;
?>