<?php
$conn = mysqli_connect("127.0.0.1:3306", "root", "111111", "esql");

settype($_POST['id'], 'integer');
$sql="
  UPDATE board
  SET
    title='{$_POST['title']}',
    description='{$_POST['description']}',
    drama_id='{$_POST['drama_id']}'
  WHERE
    id={$_POST['id']}
";



$result=mysqli_query($conn, $sql);

if($result===false){
  echo '저장하는 과정에서 문제 발생';
  echo error_log(mysqli_error($conn));
}
else{
  echo '작성 완료 <a href="index.php">홈으로</a>';
}
?>
