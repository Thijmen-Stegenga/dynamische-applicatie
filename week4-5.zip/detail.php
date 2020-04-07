<?php
    include('dbconnect.php');
    $query = $conn->prepare("SELECT * FROM characters WHERE id = :id");
    $query->execute([':id' => $_GET['id']]);
    $result10 = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Character - <?php echo $result10 ['name']?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="vormgeving/resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header><h1><?php echo $result10 ['name']?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>
<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="vormgeving/resources/images/<?php echo $result10 ['avatar']?>">
            <div class="stats" style="background-color: <?php echo $result10 ['color']?>">
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fas fa-heart"></i></span><?php echo $result10 ['health']?></li>
                  <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span><?php echo $result10 ['attack']?></li>
                  <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span><?php echo $result10 ['defense']?></li>
                </ul>
                <ul class="gear">
                    <li><b>Weapon</b>: <?php echo $result10 ['weapon']?></li>
                    <li><b>Armor</b>: <?php echo $result10 ['armor']?></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <p>
              <?php echo $result10 ['bio']?>
            </p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>

<footer>&copy; Thijmen Stegenga - 2020</footer>

</body>

</html>