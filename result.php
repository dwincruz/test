<!-- copy index -->
 

<?php


if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    echo "Welcome ".$_SESSION['UserLogin'];
}else{ 
    echo "Welcome Guest!";
}



//to inculde connection.php
//index and connection.php is now one file. 
//but program will read connection.php first before the index
include_once("connections/connection.php");


$con = connection();
//check if seach is caputured
// echo $search = $_GET['search'];
$search = $_GET['search'];

// $id = $_GET['ID'];
//WILDCARD % any first alphabet will show 
// || or
$sql = "SELECT * FROM student_list WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%'ORDER BY id DESC";
//or die to know the problem
//fetch - papasok na function
// $sql = "SELECT * FROM student_list";
$students = $con->query($sql) or die ($con->error);
$row = $students -> fetch_assoc();


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
    <h1>Student Management System</h1>
    <br/>
    <br/>
<!-- SEARCH BAR -->
    <form action="result.php" method="get">
    <input type="text" name="search" id="search">
        <button type="submit">Search</button>
    </form>
<!-- Login and Logout link -->

    <?php if(isset($_SESSION['UserLogin'])){?>
    <a href="logout.php">Logout</a>
    <?php } else{ ?>
        <a href="login.php">Login</a>
    <?php } ?> 
    <a href = "add.php">Add New</a>
    <a href="details.php">Details</a>
    <a href="edit.php">Edit</a>
    <a href="delete.php">Delete</a>



    <table>
        <thead>
        <tr>
            <th></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Gender</th>
        </tr>
        </thead>
        <tbody>

        <?php do {?>

        <tr>
            
            <td><a href="details.php?ID=<?php echo $row['id'];?>">view</a></td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['last_name'];?></td>
            <td><?php echo $row['birth_day'];?></td>
            <td><?php echo $row['gender'];?></td>
        </tr>
        <?php }while($row = $students-> fetch_assoc())?>

        </tbody>


    </table>
</body>
</html>