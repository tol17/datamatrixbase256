<?php

    if (!empty($_GET["datamatrix"])){
        $img = $_GET["datamatrix"];
    }
    else {
        $img = "d2.png";
    }
    

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/site.css" />
    <title>Форма почтового отправления</title>

</head>


<body>
    
    <div class="postcontainer">
        <img src="img/postform.jpg">
        <div class="datamatrix">
            <img src="<?=$img?>">
        </div>
        <div>
            <br>
           <a href="index.php" class="btn btn-primary noprint">Новый бланк</a> 
        </div>
    </div>
          
</body>
</html>


