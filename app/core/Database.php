<?php
class Database
{
    private $dbh,
        $dsn = "mysql:host=127.0.0.1;dbname=db_lelang",
        $stmt;
    public function __construct()
    {
        try {
            $this->dbh = new PDO($this->dsn, 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\Throwable $th) {
            die('database error : ' . $th);
        }
    }

    public function prepare($pre)
    {
        $this->stmt = $this->dbh->prepare($pre);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function queryAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryOne()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function bind($param, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            default:
                $type = PDO::PARAM_STR;
                break;
        }
        $this->stmt->bindValue($param, $value, $type);
    }
}
