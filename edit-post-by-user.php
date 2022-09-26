<?php
    include "functions/posts-functions.php";

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <?php
if($_SESSION['role'] == 'U'){
        include 'user-menu.php';
    }else{
        include 'admin-menu.php';
    }
    ?>
        
    

   <div class="container w-50">   
   <a href="posts.php" class="btn btn-outline-secondary btn-sm text-start mt-3" name="btn_back">Back</a>
        <h1 class="text-center mx-auto m-5"><i class="fa-solid fa-pen-to-square"></i>Edit Post</h1>    
        <form method="post">

        <?php
        $post_row = getDetailPost($_GET['post_id']);

        ?>
            <input type="text" class="form-control border-3 border-top-0 border-end-0 border-start-0 rounded-0 border-info my-2" name="title" id="title" placeholder="TITLE" value="<?=$post_row['post_title'] ?>" required>
            
            <input type="date" class="form-control border-3 border-top-0 border-end-0 border-start-0 rounded-0 border-dark my-2" name="date" id="date" value="<?=$post_row['date_posted']?>" required>
          
            <select name="category" id="category" class="form-select border-3 border-top-0 border-end-0 border-start-0 rounded-0 border-dark my-2" placeholder="CATEGORY" value="<?=$post_row['category_name']?>" required>


                <?php
                $category_result = getAllCategory();
                while($category_row = $category_result->fetch_assoc()){
                    if($category_row['category_id'] == $post_row['category_id']){
            ?>
                    <option value="<?= $category_row['category_id'] ?>" selected>
                            <?= $category_row['category_name'] ?>
                    </option>

            <?php
                    }else{                               
            ?>
                    <option value="<?= $category_row['category_id'] ?>">
                            <?= $category_row['category_name'] ?>
                    </option>

            <?php
            }
        }
            ?>
            </select>
            
         
            <textarea name="message" id="message" rows="7" class="w-100 border-3 border-dark my-2" placeholder="MESSAGE" required><?=$post_row['post_message']?></textarea>

            <div class="input-group mb-2">
                        <div class="input-group-text bg-secondary text-white">Author</div>
                        <select name="author" class="form-control" value="<?=$post_row['username']?>" required>
                            <?php
                                $author_result = getAuthor();
                                while($author_row = $author_result->fetch_assoc()){
                                    if($author_row['account_id'] == $post_row['account_id']){
                            ?>
                                    <option value="<?= $author_row['account_id'] ?>" selected>
                                            <?= $author_row['username'] ?>
                                    </option>
                            <?php
                            }
                        }
                            ?>
                        
                        </select>
            </div>

            
                    <div><button type="submit" name="btn_update" class="btn btn-dark text-white px-5 w-100">UPDATE</button></div>
                    <?php
                    
                    ?>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


