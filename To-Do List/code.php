<?php
session_start();
include('dbcon.php');
// to add
    if(isset($_POST['add_btn'])) {

        $title = mysqli_real_escape_string($con, $_POST['title']);

        $add_query = "INSERT INTO todo(title) VALUES ('$title') ";
        $add_query_run = mysqli_query($con, $add_query);

        if ($add_query_run) {
            $_SESSION['message'] = "Added Successfully";
            header('Location: index.php');
    }
    
    if(isset($_GET['del-btn'])) {

        $delete_query = "DELETE FROM todo WHERE id='$id'";
        $delete_query_run = mysqli_query($con, $delete_query);

        if ($delete_query_run) {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: index.php');
    }

    }

    // if (isset($_GET['del-btn'])) {
    //     $id = $_GET['id'];
    
    //     $delete_query = "DELETE FROM todo WHERE id = ?";
    //     $stmt = mysqli_prepare($con, $delete_query);
    
    //     // Bind parameter and execute
    //     mysqli_stmt_bind_param($stmt, "i", $id);
    //     $delete_query_run = mysqli_stmt_execute($stmt);
    
    //     // Check if the query was successful
    //     if ($delete_query_run) {
    //         $_SESSION['message'] = "Task Deleted Successfully";
    //         header('Location: index.php'); // Redirect back to the main page after deletion
    //         exit();
    //     } else {
    //         echo "Error: " . mysqli_error($con);
    //     }
    
    //     mysqli_stmt_close($stmt);
    // }
}
?>
