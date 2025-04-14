<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'My App' ?></title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>
    <!-- Main Content -->
    <main class="container">
        <?= $content ?? '' ?>
    </main>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
    
</body>
</html>