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
    
    div{
      height: 500px;
    }
    
    #container{
      display: flex;
    }
    
    #divleft{
      background: tomato;
      flex: 1;
      /*width: 300px;*/
    }
    
    #divcenter{
      background: aqua;
      flex: 3;
    }
    
    #divright{
      background: gold;
      flex: 2;
    }
    
    
  
  </style>

</head>
<body>

<div id="container">
  <div id="divleft"></div>
  <div id="divcenter"></div>
  <div id="divright"></div>
</div>

</body>

<script>


</script>

</html>
