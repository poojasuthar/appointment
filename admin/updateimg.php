<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
	
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; background-color: #212F3D; color: #979A9A ;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
  <center></center>
  <hr>
  <img class="img-thumbnail rounded mx-auto d-block" src="img/dr.png" alt="Cinque Terre" style="height: 10%;width: 20%; margin-top: 5px; margin-left: 5px;"><hr> 
              
              <hr>
 <div class="sidebar-menu">
            <ul style="list-style-type:none;">
            
              <li class="header-menu">
                <span>DOCTOR</span>
              </li>
              <li>
                <a href="doctor_request.php" id="link1">
                  <span> Doctor's Request</span>
                </a>
              </li>
			  <li>
                <a href="add_doctor.php" id="link1">
                  <span> Add New Doctor</span>
                </a>
              </li>
              <li>
                <a href="display_doctor.php" id="link1">
                  <span> Update/Delete Doctor</span>
                </a>
              </li>
               
              <li class="header-menu">
                <span>PATIENT</span>
              </li>
               <li>
                <a href="add_paitent.php" id="link1">
                  <span> Add New Patient</span>
                </a>
              </li>
              <li>
                <a href="display_paitent.php " id="link1">
                  <span> Update/Delete Patient</span>
                </a>
              </li>

               <li class="header-menu">
                <span>APPOINTMENT</span>
              </li>
              <li>
                <a href="accepted_appointments.php" id="link1">
                  <span> Accepted Appointment</span>
                </a>
              </li>
			  <li>
                <a href="rejected_appointments.php" id="link1">
                  <span> Rejected Appointment</span>
                </a>
              </li>
              <li>
                <a href="pending_appointments.php" id="link1">
                  <span> Pending Appointment</span>
                </a>
              </li>
			  <li>
                <a href="patientappointment.php" id="link1">
                  <span> Finished Appointment</span>
                </a>
              </li>
            </ul>
          </div>
</div>

<div id="main">

<div class="" style="background: -webkit-linear-gradient(left,  white ,#212F3D);">
  <button id="openNav" class="w3-button w3-xlarge" onclick="w3_open()" >&#9776;</button>
  <div class="w3-container">
  </div>
</div>
<div class="py-5 team3 bg-light">
 
</div>
</body>
</html>