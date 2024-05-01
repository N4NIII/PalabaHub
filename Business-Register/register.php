 <?php 
session_start();
error_reporting(0);
$command = $_SESSION['error'];
switch ($command) {
	case 1:
		$error = "Email is Already Taken";
		break;
	
	default: 
		// code...
		break;
}
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title>Business Register</title>
<style>
*{
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
	text-align: left;
	height: 70px;
	overflow: hidden;
	display: flex;
	align-items: center;
	background-color: #0020C2; 
	color: white;

}
.main{
	
}
.header h1{
	font-size: 40px;
	font-weight: bold;
	font-family: italic	;
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
.maine{
	border: 2px solid black;
	padding: 10px;
	border-radius: 9px;
	background-color: white;
}
.fr{
	border: 2px solid black;
	padding: 5px;
	margin-top: 3%;
	border-radius: 9px;
	background: hsla(27, 73%, 51%, 1);
    background: linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    background: -moz-linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    background: -webkit-linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#DD7A28", endColorstr="#081CFF", GradientType=1 );
}
.fr:hover{
	background: hsla(235, 100%, 52%, 1);
    background: linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    background: -moz-linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    background: -webkit-linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#081CFF", endColorstr="#DD7A28", GradientType=1 );
}
.btni{
	width: 250px;
	background-color: #FF5F1F;
	color: white;
	font-weight: bold;
	font-family: italic;
	font-size: 18px;
	border: transparent;
	border-radius: 9px;
}
.btni:hover{
	background-color: #0020C2;
}
.fname{
	font-weight: bold;
	font-family: italic;
	font-size: 33px;
}
.fnamee{
	font-weight: bold;
	font-family: italic;
	font-size: 33px;
	margin-bottom: 30px;
}
.inp{
	width: 300px;
	border-radius: 5px;
	font-weight: bold;
	font-family: italic;
	padding-left: 10px;
	outline: 0;
	border: transparent;
	border-bottom: 2px solid black;
}
.inp:hover{
	box-shadow: -5px 1px 1px 1px black;
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

				<form name="form1" action="email-sent.php" method="post" class="fr">
					<div class="maine">
						<div class="row">
								<div class="col">
									<h1 class="fname">Basic Information</h1>
									<label for="nam">Business Name</label><br>
									<input class="inp" type="text" id="nam" name="Busnam" placeholder="Name of your Shop / Business"><br><br>
									<div class="row">
										<div class="col">
											<label for="ot">Open Time</label><br>
											<input class="inp" type="Time" id="ot" name="Otime"><br>
										</div>
										<div class="col">
											<label for="ct">Closing Time</label><br>
											<input class="inp" type="Time" id="ct" name="ctime"><br>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col">
											<label for="cnam">Contact Number</label><br>
											<input class="inp" type="text" id="cnam" name="cont" placeholder="0912-345-6789"><br>
										</div>
										<div class="col">
											<label for="mail">Email</label><br>
											<input class="inp" type="text" id="mail" name="email" placeholder= "Email" required><br>
										</div>
									</div><br>
									<p><?php echo $error;?></p>
								</div>

								<div class="col">
									<h1 class="fnamee">Address</h1>
									<input class="inp" type="text" name="prov" placeholder="Province"><br><br>
									<input class="inp" type="text" name="monic" placeholder="Monicipality"><br><br>
									<input class="inp" type="text" name="barangay" placeholder="Barangay"><br><br>
									<input class="inp" type="text" name="zip" placeholder="Zip Code"><br><br><br>
								</div>

						</div>
						<div>
							<input class = "btni" id="tb" type="submit" value="Sign Up" onclick="ValidateEmail(document.form1.email)">
						</div>
					</div>
				</form>

		</article>
	</div>	
<script>
	let eyeicon = document.getElementById("eyeicon");
    let password =  document.getElementById("pass");   
        eyeicon.onclick = function(){
            if(password.type == "password"){
                password.type = "text";
            }else{
                password.type = "password";
                }
    }
	function ValidateEmail(inputText){
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(inputText.value.match(mailformat)){}
               else{
                    swal("Wrong Email","You have entered an invalid email address!");
                    document.form1.email.focus();
                    document.getElementById("tb");     
                    event.preventDefault();         
                    return false;
        			}
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>