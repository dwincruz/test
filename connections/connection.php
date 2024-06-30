<?php

    function connection(){
        // echo "This is a function";

//connection.php function
// connection();

//this create a function to update the login 
$host = "localhost";
$username = "root";
$password = "";
$database = "student_system";


//mysqli is improved
//php version 7 use mysqli
$con = new mysqli($host, $username, $password, $database);



//to check if connection is working in the database
//check in http://localhost/schoolkit/
//OOP
if($con->connect_error){
    echo $con->connect_error;
}else{
    //echo "Connected";
    return $con;
}
    }