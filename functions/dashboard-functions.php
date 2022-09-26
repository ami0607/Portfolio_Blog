<?php

    require_once "connection.php";

    //displayAllPosts
    function displayAllPosts(){
        $conn = connection();
        $sql = "SELECT * 
        FROM posts
        INNER JOIN users
        ON posts.account_id = users.account_id
        INNER JOIN categories
        ON posts.category_id = categories.category_id
        INNER JOIN accounts
        ON posts.account_id = accounts.account_id";
        
        if($result = $conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving all posts: " . $conn->error);
        }
    }

?>