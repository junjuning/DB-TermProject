<?php
$conn = mysqli_connect("127.0.0.1:3306", "root", "111111", "esql");

session_start();

//목록

//글 보이기
$article=array(
  'title'=>'welcome',
  'description'=>'Hellow, web'
);

$update_link='';

$sql="SELECT * FROM drama";
$result=mysqli_query($conn, $sql);
$select_form='<select name="drama_id">';

while($row = mysqli_fetch_array($result)){
  $select_form.='<option value="'.$row['id'].'">'.$row['dname'].'</option>';
}
$select_form.='</select>';


if(isset($_GET['id']) ){ //id가 없는 경우 에러나지않게하기위해

    $sql = "SELECT * FROM board WHERE id={$_GET['id']}";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    $article['title']=$row['title'];
    $article['description']=$row['description'];

    $update_link='<a href="update.php?id='.$_GET['id'].'">update</a>'; //id값이 있을때만 update표시

}



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
    <title>review</title>
  </head>
  <body>
    <h1><a href="index.php">드라마 리뷰 사이트</a></h1>
    <h4 align="right" ><?=$_SESSION['userid']?>님이 활동중입니다.</h4>
    <a href="logout.php" align="right"><p id="log">로그아웃</p></a>
    <div>
    <h2>리뷰 수정</h2>
    <p id=reveiwbox>
    <form action="update_process.php" method="POST">
      <input type="hidden" name="id" value="<?=$_GET['id']?>">
      <p><h4>제목</h4><input type="text" name="title" placeholder="title" value="<?=$article['title']?>"></p>
      <p><h4>내용</h4><textarea name="description" placeholder="description"><?=$article['description']?></textarea></p>
      <p><h4>드라마</h4><?=$select_form?></p>
      <p><input type="submit"></p>
    </form>
  </p>
</div>
  </body>
</html>
