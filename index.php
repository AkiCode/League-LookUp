<!DOCTYPE html>
<html>
<head>
    <title>API Test Site</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>
<body>
    <h1 id="logo">KysGG</h1>
    <div class="searchBar">
        <form action="summoner.php">
            <input id="lookUp" name="summoner" type="text" value="" placeholder="Summoner Name" />
            <select id="region" name="region">
                <option value="euw1">EUW</option>
                <option value="eun1">EUNE</option>
                <option value="na1">NA</option>
                <option value="kr">KR</option>
            </select>
            <input id="searchBtn" type="submit" value="Kiis">
        </form>
    </div>
</body>
</html>
