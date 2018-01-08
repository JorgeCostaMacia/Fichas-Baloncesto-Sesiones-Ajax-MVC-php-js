<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

    <head> <?php include_once "views/layout/head.php"; ?></head>    <!-- HEAD -->

    <body class="container-fluid row">
        <?php include_once "controller/primaryController.php"; ?>   <!-- CONTROLADOR-->
        <?php include_once "views/layout/footer.php"; ?>            <!-- FOOTER + IMPORT JS-->
    </body>
</html>