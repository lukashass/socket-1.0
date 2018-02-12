<?php

if(!empty($_GET['switch']) && !empty($_GET['action'])) {
	
	$id = $db->escape($_GET['switch']);

	$result = $db->query("SELECT code_on, code_off, protocol FROM sockets WHERE id='" . $id . "'");

	$row = $result->fetch_object ();
		
	if($_GET['action'] == "on") {
		$code = $row->code_on;

		$db->query("UPDATE sockets SET status='1' WHERE id='" . $id . "'");

	} else {
		$code = $row->code_off;

		$db->query("UPDATE sockets SET status='0' WHERE id='" . $id . "'");

	}

	exec("sudo ./codesendRoot " . $code . " " . $row->protocol, $output);

	if(!isset($_GET[token])) {
		header("Location: /");
	}
	
	//var_dump($output);
	//echo '<a href="?"> BACK </a><br><br>';
}
if(isset($_GET['logout'])) {
	setcookie("WSauth", "", time() - 3600);

	header("Location: /");
}
?>

<?php

	$result = $db->query("SELECT id, name, system_name, status  FROM sockets");

	while($row = $result->fetch_object ()){

?>
<div class="card">
  	<div class="card-header">
    	<?php echo $row->name . " [" . $row->system_name . "] - " . $row->status; ?>
  	</div>
  	<div class="card-body">
	  	<div class="row">
	  		<div class="col">
				<a class="btn btn-success btn-block" role="button" href="?switch=<?php echo $row->id; ?>&action=on"> ON </a>
			</div>
			<div class="col">
				<a class="btn btn-danger btn-block" role="button" href="?switch=<?php echo $row->id; ?>&action=off"> OFF </a>
			</div>
	  	</div>
	</div>
</div>

<?php

	}

?>
