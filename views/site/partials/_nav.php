<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand ps-4" href="/">
            <img src="<?= IMG . "/logo_light.png" ?>" height="50" alt="Commerup">
            CommerUp
        </a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a
                        class="nav-link <?= PAGE === null ? 'active' : '' ?>"
                        href="/"
                    >
                        <i class="bi bi-house me-1"></i>
                        Accueil
                    </a>
                </li>
                <?php if (!isAuthenticated()) { ?>
                    <li class="nav-item">
                        <a 
                            class="nav-link <?= PAGE === 'user/authenticate' ? 'active' : '' ?>"
                            href="/user/authenticate"
                        >
                            <i class="bi bi-person me-1"></i>
                            Mon compte
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false" class="nav-link dropdown-toggle <?= (
                            PAGE === 'user/orders' ||
                            PAGE === 'user/logout' ||
                            PAGE === 'user/account'
                        ) ? 'active' : ''?>">
                            <i class="bi bi-person me-1"></i>
                            <?= getSession()['user']['firstname'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item <?= PAGE === 'user/account' ? 'active' : '' ?>"
                                   href="/user/account">
                                    Mon compte
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= PAGE === 'user/orders' ? 'active' : '' ?>"
                                    href="/user/orders">
                                    Mes commandes
                                </a>
                            </li>
                            <?php if (isAdmin()) { ?>
                                <li>
                                    <a class="dropdown-item"
                                       target="_blank"
                                       href="/admin/dashboard">
                                       Administration
                                    </a>
                                </li>
                            <?php } ?>
                            <li>
                                <a class="dropdown-item <?= PAGE === 'user/authenticate' ? 'active' : '' ?>"
                                   href="/user/logout">
                                    Se déconnecter
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php } ?>
                <li class="nav-item">
                    <a
                        class="nav-link  <?= PAGE === 'cart' ? 'active' : '' ?>"
                        href="/cart"
                    >
                        <i class="bi bi-cart me-1"></i>
                        Panier
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>