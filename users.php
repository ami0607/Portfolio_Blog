<?php
    include "functions/users-functions.php"; 

    session_start();
    if($_SESSION['role'] == 'U'){
    include 'user-menu.php';
        }else{
            include 'admin-menu.php';
    }

    //adding user
    if(isset($_POST['btn_add'])){
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if($password == $confirm_password){
            addUser();
        }else{
            echo "<p class='text-danger'>Password and confirm password does not match </p>";
        }
            

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <header>
        <div class="container-fluid bg-warning bg-gradient text-white p-4 ps-5">
            <h1 class="display-2"><i class="fa-solid fa-user-pen me-3"></i>User</h1>
        </div>
    </header>



    <div class="container">
        <div class="w-50 mx-auto">
            <form method="post">
                <h2 class="display-4">Add User</h2>
                <div class="row">
                    <div class="col-6"><input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control mb-2" required autofocus></div>
                    <div class="col-6"><input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control mb-2" required></div>
                </div>

                <div class="row">
                    <div class="col-6"><input type="tel" name="num" id="num" placeholder="Contact Number" class="form-control mb-2" required></div>
                    <div class="col-6"><input type="address" name="address" id="address" placeholder="Address" class="form-control mb-2" required></div>
                </div>

                <input type="text" name="username" id="username" placeholder="Username" class="form-control mb-2" required>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control mb-2" required>
                <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" class="form-control mb-2" required>

                <input type="submit" class="btn btn-warning w-100 mb-5 text-white fw-bold" value="ADD" name="btn_add">
            </form>
        </div>
    </div>

    
    <div class="container">
        <table class="table table-striped">
            <thead class="table-dark text-white">
                <tr>
                    <th>ACCOUNT ID</th>
                    <th>FULL NAME</th>
                    <th>CONTACT NUMBER</th>
                    <th>ADDRESS</th>
                    <th>USERNAME</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            <?php
                $user_result = getUser();
                while($user_row = $user_result->fetch_assoc()){                

            ?>


                <tr>
                    <td><?= $user_row['account_id'] ?></td>
                    <td><?= $user_row['first_name']. " ". $user_row['last_name'] ?></td>
                    <td><?= $user_row['contact_number'] ?></td>
                    <td><?= $user_row['address'] ?></td>
                    <td><?= $user_row['username'] ?></td>
                    <td><a href="user-update.php?account_id=<?= $user_row['account_id'] ?>" class="btn btn-warning text-white" name="btn_update">Update</a></td>
                    <td><a href="user-delete.php?account_id=<?= $user_row['account_id'] ?>" class="btn btn-danger" name="btn_delete">Delete</a></td>
                </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>