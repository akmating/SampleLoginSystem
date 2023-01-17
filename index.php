<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<header>
    <nav class="nav-bar">
        <div class="nav-bar">
            <h4 class="samp-header">THIS IS A SAMPLE LOGIN SYSTEM</h4>
            <ul >
                <?php
                    if(isset($_SESSION["userId"])){

                ?>
                <button class='nav-button'><a href="#"><?php echo strtoupper($_SESSION["userId"]);?></a></button>
                <button class='nav-button'><a href="includes/logout.inc.php" class="nav-login">LOGOUT</a></button>
                <?php
                    }
                    else
                    {
                ?>  
                    <button class='nav-button'>GUEST</buttn>
                <?php    
                }
                ?>
            </ul>
        </div>
    </nav>

</header>
<?php
    if(!isset($_SESSION["userId"])){

?>
<div class="container">
    <div class="signup">
        <h4>SIGNUP</h4>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="userId" placeholder="Username">
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <input type="password" name="retypePassword" placeholder="Retype Password">
                <br>
                <input type="text" name="email" placeholder="Email">
                <br>
                <button type="submit" name="submit">LOGIN</button>

            </form>
        </div>
        <div class="login">
        <h4>LOGIN</h4>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="userId" placeholder="Username">
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <button type="submit" name="submit">LOGIN</button>

        </form>
    </div>
</div>
<?php
    }
    else
    {
    ?> 
<div class="joke">
    <div id ="jokeTest">
        <p id="joke"></p>
    </div>
    <div class="jokeBtn">
    <button id="btnJoke">Click to change</button>
    </div>
</div>
<?php    
    }
?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src = "app.js"></script>
</body>
</html>