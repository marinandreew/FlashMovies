<?php
include "db.php";

include "layout/header.php";

?>
<h1>Register</h1>
<form method="POST" action="user.php">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Please enter your username" id="username"  required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Please enter your email" id="email"  required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Please enter your password" id="password"  required>
    </div>
    <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" name="confirmPassword" class="form-control" placeholder="Please enter your password again" id="confirmPassword"  required>
    </div>
    <div class="form-group">
        <input type="submit" value="Register" class="btn btn-primary">
        <input type="hidden" name="action" value="register">
    </div>
    <p>Already have an account? <a href="login.php">Sign in</a></p>
</form>