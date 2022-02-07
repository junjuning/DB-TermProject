<?php
$conn = mysqli_connect("127.0.0.1:3306", "root", "111111", "esql");
session_start();
?>

<!doctype html>
<html>
  <head>
    <style>
    #log{color:red;text-align:right;margin:0px 50px 0px 0px}
    h1{background-color:#FEBFCB;padding:20px}
    a{text-decoration: none;color:black}
    div{margin: 10px 50px 20px 50px;border:2px solid #FEBFCB;padding:20px;width:1000px}
    h4{margin: 0px 50px 0px 0px}
    h2.con{margin: 10px 20px 30px 50px;}
    #reveiwbox{border:1px dashed #FEBFCB }
    table{margin: 10px 20px 30px 50px;border:1px solid #C7C3BD;
      border-collapse: collapse;width:1040px;padding:20px;}
      #content{position:absolute; top:150px;right:50px;background-color:#C7C3BD; padding-right:10px;padding-left:10px;}
    </style>
    <meta charset="utf-8">
    <title>drama</title>
  </head>
  <body>

    <h1 align=center><a href="index.php">드라마 리뷰 사이트</a></h1>
    <h4 align="right" ><?=$_SESSION['userid']?>님이 활동중입니다.</h4>
    <a href="logout.php" align="right"><p id="log">로그아웃</p></a>
    <h2 class="con">Drama</h2>
    <h2 id="content" class="con"><a href="index.php">"Move To review"</a></h2>

    <table border="1">
      <tr>
        <td>id</td><td>name</td><td>story</td><td>writer name</td></tr>
        <?php
          $sql="SELECT * FROM drama LEFT JOIN author ON drama.w_id=author.id";
          $result=mysqli_query($conn, $sql);

          while($row=mysqli_fetch_array($result)){

          ?>
            <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['dname']?></td>
            <td><?=$row['story']?></td>
            <td><?=$row['wname']?></td>
          </tr>
            <?php
          }
        ?>
        </table>
    <?php
    $escaped=array(
      'dname'=>'',
      'story'=>'',
      'wname'=>''
    );

    $label_submit='Create drama';
    $form_action='drama_create_process.php';

    $sql="SELECT * FROM author";
    $result=mysqli_query($conn, $sql);
    $select_form='<select name="w_id">';

    while($row = mysqli_fetch_array($result)){
      $select_form.='<option value="'.$row['id'].'">'.$row['wname'].'</option>';
    }
    $select_form.='</select>';

?>



     <div>
       <h2>드라마 추가</h2>
       <hr/>
    <form action="<?=$form_action?>" method="post">

      <p><h4>드라마 제목</h4><input type="text" name="dname" placeholder="name" value=<?=$escaped['dname']?>></p>
      <p><h4>드라마 줄거리</h4><textarea name="story" placeholder="story"><?=$escaped['story']?></textarea></p>

      <p><h4>작가</h4><?=$select_form?></p>
      <p><input type="submit" value="<?=$label_submit?>"></p>
    </form>

  </div>
  </body>
</html>
