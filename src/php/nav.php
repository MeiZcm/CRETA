<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/CRETA/src/css/nav.css">
</head>

<body>
    <nav>
        <label class="logo">CRETA</label>
        <ul>
            <li><a class="active" href="/CRETA/pagina2.php">Home</a></li>
            <li><a href="users/lista.php">lista</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Feedback</a></li>
        </ul>
    </nav>

    <?php
        include __DIR__ . "/../../users/session.php";
    ?>
</body>

</html>