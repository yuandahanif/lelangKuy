</nav>
<?php 
extract($data['detail_lelang'][0]); ?>
<main class="container-100">
    <div class="page-title">
        <a href="" class="link-back">
            <h1>Detail Barang</h1>
        </a>
    </div>
    <div class="container-item">
        <div class="row">
            <!-- !kiri -->
            <div class="col">
                <div class="img-med">
                    <img src='<?= BASE_URL ?>App/user_file/img/<?= $img_url ?>'>
                </div>

                <div class="row detail-harga-awal">
                    <div class="col">
                        <h3>Harga Awal : <span>Rp <?php echo pecahRatusan($harga_awal); ?></span> </h3>
                    </div>
                </div>

                <div class="history-tawar">
                    <div class="row">
                        <div class="col penawaran-tertinggi">
                            <h4>Penawaran Tertinggi : </h4>
                            <p>
                                <span><?= !isset($data['detail_lelang'][1][0]['penawaran_harga']) ? 'Belum Ada Penawaran' : 'Rp ' . pecahRatusan($data['detail_lelang'][1][0]['penawaran_harga']) ?></span>
                            </p>
                        </div>
                        <div class="col penawaran-saya">
                            <h4>Penawaran Saya : </h4>
                            <!-- TODO: jika penawaran lebih tinggi bg hijau jika penawaran lebih rendah bg merah -->
                            <p>
                                <span><?= !isset($data['detail_lelang'][2][0]['penawaran_harga']) ? 'Belum Ada Penawaran' : 'Rp ' . pecahRatusan($data['detail_lelang'][2][0]['penawaran_harga']) ?></span>
                            </p>
                        </div>
                    </div>

                </div>

                <div class="lelang">
                    <form action="" method="post">
                        <div class="text-input">
                            <label for="harga_tawar">Penawaran harga : </label>
                            <input type="number" placeholder="masukkan penawaran harga" min="<?= $data['detail_lelang'][1][0]['penawaran_harga'] ?>" name="harga_lelang" id="harga_tawar">

                        </div>
                        <div class="input-button">
                            <button type="submit" name="submit">Tawar</button>
                        </div>

                    </form>
                </div>
            </div>

            <!-- !kanan -->
            <div class="col">
                <div class="detail-barang">
                    <h1><?= $nama_barang ?></h1>
                    <h3>Merek : <span><?= $merk ?></span></h3>
                    <h3>Kondisi : <span><?= $kondisi ?></span></h3>
                    <p>oleh : <span><?= $nama_petugas ?></span></p>
                    <div class="spek">
                        <h3>Spesifikasi :</h3>
                        <p><?= $spesifikasi ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>