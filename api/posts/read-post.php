<?php

// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type:Application/json");

require_once("../../config/Database.php");
require_once("../../models/Post.php");

$database = new Database();
$db = $database->connect();

$post = new Post($db);
// echo $id;

$id = $_GET["id"] ? $_GET["id"] : die();
$post->id = $id;
// echo "<pre>";
// var_dump ($post);
// echo "</pre>";
 $post->getPostById();


print_r(json_encode($post));


