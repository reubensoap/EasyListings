<?php include('../view/login-header.php'); ?>
    <div class="content">
		<h2>Profile Page</h2>
		<div>
			<p>Your account details are below:</p>
			<table>
				<tr>
					<td>Username:</td>
					<td><p>test</p></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><p><?php echo $userData['password']; ?></p></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><p><?php echo $userData['email']; ?></p></td>
				</tr>
			</table>
		</div>
	</div>
<?php include('../view/login-footer.php'); ?>