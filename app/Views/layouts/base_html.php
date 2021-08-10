<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($this->renderSection('title')) ?></title>
    
    <link rel="stylesheet" href="<?= base_url('bulma/css/bulma.min.css') ?>">
</head>
<body>
    <?= $this->renderSection("content") ?>

    <!-- JAVASCRIPT -->

</body>
</html>