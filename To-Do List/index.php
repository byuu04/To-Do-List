<?php
include 'code.php';

// Check if the "Delete All" button is clicked
if (isset($_POST['delete_all_btn'])) {
    include 'dbcon.php';

    // Perform the query to delete all tasks
    $deleteAllQuery = "DELETE FROM todo";
    mysqli_query($con, $deleteAllQuery);

    // Redirect to the same page to refresh the task list
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <style>
        body {
            background-image: url(bg.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
        }

        .col-sm-2 {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .container {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* You can adjust the values as needed */
        }
    </style>
</head>
<body>
    <nav class="navbar bg-success navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand text-center" href="#">To-Do List</a>
        </div>
    </nav>
    <br>
    <br>
    <div class="container py-5 border">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="text-center text-white">ADD TASK</h3>
                <hr>
                <form action="code.php" method="POST">
                    <input name="title" type="text" class="form-control mb-2" placeholder="Add task here" required>
                    <hr>
                    <button name="add_btn" onclick="add" class="btn btn-success form-control">Add</button>
                </form>
            </div>
            <div class="col-sm-6" style="max-height: 500px; overflow: auto;">
                <div class="well">
                    <h3 class="text-center text-white">TASK LIST</h3>
                    <hr>
                    <table class="table table-bordered text-white text-center">
                        <thead class="bg-success">
                            <tr>
                                <th>TASK</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'dbcon.php';
                            $sql="SELECT * FROM todo";
                            $result=mysqli_query($con, $sql);

                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $title=$row['title'];

                                    ?>
                                    <tr>
                                        <td><?php echo $title  ?></td>
                                        <td>
                                            <a class="btn btn-danger" name="del-btn" href="delete.php?id=<?php echo $id ?>" role="button" onclick="confirmDelete(<?php echo $id ?>)">
                                                <i class="fas fa-trash" style="color: #fff;"></i>
                                                <small>Delete</small>
                                            </a>
                                            <a class="btn btn-primary" name="edit-btn" href="edit.php?id=<?php echo $id ?>" role="button">
                                                <i class="fas fa-pen" style="color: #fff;"></i>
                                                <small>Edit</small>
                                            </a>
                                        </td>                                             
                                    </tr>
                                    <?php                                          
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <!-- Add a "Delete All" button at the bottom of the task list -->
                        <button name="delete_all_btn" class="btn btn-danger mt-3 float-right">Delete All</button>
                    </form>

                </div>
            </div>
        ts</div>
    </div>
    <!-- <script src="js/bootrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
</body>
</html>
<!-- MEMBERS :
NIKKERSON J. DOYDORA
REVELYN LICAYAN
MARICEL C. MAPUTOL
ANGELINE VALLEJOS -->
<!-- database name: todolist
database table: todo
`id` AI
`title` varchar -->
