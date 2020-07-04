<?php
include('./header.php')
?>
<h1>sign-up form</h1>
<form  style="width:400px;margin:3rem auto" method="POST" action="includes/signup.inc.php">
    <div class="form-group">
        <input type="email" placeholder="email" name='email' class="form-control" id="email">
    </div>
    <div class="form-group">
         <input type="password" placeholder="password" name='password' class="form-control" id="password">
    </div>
    <div class="form-group">
         <input type="password" placeholder="password confirm" name='password2' class="form-control" id="password2">
    </div>
    <div class="form-group">
        <button type="submit" name="signup-form" class="btn btn-success">signup</button>
    </div>
    </form>
    <script>

    </script>

<?php
include('./footer.php');
?>