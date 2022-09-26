<?php

require_once "functions/connection.php";

session_start();

// function getProfile()
$account_id = $_GET['account_id'];
function displayProfile($account_id){
    $conn = connection();
    $sql = "SELECT * FROM accounts
    INNER JOIN users 
    ON accounts.account_id = users.account_id
    WHERE accounts.account_id = $account_id";

    if($result = $conn->query($sql)){
        return $result->fetch_assoc();
    }else{
        die("Error: " . $conn->error);
    }
}
$user_row = displayProfile($account_id);


//getPassword
function getPassword($account_id){
    $conn = connection();
    $sql = "SELECT `password` FROM accounts WHERE account_id = $account_id";
    if($result = $conn->query($sql)){
        $row = $result->fetch_assoc();
        return $row['password'];
    }

}


//function updateProfile()
function updateProfile($account_id){
    $conn = connection();
    $password = $_POST['password'];
    $db_password = getPassword($account_id);
    if(password_verify($password, $db_password)){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $username = $_POST['username'];
        $avatar_name = $_FILES['avatar']['name'];
        $avatar_tmp = $_FILES['avatar']['tmp_name'];

        $sql = "UPDATE accounts 
        INNER JOIN users 
        ON users.account_id = accounts.account_id 
        SET users.first_name = '$first_name', users.last_name = '$last_name', users.address = '$address', users.contact_number = '$contact_number', accounts.username = '$username' 
        WHERE accounts.account_id = $account_id";
        
        if($conn->query($sql)){
            //New Avatar
            if(!empty($avatar_name)){
                $sql_avatar = "UPDATE users SET avatar = '$avatar_name' WHERE account_id = $account_id";
                $conn->query($sql_avatar);
                if($conn->error){
                    die("Error: " .$conn->error);
                }
                $destination = "img/$avatar_name";
                move_uploaded_file($avatar_tmp, $destination);
            }
            header("location: users.php");
            exit;
        }else{
            die("Error: " .$conn->error);
        }
    }else{
        echo "<div class='alert alert-danger text-center fw-bold' role='alert'>Incorrect Password.</div>";
    }
}// end function updateProfile()

if(isset($_POST['btn_update'])){
    updateProfile($_GET['account_id']);
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
        <header>
            <div class="container-fluid bg-warning bg-gradient text-white p-4 ps-5">
                <h1 class="display-2"><i class="fa-solid fa-user-pen me-3"></i>User Update</h1>
            </div>
        </header>

        <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            <div class="col-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first" class="form-control" value="<?= $user_row['first_name'] ?>" required autofocus>
                            </div class="bg-warning">
                            <div class="col-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $user_row['last_name'] ?>" required>
                            </div>
                        </div>
                

                        <div class="row">
                            <div class="col-8">
                                <label for="address" class="form-label mt-3">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="<?= $user_row['address'] ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="contact_number" class="form-label mt-3">Contact Number</label>
                                <input type="tel" name="contact_number" id="contact_number" class="form-control" value="<?= $user_row['contact_number'] ?>" required>
                            </div>
                        </div>

                        <label for="username" class="form-label mt-3">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $user_row['username'] ?>" required>

                        <label for="password" class="form-label mt-3">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password to confirm" required>
                        

                        <a href="users.php" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" name="btn_update" class="btn btn-success px-5">Update</button>
                    </div>
                    <!--end of col8-->

                    <!--start of col4-->
                        <div class="col-4">
                            <img src="img/<?= $user_row['avatar'] ?>" class="w-100 mb-2">
                            <input type="file" class="form-control mt-2" name="avatar" aria-label="Choose File" accept="img/*">
                        </div>
                    


                </div>
            </div>
        </form>
    </div>

            
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>



