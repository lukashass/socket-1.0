<?php

if(isset($_GET['auth']) && $_GET['auth'] == $password){

	setcookie(
	  "WSauth",
	  $cookie,
	  time() + (10 * 365 * 24 * 60 * 60)
	);

	header('Location: /');

}

?>

<br>
<form method="GET">
	<div class="input-group">
    	<input type="password" class="form-control" name="auth" placeholder="password" required="">
		<span class="input-group-btn">
    		<input type="submit" name="submit" class="btn btn-primary" value="auth">
		</span>
	</div>
</form>
