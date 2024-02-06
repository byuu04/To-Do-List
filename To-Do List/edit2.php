<?php
    $id=$_POST['id'];
       $title=$_POST['title'];
       
    include 'dbcon.php';
    $sql="UPDATE todo SET title='$title' WHERE id=$id";
    $result=mysqli_query($con, $sql);

    if($result){
        header("location: index.php");
    }
?>