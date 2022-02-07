<!doctype html>
<html>
  <head>
    <style>
    h1{background-color:#FEBFCB;padding:20px}
    div{margin: 10px 500px 50px 50px;border:2px solid #C7C3BD;padding:40px;}
    a{text-decoration: none;color:black}
    #but{background-color:#FBD9E0; padding-right:10px;padding-left:10px;padding-top:3px;padding-bottom:3px}
    </style>
    </style>
    <meta charset="utf-8">
    <title>회원가입</title>
  </head>
  <body>
    <h1 align=center >드라마 리뷰 사이트</h1>
    <div>
    <form action="signup_process.php" method="post">
      <h2>join</h2>
      <hr/>
      <h4>id</h4>
      <input type="text" name="userid" placeholder="id">
      <h4>password</h4>
      <input type="password" name="userpassword" placeholder="password">
      <h4>name</h4>
      <input type="text" name="username" placeholder="name">
      <br/><br/>
      <input type="submit" class="submit" value="회원가입"><br/><br/><br/>
      <a href="login.php" id="but">로그인</a>


    </div>
  </body>
</html>
