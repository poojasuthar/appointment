<?php
session_start();
include"head.php";
?>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style type="text/css">
		
		@import url(//fonts.googleapis.com/css?family=Montserrat:300,400,500);
.team1 {
  font-family: "Montserrat", sans-serif;
	color: #8d97ad;
  font-weight: 300;
}

.team1 h1, .team1 h2, .team1 h3, .team1 h4, .team1 h5, .team1 h6 {
  color: #3e4555;
}

.team1 .font-weight-medium {
	font-weight: 500;
}

.team1 .bg-light {
    background-color: #f4f8fa !important;
}

.team1 .subtitle {
    color: #8d97ad;
    line-height: 24px;
}

.team1 .pro-pic {
  min-height: 200px;
}

.team1 .pro-pic .card-img-overlay {
  background: rgba(26, 139, 243, 0.87);
  display: none;
}

.team1 .pro-pic .card-img-overlay ul {
  top: 20%;
}

.team1 .pro-pic .card-img-overlay ul li a {
  -webkit-transition: 0.1s ease-in;
  -o-transition: 0.1s ease-in;
  transition: 0.1s ease-in;
}

.team1 .pro-pic .card-img-overlay ul li a:hover {
  -webkit-transform: translate3d(0px, -5px, 0px);
  transform: translate3d(0px, -5px, 0px);
}

.team1 .pro-pic:hover .card-img-overlay {
  display: block;
}

a:hover {
  text-decoration: none;
}

	</style>

<?php
if(!isset($_SESSION["name"])) {
	header("Location:login.php");
}
?>
  <div class="py-5 bg-light team1 container">

    <div class="row justify-content-center mb-3">
	  <div class="col-sm-2">
	  <?php
			$sql="select * from doctor where id=".$_SESSION["id"];			
			$result=mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)>0)
						{	
							while($row=mysqli_fetch_assoc($result))
						{
	?>
	  <img src="<?php echo '../admin/upload/' . $row['photo']; ?>" height="120" width="150px;"  style="border: 5px solid #BEBEBE">
  
    </div>
      <div class="col-md-7 text-center">
        <h1 class="mb-3" style="margin-top:5%;">Welcome! &nbsp;<?php echo $row['name'];?></h1>
      </div>
    </div>
    <?php
						}}
	?>    
    <div class="row">
      <!-- column  -->
      <div class="col-lg-6">
        <div class="card card-shadow border-0 mb-4">
          <!-- Row -->
          <div class="row no-gutters">
            <div class="col-md-4 pro-pic">
            	<img src="show.png" style="height: 70%;width: 70%;margin-top: 30px;margin-left: 20px;">
              
            </div>
            <div class="col-md-7 bg-white">
              <div class="p-4">
              	<a href="showappointment.php"><h2 class="mb-3 font-weight-medium">View Pending Appointments</h2></a>
              </div>
            </div>
          </div>
          <!-- Row -->
        </div>
      </div>
      <!-- column  -->
      <div class="col-lg-6">
        <div class="card card-shadow border-0 mb-4">
          <!-- Row -->
          <div class="row no-gutters card-shadow">
            <div class="col-md-4 pro-pic">
              <img src="schedule.png" style="height: 70%;width: 70%;margin-top: 30px;margin-left: 20px;">
            </div>
            <div class="col-md-7 bg-white">
              <div class="p-4">
			<a href="redirctappointment.php"><h2 class="mb-3 font-weight-medium">Schedule Time Slots</h2></a>
              
			  </div>
            </div>
          </div>
          <!-- Row -->
        </div>
      </div>
      <!-- column  -->
    </div>
    <div class="row">
      <!-- column  -->
      <div class="col-lg-6">
        <div class="card card-shadow border-0 mb-4">
          <!-- Row -->
          <div class="row no-gutters card-shadow">
            <div class="col-md-4 pro-pic">
              <img src="appointment.png" style="height: 70%;width: 70%;margin-top: 30px;margin-left: 20px;">
            </div>
            <div class="col-md-7 bg-white">
              <div class="p-4">
                <a href="appointment.php"><h2 class="mb-3 font-weight-medium"><br>Accepted Appointments</h2></a>
              </div>
            </div>
          </div>
          <!-- Row -->
        </div>
      </div>
      <!-- column  -->
      <div class="col-lg-6">
        <div class="card card-shadow border-0 mb-4">
          <!-- Row -->
          <div class="row no-gutters card-shadow">
            <div class="col-md-4 pro-pic">
              <img src="rejected.png" style="height: 70%;width: 70%;margin-top: 30px;margin-left: 20px;">
            </div>
            <div class="col-md-7 bg-white">
              <div class="p-4">
                <a href="rejectappointment.php"><h2 class="mb-3 font-weight-medium">Rejected Appointment</h2></a>
              </div>
            </div>
          </div>
          <!-- Row -->
        </div>
      </div>
      <!-- column  -->
    </div>
  </div>
<?php include "footer.php" ?>
