<?php
    include "db_conn.php";
    $sql = "SELECT * FROM `users` ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="box">
            <h4 class="display-4 text-center">Read</h4><br><hr>
            <?php if(isset($_GET['succes'])){ ?>
                <div class="alert alert-success" role="alert">
                <?php echo ($_GET['succes']); ?>
                </div>
            <?php } ?>
            <?php if (mysqli_num_rows($result)) { ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">N/o</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actins</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        while($rows = mysqli_fetch_assoc($result)){ 
                        $i++;
                    ?>
                    <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$rows['name']?></td>
                        <td><?=$rows['email']?></td>
                        <td>
                            <a href="./update.php?id=<?=$rows['id']?>" class="btn btn-success">Update</a>
                            <a href="./delete.php?id=<?=$rows['id']?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php }; ?>
                </tbody>
            </table>
            <?php } ?>
            <div class="link-right">
                    <a href="../index.php" class="btn btn-success butt">create</a>
            </div>
        </div>
    </div>
</body>
</html>