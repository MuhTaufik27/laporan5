<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h3 style="text-align: center;">website</h3>
    </header>
    <div class="container" style="height: 78vh;">
        <section class="login-box">
            <h2>Login Aplikasi</h2>
            <form method="post" action="ceklogin.php">
                <input type="text" placeholder="username" name="username"
                    id="username">
                <input type="password" placeholder="password" name="password"
                    id="password">
                    <br><br>
        <label>
            <input style="position:absolute; left:-55px; margin-top:3px" type="checkbox" name="remember"> Remember Me
        </label>
        <br><br>
                    <input type="submit" value="Login">
            </form>
            
        </section>
    </div>
    <footer>
        Copyright &copy; 2024
    </footer>
</body>

</html>