<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="assets/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php
        include_once('entities/account.php');
        if (isset($_SESSION['username'])) {
            echo '<nav class="navbar navbar-inverse navbar-global navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./">name of company</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-user navbar-right">';

            echo "<li><a><span class='glyphicon glyphicon-user'></span> " . $_SESSION['username'] . "</a></li>";
            echo '<li><a href="?controller=account&action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
            echo '</ul>
            </div>
         </div>
    </nav>
    <nav class="navbar-primary">
        <a  class="btn-expand-collapse"><span class="glyphicon glyphicon-menu-left"></span></a>
        <ul class="navbar-primary-menu"><li>';
            $account = unserialize(serialize($_SESSION["account"]));
            $role = json_decode($account->role);
            echo '<li class="dropdown">';
            foreach ($role as $key => $value) {
                echo '<a href="#"  data-toggle="collapse" data-target="#submenu-1">
                    <span class="glyphicon glyphicon-list-alt"></span><span class="nav-label">' . $key . '</span></a>';
                echo '<ul id="submenu-1" class="expanded">';
                foreach ($value as $item) {
                    echo '<li><a href="?controller=' . $key . '&action=' . $item . '"><i class="fa fa-angle-double-right"></i> ' . $item . ' ' . $key . '</a></li>';
                }
                echo '</ul>';
            }
            echo '</li>
        </ul>
    </nav>';
        }

        ?>
        <div class="main-content">
            <?= @$content ?>
        </div>
    </div>

</body>
<script>
    $('.btn-expand-collapse').click(function(e) {
        $('.glyphicon.glyphicon-menu-left').toggleClass('glyphicon-menu-right');
        $('.navbar-primary').toggleClass('collapsed');
        $('.expanded').toggleClass('collapse');
        // $('.collapse').attr('class', 'expand');
    });
</script>

</html>