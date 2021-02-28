<?php
include "db.php";

include "layout/header.php";

?>
<h1>Login</h1>
<form method="POST" action="user.php">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Please enter your username" id="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Please enter your password" id="password"  required>
    </div>
    <div class="form-group">
        <input type="submit" value="Login" class="btn btn-primary">
        <input type="hidden" name="action" value="login">
    </div>
    <p>You don't have an account? <a href="register.php">Sign up</a></p>
</form>