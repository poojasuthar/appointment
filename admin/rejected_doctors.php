<?php 
   include"header.php";
   include"slider.php";
   include "config_appointment.php";
   ?>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<div class="container-fluid" style="background-color: white;">
   <center>
      <h1><i class="fa">&#xf0f0;&nbsp;Doctor Appoinment</i></h1>
   </center>
   <table class="table table-striped table table-hover table table-bordered table-striped mb-0" >
      <thead class="thead-dark">
         <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Qualification</th>
            <th scope="col">Category</th>
            <th scope="col">Experince</th>
            <th scope="col">Hospital Address</th>
            <th scope="col">Medical id</th>
            <th scope="col">Status</th>
            <th scope="col">Accept Request?</th>
         </tr>
      </thead>
      <?php 
         //pending requests status=0
         $sql="select * from doctor where status=2";
         $result=mysqli_query($link,$sql);
         if(mysqli_affected_rows($link)>0){
         	$i=0;
         		while($row=mysqli_fetch_assoc($result))
         		{
         	?>
      <tbody>
         <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['qualification'];?></td>
            <td><?php echo $row['category'];?></td>
            <td><?php echo $row['experince'];?></td>
            <td><?php echo $row['hospitaladress'];?></td>
            <td><?php echo $row['medicalid'];?></td>
            <td>
               <?php
                  switch($row['status']){
                  	case 0:
                  	echo "
                  		<form action='doctor_accept.php?req=accept' method='GET'>
                  			<input type='hidden' name='id' id='id' value='".$row['id']."'>
                  			<input class='btn btn-primary' type='submit' value='Accept'>
                  		</form>|
                  		<form action='doctor_reject.php?req=reject' method='GET'>
                  			<input type='hidden' name='id' id='id' value='".$row['id']."'>
                  			<input class='btn btn-danger' type='submit' value='Reject'>
                  		</form>					
                  		";
                  		break;
                  
                  	case 1:
                  		echo "<h4  style='color: Green;'>Accepted</h4>";
                  		break;
                  	case 2:
                  		echo "<h4  style='color:red;'>Rejected</h4>";					
                  		break;	
                  }
                  ?>
            </td>
			<td>
					<a href="accept_doctor.php?r_id=<?php echo $row['id'];?>"><button class="btn btn-primary">Accept this Doctor?</button></a>
			</td>
         </tr>
      </tbody>
      <?php
         $i++;
         }
         }
         else
         {
         	echo "<h1 style='color:red;margin-left:20%;'>No data found</h1>";
         }	
          ?>
   </table>
</div>
</body>
</html>