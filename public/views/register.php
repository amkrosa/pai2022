<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/css/landing_page.css">
    <link rel="stylesheet" type="text/css" href="/public/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <link rel="stylesheet" type="text/css" href="/public/css/register.css">
    <script src="https://kit.fontawesome.com/1437dfc48d.js" crossorigin="anonymous"></script>
    <title>mindhabit - Landing page</title>
</head>
<body>
<div class="navbar-container">
    <?php include "logo.php";?>
</div>
<div class="main-container">
    <div class="center-container">
        <div class="login-paper-container">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <form action="/register" method="POST">
                <div class="login-input-container">
                    <div class="login-input-wrapper">
                        <div class="login-input-label">Username</div>
                        <div class="login-input-icon"><i class="fa-solid fa-user"></i></div>
                        <input name="login" placeholder="Login..."/>
                    </div>
                </div>
                <div class="login-input-container">
                    <div class="login-input-wrapper">
                        <div class="login-input-label">Password</div>
                        <div class="login-input-icon"><i class="fa-solid fa-key"></i></div>
                        <input name="password" type="password" placeholder="Password..."/>
                    </div>
                </div>
                <div class="login-input-container">
                    <div class="login-input-wrapper">
                        <div class="login-input-label">Notifications</div>
                        <div class="login-input-icon"><i class="fa-solid fa-at"></i></div>
                        <input name="notification_email" type="email" placeholder="Notification email..."/>
                    </div>
                </div>
                <button type="submit" class="button-fill-primary">Register</button>
            </form>
        </div>
    </div>
</div>
<script type="module" src="/public/js/register.js"></script>
</body>
</html>