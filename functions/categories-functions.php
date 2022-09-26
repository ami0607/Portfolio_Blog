<?php

require_once "connection.php";

function addCategory($category_name){
    $conn = connection();

    $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";

    if($conn->query($sql)){
        header("refresh: 0");
    }else{
        die("Error: " . $conn->error);
    }
}


if(isset($_POST['btn_add'])){
    $category_name = $_POST['category_name'];
    addCategory($category_name);
    echo "NEW CATEGORY IS ADDED: $category_name";
}
//END

function getCategory(){
    $conn = connection();
    $sql = "SELECT * FROM categories";
    if($result = $conn->query($sql)){
        return $result;
    }else{
        die("Error: " . $conn->error);
    }
}
//END




?>