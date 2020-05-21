<?php include('../view/login-header.php'); ?>
    <div class="register-wrapper">
        <div class="register">
		    <h1>Register</h1>
		    <form action="register-process.php" method="post" autocomplete="off">
                <div class="error_note">
                    <p class="form_note"><?php echo $error_note ?></p>
                </div>
                <div class="form-row">
			        <label for="username">
				        <i class="fas fa-user"></i>
			        </label>
                    <input type="text" name="username" placeholder="Username" id="username" required>
                </div>
                <div class="form-row">
			        <label for="password">
				        <i class="fas fa-lock"></i>
			        </label>
                    <input type="password" name="password" placeholder="Password" id="password" required>
                </div>
                <div class="form-row">
			        <label for="email">
				        <i class="fas fa-envelope"></i>
			        </label>
                    <input type="email" name="email" placeholder="Email" id="email" required>
                </div>
			    <input type="submit" value="Register">
		    </form>
	    </div>
    </div>
    <div id="popup-note">
        <p id="error-code"><?php echo $error_note ?></p>
    </div>
    <script>
        var errorCode = document.getElementById("popup-note").innerHTML;
        if (errorCode === "1") {
            document.getElementById("popup-note").style.background = "black";
        }
    </script>
<?php include('../view/login-footer.php'); ?>