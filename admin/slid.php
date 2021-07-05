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
	<style type="text/css">
	@import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500);
.team3 {
  font-family: "Montserrat", sans-serif;
  color: #8d97ad;
  font-weight: 300;
}

.team3 h1,
.team3 h2,
.team3 h3,
.team3 h4,
.team3 h5,
.team3 h6 {
  color: #3e4555;
}

.team3 .font-weight-medium {
  font-weight: 500;
}

.team3 .bg-light {
  background-color: #f4f8fa !important;
}

.team3 .subtitle {
  color: #8d97ad;
  line-height: 24px;
  font-size: 13px;
}

.team3 ul {
  margin-top: 30px;
}

.team3 h5 {
  line-height: 22px;
  font-size: 18px;
}

.team3 ul li a {
  color: #8d97ad;
  padding-right: 15px;
  -webkit-transition: 0.1s ease-in;
  -o-transition: 0.1s ease-in;
  transition: 0.1s ease-in;
}

.team3 ul li a:hover {
  -webkit-transform: translate3d(0px, -5px, 0px);
  transform: translate3d(0px, -5px, 0px);
  color: #316ce8;
}

.team3 .title {
  margin: 30px 0 0 0;
}

.team3 .subtitle {
  margin: 0 0 20px 0;
  font-size: 13px;
}
a:hover {
  text-decoration: none;
}

	</style>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none; background-color: #212F3D; color: #979A9A ;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
  <center></center>
  <hr>
  <img class="img-thumbnail rounded mx-auto d-block" src="img/dr.png" alt="Cinque Terre" style="height: 15%;width: 32%; margin-top: 5px; margin-left: 5px;"><hr> <p><i class='far fa-user-circle' style='font-size: 80px;margin-left: 10px;'></i><span class="user-role">&nbsp;&nbsp;Administrator&nbsp;</span>
              <span class="user-status"style="margin-left: 5px">
                <i class="fa fa-circle" style="color: #07E023; font-size: 10px;"></i>
                <span>Online</span>
              </span> &nbsp; </p>
              
              <hr>
  <h4 style="margin-left: 5px;">DOCTOR</h4>
  <a href="#" class="w3-bar-item w3-button">Add</a>
  <a href="admindoctorupdel.php" class="w3-bar-item w3-button">Update/Delete</a>
  <h4 style="margin-left: 5px;">PATIENT</h4>
  <a href="#" class="w3-bar-item w3-button">Add</a>
  <a href="adminpatientupdel.php" class="w3-bar-item w3-button">Update/Delete</a>
  <h4 style="margin-left: 5px;">APPOINTMENT</h4>
  <a href="Doctorappointment.php" class="w3-bar-item w3-button">Doctor Appointment</a>
  <a href="patientappointment.php" class="w3-bar-item w3-button">Patient Appointment</a>
</div>

<div id="main">

<div class="" style="background: -webkit-linear-gradient(left,  white ,#212F3D);">
  <button id="openNav" class="w3-button w3-xlarge" onclick="w3_open()" >&#9776;</button>
  <div class="w3-container">
  </div>
</div>
<div class="py-5 team3 bg-light">
  <div class="container">
    <div class="row justify-content-center mb-4"><div class="col-md-7 text-center"><h2>Admin Dashboard</h2>
      </div>
    </div>
    <div class="row">
      <!-- column  -->
      <div class="col-lg-4 mb-4">
        <!-- Row -->
        <div class="row">
          <div class="col-md-12">
            <img src="img/totalpatient.png" alt="wrapkit" class="img-fluid" />
          </div>
          <div class="col-md-12">
            <div class="pt-2">
              <h5 class="mt-4 font-weight-medium mb-0">Total Patient &nbsp;&nbsp;<strong>20</strong></h5>
            </div>
          </div>
        </div>
        <!-- Row -->
      </div>
      <!-- column  -->
      <!-- column  -->
      <div class="col-lg-4 mb-4">
        <!-- Row -->
        <div class="row">
          <div class="col-md-12 pro-pic">
            <img src="img/totaldoctor.png" alt="wrapkit" class="img-fluid" />
          </div>
          <div class="col-md-12">
            <div class="pt-2">
              <h5 class="mt-4 font-weight-medium mb-0">Total Doctor &nbsp;&nbsp;<strong>19</strong></h5>
              
            </div>
          </div>
        </div>
        <!-- Row -->
      </div>
      <!-- column  -->
      <!-- column  -->
      <div class="col-lg-4 mb-4">
        <!-- Row -->
        <div class="row">
          <div class="col-md-12 pro-pic">
            <img src="img/totalappointment.png" alt="wrapkit" class="img-fluid" />
          </div>
          <div class="col-md-12">
            <div class="pt-2">
              <h5 class="mt-4 font-weight-medium mb-0">Total Appointment &nbsp;&nbsp;<strong>10</strong></h5>
              
            </div>
          </div>
        </div>
        <!-- Row -->
      </div>
      <!-- column  -->
    </div>
  </div>
</div>
</body>
</html>