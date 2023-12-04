<!DOCTYPE html>
<html>
<head>
<style>
div {
width: 15.4%;
border: 5px solid black;
padding-bottom: 30px;
padding-top: 30px;
float: left;
margin: 0.3%;
border-radius: 10%;
background-color: cornsilk;
}
h1{
    font-family: Arial, Helvetica, sans-serif;
    text-align: center;
    font-size: 100px;
    background-color: wheat;
}
h2 {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 50px;
    text-align: center;
}
</style>
</head>
<body>
<h1>Lottozahlen</h1>
<?php  
$lottozahlen = range(1,42);
shuffle($lottozahlen);
$sorting = array_slice($lottozahlen,0,6);
sort ($sorting);
foreach ($sorting as $i) {
    echo "<div><h2>$i</h2></div>";
}
?>

</body>
</html>
