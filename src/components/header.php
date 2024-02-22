<header class="header">
    <a href="<?= $_ENV['DOMAIN'] ?>The-Library-book" class="logo">
        <img src="<?= $_ENV['DOMAIN'] ?>The-Library-book/assets/images/logo.svg" alt="Logo">
    </a>
    <div class="searchLogin">
        <form class="searchBox" action="/The-Library-book/index.php" method="GET">
            <button type="submit" name="search">
                <img src="<?= $_ENV['DOMAIN'] ?>The-Library-book/assets/images/search-icon.svg" alt="Buscar">
            </button>
            <input type="search" autocomplete="off" label="Search" placeholder="Search by title/ author" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
        </form>
        <?php

    $isLoggedIn = isset($_SESSION['last_name']);
?>
<div class="login">
<img src="<?= $_ENV['DOMAIN'] ?>The-Library-book/assets/images/user-icon.svg" alt="user">
            <?php if ($isLoggedIn): ?>
                <a class="loginLogout" href="#" onclick="confirmLogout()">Logout</a>
                <script>
                    function confirmLogout() {
                        var confirmLogout = confirm("¿Seguro que quieres cerrar sesión?");
                        if (confirmLogout) {
                            window.location.href = 'index.php?action=logout';
                        }
                    }
                </script>
            <?php else: ?>
                
                <a class="loginLogout" href="src/view/formView.php">Login</a>
            <?php endif; ?>
</div>


    </div>
</header>


