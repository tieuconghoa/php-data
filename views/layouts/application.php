<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/app.js"></script>
</head>

<body>
    <div class="nav-item">
        <a href="./">Home</a>
        <a href="?controller=students&action=add">Add</a>
        <a href="?controller=classes&action=list">Class</a>
    </div>
    <div class="content">
        <?= @$content ?>
    </div>

</body>

</html>