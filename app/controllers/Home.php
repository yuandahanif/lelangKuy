<?php
session_start();
     class Home extends Controller
     {
        public function index()
        {
            echo "selamat datang di web lelangku!";
        }

        public function logout()
        {
            if (!session_destroy()) {
                session_unset();
            }
            redirect('');
        }
     }
     