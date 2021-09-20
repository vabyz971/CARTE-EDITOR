<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($this->renderSection('title')) ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma-rtl.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <?= esc($this->renderSection('style')) ?>

</head>

<body>
  <?= view('App\Views\layouts\_navbar') ?>
  <main class='mt-6 pt-3'>
    <?= view('App\Views\_message_block') ?>
    <?= $this->renderSection('content') ?>
  </main>


  <!-- JAVASCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/js/all.min.js" integrity="sha256-gSqw5G+Gss6YqyQlqyIkuQ0IRZUqGsDVq9c0tiF+mL8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="<?= base_url('js/script.js') ?>"></script>

  <?= esc($this->renderSection('script')) ?>

</body>

</html>