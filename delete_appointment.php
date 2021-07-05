	<?php
		//code to delete.
		include "config_appointment.php";
		$qry2="delete from book_appointment where id=".$_REQUEST["del_id"];
		mysqli_query($link,$qry2);
		header('location:http://localhost/appointment/show_appointment.php');

		//end of code to delete.
			   ?>	   