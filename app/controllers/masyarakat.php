<?php
session_start();
    class masyarakat extends Controller 
    {
        // $daftar
        public function signup()
        {
            $mas = $this->model('Masyarakat_model');
            $this->view('templates/header_sign',['title'=>'lelangkuy | signUp']);
            $this->view('masyarakat/signup');
            $this->view('templates/footer_sign');

            if (isset($_POST['submit'])) {
                $mas->signUp();
            }
        }
        // $login
        public function signin()
        {
            $mas = $this->model('Masyarakat_model');
            $this->view('templates/header_sign',['title'=>'lelangkuy | signIn']);
            $this->view('masyarakat/signin');
            $this->view('templates/footer_sign');

            if (isset($_POST['submit'])) {
                $mas->signIn();
            }
        }

        // $index
        public function index()
        {
            redirect('lelang');
        }

        // $profile
        public function profile()
        {
            $mas = $this->model('Masyarakat_model');
            $lelang = $this->model('Lelang_model');
            $mas->auth();
            $profile = $mas->getProfile();
            $history_lelang = [];
            $history_lelang_tmp = $lelang->getHistoryLelang($_SESSION['id'],'user');
            
            if (count($history_lelang_tmp) > 0) {
                foreach ($history_lelang_tmp as $lelang) {
                    $menang_tmp = $mas->getHistoryLelang($lelang['id_history']);
                    if ($menang_tmp != false) {
                        $lelang['tanggal'] = $menang_tmp['tanggal'];
                    }
                    array_push($history_lelang,$lelang);
                }
            }

            $this->view('templates/header',['title'=>'lealngku | profile','user' => $_SESSION['username']]);
            $this->view('masyarakat/profile',['profile'=>$profile,'history_lelang'=>$history_lelang]);
            $this->view('templates/footer');

            if (isset($_POST['submit'])) {
                if ($mas->updateProfile() > 0) {
                    alert('profile berhasil di update');
                    refresh();
                }
            }
        }
    }