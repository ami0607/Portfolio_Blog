<?php

    include "functions/dashboard-functions.php";
   
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
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <header>
        <div class="container-fluid bg-danger bg-gradient text-white p-4 ps-5">
            <h1 class="display-2"><i class="fa-solid fa-user-gear p-1"></i>Dashboard</h1>
    </header>

    <div class="container">
        <div class="row">
            <a href="add-post.php" class="col btn btn-success my-5 mx-2" name="btn_addpost"><i class="fa-solid fa-circle-plus"></i> Add Post</a>
            <a href="categories.php" class="col btn btn-primary my-5 mx-2" name="btn_category"><i class="fa-solid fa-folder-plus"></i> Add Category</a>
            <a href="users.php" class="col btn btn-warning my-5 mx-2" name="btn_user"><i class="fa-solid fa-user-plus"></i> Add User</a>
        </div>

        <h2>ALL POSTS</h2>
        <table class = "table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>TITLE</th>
                    <th>AUTHOR</th>
                    <th>CATEGORY</th>
                    <th>DATE POSTED</th>
                    <th></th>
                </tr>
            </thead>

            <tr>
                <?php
                $post_result = displayAllPosts();
                while($post_row = $post_result->fetch_assoc()){
                ?>
                <td><?= $post_row['post_id'] ?></td>
                <td><?= $post_row['post_title'] ?></td>
                <td><?= $post_row['username'] ?></td>
                <td><?= $post_row['category_name'] ?></td>
                <td><?= $post_row['date_posted'] ?></td>
                <td><a href="post-details.php?post_id=<?= $post_row['post_id'] ?>" class="btn btn-outline-dark" name="btn_detail"><i class="fa-solid fa-angles-right"></i>Details</a></td>
            </tr>

            <?php
            }
            ?>

        </table>

    </div>


    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>