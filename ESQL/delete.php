<?php
$conn = mysqli_connect("127.0.0.1:3306", "root", "111111", "esql");

settype($_POST['id'], 'integer');
$sql="
  DELETE
    FROM board
    WHERE id={$_POST['id']}
";

$result=mysqli_query($conn, $sql);

if($result===false){
  echo '삭제하는 과정에서 문제 발생';
  echo error_log(mysqli_error($conn));
}
else{
  echo '삭제완료 <a href="index.php">홈으로</a>';
}
?>
