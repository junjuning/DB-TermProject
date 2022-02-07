<?php


$conn = mysqli_connect("127.0.0.1:3306", "root", "111111", "esql");

session_start();
//목록


$sql="SELECT * FROM drama";
$result=mysqli_query($conn, $sql);
$select_form='<select name="drama_id">';

while($row = mysqli_fetch_array($result)){
  $select_form.='<option value="'.$row['id'].'">'.$row['dname'].'</option>';
}
$select_form.='</select>';

?>



<!doctype html>
<html>
  <head>
    <style>
    #log{color:red;text-align:right;margin:0px 50px 0px 0px}
    h1{text-align: center;background-color:#FEBFCB;padding:20px}
    a{text-decoration: none;color:black}
    h4{margin: 0px 50px 0px 0px}
    div{margin: 10px 50px 30px 50px;border:2px solid #FEBFCB;padding:40px;width:1000px}
    #reveiwbox{border:1px dashed #FEBFCB }
    </style>
    <meta charset="utf-8">
    <title>web</title>
  </head>
  <body>
    <h1><a href="index.php">드라마 리뷰 사이트</a></h1>
    <h4 align="right" ><?=$_SESSION['userid']?>님이 활동중입니다.</h4>
    <a href="logout.php" align="right"><p id="log">로그아웃</p></a>

    <div>
    <h2>리뷰작성</h2>
    <p id=reveiwbox>
    <form action="create_process.php" method="POST">
      <p><h4>제목</h4><input type="text" name="title" placeholder="title"></p>
      <p><h4>내용</h4><textarea name="description" placeholder="description"></textarea></p>
      <p><h4>드라마</h4><?=$select_form?></p>
      <p><input type="submit"></p>
    </form>
  </p>
</div>
  </body>
</html>
