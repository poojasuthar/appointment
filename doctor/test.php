<?php
echo 'PHP version(): ' . phpversion();

?>
<br>
<h1>The error_log()</h1> function sends an error message to a log, to a file, or to a mail account.

<br>
<br>
<h1>What is a Cookie?</h1><br>
A cookie is often used to identify a user. A cookie is a small file that the server embeds on the user's computer. Each time the same computer requests a page with a browser, it will send the cookie too. <br>With PHP, you can both create and retrieve cookie values.
<br>
<br>
Create Cookies With PHP:-<br>
A cookie is created with the setcookie() function.

<br>
<h1>Session</h1>
A session is a way to store information (in variables) to be used across multiple pages.
<br>
Unlike a cookie, the information is not stored on the users computer.
<br><br>
Session variables that storing user information & used across multiple pages (e.g. username, favorite color, etc). By default, session variables last until the user closes the browser.
<br>
So; Session variables hold information about one single user, and are available to all pages in one application.
<br><br>
Insert number of input to generate date and time slots for selection(max:-05): </br>
<input type="text"onchange="renderInputs(this)" />
<input type="button"  value="submit">
<div id="parent">
Generated inputs:

</div>

<form method="get">
<script>
function renderInputs(el){
  var n = el.value && parseInt(el.value, 10);
  if(isNaN(n)){
    return;
  }
  
  var input;
  var parent = document.getElementById("parent");
  
  cleanDiv(parent);
  if(n<=5){
  for(var i=0; i<n; i++){
    input = document.createElement('input');
    input.setAttribute('type', 'datetime-local');

    parent.appendChild(input);
  }}
}

function cleanDiv(div){
  div.innerHTML = '';
}
</script>

<input type="submit" name="b1" value="save slot">
</form>
<?php
if(isset($_GET["b1"]))
{
	
$dob= date('Y-m-d',strtotime($_POST['datetime-local']));

echo $qry="insert into scheduleappointment(datetime-local) values ('$dob')";
	mysqli_query($con,$qry);
	
	mysqli_close($con);
}
?>