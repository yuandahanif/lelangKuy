<?php
     class lelang_model extends Database 
     {
        //  $ambil daftar lelang
         public function getAllLelang($stmt)
         {
             switch ($stmt) {
                 case 'dibuka':
                    $this->prepare('SELECT * FROM tb_lelang l JOIN tb_barang b ON l.id_barang = b.id_barang JOIN tb_petugas p ON l.id_petugas = p.id_petugas WHERE l.status = "dibuka"');
                     break;
                 default:
                    $this->prepare('SELECT * FROM tb_lelang l JOIN tb_barang b ON l.id_barang = b.id_barang JOIN tb_petugas p ON l.id_petugas = p.id_petugas');
                     break;
             }
             return $this->queryAll();
         }
        //  $get history lelang
        public function getHistoryLelang($id,$short = null)
        {
            switch ($short) {
                case 'max':
                    $this->prepare('SELECT MAX(penawaran_harga) as penawaran_harga FROM tb_histori_lelang WHERE id_lelang = :id');
                break;
                case 'max-user':
                    $this->prepare('SELECT MAX(penawaran_harga) as penawaran_harga FROM tb_histori_lelang WHERE id_lelang = :id AND id_user = :user');
                    $this->bind(':user',$_SESSION['id']);
                break;
                case 'user':
                    $this->prepare('SELECT * FROM tb_histori_lelang a JOIN tb_lelang b ON a.id_lelang = b.id_lelang JOIN tb_barang c ON b.id_barang = c.id_barang WHERE id_user = :id ORDER BY id_history DeSC');
                break;
                default:
                    $this->prepare('SELECT penawaran_harga FROM tb_histori_lelang WHERE id_lelang = :id ORDER BY id_history DESC');
                break;
            }
            $this->bind(':id',$id);
            return $this->queryAll();
        }
        //  $ambil detail lelang
        public function getDetailLelang($id)
        {
            $this->prepare('SELECT * FROM tb_lelang l JOIN tb_barang b ON l.id_barang = b.id_barang JOIN tb_petugas p ON l.id_petugas = p.id_petugas WHERE l.id_lelang = :id AND l.status = "dibuka"');
            $this->bind(':id',$id);
            $hasil = $this->queryOne();
            return [$hasil,$this->getHistoryLelang($hasil['id_lelang'],'max'),$this->getHistoryLelang($id,'max-user')];
        }

        // $mulai tawar menawar
        public function setPenawaran($id)
        {
            $harga_tertinggi = $this->getHistoryLelang($id,'max');
            $harga_tawar = $_POST['harga_lelang'];

            if ($harga_tawar > $harga_tertinggi[0]['penawaran_harga']) {
                $this->prepare('INSERT INTO tb_histori_lelang VaLuEs (\'\',:id,:user,:harga)');
                $this->bind(':id',$id);
                $this->bind(':user',$_SESSION['id']);
                $this->bind(':harga',$harga_tawar);
                $this->execute();
                return $this->rowCount() > 0 ? 'penawaran anda diterima \n' : 'maaf, penawaran anda tidak diterima! \nsepertinya sistem mengalami gangguan';
            }
            return 'maaf, penawaran anda tidak diterima! \nPastikan jumlah yang anda masukkan lebih tinggi dari penawaran tertinggi ';
        }

     }
     