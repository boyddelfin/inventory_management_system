<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?> | <?php echo APP_AUTHOR; ?></title>
    <link rel="shortcut icon" href="<?php echo APP_ASSETS; ?>/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo APP_ASSETS; ?>/style.css">
    <link rel="stylesheet" href="<?php echo APP_ASSETS; ?>/bootstrap-5.2.0-dist/css/bootstrap.min.css">
</head>
<body>
<?php if($sessions->is_set()): ?>
<header>
    <div class="container">
        <h1>Start customizing here</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex accusamus quibusdam id a porro dolores accusantium eveniet nemo qui, iusto et nisi cupiditate, adipisci, illum officia aut corporis molestiae ullam.</p>
    </div>
</header>
<?php endif; ?>