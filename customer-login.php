<!DOCTYPE html>
<html>
<head>
	<title>My App - Sign Up / Log In</title>
	<link rel="stylesheet" type="text/css" href="sign_up.css">
	<script src="sign_up.js"></script>
	<!-- Add any necessary stylesheets and scripts here -->
</head>
<body>
	<main>
		<section id="signup">
			<header>
				<nav>
					<ul>
						<li><a href="#" onclick="showSignUp()">Sign up</a></li>
						<li><a href="#" onclick="showLogin()">Log in</a></li>
					</ul>
				</nav>
			</header>
			<h2>Sign up for PUI</h2>
			<form action="signup.php" method="POST">
				<input type="hidden" name="action" value="signup">

				<label for="name">Full name:</label>
				<input type="text" id="name" name="name" required>

				<label for="email">Email address:</label>
				<input type="email" id="email" name="email" required>

				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>

				<button type="submit">Sign up</button>
			</form>
			<?php require_once "signup.php"; ?>
		</section>

		<section id="login">
			<header>
				<nav>
					<ul>
						<li><a href="#" onclick="showSignUp()">Sign up</a></li>
						<li><a href="#" onclick="showLogin()">Log in</a></li>
					</ul>
				</nav>
			</header>
			<h2>Log in to PUI</h2>
			<form action="login.php" method="POST">
				<input type="hidden" name="action" value="login">

				<label for="email">Email address:</label>
				<input type="email" id="email" name="email" required>

				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>

				<button type="submit">Log in</button>
			</form>
			<?php require_once "login.php"; ?>
		</section>
	</main>

	<footer>
		<!-- Add any necessary footer content here -->
	</footer>
</body>
</html>
