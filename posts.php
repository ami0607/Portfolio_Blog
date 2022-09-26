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
        <div class="mt-4 text-end">
            <a href="add-post.php?account_id=" class="btn btn-outline-secondary btn-sm" name="btn_post"><i class="fa-solid fa-pen-to-square"></i>Add Post</a>
        </div>

        <table class="table table-hover table-striped mt-4">
            <thead class="table-dark text-white">
                <tr>
                    <th>POST ID</th>
                    <th>TITLE</th>
                    <th>CATEGORY</th>
                    <th>DATE POSTED</th>
                    <th></th>
                </tr>
            </thead>
            
            <?php
                $post_result = getAllPosts();
                while($post_row = $post_result->fetch_assoc()){    
                    if($post_row['account_id'] == $_SESSION['account_id']){       
            ?>
            <tr>
                    <td><?= $post_row['post_id'] ?></td>
                    <td><?= $post_row['post_title'] ?></td>
                    <td><?= $post_row['category_name'] ?></td>
                    <td><?= $post_row['date_posted'] ?></td>
                    <td><a href="post-details.php?post_id=<?= $post_row['post_id'] ?>" class="btn btn-outline-dark" name="btn_detail"><i class="fa-solid fa-angles-right"></i>Details</a></td>
                </tr>

            <?php
                }
             }
            ?>
        </table>

    </div>



    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>