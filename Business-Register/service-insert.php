 <?php 
include 'Conx.php';
error_reporting(0);
$id = str_replace(" ", "+", $_GET['id']);
$error = $_GET['error'];
$key = "ThisIsASecretKey";
function decryptData($ciphertext, $key) {
    $cipher = "aes-256-cbc";
    $ciphertext = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($ciphertext, 0, $ivlen);
    $ciphertext = substr($ciphertext, $ivlen);
    return openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
}$decryptedData = decryptData($id, $key);
$logs = $_GET['logs'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title>Service</title>
	<style>
* {
   box-sizing: border-box;
}
.column {
  float: left;
  width: 50%;
  padding: 30px;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
body{
	background-color: white;
}
.wrapper{
	display: flex;
	flex-flow: row wrap;
	text-align: center;
}
.wrapper>*{
	padding: 10px;
	flex: 1 100%;
}
.header{
	height: 70px;
	overflow: hidden;
	display: flex;
	align-items: center;
	background-color: #0020C2; 
	color: white;
}
.main{
	display: flex;
	justify-content: center;
	align-items: center;
	text-align: left;
	font-size: 24px;
	padding: 0px;
}
.aside1{
	background-color: lightgray;
}
@media all and (min-width: 800px){
	.main{
		flex: 4;
	}

	.aside1{
		order: 1;
	}

	.main{
		order: 3;
	}
}
@media all and (min-width: 600px){
	.aside{
		flex: 1;
	}
}

.header h1{
	font-size: 40px;
	font-weight: bold;
	font-family: italic	;
}
.header h1{
	text-align: left;
	font-family: "Rakkas", serif;
  	font-weight: 400;
  	font-style: normal;
  	text-shadow: 5px 5px 5px black;  
}
header h1:hover{
	letter-spacing: 20px;
	font-weight: bold;
	color: black;
	text-shadow: 5px 5px 5px white;
	word-spacing: 10px;
	text-transform: uppercase;
}
.home a{
	display: flex;
	align-items: center;
	justify-content: center;
	border-radius: 5px;
	border: 2px solid black;
	width: 120px;
	height: 30px;
	color: white;
	font-weight: bold;
	font-family: italic;
	border: transparent;
	background-color: #0020C2;
	transition: all 0s ease;
	box-shadow: 1px 1px 1px 1px white;
}
.home a:hover{
	background-color: #FF5F1F;
}
.mels{
	height: 100vh;
	background-color: white;
	width: 100%;
	text-align: center;
	margin: 0px;
	padding-bottom: 0px;
}
.hidden {
    display: none;
}
.mels td{
	background-color: white;
	border: 1px solid black;
	font-weight: bold;
	font-family: italic;
	font-size: 18px;
	width: 500px;
	font-weight: bold;
	font-family: italic;
	font-size: 18px;
}
.des{
	width: 100px;
	word-break: break-all;
	padding: 0px;
}
.mels th{
	background-color: white;
}
.mels h1{
	background-color: white;
	margin-bottom: 0px;
	font-family: italic;
}
.sed{
	padding: 0px;
}
.esd{
	word-break: break-all;
}
.kk{
	width: 100%;
	padding-bottom: 12px;
	padding: 5px;
	background: hsla(27, 73%, 51%, 1);
  background: linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
  background: -moz-linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
  background: -webkit-linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
  filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#DD7A28", endColorstr="#081CFF", GradientType=1 );
}
.kk:hover{
	background: hsla(235, 100%, 52%, 1);
  background: linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
  background: -moz-linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
  background: -webkit-linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
  filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#081CFF", endColorstr="#DD7A28", GradientType=1 );
}
.obtn{
	width: 300px;
	font-weight: bold;
	font-family: italic;
	font-size: 22px;
	background-color: #FF5F1F;
	color: white;
	border: transparent;
	border-radius: 5px;
}
.obtn:hover{
	background-color: #0020C2;
	border: 1px solid black;
	box-shadow: 3px 3px white;
	border-radius: 9px;
}
.ak h1{
	margin-top: 5%;
	color: white;
	font-weight: bold;
	font-family: italic;
	font-size: 33px;
}
.ak p{
	color: white;
	font-family: italic;
	font-weight: bold;
	font-size: 12px;
}
.ot label{
	color: white;
	font-family: italic;
	 font-weight: bold;
}
.ot input{
	border-radius: 4px;
	border: 1px solid black;
	box-shadow: -4px 2px 2px 2px black;
	outline: 0;
}
.yt{
	width: 70%;
	border-radius: 4px;
	border: 1px solid black;
	box-shadow: -4px 2px 2px 2px black;
	outline: 0;
}
.ll{
	font-family: italic;
	 font-weight: bold;
}
input{
	border-radius: 4px;
	border: 1px solid black;
	box-shadow: -4px 2px 2px 2px black;
	outline: 0;
}
.buttton{
	width: 70%;
	font-family: italic;
	font-weight: bold;
	border: transparent;
	background-color: #0020C2;
	box-shadow: none;
	color: white;
	border: 1px solid black;
	box-shadow: 3px 3px white;
	border-radius: 5px;
}
.buttton:hover{
	background-color: #FF5F1F;
	border: 1px solid black;
	box-shadow: 3px 3px white;
}



</style>
</head>
<body>
		<div class ="wrapper">


		<header class="header">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<h1>Palaba Hub</h1>
					</div>
					<div class="col-4" style="text-align: right; display: flex; justify-content: right; align-items: center;">
						<div class="home">
							<a href="../Login/login.php" class="btn btn1">BACK</a>
						</div>
					</div>
				</div>
			</div>
		</header>




		<article class="main" style="background-color: white;">
		<div class="kk">
			<div class="mels">
					<h1>Services</h1>
					<div style="display: flex; justify-content: center;">
						<?php
								$sql = "SELECT busis_tb.ServID, busis_tb.Descr, busis_tb.Price, serv_tb.ServID ,serv_tb.ServNam FROM busis_tb, serv_tb WHERE BusID = '$decryptedData' AND busis_tb.ServID = serv_tb.ServID";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
									echo "<table style = 'border: 1px solid black; height: 200px; margin-bottom: 20px; width:'>
									<tr>
									<th>Service Name</th>
									<th>Description</th>
									<th>Price</th>
									</tr>";
								while($row = $result->fetch_assoc()) {
									echo "<tr>";
									echo "<td class = 'esd'> ".$row["ServNam"]."</td>";
									echo "<td class = 'des'>".$row["Descr"]."</td>";
									echo "<td class = 'sed'>".$row["Price"]."</td>";
									echo "</tr>";
								}
							} else {
							}
					echo "</table>";
					
					?>
					</div>
					<a href="password.php?id=<?php echo $id;?>"><button class="obtn">Finish</button></a><br><br>
			</div>
		</div>
		</article>




		<aside class="aside aside1" style="background-color:#0020C2;">
			<div class="ak">
				<h1>Add Service</h1>
				<p>What you offer to your Customer?</p>
				<form action="process.php?id=<?php echo $id;?>" method="post">
					<select class = "yt" id="dropdown" name="service" >
			  	<option value="select">Select Service</option>
				  <?php 
				  $serv = "SELECT * FROM serv_tb";
				  $res = $conn->query($serv);
				  if ($res->num_rows > 0) {
				  	while($row = $res->fetch_assoc()) {
				  		echo "<option value=".$row['ServID'].">".$row['ServNam']."</option>";
				  	}
				  } else {
							}
				  ?>
			  	<option class = "otp" value="others">Others</option>
					</select>

					<div class = "ot" id="otherInput" class="hidden">
					  <label  for="otherValue">Others:</label><br>
					  <input type="text" id="otherValue" name="otherValue">
					</div>
					<div id="description" class="hidden">
					  <label class="ll" for="otherValue">Add Description</label><br>
					  <input type="text" id="desc" name="desc"><br>
					  <label class="ll" for="otherValue">Price</label><br>
					  <input type="number" id="desc" name="pric"><br><br>
					  <input class="buttton" type="submit" value="Insert">
					</div>
					<p id="logs" style="margin-top: 10px; color: red;"><?php echo $logs.$error;?></p>
				</form>
			</div>


		</aside>

				
	</div>




<script>
  const dropdown = document.getElementById('dropdown');
  const logs = document.getElementById('logs');
  const otherInput = document.getElementById('otherInput');
  const description = document.getElementById('description');

  dropdown.addEventListener('change', function() {
    if (dropdown.value === 'others') {
      otherInput.classList.remove('hidden');
    } else {
      otherInput.classList.add('hidden');
    }
    if (dropdown.value === 'select') {
      description.classList.add('hidden');
    } else {
      description.classList.remove('hidden');
    }
  });
  	dropdown.addEventListener('click', function() {
    // Hide the div when clicked
    logs.style.display = 'none';
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>