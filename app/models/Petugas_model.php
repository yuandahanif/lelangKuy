<?php
     class Petugas_model extends Database 
     {
         public function signIn()
         {
            $this->prepare('SELECT * FROM tb_petugas WHEre username = :user AnD password = :pass AnD level = :level');
            $this->bind('user',$_POST['username']);
            $this->bind('pass',$_POST['password']);
            $this->bind('level',$_POST['level']);
            $user = $this->queryOne();

            if ($this->rowCount() == 0) {
                redirect('petugas/signin');
            }else{
                $_SESSION['nama'] = $user['nama_petugas'];
                $_SESSION['id'] = $user['id_petugas'];
                $_SESSION['level'] = $user['level'];

                if ($user['level'] == 'petugas') {
                    redirect('petugas');
                }else{
                    redirect('admin');
                }
            }
         }
     }
     