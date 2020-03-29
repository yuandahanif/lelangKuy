</nav>
<?php
    extract($data['profile']);
     ?>
        <main class="container-100">
            <div class="page-title">
                <a href="" class="link-back"><h1>Profile</h1></a>
            </div>
            <div class="container-item">
                <div class="row px-4">
                    <div class="col">
                        <div class="profile">
                            <ul>
                                <li><h3><?= strlen($nama) == 0 ? 'silahkan ini Nama di bawah' : $nama ?></h3>
                                </li>
                                <li>
                                    <table>
                                        <tr>
                                            <td><p>NIK </p></td>
                                            <td><p> <?= strlen($nik) == 0 ? 'silahkan isi NIK di bawah' : $nik ?></p></td>
                                        </tr>
                                        <tr>
                                            <td><p>No.Telp </p></td>
                                            <td><p> <?= strlen($telp) == 0 ? 'silahkan isi No.Telp di bawah' : $telp ?></p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Email </p></td>
                                            <td><p> <?= $email ?></p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Alamat </p></td>
                                            <td><p> <?= strlen($alamat) == 0 ? 'silahkan isi Alamat di bawah' : $alamat ?></p></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>

                            <div class="form-container-simple">
                                <h3 class="form-title">ubah profile</h3>
                                <form action="" method="post">

                                    <div class="text-input">
                                        <label for="nik">NIK</label>
                                        <input type="number" name="nik" id="nik" maxlength="20" placeholder="contoh: 1234567890121" value="<?= $nik?>">
                                    </div>
                                    <div class="text-input">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" placeholder="contoh: slamet" value="<?= $nama?>">
                                    </div>
                                    <div class="text-input">
                                        <label for="telp">No.Telpon</label>
                                        <input type="text" name="telp" id="telp" minlength="11" maxlength="12" placeholder="contoh: 081392670813" value="<?= $telp?>">
                                    </div>
                                    <div class="text-input">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" placeholder="contoh: pelelang@lelang.com" value="<?= $email?>">
                                    </div>

                                    <div class="text-input">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="10" rows="3" placeholder="contoh: Jl.kenangan No.16 Butuh Temanggung Temanggung Jawa Tengah"><?=$alamat?></textarea>
                                    </div>

                                    <div class="input-button">
                                        <button type="submit" name="submit">simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="table">
                            <table>
                                <tr>
                                    <th>no</th>
                                    <th>nama barang</th>
                                    <th>penawaran harga</th>
                                    <th>status</th>
                                </tr>

                            <?php
                            $i = 1;
                             foreach ($data['history_lelang'] as $lelang) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $lelang['nama_barang'] ?></td>
                                    <td><?= pecahRatusan($lelang['penawaran_harga'])  ?></td>
                                    <td><?php if (isset($lelang['tanggal'])): ?>
                                        <p class="badge-green">Berhasil</p>
                                        <?php elseif($lelang['status'] == 'dibuka') : ?>
                                        <p class="badge-yellow">Dalam Proses</p>
                                        <?php else : ?>
                                        <p class="badge-red">Gagal</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php 
                            $i++;
                            if ($i > 20) {
                                break;
                            }
                             endforeach; ?>
                            </table>

                            <a href="" class="link-selengkapnya">selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>