<nav>
    <ul>
        <li><a href="?page=home">Home</a></li>

        <?php if (!isAuthenticated()) { ?>

            <li><a href="?page=user/authenticate">Authenticate</a></li>
            <li><a href="?page=user/cart">Cart</a></li>

        <?php } else { ?>

            <li><a href="?page=user/logout">Logout</a></li>
            <li><a href="?page=user/orders">Orders</a></li>
            <li><a href="?page=user/address">Address</a></li>

        <?php } ?>
    </ul>
</nav>