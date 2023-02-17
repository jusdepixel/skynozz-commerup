<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $uri ?>pages/home">Commerup</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php if (!isAuthenticated()) { ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $uri ?>user/authenticate">Authenticate</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $uri ?>user/cart">Cart</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $uri ?>user/logout">Logout</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $uri ?>user/orders">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $uri ?>user/address">Address</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>