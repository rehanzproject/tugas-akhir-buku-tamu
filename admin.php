<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Admin</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="login.php" method="post">
        <h3>Login Here</h3>
        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="username">
        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password">
        <button type="submit" id="submit">Log In</button>
    </form>
</body>
</html>
