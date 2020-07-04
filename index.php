<?php
include('./header.php');
if(session_status()==PHP_SESSION_NONE) session_start();
?>
<main>
    <?php
    if(isset($_SESSION['uid'])){
        echo '<h1>you are logged in</h1>';
    }
    else{
        echo '<h1>you are logged out</h1>';
    }
    ?>
    
    
</main>
<?php
include('./footer.php');
?>