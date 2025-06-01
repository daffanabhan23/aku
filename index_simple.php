<?php
require_once 'config_simple.php'; // Menggunakan config dari versi paling simple
$all_barang_items = getAllBarang($conn); // Fungsi ini mengambil semua barang
session_start();

// Definisikan nama-nama kantin secara manual
$nama_kantin_hardcode = [
    'Kantin Ceria Lezat',
    'Warung Sehat Alami',
    'Pojok Kenyang Mantap',
    'Kedai Minuman Segar Jaya'
];
$item_per_kantin_display = 4; // Jumlah item per kantin untuk display
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Sekolah - Informasi & Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <style>
        body { padding-top: 56px; scroll-behavior: smooth; }
        section { padding: 60px 0; }
        .placeholder-img { background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #6c757d; font-size: 1rem; text-align: center; border: 1px dashed #ccc; }
        .img-placeholder-canteen { width: 100%; height: 200px; margin-bottom: 15px; }
        .img-placeholder-menu { width: 100%; height: 150px; }
        .menu-item-card { margin-bottom: 20px; }
        #inline-cart-section { margin-top: 40px; padding: 25px; border: 1px solid #dee2e6; border-radius: .375rem; background-color: #f8f9fa;}
        #qr-code-container-inline { text-align: center; } /* Dihapus margin-top karena akan diatur oleh kolom */
        footer { padding: 30px 0; background-color: #343a40; color: white; margin-top: 50px;}
        .navbar-brand i { color: #0d6efd; }
        .nav-link:hover { color: #0d6efd !important; }
        .img-placeholder-menu img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            aspect-ratio: 4/3;
            display: block;
        }
        #inline-cart-section { margin-top: 40px; padding: 25px; border: 1px solid #dee2e6; border-radius: .375rem; background-color: #f8f9fa;}
        #qr-code-container-inline { text-align: center; } /* Dihapus margin-top karena akan diatur oleh kolom */
        footer { padding: 30px 0; background-color: #343a40; color: white; margin-top: 50px;}
        .navbar-brand i { color: #0d6efd; }
        .nav-link:hover { color: #0d6efd !important; }
        
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#"><i class="fas fa-utensils"></i> Info Kantin Sekolah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavMain">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#about">About Kantin</a></li>
                <li class="nav-item"><a class="nav-link" href="#cafetaria">Cafetaria List</a></li>
                <li class="nav-item"><a class="nav-link" href="#how-to-buy">How to buy</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>

<section id="about" class="container">
    <div class="text-center"><h2 class="mb-4 display-5">Tentang Kantin Kami</h2></div>
    <div class="row align-items-center">
        <div class="col-lg-6"><h3 class="text-primary">Selamat Datang!</h3><p class="lead">Kantin kami menyediakan beragam pilihan makanan dan minuman lezat, sehat, dan terjangkau.</p></div>
        <div class="col-lg-6">
            <div class="placeholder-img img-placeholder-canteen mb-3">
            <img src="./image/kantin1.jpg" alt="fotokantin" style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; border-radius: 8px;">
            </div>
            <div class="placeholder-img img-placeholder-canteen" style="height: 180px;">
                <video src="./video/kantin.mp4" alt="fotokantin" style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; border-radius: 8px;" autoplay controls muted loop></video>
            </div>
            </div>
        </div>
    </div>
</section>
<hr class="my-5">

<section id="cafetaria" class="bg-body-tertiary">
    <div class="container">
        <div class="text-center"><h2 class="mb-5 display-5">Daftar Cafetaria</h2></div>

        <!-- isi card kantin ceria lezat -->
            <div id="kantin ceria lezat" class="mb-5 p-4 rounded shadow-sm bg-white">
                <h3 class="text-success mb-3 border-bottom pb-2">Kantin Ceria lezat</h3>
                <div class="placeholder-img img-placeholder-canteen">
                    <img src="./image/kantin1.jpg" alt="Kantin Ceria Lezat"
                    style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; border-radius: 8px;">
                </div>

                <p class="mt-4">Kantin dengan berbagai pilihan makanan tradisional dan minuman segar.</p>

                <h5 class="mt-4">Menu Tersedia:</h5>
                <div class="row mt-3">
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/nasi_ayam_pop.jpeg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Nasi Ayam Pop</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/soto_betawi.jpg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Soto Betawi</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/gado-gado.jpeg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Gado-Gado Spesial</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/es_campur.jpg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Es Campur Pelangi</h5>
        </div>
    </div>
</div>

                    <!-- isi card kantin Kantin Sehat Alami -->
    </div>
            <div id="kantin ceria lezat" class="mb-5 p-4 rounded shadow-sm bg-white">
                <h3 class="text-success mb-3 border-bottom pb-2">Kantin Sehat Alami</h3>
                <div class="placeholder-img img-placeholder-canteen">
                    <img src="./image/kantin2.jpg" alt="Kantin Ceria Lezat"
                    style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; border-radius: 8px;">
                </div>

                <p class="mt-4">Kantin dengan berbagai pilihan makanan tradisional dan minuman segar.</p>

                <h5 class="mt-4">Menu Tersedia:</h5>
                <div class="row mt-3">
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_sehat_alami/nasi_merah.jpeg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Paket Nasi Merah Ayam Kukus</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_sehat_alami/salad.jpg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Salad Sayur Organik</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_sehat_alami/jus_tomat.jpeg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Jus Wortel Tomat</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_sehat_alami/karedok.jpg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Karedok</h5>
        </div>
    </div>
</div>

                    <!-- isi card kantin Kenyang Mantap -->
    </div>
            <div id="kantin ceria lezat" class="mb-5 p-4 rounded shadow-sm bg-white">
                <h3 class="text-success mb-3 border-bottom pb-2">Kantin Kenyang Mantap</h3>
                <div class="placeholder-img img-placeholder-canteen">
                    <img src="./image/kantin3.jpg" alt="Kantin Ceria Lezat"
                    style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; border-radius: 8px;">
                </div>

                <p class="mt-4">Kantin dengan berbagai pilihan makanan tradisional dan minuman segar.</p>

                <h5 class="mt-4">Menu Tersedia:</h5>
                <div class="row mt-3">
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_pojok/mie_ayam.jpeg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Mie Ayam Bakso Jumbo</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_pojok/nasi_uduk.jpg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Nasi Uduk Komplit</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_pojok/pempek.jpg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Pempek Kapal Selam</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_pojok/Es Teh Tarik.jpeg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Es Teh Tarik</h5>
        </div>
    </div>
</div>

                    <!-- isi card kantin Minuman Segar Jaya -->
    </div>
            <div id="kantin ceria lezat" class="mb-5 p-4 rounded shadow-sm bg-white">
                <h3 class="text-success mb-3 border-bottom pb-2">Kantin Minuman Segar Jaya</h3>
                <div class="placeholder-img img-placeholder-canteen">
                    <img src="./image/kantin4.jpg" alt="Kantin Ceria Lezat"
                    style="width: 100%; height: 100%; object-fit: cover; object-position: center; display: block; border-radius: 8px;">
                </div>

                <p class="mt-4">Kantin dengan berbagai pilihan makanan tradisional dan minuman segar.</p>

                <h5 class="mt-4">Menu Tersedia:</h5>
                <div class="row mt-3">
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_Minuman_Segar_Jaya/alpukat.jpg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Es Alpukat Kerok</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_Minuman_Segar_Jaya/thaitea.jpg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Thai Tea Original</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_Minuman_Segar_Jaya/Kopi Susu Gula Aren.jpeg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Kopi Susu Gula Aren</h5>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card menu-item-card h-100">
            <div class="placeholder-img card-img-top img-placeholder-menu">
                <img src="./image/kantin_Minuman_Segar_Jaya/Smoothies Buah Naga.jpg" alt="menu makanan">
            </div>
            <h5 class="mt-4 text-center">Smoothies Buah Naga</h5>
        </div>
    </div>
</div>

                    <!-- isi card kantin ceria lezat -->
    </div>
</section>
<hr class="my-5">

<section id="how-to-buy" class="container">
    <div class="text-center"><h2 class="mb-3 display-5">How to buy</h2><p class="lead mb-5">Pilih menu, tambahkan ke keranjang, lalu klik "Bayar Sekarang" untuk QR Code.</p></div>
    <?php
    $item_offset_howtobuy = 0;
    foreach ($nama_kantin_hardcode as $nama_kantin_display):
    ?>
        <div class="mb-5"><h3 class="text-primary mb-3 border-bottom pb-2"><?php echo htmlspecialchars($nama_kantin_display); ?></h3><div class="row">
            <?php
            $menu_di_kantin_harga = array_slice($all_barang_items, $item_offset_howtobuy, $item_per_kantin_display);
            if (!empty($menu_di_kantin_harga)):
                foreach ($menu_di_kantin_harga as $menu_item):
            ?>
            <div class="col-md-6 col-lg-3">
                <div class="card menu-item-card h-100 shadow-sm"><div class="card-body d-flex flex-column"><h5 class="card-title"><?php echo htmlspecialchars($menu_item['nama_barang']); ?></h5><p class="card-text fw-bold text-success fs-5">Rp <?php echo number_format($menu_item['harga_barang'], 0, ',', '.'); ?></p><p class="card-text"><small class="text-muted">Stok: <span class="stok-display" id="stok-<?php echo $menu_item['barang_id']; ?>"><?php echo $menu_item['stok_barang']; ?></span></small></p><button class="btn btn-primary mt-auto add-to-cart-btn" data-id="<?php echo $menu_item['barang_id']; ?>" data-name="<?php echo htmlspecialchars($menu_item['nama_barang']); ?>" data-price="<?php echo $menu_item['harga_barang']; ?>" data-stok-asli="<?php echo $menu_item['stok_barang']; ?>" <?php echo ($menu_item['stok_barang'] <= 0) ? 'disabled' : ''; ?>><i class="fas fa-cart-plus"></i> Tambah</button></div></div>
            </div>
            <?php
                endforeach;
            else:
                 echo "<p class='col-12 text-muted fst-italic'>Menu belum tersedia.</p>";
            endif;
            $item_offset_howtobuy += $item_per_kantin_display;
            if ($item_offset_howtobuy >= count($all_barang_items) && count($all_barang_items) > 0) break;
            ?>
        </div></div>
    <?php endforeach; ?>
    <?php if (empty($all_barang_items)): ?>
        <p class="text-center display-6 text-muted">Belum ada menu tersedia.</p>
    <?php endif; ?>
    
    <div id="inline-cart-section" class="mt-5">
        <h3 class="mb-4 text-center border-bottom pb-3">Keranjang & Pembayaran</h3>
        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h4>Item di Keranjang:</h4>
                <div id="cart-items-inline" class="mb-3" style="min-height: 100px; max-height: 300px; overflow-y: auto; padding-right: 10px;">
                    <p id="empty-cart-msg-inline" class="text-center text-muted fst-italic">Keranjang masih kosong.</p>
                    {/* Item keranjang akan muncul di sini */}
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center fs-4 fw-bold my-3">
                    <span>Total Harga:</span>
                    <span id="total-price-inline" class="text-danger">Rp 0</span>
                </div>
                <button id="checkout-btn-inline" class="btn btn-danger btn-lg w-100" disabled>
                    <i class="fas fa-qrcode"></i> Bayar Sekarang
                </button>
            </div>

            <div class="col-lg-5">
                <div id="qr-code-container-inline" class="d-none p-3 border rounded bg-white shadow-sm h-100">
                    <h5 class="text-center mb-3">Scan QR Code Ini (Dummy):</h5>
                    <img src="./image/dummy_qr.png" alt="Dummy QR Code Pembayaran" id="qr-code-img-inline" class="img-fluid d-block mx-auto" style="max-width: 220px; border: 5px solid white;">
                    <p class="text-center text-muted mt-2 small">Ini adalah simulasi pembayaran.</p>
                </div>
            </div>
        </div>
    </div>

</section>
<hr class="my-5">

<section id="contact" class="bg-body-tertiary">
    <div class="container"><div class="text-center"><h2 class="mb-4 display-5">Hubungi Kami</h2></div>
        <?php if (isset($_SESSION['notification'])): ?><div class="alert alert-info text-center col-md-8 col-lg-6 mx-auto"><?php echo $_SESSION['notification']; unset($_SESSION['notification']); ?></div><?php endif; ?>
        <form action="submit_simple.php" method="POST" class="col-md-8 col-lg-6 mx-auto"><div class="mb-3"><label for="nama" class="form-label fw-medium">Nama</label><input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama lengkap"></div><div class="mb-3"><label for="email" class="form-label fw-medium">Email</label><input type="email" class="form-control" id="email" name="email" required placeholder="email@contoh.com"></div><div class="mb-3"><label for="pesan" class="form-label fw-medium">Pesan</label><textarea class="form-control" id="pesan" name="pesan" rows="5" required placeholder="Pesan Anda..."></textarea></div><div class="text-center"><button type="submit" class="btn btn-dark btn-lg px-5">Kirim</button></div></form>
    </div>
</section>

<footer class="text-center"><p class="mb-0">&copy; <?php echo date("Y"); ?> Info Kantin Sekolah.</p></footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="script_simple.js"></script>
 </body>
</html>
<?php
if (isset($conn)) { $conn->close(); }
?>