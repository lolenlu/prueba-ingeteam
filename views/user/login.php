<?php require_once '../layout/header.php'; ?>
<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center"><img src="https://www.ingeteam.com/Portals/0/ingeteam_logo.png"></h3>
		<div class="card-text">
			<div class="alert alert-danger alert-dismissible d-none fade hide" role="alert" id="errorForm">Incorrect username or password.</div>
			<form method="POST" id="formLogIn">
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control form-control-sm" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo isset($_POST['userR']) ? $_POST['userR'] : ''; ?>" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control form-control-sm" id="password" name="password" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : ''; ?>" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Sign in</button>
				
				<div class="sign-up">
					Don't have an account? <a id="btnRegister" href="#">Create One</a>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<?php require_once '../layout/footer.php'; ?>
<script src="../../assets/js/login.js"></script>
  </body>
</html>