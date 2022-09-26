<?php

    require_once "functions/connection.php";

    // function getCategory($category_id)
    $category_id = $_GET['category_id'];
    function getCategory($category_id){
        $conn = connection();
        $sql = "SELECT * FROM categories WHERE category_id = $category_id";
        if($result = $conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die("Error: " . $conn->error);
        }
    }
    $category_row = getCategory($category_id);


    
    function updateCategory($category_id, $category_name){
        $conn = connection();

        $sql = "UPDATE categories SET category_name = '$category_name' WHERE category_id = $category_id";

        if($conn->query($sql)){
            header("location: categories.php");
            exit;
        }else{
            die("Error updating category: " . $conn->error);
        }
    }



    if(isset($_POST['btn_update'])){
        $category_id = $_GET['category_id'];    
        $category_name = $_POST['category_name'];

        updateCategory($category_id, $category_name);   
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <main class="card w-25 mx-auto my-5">
            <div class="card-header bg-success text-white">
                <h2 class="card-title h4 mb-0">Edit Category Title</h2>
            </div>
            <div class="card-body">
                <form  method="POST">
                    <input type="text" name="category_name" value="<?= $category_row['category_name'] ?>" id="category_name" class="form-control mb-2" required autofocus>
                   
                    <a href="categories.php" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" name="btn_update" class="btn btn-success px-5">Update</button>
                </form>
            </div>
    </main>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>