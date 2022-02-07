
<!doctype html>
<html>
  <head>
    <style>
    #log{color:red;text-align:right;margin:0px 50px 0px 0px}
    h1{background-color:#FEBFCB;padding:20px}
    div{margin: 10px 500px 30px 50px;border:2px solid #C7C3BD;padding:40px;width:800;}
    a{text-decoration: none;color:black}

    #but{background-color:#FBD9E0; padding-right:10px;padding-left:10px;padding-top:3px;padding-bottom:3px}
    </style>
    <meta charset="utf-8">
    <title>로그인</title>
  </head>
  <body>
    <h1 align=center >드라마 리뷰 사이트</h1>
    <div>
    <form action="login_process.php" method="post">
      <h2>login</h2>
      <hr/>
      <h4>id</h4>
      <input type="text" name="userid" class="input" placeholder="id">

      <h4>password</h4>
      <input type="password" name="userpassword" placehorder="password">
    <br/></br/>
    <input type="submit" class="submit" value="로그인">
  <br/><br/><br/>
      <a href="signup.php" id="but">회원가입</a>


    </div>
  </body>
</html>
