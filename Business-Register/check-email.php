<?php 
error_reporting(0);
$mail = $_GET['email'];
$id = str_replace(" ", "+", $_GET['id']);
$logs = $_GET['code'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<title>Six Digit Input Box</title>
<style>
.input-box {
  display: flex;
  justify-content: space-between;
  width: 300px;
  margin: 50px auto;
}
.input-box input {
  width: 40px;
  height: 40px;
  text-align: center;
  font-size: 24px;
  border: 2px solid #ccc;
  border-radius: 5px;
  outline: none;
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
  text-align: left;
  height: 530px;
  font-size: 24px;
}
.header h1{
  font-size: 40px;
  font-weight: bold;
  font-family: italic ;
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
.column{
  margin-top: 4%;
  border: 2px solid black;
  text-align: center;
  height: 420px;
  padding: 20px;
  background-color: white;
  border-radius: 9px;
}
.opa{
  margin-top: 2%;
  border: 2px solid black;
  width: 400px;
  padding: 10px;
  padding-bottom: 4%;
  background: hsla(27, 73%, 51%, 1);
    background: linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    background: -moz-linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    background: -webkit-linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#DD7A28", endColorstr="#081CFF", GradientType=1 )
}
.opa:hover{
  background: hsla(235, 100%, 52%, 1);
    background: linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    background: -moz-linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    background: -webkit-linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#081CFF", endColorstr="#DD7A28", GradientType=1 );
}
.titlee{
  font-weight: bold;
  font-family: italic;
  font-size: 33px;
}
.ito{
  box-shadow: inset -3px 3px 3px 3px black;\
  outline: 0;
  border: transparent;
  font-weight: bold;
}
.wr{
  font-weight: bold;
  font-size: 22px;
  font-family: italic;
  color: red;
}
p{
  font-weight: bold;
  font-size: 18px;
  font-family: italic;
}
.ibtn{
  font-weight: bold;
  font-size: 18px;
  font-family: italic;
  background-color: #FF5F1F;
  border: transparent;
  color: white;
  border-radius: 9px;
  width: 50%;
  box-shadow: 3px 3px black;
}
.ibtn:hover{
  background-color: #0020C2;
}
a{
  font-weight: bold;
  font-family: italic;
  font-size: 18px;
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
              <a href="http://localhost/PalabaHub/Login/login.php" class="btn btn1">BACK</a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <article class="main" style="background-color: white; display: flex; justify-content: center;">
          <div class="opa">
            <div class="column">
                <h1 class="titlee">Verification Code</h1>
                <form id="myForm" action="verify.php?email=<?php echo $mail; ?>&id=<?php echo $id; ?>" method="post">
                    <div class="input-box">
                      <input class = "ito" type="text" name="num1" maxlength="1" pattern="\d" inputmode="numeric" oninput="moveToNext(this, 1)" onkeydown="moveBack(this, 1)" onkeypress="return isNumberKey(event)" onpaste="handlePaste(event)">
                      <input class = "ito" type="text" name="num2" maxlength="1" pattern="\d" inputmode="numeric" oninput="moveToNext(this, 2)" onkeydown="moveBack(this, 2)" onkeypress="return isNumberKey(event)">
                      <input class = "ito" type="text" name="num3" maxlength="1" pattern="\d" inputmode="numeric" oninput="moveToNext(this, 3)" onkeydown="moveBack(this, 3)" onkeypress="return isNumberKey(event)">
                      <input class = "ito" type="text" name="num4" maxlength="1" pattern="\d" inputmode="numeric" oninput="moveToNext(this, 4)" onkeydown="moveBack(this, 4)" onkeypress="return isNumberKey(event)">
                      <input class = "ito" type="text" name="num5" maxlength="1" pattern="\d" inputmode="numeric" oninput="moveToNext(this, 5)" onkeydown="moveBack(this, 5)" onkeypress="return isNumberKey(event)">
                      <input class = "ito" type="text" name="num6" maxlength="1" pattern="\d" inputmode="numeric" oninput="moveToNext(this, 6)" onkeydown="moveBack(this, 6)" onkeypress="return isNumberKey(event)">
                    </div>
                    <div class = "wr" style="text-align: center;"><?php echo $logs;?></div>
                    <button type="submit" id="submitButton" style="display: none;">Submit</button> <!-- Hidden submit button -->
                </form>
                <p>Hey, <?php echo $mail;?> </p>
                <a href="register.php"><button class = "ibtn">Not my Email</button></a>
                <p>Didn't get any Email? <a href="again.php?email=<?php echo $mail;?>&id=<?php echo $id;?>" id="myLink" onclick="startCountdown()">Send Again</a></p>
                <div id="countdown"></div>
            </div>
          </div>
    </article>
  </div>
<script>
function moveToNext(input, nextIndex) {
  if (input.value.length == 1) {
    if (nextIndex <= 6) {
      var nextInput = input.parentElement.querySelector('input:nth-child(' + (nextIndex + 1) + ')');
      if (nextInput) {
        nextInput.focus();
      }
    }
  }
  checkFormCompletion(); // Check form completion after each input
}

function moveBack(input, prevIndex) {
  if (input.value.length == 0 && event.keyCode == 8) {
    if (prevIndex > 1) {
      var prevInput = input.parentElement.querySelector('input:nth-child(' + (prevIndex - 1) + ')');
      if (prevInput) {
        prevInput.focus();
      }
    }
  }
}

function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}

function handlePaste(evt) {
  var clipboardData, pastedData;
  evt.stopPropagation();
  evt.preventDefault();
  clipboardData = evt.clipboardData || window.clipboardData;
  pastedData = clipboardData.getData('Text');
  if (!/^\d*$/.test(pastedData)) {
    return false;
  }
  var inputs = evt.target.parentElement.querySelectorAll('input');
  var currentIndex = Array.from(inputs).indexOf(evt.target);
  for (var i = 0; i < pastedData.length; i++) {
    var index = currentIndex + i;
    if (index < inputs.length) {
      inputs[index].value = pastedData[i];
      moveToNext(inputs[index], index + 1);
    }
  }
  checkFormCompletion(); // Check form completion after pasting
}

// Function to check if all input fields are filled
function checkFormCompletion() {
  var inputs = document.querySelectorAll('.input-box input');
  var allFilled = true;
  inputs.forEach(function(input) {
    if (input.value.length !== 1) {
      allFilled = false;
    }
  });
  if (allFilled) {
    document.getElementById('submitButton').click(); // Auto-submit the form
  }
}

// Function to show link and hide countdown
function showLink() {
  document.getElementById("myLink").style.display = "inline";
  document.getElementById("countdown").style.display = "none";
}

// Countdown function
function startCountdown() {
  document.getElementById("myLink").style.display = "none";
  var seconds = 50;
  var countdownElement = document.getElementById("countdown");
  countdownElement.innerHTML = "Sent it again in " + seconds + " seconds";

  var countdownInterval = setInterval(function() {
    seconds--;
    countdownElement.innerHTML = "Sent it again in " + seconds + " seconds";
    if (seconds <= 0) {
      clearInterval(countdownInterval);
      showLink(); // Show the link after countdown ends
    }
  }, 1000); // Update every second
}

// Start countdown when page is loaded
window.onload = startCountdown;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>