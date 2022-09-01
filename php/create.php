<?php 
    include "db_conn.php";

    if(isset($_POST['submit'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        
        $user_data = 'name=' .$name. '&email=' .$email;

        if (empty($name)) {
            header("Location: ../index.php?error=Name is required&$user_data");
        }else if(empty($email)){
            header("Location: ../index.php?error=Email is required&$user_data");
        }else{
            $sql = "INSERT INTO `users`(`name`, `email`) 
                    VALUES ('$name', '$email')";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: ./read.php?succes=Succesfully created");
            }else{
                header("Location: ../index.php?error=Something went wrong&$user_data");
            }
        }
    }
?>
