<?php
error_reporting(0);
$id = str_replace(" ", "+", $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<title>Password Checker</title>
<style>
#checklist li:not(.completed) {
    color: red;
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
    border-bottom: 2px solid white;
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
.ako{
    border: 2px solid black;
    width: 400px;
    height: 100%;
    padding: 5px;
    border-radius: 20px;
    background: hsla(27, 73%, 51%, 1);
    background: linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    background: -moz-linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    background: -webkit-linear-gradient(90deg, hsla(27, 73%, 51%, 1) 45%, hsla(235, 100%, 52%, 1) 77%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#DD7A28", endColorstr="#081CFF", GradientType=1 );
}
.ako:hover{
    background: hsla(235, 100%, 52%, 1);
    background: linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    background: -moz-linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    background: -webkit-linear-gradient(90deg, hsla(235, 100%, 52%, 1) 45%, hsla(27, 73%, 51%, 1) 77%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#081CFF", endColorstr="#DD7A28", GradientType=1 );
}
.to{
    border-radius: 9px;
    border: 2px solid black;
    text-align: center;
    height: 100%;
    padding: 10px;
    background-color: white;
}
.to h1{
    font-weight: bold;
    font-family: italic;
    font-size: 33px;
    text-align: center;
}
.weh{
    text-align: left;
    font-weight: bold;
    font-family: italic;
    font-size: 18px;
}
label{
    font-family: italic;
    font-weight: bold;
    font-size: 22px;
}
.ito{
    width: 90%;
    font-weight: bold;
    font-family: italic;
    font-size: 18px;
    border-radius: 9px;
    outline: 0;
    border: transparent;
    box-shadow: inset -5px 3px 3px 3px black;
    margin-bottom: 2px;
    padding: 3px;
}
.btni{
    width: 100%;
    border-radius: 9px;
    background-color: #FF5F1F;
    color: white;
    border: transparent;
    font-weight: bold;
    font-family: italic;
}
.btni:hover{
    background-color: #0020C2;
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
        <article class="main" style="background-color: white; display: flex; justify-content:  center;">

            <div class="ako">
                <div class="to">
                    <h1>Create Password</h1>
                    <form id="passwordForm" action="confirm-password.php?id=<?php echo $id;?>" method="post">
                        <label for="password">Password</label><br>
                        <input class = "ito" onchange="dis()" type="password" id="password" name="password" required><br><br>
                        
                        <label for="confirmPassword">Confirm Password</label><br>
                        <input class="ito" type="password" id="confirmPassword" name="confirmPassword" required>
                        <div class="weh">
                            <ul id="checklist">
                                <li id="length">Password must be at least 8 characters</li>
                                <li id="letter">Password must contain at least one letter</li>
                                <li id="number">Password must contain at least one number</li>
                                <li id="match">Passwords must match</li>
                            </ul>
                        </div>
                        
                        <input class="btni" type="submit" value="Create">
                    </form>
                </div>
            </div>

        </article>
    </div>









        <script>
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const checklistItems = document.querySelectorAll('#checklist li');
        const submitButton = document.querySelector('input[type="submit"]');

        var leng = document.getElementById('length');
        var lett = document.getElementById('letter');
        var numb = document.getElementById('number');
        var matc = document.getElementById('match');
        function dis(){
            checklistItems.display = 'inlion';
        }


        const checkPassword = () => {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            let valid = true;

            checklistItems.forEach(item => {
                if (item.id === 'length') {
                    if (password.length >= 8) {
                        leng.style.display = 'none'
                    } else {
                        leng.style.display = 'block';
                        valid = false;
                    }
                } else if (item.id === 'letter') {
                    if (/[a-zA-Z]/.test(password)) {
                        lett.style.display = 'none'
                    } else {
                        lett.style.display = 'block'; 
                        valid = false;
                    }
                } else if (item.id === 'number') {
                    if (/\d/.test(password)) {
                        numb.style.display = 'none'
                    } else {
                        numb.style.display = 'block';
                        valid = false;
                    }
                } else if (item.id === 'match') {
                    if (password === confirmPassword && password.length > 0) {
                        matc.style.display = 'none'
                    } else {
                        matc.style.display = 'block';
                        valid = false;
                    }
                }
            });
            return valid;
        };

        const updateChecklist = () => {
            checkPassword();
        };
         const handleSubmit = (event) => {
        if (!checkPassword()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    };

        passwordInput.addEventListener('input', updateChecklist);
        confirmPasswordInput.addEventListener('input', updateChecklist);
        submitButton.addEventListener('click', handleSubmit);
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
