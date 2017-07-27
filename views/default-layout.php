<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?? "Titre par défaut" ?></title>
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap-theme.min.css">

    <style>
        .textCustom{
            font-size: 2.5rem;
        }
    </style>
</head>
<body class="container-fluid">
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?= $viewContent; ?>
    </div>

</div>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../lib/app.js"></script>
</body>
</html>