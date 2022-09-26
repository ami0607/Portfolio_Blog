<?php
    include "functions/profile-functions.php"; 

    if($_SESSION['role'] == 'U'){
    include 'user-menu.php';
}else{
    include 'admin-menu.php';
}

if(isset($_POST['btn_update'])){
    updateProfile($_SESSION['account_id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <header>
        <div class="container-fluid bg-secondary bg-gradient text-white p-4 ps-5">
            <h1 class="display-2"><i class="fa-solid fa-user me-3"></i>Profile</h1>
        </div>
    </header>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">
                        <?php
                        $user_row = displayProfile($account_id);
                        ?>
                        <div class="row">
                            <div class="col-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required autofocus value="<?= $user_row['first_name'] ?>">
                            </div class="bg-warning">
                            <div class="col-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required value="<?= $user_row['last_name'] ?>">
                            </div>
                        </div>
                

                        <div class="row">
                            <div class="col-8">
                                <label for="address" class="form-label mt-3">Address</label>
                                <input type="text" name="address" id="address" class="form-control" required value="<?= $user_row['address'] ?>">
                            </div>
                            <div class="col-4">
                                <label for="contact_number" class="form-label mt-3">Contact Number</label>
                                <input type="tel" name="contact_number" id="contact_number" class="form-control" required value="<?= $user_row['contact_number'] ?>">
                            </div>
                        </div>

                        <label for="username" class="form-label mt-3">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required value="<?= $user_row['username'] ?>">

                        <label for="password" class="form-label mt-3">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password to confirm" required>
                        
                        <input type="submit" class="btn btn-primary w-100 mt-4" value="UPDATE" name="btn_update">
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
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>