<?php
    include('dbconnect.php');
    $query = $conn->prepare("SELECT * FROM characters");
    $query->execute();
    $result = $query->fetchAll();
    //echo "<pre>";
    //   var_dump( $result);
    //echo "</pre>";
    $query = $conn->prepare("SELECT COUNT(id) FROM characters");
    $query->execute();
    $aantal = $query->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dynamische-Applicatie</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="vormgeving/resources/css/style.css" rel="stylesheet"/>
</head>
<body>
    <header>
        <h1>Alle <?php echo $aantal[0]; ?> characters uit de database</h1>
    </header>
    <div id="container">
    <?php
    foreach ($result as $row) {?>
        <a class="item" href="detail.php?id=<?php echo $row['id'] ?>">
            <div class="left">
                <img class="avatar" src="vormgeving/resources/images/<?php echo $row ['avatar']?>">
            </div>
            <div class="right">
                <h2><?php echo $row['name'] ?></h2>
                <div class="stats">
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-heart"></i></span><?php echo $row ['health']?></li>
                        <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span><?php echo $row ['attack']?></li>
                        <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span><?php echo $row ['defense']?></li>
                    </ul>
                </div>
            </div>
            <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
        </a>
    <?php
    }
   ?>
   </div>
<footer>&copy; Thijmen Stegenga - 2020</footer>

</body>

</html>