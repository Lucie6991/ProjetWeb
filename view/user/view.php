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
$path = File::build_path(array("view", "utilitaire", "fonctions.php"));
include($path);
?>
<div class="container">

    <?php getHeader();?>
    <div class="row">
        <?php getAside();?>
        <section class="col-lg-9">
            <br>
            <?php
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
            if (isset($message)){
                echo $message;
            }
            echo "<br/>";
            getFooter();
            ?>
        </section>
    </div>
</div>

</body>
</html>