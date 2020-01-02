<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="view/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="view/CSS/style.css" />
    <title><?php echo $page_title; ?></title>
    <script type="text/javascript" src="view/functionsJS.js"></script>
</head>
<body>

<?php
$path = File::build_path(array("view", "fonctions.php"));
include($path);
?>
<div class="container">

    <?php getHeaderAdmin();?>
    <div class="row">
        <?php getAsideAdmin();?>
        <section class="col-lg-9">
            <br>
            <?php
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;

            getFooter();
            ?>
        </section>
    </div>
</div>

</body>
</html>