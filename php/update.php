<?php

    include 'db_conn.php';

    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "UPDATE `users` SET `name`='$name', `email`='$email' WHERE id = $id"; 

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: read.php?succes=User updated succesfully");
        } 
        else{
            echo("Failed:" . mysqli_error($data));
        }
    }


?>

<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    
    <div class="container">

        <?php 
            $id = $_GET['id'];
            $sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>

        <form autocomplete="off" action="" method="POST">
            <h4 class="display-4 text-center">Update</h4><br><hr>
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                 <?php echo $_GET['error'] ?>
            </div>
               <?php } ?>
            <div class="form-group">
                <label for="name">Name</label><br>
                <input type="text"
                       class="form-control" 
                       id="name" 
                       name="name"
                       value="<?php echo $row['name'] ?>"><br>
            </div>
            <div class="form-group">
                <label for="email">Email</label><br>
                <input type="email"
                    class="form-control" 
                    id="email" 
                    name="email"  
                    value="<?php echo $row['email'] ?>"><br>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Update</button>
            <a class="btn btn-danger" href="./read.php">Cansel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body> 
</html>