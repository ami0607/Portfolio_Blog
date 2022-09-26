<?php
    
    include "functions/categories-functions.php";

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
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <header>
        <div class="container-fluid bg-success bg-gradient text-white p-4 ps-5">
            <h2 class="display-2"><i class="fas fa-folder me-3"></i>Category</h2>
        </div>
    </header>



    <div class="container">

        <div class="w-50 mx-auto mt-5">
            <form method="post">
                <div class="row">
                    <div class="col-3 text-end"><label for="category_name" class="mt-2">Add Category</label></div>
                    <div class="col-4 ps-0"><input type="text" class="form-control" name="category_name" id="category_name" required autofocus></div>
                    <button type="submit" name="btn_add" class="col-2 btn btn-success fw-bold w-25">ADD</button>
                </div>            
            </form>
        </div>

       



        <table class="table table-striped w-50 text-center mx-auto table-hover mt-5">
            <thead class="table-dark text-white">
                <tr>
                    <th>CATEGORY ID</th>
                    <th>CATEGORY NAME</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

            <?php
                $category_result = getCategory();
                while($category_row = $category_result->fetch_assoc()){
            ?>
                <tr>
                    <td><?= $category_row['category_id'] ?></td>
                    <td><?= $category_row['category_name'] ?></td>
                    <td><a href="category-update.php?category_id=<?= $category_row['category_id'] ?>" class="btn btn-warning text-white" name="btn_update">Update</a></td>
                    <td><a href="category-delete.php?category_id=<?= $category_row['category_id'] ?>" class="btn btn-danger" name="btn_delete">Delete</a></td>
                </tr>
            </tbody>
            
            <?php
                }
            ?>
            

        </table>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>