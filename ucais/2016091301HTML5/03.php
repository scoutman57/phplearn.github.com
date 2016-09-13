<?php
header("Content-Type:text/html;charset=utf-8");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  
  <style>
	
	* {
	  margin: 0;
	  padding: 0;
	}
  
  </style>

</head>
<body>

</body>

<script>

  localStorage.user = 'tom';
  document.write(localStorage.user);
  if (localStorage.pageCount)
  {
    localStorage.pageCount = parseInt(localStorage.pageCount) + 1;
  }
  else
  {
    localStorage.pageCount = 1;
  }
  
  document.write("visits: " + localStorage.pageCount + 'times.');

</script>

</html>
