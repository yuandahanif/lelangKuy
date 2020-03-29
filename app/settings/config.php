<?php
    define('BASE_URL', 'http://localhost/lelang/');


    function redirect($url)
    {
        return header('Location: ' . BASE_URL . $url);
    }

    function alert($pesan,$url = null)
    {
        echo "<script> alert('$pesan') </script>";
        if (!is_null($url)) {
            redirect($url);
        }
    }

    function refresh()
    {
        echo "<meta http-equiv='refresh' content='0'>";
    }

    function pecahRatusan($harga)
    {
        $j=0;
        for ($i=3; $i <= strlen($harga); $i+=3) { 
            if (strlen($harga) % $i >=0 && strlen($harga)-$i-$j > 0) {
                $harga = substr_replace($harga, '.', strlen($harga)-$i-$j, 0);
                $j+=1;
            }
        }
        return $harga;
    }
