<nav class="navbar navbar-dark bg-primary">

    <a class="navbar-brand mb-5" href="/admin/dashboard">
        <img src="<?= IMG . "/logo_light.png" ?>" height="50" alt="Commerup">
        CommerUp
        <span>Administration</span>
    </a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link <?= PAGE === "dashboard" ? 'active' : '' ?>">
                <i class="bi bi-command me-1"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="/admin/users" class="nav-link <?= PAGE === "users" ? 'active' : '' ?>">
                <i class="bi bi-people me-1"></i>
                Utilisateurs
            </a>
        </li>
        <li class="nav-item mt-5">
            <a href="/user/logout" class="nav-link">
                <i class="bi bi-box-arrow-right me-1"></i>
                Déconnexion <span class="ms-1">[ <?= getSession()['user']['firstname'] ?> ]</span>
            </a>
        </li>
        <li class="nav-item">
            <a target="_blank" href="/" class="nav-link">
                <i class="bi bi-browser-chrome me-1"></i>
                Voir le site
            </a>
        </li>
    </ul>

    <footer>
        <a href="/admin/dashboard" class="navbar-brand">
            <i class="bi bi-c-circle me-2"></i>CommerUp
            <small><?= date("Y") ?></small>
        </a>
    </footer>
</nav>
