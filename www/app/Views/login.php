<head>
    <link rel="stylesheet" href="/public/css/login.css">
</head>


<h1 class="page-title"><?php echo $data['title']; ?></h1>
<div class="login-form-container">
    <form action="/auth/login" method="post" class="login-form">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-input">
        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-input">
        <button type="submit" class="button">Login</button>
    </form>
</div>