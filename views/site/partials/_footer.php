</div>
<footer>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="<?= URI ?>home" class="navbar-brand">
                <i class="bi bi-c-circle me-2 ps-4"></i>CommerUp
                <small><?= date("Y") ?></small>
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a
                            class="nav-link <?= PAGE === 'contact' ? 'active' : '' ?>"
                            href="/contact"
                        >
                            Nous contacter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link <?= PAGE === 'about' ? 'active' : '' ?>"
                            href="/about"
                        >
                            À propos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link <?= PAGE === 'delivery' ? 'active' : '' ?>"
                            href="/delivery"
                        >
                            Livraison
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link <?= PAGE === 'networks' ? 'active' : '' ?>"
                            href="/networks"
                        >
                            Réseaux sociaux
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</footer>

<script src="<?= JS ?>/bootstrap.bundle.min.js"></script>
<script src="<?= JS ?>/scripts.js"></script>
</body>
</html>