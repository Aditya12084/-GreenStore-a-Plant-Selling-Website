<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenStore Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Eczar&family=Montserrat:wght@500&family=Space+Grotesk&display=swap" rel="stylesheet">
<link rel="shortcut icon" style="border: radius 10px; overflow:hidden;" href="../logo1.png" type="image/x-icon">
  
</head>
<body class="ad-body">
     <div class="ad-form-cont">
        <form action="uploadAd.php" method="post">
            <img src="../logo1.png" style="width:100px; mix-blend-mode: multiply;  align-self: center;" alt="">
            <h1 style="text-align:center; margin:0px;">Admin login</h1>
                <input type="text" style="outline:none; font-size: 18px; width: 80%; align-self: center; padding:10px 8px 10px 8px; border-radius:5px; border:none;" name="username" required placeholder="Username">
      
                <input type="password" style="outline:none; font-size: 18px; width: 80%; align-self:center; padding:10px 8px 10px 8px; border-radius:5px; border:none;" name="passw" required placeholder="Password" >
            <input type="submit" name="ad-sub" value="Login" id="ad-sub" style="width:30%; cursor:pointer; padding:5px; align-self: center;">
        </form>
     </div>
</body>
</html>