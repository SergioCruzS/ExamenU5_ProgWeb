<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../catalogo.php?category=none">Productos</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex" action="../buscar.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar" name="busqueda">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./carrito.php">Carrito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Mi Cuenta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>