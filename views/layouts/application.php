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
    <nav role="navigation" class="primary-navigation">
        <ul>
            <li><a href="./">Home</a></li>
            <li><a href="">Add &dtrif;</a>
                <ul class="dropdown">
                    <li><a href="?controller=students&action=add">Add Student</a></li>
                    <li><a href="?controller=classes&action=add">Add Class</a></li>
                    <li><a href="?controller=capacity&action=add">Add Capacity</a></li>
                    <li><a href="?controller=action&action=add">Add Action</a></li>
                </ul>
            </li>
            <li><a href="?controller=classes&action=list">Classes</a></li>
        </ul>
    </nav>
    <div class="content">
        <?= @$content ?>
    </div>

</body>

</html>