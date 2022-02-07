<?php
$conn = mysqli_connect("127.0.0.1:3306", "root", "111111", "esql");


$sql="
  INSERT INTO drama(dname, story, w_id)
    VALUES(
      '{$_POST['dname']}',
      '{$_POST['story']}',
      '{$_POST['w_id']}'
    )
";
$result=mysqli_query($conn, $sql);

if($result===false){
  echo '저장하는 과정에서 문제 발생';
  echo mysqli_error($conn);
}
else{
  header('Location:drama.php');
}
?>
