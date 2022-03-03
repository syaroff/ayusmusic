<!-- Sidebar  -->
<nav id="sidebar">
            <h3 class="p-3 mb-0">Admin Panel</h3>

            <ul class="list-unstyled components mt-0 pt-0">
                <p class="text-center fs-5 sidebar-header p-2"> <?php echo $_SESSION['nama'] ?></p>
                <li>
                    <a href="dashboard.php?id=all" class="text-decoration-none fs-6 text-white"><i class="las la-tachometer-alt"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#produkSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-decoration-none fs-6 text-white "><i class="las la-ticket-alt"></i> Tiket</a>
                    <ul class="collapse list-unstyled" id="produkSubmenu">
                        <li>
                            <a href="wilayah.php" class="text-decoration-none text-white">Wilayah</a>
                        </li>
                        <li>
                            <a href="tiket.php" class="text-decoration-none text-white">List Tiket</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#produk2" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-decoration-none fs-6 text-white "><i class="las la-hand-holding-usd"></i>Transaksi</a>
                    <ul class="collapse list-unstyled" id="produk2">
                        <li>
                            <a href="metode.php" class="text-decoration-none text-white">Metode Bayar</a>
                        </li>
                        <li>
                            <a href="order.php" class="text-decoration-none text-white">Pesanan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="hasil.php" class="text-decoration-none fs-6 text-white"><i class="las la-money-bill"></i> Laporan Hasil</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="../index.php" class="article text-decoration-none text-white">Ke Toko Depan</a>
                </li>
                <li>
                    <a href="../db/signout.php" class="download text-decoration-none">Sign Out</a>
                </li>
            </ul>
        </nav>
