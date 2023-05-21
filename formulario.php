<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<?php
         include 'header.html';
      ?>
<br>
<br>
<div class="container ">
    <h2 class="text-center">Registro</h2>
    <form action="guardar.php" method="POST" onsubmit="return validarFormulario()" >
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name ="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="contraseña" required>
      </div>
      <div class="mb-3">
        <label for="confirmarPassword" class="form-label">Confirmar Contraseña</label>
        <input type="password" class="form-control" id="confirmarPassword" required>
      </div>
      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
  </div>

  <!-- Incluir los archivos de JavaScript de Bootstrap y el código de validación -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function validarFormulario() {
      var password = document.getElementById("password").value;
      var confirmarPassword = document.getElementById("confirmarPassword").value;

      if (password !== confirmarPassword) {
        alert("Las contraseñas no coinciden.");
        return false;
      }

      return true;
    }
  </script>
</body>
</html>