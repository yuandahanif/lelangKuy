<?php
session_start();
     class petugas extends Controller 
     {
        //  $login
        public function signin()
        {
            $petugas = $this->model('Petugas_model');
            $this->view('templates/header_sign',['title'=>'lelangkuy | signIn Petugas']);
            $this->view('petugas/signin');
            $this->view('templates/footer_sign');

            if (isset($_POST['submit'])) {
                $petugas->signIn();
            }
        }

        //  $index
        //  $kelola lelang {crud} -> di controller lelang
        public function index()
        {
            
        }

        //  $kelola barang {crud} -> di controller barang
        public function barang()
        {
            
        }

        // TODO: otw ini
        //  $lihat history lelang
        public function history()
        {
            
        }

        //  $laporan lelang
        public function report()
        {
            
        }
        //  $logout
     }
     