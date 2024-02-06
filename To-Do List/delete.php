<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_query = "DELETE FROM todo WHERE id = ?";
    $stmt = mysqli_prepare($con, $delete_query);

    // Bind parameter and execute
    mysqli_stmt_bind_param($stmt, "i", $id);
    $delete_query_run = mysqli_stmt_execute($stmt);

    // Check if the query was successful
    if ($delete_query_run) {
        header('Location: index.php');
        $_SESSION['message'] = "Deleted Successfully"; // Redirect back to the main page after deletion
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($con);
?>
