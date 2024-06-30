<!-- EDIT COPT THE ADD CODES AND JUS T CHANGE THE QUERY -->


<?php
//to inculde connection.php
//index and connection.php is now one file. 
//but program will read connection.php first before the index
include_once("connections/connection.php");

//include file then call function


$con = connection();
//if statement - to check if Variables are TRUE or FALSE
//submit form is already set can do below function

$id = $_GET['ID'];



$sql = "SELECT * FROM student_list WHERE id = '$id'";
//or die to know the problem
//fetch - papasok na function
// $sql = "SELECT * FROM student_list";
$students = $con->query($sql) or die ($con->error);
$row = $students -> fetch_assoc();


if(isset($_POST['submit'])){
    // echo "Submitted!";
    // echo $_POST['firstname']; 

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $bday = $_POST['birthday'];
    $gender = $_POST['gender'];
   //echo to check the value
     $sql = "UPDATE  student_list SET first_name = '$fname', last_name = '$lname', birth_day = '$bday', gender = '$gender' WHERE id = '$id' ";
// WHERE id = '$id'    - dont forget to input so it wont update all data and will mess.
    $con->query($sql) or die ($con->error);

    echo header ("Location: details.php?ID=.$id");
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
        <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name'];?>">


    <label>Last Name</label>
    <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name'];?>">


    <label>Birthday</label>
    <input type="date" name="birthday" id="birthday" value="<?php echo $row['birth_day'];?>">

    <label>Gender</label>
    <select name="gender" id="gender">
        <!-- shorthand of IF statements -->
        <!-- < ?php echo($row['gender']=="Male")? '':'';?>  -->
        <!-- all inside the '' : ''  is  your condition -->
        <!-- '' value if true  and: '' value if false -->
        <option value="Male"<?php echo($row['gender']=="Male")? 'selected':'';?>>Male</option>
        <option value="Female"<?php echo($row['gender']=="Female")? 'selected':'';?>>Female</option>


        <!-- <option value="Male">Male</option>
        <option value="Female">Female</option> -->


    </select>


    <!-- Button - use to activate function -->
    <!-- Submit -  submit the form -->
    <input type="submit" name="submit" value="Update">

    </form>

</body>
</html>
