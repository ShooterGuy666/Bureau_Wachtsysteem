<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Wachtsysteem</title>
</head>
<body>
<?php
    $sql = "SELECT * FROM `groups`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
   
   
    <div class="container-fluid">
        <div class="row pt-3">
            <div class="col-md-12 text-center pt-5">
                <p class="font-30">Op dit moment bezig:</p>
                <p class="font-40"><?php echo $row['group_name']; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center pt-5">
                <p class="font-30">Volgende groep:</p>
                <p class="font-40"><?php echo $row['group_name'] ?></p>
                <p class="font-30">Over ongeveer 10 minuten</p>
            </div>
        </div>
        <div class="row pt-5 text-center">
            <div class="col-md-3">
                <p class="h1">Overzicht</p>
                <div class="item-container">
                    <table class=" mt-4 w-100">
                    <?php
                    while($row = $result->fetch_assoc()){
                        ?>
                        <tr class="h3">
                    <?php
                        echo $row['group_name'] . " ";
                        echo $row['time'];
                    ?>
                        </tr>
                        <br>
                    <?php
                    }
                    ?>
                        
                    </table>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>