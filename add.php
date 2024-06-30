
<?php
//to inculde connection.php
//index and connection.php is now one file. 
//but program will read connection.php first before the index
include_once("connections/connection.php");

//include file then call function


$con = connection();
//if statement - to check if Variables are TRUE or FALSE
//submit form is already set can do below function
//
if(isset($_POST['submit'])){
    // echo "Submitted!";
    // echo $_POST['firstname']; 

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $bday = $_POST['birthday'];
    $gender = $_POST['gender'];
   //echo to check the value
     $sql = "INSERT INTO `student_list` (`first_name`, `last_name`,`birth_day`, `gender`) VALUES ('$fname', '$lname','$bday', '$gender')";

    $con->query($sql) or die ($con->error);

    echo header ("Location: index.php");
}

//or die to know the problem
//fetch - papasok na function
// $sql = "SELECT * FROM student_list";
// $students = $con->query($sql) or die ($con->error);
// $row = $students -> fetch_assoc();


//run while statement is while is true
// do{
//     echo $row['first_name'] . " " .$row['last_name']. "<br/>";

// }while($row = $students -> fetch_assoc());


//-----> no database selected showing
// print_r($row);


///////////////////////
/////// HTML /////////
/////////////////////
//always close with semi colon; 


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

<!-- FORM 
post and get - data nangagaling sa form
post - nilalagay sa body ng form data
get - append URL; nilalagay sa URL -->

    <!-- Action - kung saan pupunta yung form  -->
    <form action="" method="post">


    <label>First Name</label>
        <input type="text" name="firstname" id="firstname">


    <label>Last Name</label>
    <input type="text" name="lastname" id="lastname">


    <label>Birthday</label>
    <input type="date" name="birthday" id="birthday">

    <label>Gender</label>
    <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>


    </select>


    <!-- Button - use to activate function -->
    <!-- Submit -  submit the form -->
    <input type="submit" name="submit" value="Submit Form">

    </form>

</body>
</html>
