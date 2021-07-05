<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="pdfpage.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>
<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> download pdf</button>
            </div>
            <div class="col-md-12">
                <div class="card" id="invoice">
					<div class="card-body">
				<!--	<div class="card-header bg-transparent header-elements-inline">
                    </div>-->
				    <center><h6 class="card-title text-primary">Appointment Details</h6></center>
<?php 
	
	include "config_appointment.php";
	
$sql="SELECT book_appointment.id,doctor.id AS d_id, paitent.name as p_name,paitent.gender,paitent.dob, doctor.name as d_name, doctor.mobile, book_appointment.booked_on, book_appointment.appointment_date, book_appointment.appointment_start, book_appointment.appointment_end 
FROM book_appointment 
INNER JOIN paitent 
ON book_appointment.from_paitent_id=paitent.id 
INNER JOIN doctor ON book_appointment.to_doctor_id=doctor.id WHERE book_appointment.id=".$_REQUEST['r_id'];
	$result=mysqli_query($link,$sql);
		if(mysqli_affected_rows($link)>0)
				{	
					$i=0;
					while($row=mysqli_fetch_assoc($result))
				{	
?>
                    
                         <div class="d-md-flex flex-md-wrap">
                            <table class=" table table-bordered" >
							  <tbody>
							  <tr>
								<td style="width:50%;">Doctor name</td>
								<td><?php echo $row['d_name']?></td>
							  </tr>
							  <tr>
								<td>Date</td>
								<td><?php
									echo $row['appointment_date'];
									?>
							</tr>
							 <tr>
								<td>Time</td>
							<td><?php echo $row['appointment_start']."-".$row['appointment_end'];?>
							 </td>
							 </tr>
							</tbody>
						  </table>
						  </div>
                        <center><h6 class="card-title text-primary">Paitent Details</h6></center>
                    
                        <div class="d-md-flex flex-md-wrap">
                            <table class="table table-bordered" style=""> 
							  <tbody>
							  <tr>
								<td style="width:50%;">Paitent name</td>
								<td><?php echo $row['p_name']?></td>
							  </tr>
							  <tr>
								<td>Date of Birth</td>
								<td>
								<?php echo $row['dob'];?>
								</td>
								</tr>
								<tr>
								<td>
								Age
								</td>
								<td>
								<?php 
								$today = date("Y-m-d");
								$diff = date_diff(date_create($row['dob']), date_create($today));
									echo $diff->format('%y');
								?>
								</td>
							  </tr>
							  <tr>
								<td>Gender</td>
								<td><?php echo $row['gender'];?></td>
							  </tr>
							  
							</tbody>
						  </table>
                        </div>
						<span style="color:red;">**INSTRUCTIONS</span>
			<UL>
   <LI>	Please carry the Photo Id card.</li>
   <LI>If you have any comorbidities, please carry a medical certificate with you for the appointment.</li>
   <li>For any additional information, please visit our website</li>
</UL>
                    </div>
            </div>
			
			
	
        </div>
    </div>
</body>

<script>
	window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: '<?php echo $row['p_name'].'-Appointment'?>.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>
</html>
<?php
				$i++;
				}}
?>