<?php


class Database 
{
    // DB params

    private $conn = null;

    public function connect()
    {
        try{
            // new PDO('mysql:server=localhost;dbname=notes', 'root', '');
            $this->conn = new PDO('mysql:server=localhost;dbname=my_blog_api', 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "ERROR: " . $exception->getMessage();
        }
        return $this->conn;
    }
    
}