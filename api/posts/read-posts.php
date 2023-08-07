<?php
// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type:Application/json");

require_once("../../config/Database.php");
require_once("../../models/Post.php");


$database = new Database();
$db = $database->connect();

$post = new Post($db);


$result = $post->getAllPosts($database);

if (count($result) === 0) {
    echo json_encode(
        ["message" => "Database is empty"]
    );
}
echo json_encode($result);

