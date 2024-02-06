
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-image: url(bg.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            height: auto;
        }

        .header {
            justify-content: space-between;
        }

        .container {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            /* You can adjust the values as needed */
        }
    </style>
</head>
<?php
    include 'dbcon.php';
    $id=$_GET['id'];
    $sql="SELECT * FROM todo WHERE id=".$id;

    $result = mysqli_query($con, $sql);

    if($result){   
        $row=mysqli_fetch_assoc($result);
            $title=$row['title'];

    }
?>
<body>
    <nav class="navbar bg-success navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
        </div>
    </nav>
    <br>
    <br>
    <div class="container py-3 border">
        <div class="header header-bordered">
            <a class="btn btn-success" href="index.php">
                <i class="fas fa-reply" style="color: #fff;"></i>
            </a>
        </div>
    </div>
    <div class="container border py-5">
        <div class="row">
            <div class="col-md-12 py-5 px-5">
                <hr>
                <h3 class="text-center text-white">EDIT TASK</h3>
                
                <form action="edit2.php" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                    <input type="text" name="title" class="form-control mb-2" style=""
                        value="<?php echo $title; ?>">
                    
                    <button type="submit" name="edit-btn"
                        class="btn btn-success form-control py-2"
                        style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        Edit
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
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
