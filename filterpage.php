<?php 
	require "config.php";
?>
<html lang="en">
<head>
  <title>Dr.Do</title>
  <meta charset="utf-8">
  <link href="style1.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery-3.6.0.min.js"></script>

</head>
<body>
	<div class="row" id="result">
		<div class="col-lg-3">
			<h3 id="textChange">all brands</h3>
		<hr>
			<h6 class="text-info">Select Brand</h6>
			<ul class="list-group">
				<?php
				$sql="select distinct brand from products order by brand";
				$result=mysqli_query($link,$sql);
				if(mysqli_affected_rows($link)>=0){
				$i=0;
				while($row=mysqli_fetch_assoc($result))
			{
				?>
				<li class="list-group-item">
					<div class="form-check">
						<label class="form-check-label">
						<input type="checkbox" class="form-check-input product_check" 
						value="<?php $row["brand"] ?>" id="brand"><?php echo $row['brand'];?>
						</label>
					</div>
				</li>
				<?php 
					$i++;
				}
				}?>
				<br>
			</ul>
		</div>
		
		<div class="col-lg-9">
			<?php 	
			$qry="select * from products";
			$result=mysqli_query($link,$qry);
			if(mysqli_affected_rows($link)>0)
			{
			$i=0;
			while($row=mysqli_fetch_assoc($result))
			{
			echo $row["id"];
			echo $row["brand"];
			echo "<br>";
			$i++;
			}

			}
			else
			{
				echo"no data found";
			}
			mysqli_close($link);
			?>
			
		</div>
	</div>
<script type="text/javascript">

$(document).ready(function(){
	$(".product_check").click(function(){
		var action='data';
		var brand=get_filter_text('brand');
		$.ajax({
			url:'action.php',
			method:'POST',
			data:{action:action, brand:brand},
			success:function(response){
				 $("#result").html(response);
				 $("#loader").hide();
				 $("#textChange").text("Filtered Brands");
			}
		})
	});
	function get_filter_text(text_id){
		var filterData = [];
		$('#'+text_id+':checked').each(function()
		{
			filterData.push($(this).val());
		}
		);
		return filterData
	}
});

</script>

</body>
</html>