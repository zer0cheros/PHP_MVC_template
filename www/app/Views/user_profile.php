<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
</head>
<body>
    <h1><?php echo $data['title']; ?></h1>
    <p>Username: <?php echo $data['user']['username'] ?></p>
    <p>Email: <?php echo $data['user']['email'] ?></p>
</body>
</html>