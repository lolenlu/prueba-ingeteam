<?php require_once '../layout/header.php'; ?>
<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center"><img src="https://www.ingeteam.com/Portals/0/ingeteam_logo.png"></h3>
		<div class="card-text">
			<div class="alert alert-danger alert-dismissible d-none fade hide" role="alert" id="errorForm"></div>
			<form method="POST" id="formRegister" name="formRegister" action="#" >
				<div class="form-group">
					<label for="name">Full name</label>
					<input type="text" class="form-control form-control-sm" id="name" name="name" pattern="[^0-9]*" maxlength='250' title="Full name cannot contains any digits" required>
				</div>
                <div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control form-control-sm" id="email" name="email" maxlength='250' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
				</div>
                <div class="form-group">
					<label for="description">Description</label>
					<input type="textarea" class="form-control form-control-sm" id="description" name="description" maxlength='250' >
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control form-control-sm" id="address" name="address" maxlength='250' required>
				</div>
				<div class="form-group">
					<label for="postalCode">Postal code</label>
					<input type="text" class="form-control form-control-sm" id="postalCode" name="postalCode" maxlength='5' pattern="([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control form-control-sm" id="password" name="password" required>
				</div>
                <div class="form-group">
					<label for="password2">Repeat password</label>
					<input type="password" class="form-control form-control-sm" id="password2" name="password2" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Register</button>
			</form>
		</div>
	</div>
</div>
</div>
<?php require_once '../layout/footer.php'; ?>
<script src="../../assets/js/register.js"></script>
  </body>
</html>