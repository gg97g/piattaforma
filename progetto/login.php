<html lang='it' dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width" >
  <title> </title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
      <form action="login.php" class="login-form" method="post">
        <h1>Login</h1>
        <div class="txt">
          <input type="text">
          <span data-placeholder="Email"></span>
        </div>

        <div class="txt">
          <input type="password">
          <span data-placeholder="Password"></span>
        </div>
         <div class="txt">
          <input type="event">
          <span data-placeholder="A quale evento hai partecipato?"></span>
      </div>
      <div class="btn">
        <input type="button" onclick="location.href='generatoreqrcode.php'" value="Login"/>
        
      </div>
    </form>
      <script type="text/javascript">
      $(".txt input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txt input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      </script>
      

</body>
</html>
