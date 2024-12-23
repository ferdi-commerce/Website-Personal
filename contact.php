<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contact Us</title>
		<link rel="stylesheet" href="contact.css">
	</head>
	<body>
		<form class="contact-form" action="send-email.php" method="post">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>
			<div class="form-group">
				<label for="message">Message:</label>
				<textarea class="form-control" id="message" name="message" rows="5" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Send Message</button>
		</form>
	</body>
</html>