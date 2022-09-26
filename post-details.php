<?php
    include "functions/posts-functions.php";

    session_start();
    if($_SESSION['role'] == 'U'){
    include 'user-menu.php';
    }else{
        include 'admin-menu.php';
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <header>
        <div class="container-fluid bg-primary bg-gradient text-white p-4 ps-5">
            <h2 class="display-2"><i class="fa-solid fa-pen-nib"></i>Post</h2>
        </div>
    </header>

    <div class="container w-75">
        <div class="row mt-4">
            <a href="dashboard.php" class="col btn btn-outline-danger btn-sm mx-2" name="btn_back">Dashboard</a>  
            <a href="posts.php" class="col btn btn-outline-primary btn-sm mx-2" name="btn_back">Posts</a>    
            <?php
            if($_SESSION['role'] == "U"){
            ?>
                <a href="edit-post-by-user.php?post_id=<?= $_GET['post_id'] ?>" class="col btn btn-outline-secondary btn-sm" name="btn_edit"><i class="fa-solid fa-pen-to-square"></i> Edit Post</a>  
            <?php
            }else{
            ?>
                <a href="edit-post-by-admin.php?post_id=<?= $_GET['post_id'] ?>" class="col btn btn-outline-secondary btn-sm" name="btn_edit"><i class="fa-solid fa-pen-to-square"></i> Edit Post</a>  
            <?php
            }
            ?>
        </div>

        <div class="card mt-4">
            <?php
            $post_row = getDetailPost($_GET['post_id']);
            ?>
            <div class="card-header display-2">
            <?= $post_row['post_title'] ?>
            </div>

            <div class="card-body">
                <span><?= "By: ".$post_row['first_name']. " ". $post_row['last_name']?></span>
                &emsp;
                <span><?= $post_row['date_posted']?></span>
                &emsp;
                <span><?= $post_row['category_name']?></span>
                <div class="fs-3"><?= $post_row['post_message'] ?></div>
            </div>
            
            
        </div>

    </div>



    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>