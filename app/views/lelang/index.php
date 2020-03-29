            <div class="search">
                <div class="text-input cari-input">
                    <input type="text" name="search" placeholder="cari . . . ">
                    <button type="submit">cari</button>
                </div>
            </div>
        </nav>
        <!-- <?php var_dump($data['data_lelang']); ?> -->
        <main class="container-100">
            <div class="page-title">
                <h1>Daftar Lelang Barang</h1>
            </div>
            <div class="container-item">

            <?php
            foreach ($data['data_lelang'] as $lelang) :
                ?>
                <div class="item">
                    <a href="<?= BASE_URL ?>lelang/detail/<?= $lelang['id_lelang'] ?>" style="background-image : url('<?= BASE_URL?>App/user_file/img/<?= $lelang['img_url']?>');">
                        <div class="detail">
                            <p class="detail-nama"><?= $lelang['nama_barang'] ?></p>
                            <p class="detail-harga">Rp. <?= pecahRatusan($lelang['harga_awal'])?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach;?>

                <div class="item">
                    <a href="">
                        <div class="detail">
                            <p class="detail-nama">source code ujian sekolah</p>
                            <p class="detail-harga">Rp. 1000.000.000</p>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="">
                        <div class="detail">
                            <p class="detail-nama">source code ujian sekolah</p>
                            <p class="detail-harga">Rp. 1000.000.000</p>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="">
                        <div class="detail">
                            <p class="detail-nama">source code ujian sekolah</p>
                            <p class="detail-harga">Rp. 1000.000.000</p>
                        </div>
                    </a>
                </div>

                <!-- 4 -->

                <div class="item">
                    <a href="">
                        <div class="detail">
                            <p class="detail-nama">source code ujian sekolah</p>
                            <p class="detail-harga">Rp. 1000.000.000</p>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="">
                        <div class="detail">
                            <p class="detail-nama">source code ujian sekolah</p>
                            <p class="detail-harga">Rp. 1000.000.000</p>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="">
                        <div class="detail">
                            <p class="detail-nama">source code ujian sekolah</p>
                            <p class="detail-harga">Rp. 1000.000.000</p>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="">
                        <div class="detail">
                            <p class="detail-nama">source code ujian sekolah</p>
                            <p class="detail-harga">Rp. 1000.000.000</p>
                        </div>
                    </a>
                </div>

                <div class="item">
                    <a href="">
                        <div class="detail">
                            <p class="detail-nama">source code ujian sekolah</p>
                            <p class="detail-harga">Rp. 1000.000.000</p>
                        </div>
                    </a>
                </div>

            </div>
        </main>