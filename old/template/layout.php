<!doctype html>
<html lang="fr">
<head>
    <script src="https://kit.fontawesome.com/d3b996d8f9.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($data['title'])) echo $data['title']; ?> - Plugo</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>
    <main class="container">
        <?php include "_navbar.php"; ?>
        <?php require $templatePath ?>
        <?php include "_footer.php"; ?>
    </main>
</body>
</html>