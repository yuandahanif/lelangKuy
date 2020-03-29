<?php
class Masyarakat_model extends Database
{

    public function ambilData()
    {
        $this->prepare('SELECT * FROM tb_masyarakat');
        return $this->queryAll();
    }

    // $register
    public function signUp()
    {
        $id = 'mas_' . time();
        $this->prepare("insert into tb_masyarakat values('$id','',:username,:pass,'','',:email,'')");
        $this->bind(':username', $_POST['username']);
        $this->bind(':email', $_POST['email']);
        $this->bind(':pass', $_POST['password']);
        $this->execute();
        if ($this->rowCount()) {
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $_POST['username'];
            redirect('lelang');
        }
    }
    // $login
    public function signIn()
    {
        $this->prepare('sEleCt * FrOm tb_masyarakat WhErE username = :user and password = :pass');
        $this->bind(':user',$_POST['username']);
        $this->bind(':pass',$_POST['password']);
        $user = $this->queryOne();

        if ($this->rowCount() == 0) {
            redirect('masyarakat/signin');
        }else{
            $_SESSION['id'] = $user['id_user'];
            $_SESSION['username'] = $_POST['username'];
            redirect('lelang');
        }
    }

    // $auth
    public function auth()
    {
        $this->prepare("select * from tb_masyarakat where id_user = :id and username = :user");
        $this->bind(':id',$_SESSION['id']);
        $this->bind(':user',$_SESSION['username']);
        $this->execute();
        if ($this->rowCount() == 0) {
            redirect('masyarakat/signin');
        }
    }

    // $ambil profile
    public function getProfile()
    {
        $this->prepare("select * from tb_masyarakat where id_user = :id");
        $this->bind(':id',$_SESSION['id']);
        return $this->queryOne();
    }
    // $ambil history lelang untuk profile user
    public function getHistoryLelang($history)
    {
        // FIXME: lupa errornya apa :v
        $this->prepare('SELECT tanggal FROM tb_hasil_lelang WHERE id_history = :history');
        $this->bind(':history', $history);
        return $this->queryOne();
    }
    // $update profile
    public function updateProfile()
    {
        $this->prepare('UPDATE tb_masyarakat SET nik = :nik ,nama = :nama , telp = :telp , email = :email , alamat = :alamat WHERE id_user = :id');
        $this->bind(':nik',$_POST['nik']);
        $this->bind(':nama',$_POST['nama']);
        $this->bind(':telp',$_POST['telp']);
        $this->bind(':email',$_POST['email']);
        $this->bind(':alamat',$_POST['alamat']);
        $this->bind(':id',$_SESSION['id']);
        $this->execute();
        return $this->rowCount();
    }
}
