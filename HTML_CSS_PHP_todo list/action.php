<?php 
include ('connection.php');

if(isset($_POST['add'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $priority = $_POST['priority'];

    $query = "INSERT INTO details(title,description,date,priority) VALUES('$title','$description','$date','$priority')";
	$result=mysqli_query($con,$query);
    if($result){
        header("location: todolist.php?success=add");
    }else{
        echo "Connection Error: ".mysqli_connect_error();
    }
}

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $priority = $_POST['priority'];

    $query = "UPDATE details SET title='$title',description='$description',date='$date',priority='$priority' WHERE id=$id";
	$result=mysqli_query($con,$query);
    if($result){
        header("location: todolist.php");
    }else{
       echo "Error updating data: "  .mysqli_connect_error();
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM details WHERE id=$id";
	$result=mysqli_query($con,$query);
    if ($result) {
        header("location: todolist.php");
    } else {
        echo "Error: " .mysqli_connect_error();
    }
}
?>