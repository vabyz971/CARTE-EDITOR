<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($this->renderSection('title')) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma-rtl.min.css">
</head>
<body>
    <?= view('App\Views\layouts\_navbar') ?>
    <main class='container is-fluid mt-6 pt-3'>
      <?= $this->renderSection('content') ?>
    </main>


    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/js/all.min.js"
      integrity="sha256-gSqw5G+Gss6YqyQlqyIkuQ0IRZUqGsDVq9c0tiF+mL8=" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>

    <?= $this->renderSection('script') ?>

</body>
</html>
