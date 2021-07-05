<html>
	<head>
		<title>Add Restaurent</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
}
</style>
</head>
<body>
<div class="sidenav" style="margin-top:95.5px;">
	 <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
          <div class="sidebar-header">
            <div class="user-pic">
              <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                alt="User picture">
            </div>
            <div class="user-info">
              <span class="user-name">Pooja Khushi
                <strong>DJ</strong>
              </span>
              <span class="user-role">Administrator</span>
              <span class="user-status">
                <i class="fa fa-circle"></i>
                <span>Online</span>
              </span>
            </div>
          </div>
          <div class="sidebar-menu">
            <ul>
            
              <li class="header-menu">
                <span>DOCTOR</span>
              </li>
              <li>
                <a href="#">
                  <span>Add</span>
                </a>
              </li>
              <li>
                <a href="admindoctorupdel.php">
                  <span>Update/Delete</span>
                </a>
              </li>
               
              <li class="header-menu">
                <span>PATIENT</span>
              </li>
               <li>
                <a href="#">
                  <span>Add</span>
                </a>
              </li>
              <li>
                <a href="adminpatientupdel.php">
                  <span>Update/Delete</span>
                </a>
              </li>

               <li class="header-menu">
                <span>Appointment</span>
              </li>
               <li>
                <a href="Doctorappointment.php">
                  <span>Doctor Appointment</span>
                </a>
              </li>
              <li>
                <a href="patientappointment.php">
                  <span>Patient Appointment</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</div>
</body>
</html> 