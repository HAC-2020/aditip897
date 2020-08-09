<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corona Fighter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    <div class="jumbotron text-center">
    <h1>Want to travel to another state? Check Below to see if it's safe</h1>
    
    
    </div>
    <form class="container col-md-4" action="/covid19.php" method="POST">
        <div class="form-group">
            <label>Enter state name :</label>
            <input type="text" name="state" class="form-control">
        </div>
        <div class="form-group">
            <label>Enter District name :</label>
            <input type="text" name="dist" class="form-control">
        </div>
        <div class="form-group text-center">
            <button type="submit" name="submit" class="btn btn-info">Get Details</button>
        </div>
    
    </form>
    
</body>
</html>

<?php

$data = file_get_contents("https://api.covid19india.org/state_district_wise.json");
$corona = json_decode($data ,true);

if(isset($_POST["submit"])){
    $state = $_POST["state"];
    $dist = $_POST["dist"];

    $state = ucfirst($state);
    $dist = ucfirst($dist);

?>
<div class="container col-md-4 m-auto text-center">



<?php

    echo "Active case : ";

    echo($corona[$state]['districtData'][$dist]['active']);

    
    echo "<br>confirmed :";

    echo($corona[$state]['districtData'][$dist]['confirmed']);
    echo "<br>Death :";

    echo($corona[$state]['districtData'][$dist]['deceased']);
    
    if ($corona[$state]['districtData'][$dist]['active']>300){
        echo " <br><h3>HIGH RISK OF CATCHING COVID-19<h3>";
    }
    elseif($corona[$state]['districtData'][$dist]['active']>100){
        echo "<br><h3>MIDDLE RISK OF CATCHING COVID-19<h3>";

    }
    else{
        echo "<br><h3>LOW RISK OF CATCHING COVID-19<h3>";
    }



}

?>

</div>