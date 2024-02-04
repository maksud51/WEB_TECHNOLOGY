<!DOCTYPE html>
<html>
<head>
	<title>Notify Customer</title>
</head>
<body>

	<h1 style="text-align:center;"><u><b>Notify Customer</b></u></h1>
	
	
		<form action="NotifyCustomerAction.php" method="POST">
		<fieldset>
		<b>New Massage</b>:
        <br>
		<br>
        <b>Username:</b>
		<br>
		To:
		<input type="text" name="username">
	    <b>Subject</b>: 
		<input type="text"  name="subject" >
		<br>
		<br>
		Comment: 
		<textarea  name="comment" ></textarea>
		<br>
       <input  type="submit" name="submit" value="Send">
	</fieldset>
	</form>
	
</body>
</html>