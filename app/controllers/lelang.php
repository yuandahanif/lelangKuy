<?php
session_start();
     class lelang extends Controller
     {
        // $index
        public function index()
        {
            $mas = $this->model('Masyarakat_model');
            $lelang = $this->model('Lelang_model');
            $mas->auth();
            $data_lelang = $lelang->getAllLelang('dibuka');

            $this->view('templates/header',['title'=>'lelangkuy | lelang','user' => $_SESSION['username']]);
            $this->view('lelang/index',['data_lelang' => $data_lelang]);
            $this->view('templates/footer');
        }
        // $detail lelang
        public function detail($id = null)
        {
            $mas = $this->model('Masyarakat_model');
            $lelang = $this->model('Lelang_model');
            $mas->auth();
            
            if (is_null($id)) {
                redirect('lelang');
            }
            $detail_lelang = $lelang->getDetailLelang($id);
            if ($detail_lelang[0] == false) {
                redirect('lelang');
            }
            
            $this->view('templates/header',['title'=>'lelangkuy | detail','user' => $_SESSION['username']]);
            $this->view('lelang/detail',['detail_lelang' => $detail_lelang]);
            $this->view('templates/footer');

            if (isset($_POST['submit'])) {
                alert($lelang->setPenawaran($id));
                refresh();
            }
        }
     }
     