<?php

class Post
{
    // DB properties
    private $conn;
    private $table = 'posts';


    // POst properties
    public $id;

    public $title;
    public $body;
    public $author;

    public $created_at;
    public $category_id;
    public $name;

    // Post Methods

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllPosts()
    {
        // Prepare query
        $query = "SELECT p.id, p.title, p.body, p.author, p.created_at, p.category_id, c.name as 'category' 
                    FROM posts p
                 LEFT JOIN categories c ON p.category_id = c.id";

        // Prepare stament
        $stmt = $this->conn->prepare($query);

        // Execute strament
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById()
    {
        // Prepare query
        $query = "SELECT 
            p.id, p.category_id, p.title, p.body, p.author, p.created_at, c.name AS 'category'
        FROM posts p
        LEFT JOIN categories c ON p.category_id = c.id
        WHERE p.id = :id";

        // Prepare stament
        $stmt = $this->conn->prepare($query);
        // Binparams
        $stmt->bindParam(":id", $this->id);
        // Execute stament
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->id = $row['id'];
        $this->category_id = $row['category_id'];
        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->created_at = $row['created_at'];
        $this->name = $row['category'];
    }
}
