<?php
$conn = mysqli_connect("127.0.0.1:3306", "root", "111111", "esql");
session_start();
$sql="
  INSERT INTO board
    (title, description, user_id, time, drama_id)
    VALUES(
      '{$_POST['title']}',
      '{$_POST['description']}',
      '{$_SESSION['userid']}',
      NOW(),
      '{$_POST['drama_id']}'
    )
";
$result=mysqli_query($conn, $sql);

if($result===false){
  echo '저장하는 과정에서 문제 발생';
  echo error_log(mysqli_error($conn));
}
else{
  echo '작성 완료 <a href="index.php">홈으로</a>';
}
echo mysqli_error($conn);
?>
