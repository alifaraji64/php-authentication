<?php
if(isset($_POST['login-form'])){
    include('./dbc.inc.php');
    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];
    if(empty($useremail) || empty($userpassword)){
        header("location: ../header.php?error=empty field&email=".$useremail);
        exit();
    }
    // IF ALL FIELDS ARE FILLED
    else{
        $sql = 'SELECT * FROM users WHERE email=?';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../header.php?error=sqlerror&email=".$useremail);
            exit();
        }
        //STMT IS PREPARED
        else{
            mysqli_stmt_bind_param($stmt,'s',$useremail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            //WE HAVE A USER WITH THAT EMIAL IN DB
            if($row = mysqli_fetch_assoc($result)){
                $email = $row['email'];
                $id = $row['id'];
                $pwdCheck = password_verify($userpassword,$row['password']);
                //IF PASSWORD IS false
                if($pwdCheck==false){
                    header("location: ../header.php?error=wrong-password");
                    exit();
                }
                //PASSWORD IS TRUE
                else{
                    session_start();
                    $_SESSION['uid'] = $id;
                    header("location: ../index.php?login=success");
                    exit();
                }
                
            }
            else{
                header("location: ../header.php?error=no-user");
                exit();
            }
        }
    }
}
else{
    echo 'not set';
}