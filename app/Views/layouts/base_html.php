<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($this->renderSection('title')) ?></title>

    <link rel="stylesheet" href="<?= base_url('bulma/css/bulma.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('fontawesome/css/all.min.css')?>">
</head>
<body>
    <?= view('App\Views\layouts\_navbar') ?>
    <?= $this->renderSection("content") ?>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('fontawesome/js/fontawesome.min.js') ?>"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>

</body>
</html>
