<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  
  <script>
	//接收用户的输入成绩
	var score = parseInt(prompt('please enter your score!'));
	if (score < 0 || score > 100 || isNaN(score))
	{
	  alert('分数必须在0-100之间,请重新输入!');
	  location = "01.php";
	}
	else {
	  if (score >= 80 && score <= 100)
	  {
		alert('优秀');
	  }
	  else if (score >= 70)
	  {
		alert('良好');
	  }
	  else if (score >= 60)
	  {
		alert('及格');
	  }
	  else
      {
		alert('不及格');
	  }
	}
  </script>
</head>
<body>

</body>
</html>
