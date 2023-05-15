<!doctype html>
<html lang="en">

<head>
    <title>Productos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="resources/js/validaciones.js"></script>

    <style>
        .active {
            background-color: lightseagreen;
            color: black;
        }
    </style>

</head>

<body>
    <header>
        <?php include 'include/header.php'; ?>
    </header>
    <main>
        <div class="container">
            <div class="d-flex mt-5">
                <div class="">
                    <aside class="card h-100 d-flex">
                        <div>
                            <h5 class="card-title">Categorías</h5>
                            <ul class="list-group" id="lista-categorias">
                                <li class="list-group-item <?php echo (!isset($_GET['category']) || $_GET['category'] == "none") ? "active" : ""; ?>"
                                 style="border: none;"><a class="nav-link"
                                        href="catalogo.php?category=none&order=PDESC">Todos los productos</a></li>
                                <li class="list-group-item <?php echo (!isset($_GET['category']) || $_GET['category'] == "tablets") ? "active" : ""; ?>" 
                                style="border: none;"><a class="nav-link"
                                        href="catalogo.php?category=tablets&order=PDESC">Tablets</a></li>
                                <li class="list-group-item <?php echo (!isset($_GET['category']) || $_GET['category'] == "accessories") ? "active" : ""; ?>" 
                                style="border: none;"><a class="nav-link"
                                        href="catalogo.php?category=accessories&order=PDESC">Accesorios</a></li>
                                <li class="list-group-item <?php echo (!isset($_GET['category']) || $_GET['category'] == "ipad") ? "active" : ""; ?>" 
                                style="border: none;"><a class="nav-link"
                                        href="catalogo.php?category=ipad&order=PDESC">iPad</a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="d-flex row container ms-3">
                    <div class="d-flex align-items-center justify-content-end mb-3 full-width p-2"
                        style="border: 1px solid black; border-radius:5px">
                        <span class="me-2">Ordenar por:</span>
                        <select class="form-select w-auto" id="ordenar">
                            <option <?php echo (!isset($_GET['order']) || $_GET['order'] == "PDESC") ? "selected" : ""; ?>>Mayor precio</option>
                            <option <?php echo (isset($_GET['order']) && $_GET['order'] == "PASC") ? "selected" : ""; ?>>
                                Menor precio</option>
                            <option <?php echo (isset($_GET['order']) && $_GET['order'] == "NASC") ? "selected" : ""; ?>>
                                Nombre A-Z</option>
                            <option <?php echo (isset($_GET['order']) && $_GET['order'] == "NDESC") ? "selected" : ""; ?>>
                                Nombre Z-A</option>
                        </select>
                    </div>
                    <?php
                    include 'resources/php/obtenerProductos.php';
                    $result;
                    if (!isset($_GET['order']) && $_GET['category']== "none") {
                        $result = obtenerProductos($_GET['category'],"precio DESC");
                    } else {
                        switch ($_GET['order']) {
                            case "PDESC":
                                $result = obtenerProductos($_GET['category'],"precio DESC");
                                break;
                            case "PASC":
                                $result = obtenerProductos($_GET['category'], "precio ASC");
                                break;
                            case "NDESC":
                                $result = obtenerProductos($_GET['category'], "nombre DESC");
                                break;
                            case "NASC":
                                $result = obtenerProductos($_GET['category'], "nombre ASC");
                                break;
                            default:
                                $result = obtenerProductos($_GET['category'], "precio DESC");
                        }
                    }

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<div>";
                            echo '<div class="card mb-4 flex-wrap flex-row justify-content-center"';
                            echo 'style="border-left: none; border-right: none; border-top: none;">';
                            echo '<img src="https://www.lenovo.com/medias/mkt-hero.png?context=bWFzdGVyfHJvb3R8MjM1NTEwfGltYWdlL3BuZ3xoNzIvaDBmLzE1ODY4NzEwOTQ0Nzk4LnBuZ3xmNzRmYmVmYmI5YTljMTI0OTY2MzRlNTgzYWRiZjE0MDVmMjI2ODZmN2E0M2FjNjQ5NDRmNjQ1Y2ZmOGVlNWQz"';
                            echo 'class="card-img-top" style="height: 174px; width: 154px;" alt="Producto 1">';
                            echo '<div class="card-body d-flex flex-column">';
                            echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                            echo '<p class="card-text">Color: ' . $row["color"] . '</p>';
                            echo '<p class="card-text">Precio: $' . $row["precio"] . '</p>';
                            echo '</div>';
                            echo '<div class="d-flex align-items-center justify-content-center me-auto">';
                            echo '<button class="btn btn-primary " style="height: auto;">Agregar al carrito</button>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';

                        }

                    } else {
                        ?>
                        <h6>No hay productos disponibles</h6>
                        <?php
                    }
                    ?>


                    <!-- Añadir más productos aquí -->
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>