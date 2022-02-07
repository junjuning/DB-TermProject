<?php
$conn = mysqli_connect("127.0.0.1:3306", "root", "111111", "esql");
session_start();

//목록
$list='';
$sql = "SELECT * FROM board";
$result = mysqli_query($conn, $sql);

echo mysqli_error($conn);
?>
<table border=0 id=box2>
<thead><tr><th class=box1>작성자</th><th class=box1>제목</th><th class=box1>작성날짜/시간</th></tr>
</thead>
<?php
while($row=mysqli_fetch_array($result)){
  $list= $list."<tr><td class=box1>{$row['user_id']}</td>
  <td class=box1><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></td>
  <td class=box1> {$row['time']}</td></tr>";

}
//글 보이기
$article=array(
  'title'=>'',
  'description'=>'',
  'time'=>''
);

$update_link='';
$delete_link='';
$author='';

if(isset($_GET['id'])){ //id가 없는 경우 에러나지않게하기위해
  $sql = "SELECT * FROM board LEFT JOIN drama ON board.drama_id = drama.id WHERE board.id={$_GET['id']}";
  $result=mysqli_query($conn, $sql);
  $row=mysqli_fetch_array($result);
  echo mysqli_error($conn);
  $article['title']=$row['title'];
  $article['description']=$row['description'];
  $article['dname']=$row['dname'];
  $article['time']=$row['time'];


  if($row['user_id']===$_SESSION['userid']){
  $update_link='<a href="update.php?id='.$_GET['id'].'">리뷰수정</a>'; //id값이 있을때만 update표시
  $delete_link='<form action="delete.php" method="post">

  <input type="hidden" name="id" value="'.$_GET['id'].'">
  <input type="submit" value="리뷰삭제" class="butt">

  </form>
';}
  $author = "리뷰 드라마 : {$article['dname']}";
}
?>

<!doctype html>
<html>
  <head>
    <style>
    #log{color:red;text-align:right;margin:0px 50px 0px 0px}
    h1{background-color:#FEBFCB;padding:20px}
    h3{display:table-cell;vertical-align:middle}
    a{text-decoration: none;color:black}
    #log{color:red;text-align:right;margin:0px 50px 0px 0px}
    h4{margin: 0px 50px 0px 0px}
    #but{background-color:#FBD9E0;margin: 10px 20px 30px 40px; padding-right:10px;padding-left:10px;}
    .butt{display : block;margin : auto;font-size: 16px;border:0px;margin:15px 0px 0px 0px;
      padding: 0;color:black;background:#FBD9E0;}
    #box{border:2px solid #FEBFCB ;margin: 10px 20px 20px 40px; padding:20px;width :800px}
    #box2{text-align:center;border-top: 1px solid #C7C3BD; padding:20px; width :1000px;border-collapse: collapse;margin: 10px 20px 0px 40px;}
    td.text{border: 1px dashed #FEBFCB;padding:30px;}
    th.box1, td.box1{padding: 7px; border-bottom: 1px solid #C7C3BD;}
    div{margin: 10px 20px 20px 40px}
    a:hover {color:#C7C3BD; text-decoration:underline}
    #content{position:absolute; top:130px;right:50px;background-color:#C7C3BD; padding-right:10px;padding-left:10px;}
    </style>

    <meta charset="utf-8">
    <title>drama review</title>
    <h1 align=center ><a href="index.php">드라마 리뷰 사이트</a></h1>
    <h4 align="right"><?=$_SESSION['userid']?>님이 활동중입니다.</h4>
    <a href="logout.php" align="right"><p id="log">로그아웃</p></a>
  </head>
  <body>

    <div>
      <h2>review</h2>
      <h2 id="content"><a href="drama.php">"Move To Drama"</a></h2>
    </div>
    <ol>
      <?=$list?>
    </ol>

    <table border=0 id="but">
      <tr><td><?=$delete_link?></td><td>| <?=$update_link?> |</td>
        <td><a href="create.php" id="but1">리뷰작성</a></td></tr>
</table>
</br>

    <table border=0 id="box">
    <tr><td rowspan="2"><h3><?=$article['title']?></h3></td>
      <td align=right>작성 시간 : <?=$article['time']?></td></tr>
    <tr><td align=right><?=$author?></td></tr>
    <tr><td colspan="2" class=text><?=$article['description']?></td></tr>
</table>

  </body>
</html>
