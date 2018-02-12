<?php
include("riot_api_connect.php");

// Check if the form has been submitted
if(isset($_GET['summoner'])){
    $summoner = $_GET['summoner'];
    $region = $_GET['region'];
    $riotApi = new RiotApi($region);
}

// Retrieving API Data
$summonerInfo = $riotApi->getSummonerByName($summoner);
$summonerRank = $riotApi->getSummmonerLeaguePosition($summonerInfo['id']);

// Calculating Winrate based on API Data
$winrate =  $summonerRank[0]['wins'] / ($summonerRank[0]['wins'] + $summonerRank[0]['losses']);
$winrate = round((float)$winrate * 100);

// Reformating Player Rank String
$tier = ucfirst(strtolower($summonerRank[0]['tier']));
?>

<!DOCTYPE html>
<html>
<head>
    <title>API Test Site</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body>
    <h1 id="logo">KysGG</h1>
    <div class="profileContainer">
        <img id="profilePicture" src='http://ddragon.leagueoflegends.com/cdn/8.3.1/img/profileicon/<?php echo $summonerInfo['profileIconId']; ?>.png' alt='Summoner Icon'>
        <h2 id="profileName"><?php echo $summonerInfo['name']; ?></h2>
        <p id="profileLevel">Summoner Level: <?php echo $summonerInfo['summonerLevel']; ?></p>
        
        <?php
        if($summonerRank[0]['hotStreak'] !== false){
            echo '<span id="streak">Hot Streak</span>';
        }elseif($summonerRank[0]['veteran'] !== false){
            echo '<span id="streak">Veteran</span>';
        }elseif($summonerRank[0]['veteran'] !== false){
            echo '<span id="streak">Janna Abuser</span>';
        }
        ?>

        <img id="rankPicture" src='images/<?php 
        if(isset($summonerRank[0]['tier'])){
        echo $summonerRank[0]['tier'] . "_" . $summonerRank[0]['rank'];} else echo "default.png" ?>' alt='Summoner Icon'>
        <div id="rankBox">
            <p id="rankCurrent"><?php echo $tier . " " . $summonerRank[0]['rank']; ?></p>
            <p id="rankCurrent"><?php echo $summonerRank[0]['leaguePoints'] . "LP / " . $summonerRank[0]['wins'] . "W " . $summonerRank[0]['losses'] . "L"; ?></p>
            <p id="rankCurrent">Winrate: <?php echo $winrate; ?>%</p>
            <p id="rankCurrent"><?php echo $summonerRank[0]['leagueName']; ?></p>
        </div>
    </div>
</body>
</html>
