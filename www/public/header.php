<header class="header">
        <h1>My Application</h1>
        <nav>
            <a href="/">Home</a>
            <a href="/user/profile">Profile</a>
            <a href="/auth/logout">Logout</a>
            <?php if (AuthMiddleware::isAdmin()): ?>
                <a href="/admin">Admin</a>
            <?php endif; ?>
        </nav>
    </header>