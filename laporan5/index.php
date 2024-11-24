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
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header class="head-index">
            Dashboard
            <p>Hi, <b><?php echo $username; ?></b></p>
        </header>
        <div class="container index">
            <aside>
                <ul class="menu">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="tabel_makanan.php">Makanan Khas</a></li>
                    <li><a href="tabel_wisata.php">Objek Wisata</a></li>
                    <li><a href="logout.php">Keluar</a></li>
                </ul>
            </aside>
            <section class="main">
                <div>

                    <H1 style="text-align: center;">Makanan</H1>
                    <!-- Tabel Informasi Makanan -->
                    <table id="food-table">
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Coto Makassar
                                    <hr>
                                <img
                                        src="assets/coto-makassar.jpg"
                                        alt="Coto Makassar"
                                        width="100" />
                                </td>
                                
                                <td>
                                   <strong>keterangan</strong>  
                                   <p> Hidangan sup tradisional khas Makassar, terbuat dari daging sapi
                                   dan rempah khas.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Pallubasa
                                <hr>
                                <img src="assets/pallubasa.jpg" alt="Pallubasa" width="100" />
                                </td>
                                <td>
                                    <strong>keterangan</strong>
                                    <p>khas Makassar, mirip dengan Coto Makassar namun dengan
                                    tambahan kelapa parut.</p> 
                                </td>
                            
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Pisang Ijo
                                <hr>
                                <img src="assets/pisang-ijo.jpg" alt="Pisang Ijo" width="100" />
                                </td>
                            
                                <td>
                                <strong>keterangan</strong>
                                    <p> Hidangan penutup berbahan dasar pisang yang dibalut dengan
                                    adonan tepung berwarna hijau.</p>
                               
                                </td>
                              
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>

                    <H1 style="text-align: center;">Wisata</H1>
                    <table id="food-table">
                        
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Pantai Losari
                                    <hr>
                                <img src="assets/pantai-losari.jpeg" alt="Pantai losari" width="100">
                                <hr>
                                </td>
                    
                                <td>
                                <strong>keterangan</strong>

                                Tempat wisata yang populer di makassar yang berada di Pinggir pantai yang bernama pantai losari </td>
                               
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Bugis Waterpark
                                    <hr>
                                <img src="assets/bugis_waterpark.jpeg" alt="bugis waterpark" width="100">
                                </td>
                               
                                <td>
                                <strong>keterangan</strong>    
                                Tempat wisata permandian yang populer di sulaweis selatan yang berada di makassar</td>
                            
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Bantimurung
                                    <hr>
                                <img src="assets/bantimurung.jpeg" alt="bantimurung" width="100">
                                </td>
                                
                                <td>
                                <strong>keterangan</strong>    
                                Tempat wisata populer air terjun dan kupu-kupu yang berada di kab maros </td>
                              
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <footer>
            Copyright &copy; 2024
        </footer>
    </body>

    </html>
<?php
}
?>