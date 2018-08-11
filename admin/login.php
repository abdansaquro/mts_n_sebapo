<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>

      <link rel="stylesheet" href="css/style_login.css">

  
</head>

<body>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<!-- Form Module-->
<div class="module form-module">
  <div>
  </div>
  <div class="form">
    <h2 style="font-size:35px;">Login</h2>
    <form action="proses_login.php" method="post">
	  <input type="text" name="username" id="username" placeholder="Username"/>
      <input type="password" name="password" id="password" placeholder="Password"/>
      <button type="submit">Login</button>
    </form>
  </div>
</div>
  <script src='js/jquery.min.js'></script>

    <script  src="js/index_login.js"></script>

</body>
</html>
