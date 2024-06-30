
<!-- Creating Log in Page -->
<?php

//SESSION - way of program that can store all parts of data in program
//store all you need data to use
// $_SESSION 


//transfer to index.php after
if(!isset($_SESSION)){
    session_start();
//     //if no store session can able to start session and store
//     //! - not true
}
    // if(isset($_SESSION['UserLogin'])){
    //     echo "Welcome " .$_SESSION['UserLogin'];
    // }else{
    //     echo "Welcome Guest";
    // }
    



include_once("connections/connection.php");


$con = connection();

if(isset($_POST['login'])){
    // echo "Login";

    $username = $_POST['username'];
    $password = $_POST['password'];

    // echo
     $sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";

     $user = $con->query($sql) or die ($con->error);
     $row = $user->fetch_assoc();
    //  echo
     $total = $user->num_rows;

     //greater than zero will store
    if($total > 0){
     $_SESSION['UserLogin'] = $row['username'];
     $_SESSION['Access'] = $row['access'];
        echo header ("Location: index.php");
        // echo $_SESSION['UserLogin'];
    }else{
        echo "No user found.";
    }
    //  echo $_SESSION['UserLogin'];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">


   
</head>
<body>
    
    <h1> Login Page</h1>
    <br/>
    <form action="" method="post">
    <label>Username</label>
    <input type="text" name="username" id="username">
    <br/>
    <br/>
    <label>Password</label>
    <input type="text" name="password" id="password">
    <br/>
    <br/> 
    <button type="submit" name="login">Login</button>



</form>

</body>
</html>