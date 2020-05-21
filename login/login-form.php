<?php include('../view/login-header.php'); ?>
    <div class="login-wrapper">
        <div class="login-form">
            <h1>Login</h1>
            <form action="authentication.php" method="post">
                <label for="username">
                    <i class="fas fa-user"></i>
                </label>
                <input type="text" name="username" placeholder="Username" id="username" required>
                <label for="password">
                    <i class="fas fa-look"></i>
                </label>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <input type="submit" value="Login">
            </form>
            
        </div>
    </div>
<?php include('../view/login-footer.php'); ?>