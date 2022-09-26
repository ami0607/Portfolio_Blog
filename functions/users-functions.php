<?php
    require_once "connection.php";
    //function register()
    function register(){
        $conn = connection();
        //form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $avatar = "profile.jpg";
        //sql accounts table
        $sql_accounts = "INSERT INTO accounts(username, password) VALUES('$username', '$password')";
        if($conn->query($sql_accounts)){
            /*insert_id --> will help up us get the last id generated in the previous table*/
            $account_id = $conn->insert_id;
            //sql users table
            $sql_users = "INSERT INTO users(first_name, last_name, address, contact_number, avatar, account_id) VALUES('$first_name', '$last_name', '$address', '$contact_number', '$avatar', '$account_id')";
            if($conn->query($sql_users)){
                header("location: login.php");
                exit;
            }else{
                die("Error inserting to users table: " . $conn->error);
            }
        }else{
            die("Error inserting to accounts table: " . $conn->error);
        }   
    }//end function register()



    //function login()
    function login(){
        $conn = connection();
        $username = $_POST['username'];
        $password = $_POST['password'];

        //variable for error
        $error = "<div class='alter alter-danger text-center fw-bold' role='alert'>Incorrect Username or Password</div>";

        $sql = "SELECT * FROM accounts WHERE username = '$username'";

        if($result = $conn->query($sql)){
            if($result->num_rows == 1){
                $user_details = $result->fetch_assoc();
                if(password_verify($password, $user_details['password'])){
                    session_start();
                    $_SESSION['account_id'] = $user_details['account_id'];
                    $_SESSION['role'] = $user_details['role'];
                    $_SESSION['full_name'] = getFullname($user_details['account_id']);
                    $_SESSION['username'] = $user_details['username'];
                    if($user_details['role'] == 'A'){
                        header("location: dashboard.php");
                    }elseif($user_details['role'] == 'U'){
                        header("location: profile.php");
                    }
                    exit;
                }else{
                    echo $error;
                }
            }else{
                echo $error;
            }
        }else{
            die("Error: " . $conn->error);
        }
    }
    //function getFullname
    function getFullname($account_id){
        $conn = connection();
        $sql = "SELECT first_name, last_name FROM users WHERE account_id = $account_id";
        if($result = $conn->query($sql)){
            $full_name = $result->fetch_assoc();
            return $full_name['first_name'] . " " . $full_name['last_name'];
        }else{
            die("Error: " . $conn->error);
        }
    }//end function getFullname









    //function addUser()
    function addUser(){
        $conn = connection();

        //formdata
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $number = $_POST['num'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //sql accounts table
        $sql_accounts = "INSERT INTO accounts(username, password) VALUES('$username', '$password')";
        if($conn->query($sql_accounts)){
            /*insert_id --> will help up us get the last id generated in the previous table*/
            $account_id = $conn->insert_id;
            //sql users table
            $sql_users = "INSERT INTO users(first_name, last_name, address, contact_number, account_id) VALUES('$first_name', '$last_name', '$address', '$number', '$account_id')";
            if($conn->query($sql_users)){
                header("refresh: 0");
                exit;
            }else{
                die("Error inserting to users table: " . $conn->error);
            }
        }else{
            die("Error inserting to accounts table: " . $conn->error);
        }

    }


    //function getUser()
    function getUser(){
        
        $conn = connection();
        $sql = "SELECT *
        FROM users
        INNER JOIN accounts
        ON accounts.account_id = users.account_id
        WHERE accounts.role = 'U'";

        

        if($result_user = $conn->query($sql)){
            return $result_user;
        }else{
            die("Error retrieving all users: " . $conn->error);
        }
    }

    

    

    


?>


