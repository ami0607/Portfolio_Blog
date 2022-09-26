<?php

require_once "connection.php";

//getAllCategory
function getAllCategory(){
    $conn = connection();
    $sql = "SELECT * FROM categories";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            return $result;}
    }else{
        die("Error retrieving categories: " . $conn->error);
    }
}
$category_row = getAllCategory();

//getAuthor
function getAuthor(){
    $conn = connection();
    $sql = "SELECT * FROM accounts";
    if($result = $conn->query($sql)){
        return $result;
    }else{
        die("Error getting the author: " . $conn->error);
    }
}
$author_row = getAuthor();


//function addPost
function addPost(){
    $conn = connection();
    $title = $_POST['title'];
    $date_posted = $_POST['date'];
    $category_id = $_POST['category'];
    $message = $_POST['message'];
    $author_id = $_POST['author'];
    $sql = "INSERT INTO posts (post_title, post_message, date_posted, account_id, category_id) VALUES ('$title','$message', '$date_posted', $author_id, $category_id)";
    if($conn->query($sql)){
        header("location: posts.php");
        exit;
    }else{
        die("Error: " . $conn->error);
    }
}//end function addPost


//getAllPosts
function getAllPosts(){
    $conn = connection();
    $sql = "SELECT * 
    FROM posts
    INNER JOIN categories
    ON categories.category_id = posts.category_id";
    if($result = $conn->query($sql)){
        return $result;
    }else{
        die("Error retrieving all posts");
    }
}


//getDetailPost
function getDetailPost($post_id){
    
    $conn = connection();
    $sql = "SELECT *
    FROM posts
    INNER JOIN users
    ON posts.account_id = users.account_id
    INNER JOIN categories
    ON posts.category_id = categories.category_id
    WHERE posts.post_id = $post_id";
    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        die("Error retrieving all post details" . $conn->error);
    }
}


//updatePost
function updatePost($post_id, $title, $date, $category, $message, $author){
    $conn = connection();
    $sql = "UPDATE posts
    SET post_title = '$title',
        date_posted = '$date',
        category_id = '$category',
        post_message = '$message',
        account_id = '$author'
    WHERE post_id = $post_id";
    
    if($conn->query($sql)){
        header("location: posts.php");
        exit;
    }else{
        die("Error updating post: " . $conn->error);
    }

}

if(isset($_POST['btn_update'])){
    $post_id = $_GET['post_id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $message = $_POST['message'];
    $author = $_POST['author'];

    updatePost($post_id, $title, $date, $category, $message, $author);
}



// INNER JOIN categories
//     ON posts.category_id = categories.category_id
//     SET posts.post_title = '$title', posts.post_message = '$message', posts.date_posted = '$date', categories.category_name = '$category'
//     INNER JOIN accounts
//     ON posts.account_id = accounts.account_id
//     SET accounts.username = '$author'











?>