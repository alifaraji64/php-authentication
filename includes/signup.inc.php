<?php
if(isset($_POST['signup-form'])){
    include('./dbc.inc.php');
     $useremail = $_POST['email'];
     $userpassword = $_POST['password'];
     $userpassword2 = $_POST['password2'];
     //IF ONE OF THE FIELDS IS EMPTY
     if(empty($useremail) || empty($userpassword) || empty($userpassword2)){
         header("location: ../signup.php?error=empty field&email=".$useremail);
         exit();
     }
     //IF ALL FIELDS ARE FULL
     else{
         //EMIAL VALIDATION
         if(!filter_var($useremail,FILTER_VALIDATE_EMAIL)){
            header("location: ../signup.php?error=invalid-email&email=".$useremail);
            exit();
         }
         //PASSWORD SHOULD HAVE AT LEAST 4 CHARCTERS
         if(strlen($userpassword)<4){
            header("location: ../signup.php?error=password-charecter&email=".$useremail);
            exit();
         }
         //CHECK THAT TWO PASWORD MATCH
         if($userpassword !== $userpassword2){
            header("location: ../signup.php?error=password-match&email=".$useremail);
            exit();
         }
         $sql = "SELECT email FROM users WHERE email=?";
         $stmt = mysqli_stmt_init($conn);
         //IF THERE IS AN ERROR IN STATEMENT CONNECTION
         if(!mysqli_stmt_prepare($stmt,$sql)){
             header('location: ../signup.php?error=sqlerror');
             exit();
         }
         //IF STATEMENT IS PREPARED
         else{
             mysqli_stmt_bind_param($stmt,'s',$useremail);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_store_result($stmt);
             $resultcheck = mysqli_stmt_num_rows($stmt);
             //WE HAVE USER IN DB WITH THIS EMAIL
             if($resultcheck>0){
                header('location: ../signup.php?error=user-taken');
                exit();
             }
             //GETTING READY TO PUT USER IN DB
             else{
                 $sql = "INSERT INTO users(email,password) VALUES (?,?)";
                 $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt,$sql)){
                    header('location: ../signup.php?error=sqlerror');
                    exit();
                 }
                 else{
                     $hasehdPassword = password_hash($userpassword,PASSWORD_DEFAULT);
                     mysqli_stmt_bind_param($stmt,'ss',$useremail,$hasehdPassword);
                     mysqli_stmt_execute($stmt);
                     header('location:../signup.php?signup=success');
                     exit();
                 }
             }
         }
     }
     mysqli_stmt_close($stmt);
     mysqli_close($conn);
}
else{
    echo 'not set';
}