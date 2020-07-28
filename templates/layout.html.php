<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mon blog - <?= $pageTitle ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>

<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Raleway", sans-serif
    }
</style>

<body class="w3-light-grey">

    <!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
    <div class="w3-content" style="max-width:1400px">
        <!-- Header -->
        <header class="w3-container w3-center w3-padding-32">
            <h1><b>Mon blog</b></h1>
            <p>Bienvenue au blog en <span class="w3-tag">php</span></p>
        </header>
        <!-- Grid -->
        <div class="w3-row ">
            <?= $pageContent ?>
</body>

</html>




<body>