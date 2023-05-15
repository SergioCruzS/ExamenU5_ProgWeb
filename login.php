<!doctype html>
<html lang="en">

<head>
    <title>Iniciar Sesión</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../resources/css/estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../resources/js/validarLogin.js"></script>
</head>

<body>
    <header>
        <?php include 'include/header.php'; ?>
    </header>
    <main>
        <?php
        session_start();
        if (!empty($_SESSION)) {
            header('Location: micuenta.php');
            //if ($_SESSION['rol'] == "admin") {
            //    header('Location: homeAdmin.php');
            //    exit;
            //}
            //if ($_SESSION['rol'] == "empleado") {
            //    header('Location: homeEmpleados.php');
            //    exit;
            //}
        }
        ?>
        <div class="d-flex align-items-center justify-content-center" style="height: 100vh">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h1 class="text-center mb-4">Iniciar sesión</h1>
                        <?php
                        if (isset($_GET['error']) && $_GET['error'] == 'credenciales') {
                            ?>
                            <h6 style="color:red">
                                Usuario y/o contraseña incorrectos.
                            </h6>
                            <?php
                        }
                        ?>
                        <form id="login-form" action="resources/php/validarCredenciales.php" method="POST"
                            onsubmit="validar()">
                            <h6 style="color: red"></h6>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Correo electrónico" required>
                                <label for="email">Correo electrónico</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Contraseña" required>
                                <label for="password">Contraseña</label>
                            </div>
                            <div class="text-end">
                                <a href="#">¿Olvidó su contraseña?</a>
                            </div>
                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                            </div>
                            <div class="text-center">
                                <a href="#">¿No tiene cuenta?. Registrate aquí</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include 'include/footer.php'; ?>
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