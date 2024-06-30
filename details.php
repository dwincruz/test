<?php

//make sure only admin can view the information
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "adminstrator"){
    echo "Welcome ".$_SESSION['UserLogin']."<br/><br/>";
}else{
    echo header ("Location: index.php");
}



//to inculde connection.php
//index and connection.php is now one file. 
//but program will read connection.php first before the index
include_once("connections/connection.php");


$con = connection();

///try muna kung okay
// $id = $_GET['ID'];


$id = $_GET['ID'];



$sql = "SELECT * FROM student_list WHERE id = '$id'";
//or die to know the problem
//fetch - papasok na function
// $sql = "SELECT * FROM student_list";
$students = $con->query($sql) or die ($con->error);
$row = $students -> fetch_assoc();


//run while statement is while is true
// do{
//     echo $row['first_name'] . " " .$row['last_name']. "<br/>";

// }while($row = $students -> fetch_assoc());


// -----> no database selected showing
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
    <form action="delete.php" method="post">
    <a href="index.php"><---Back</a>
<!-- DELETE CAPABILITY - ALWAYS $POST not $_GET because it can delete anny record -->
    <a href="index.php"><---Back</a>
    <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a> 

        <?php if ($_SESSION['Access'] == "administrator"){?>
        <button type="submit" name="delete">Delete</button>
        <?php }?>

        <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
    </form>

    <br/>
    <!-- //if php is inside the html tag it's okay if theres a spacing.-->
     <!-- if inside the php need to concatenate (use dot)-->
<h2> <?php echo $row ['first_name'];?> <?php echo $row['last_name'];?></h2>
<p>is a <? echo $row['gender'];?></p>

   
</body>
</html>     