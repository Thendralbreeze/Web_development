<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>form</title>
</head>
<body>
	<form method="post" action="submitform.php">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br>
  <label for="phone">Phone Number:</label>
  <input type="tel" id="phone" name="phone"><br>
  <input type="submit" value="Submit">
</form>
<?php
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $servername = "localhost";
  $username = "your_username";
  $password = "your_password";
  $dbname = "your_dbname";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO contacts (name, email, phone)
  VALUES ('$name', '$email', '$phone')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

</body>
</html>