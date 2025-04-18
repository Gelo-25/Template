<?php

include 'connect.php';

    if(isset($_POST['signUp'])){
        $FirstName= $_POST['Firstname'];
        $LastName= $_POST['Lastname'];
        $Email= $_POST['Email'];
        $Password= $_POST['Password'];
        $Password=md5($Password);

    $checkEmail="SELECT * From users where email='$Email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo '<script>alert("Email Address Already Exists, Please try again!");
         setTimeout(function()
         { window.location.href = "index.php"; }, 10);
         </script>';
        
    }else{
        $insertQuery="INSERT INTO users(Firstname,Lastname,Email,Password)
        VALUES ('$FirstName','$LastName','$Email','$Password')";
    if($conn->query($insertQuery)==TRUE){
            header("location: index.php?success=1");
            exit();
        }else{
            echo "Error:".$conn->error;
        }
    }

}


if(isset($_POST['signIn'])){
    $Email= $_POST['Email'];
    $Password= $_POST['Password'];
    $Password=md5($Password);

    $sql="SELECT * From users WHERE email='$Email' and password='$Password'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['Email']=$row['Email'];
        header("location: choose.php");
        exit();
    }else{
        echo
        '<script>alert("Not Found, Incorrect Email or Password");
         setTimeout(function()
         { window.location.href = "index.php"; }, 10);
         </script>';
        exit;
    }
}

?>