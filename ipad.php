<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>iPad</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<?php
         include 'header.html';
      ?>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    
        <div class="carousel-inner">
        <div class="carousel-item active c-item">
          <img src="/img/p1.jpg" class="d-block w-100 c-img" alt="Slide 1">
          <div class="carousel-caption top-0 d-none d-md-block">
            <p>TabletShop</p>
            <h1>Descubre nuestra variedad de productos.</h1>
          </div>
        </div>
        <div class="carousel-item c-item">
          <img src="/img/p2.jpg" class="d-block w-100 c-img" alt="Slide 2">
          <div class="carousel-caption top-0 d-none d-md-block">
            <p>TabletShop</p>
            <h1>Descubre nuestra variedad de productos.</h1>
          </div>
        </div>
        <div class="carousel-item c-item">
          <img src="/img/imag3.jpg" class="d-block w-100 c-img" alt="Slide 3">
          <div class="carousel-caption top-0 d-none d-md-block">
            <p>TabletShop</p>
            <h1>Descubre nuestra variedad de productos.</h1>
          </div>
        </div>
      </div>
    </div>
      <br>
      <br>
      <div class="container">
        <h2> Top de ventas</h2>

      </div>
      <br>
      <div class="container">
        <h5> iPad</h5>

      </div>
      <br>






<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "proyecto");

// Verificar la conexión
if (mysqli_connect_errno()) {
    echo "Falló la conexión a MySQL: " . mysqli_connect_error();
    exit();
}

// Realizar la consulta SQL para obtener los productos
$resultado = mysqli_query($conexion, "SELECT imagen, nombre, precio FROM top_ventas WHERE categoria = 'ipad'");

// Mostrar los productos en una lista usando Bootstrap 5
echo '<div class="container">';
echo '<div class="row ">';
while ($producto = mysqli_fetch_assoc($resultado)) {
    echo '<div class="col-md-4 ">';
    echo '<div class="card mb-4 ">';
    echo '<img src="' . $producto["imagen"] . '" class="ampliar-imagen" alt="' . $producto["nombre"] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $producto["nombre"] . '</h5>';
    echo '<p class="card-text">' . $producto["precio"] . '</p>';
    echo '<a href="producto_ip.php" class="btn btn-primary">Ver productos</a>';
    echo '</div></div></div>';
   
}
echo '</div>';
echo '</div>';


// Liberar los resultados de la consulta y cerrar la conexión
mysqli_free_result($resultado);
mysqli_close($conexion);
?>

<br>
  <br>
    <?php
         include 'footer.html';
      ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script> 


</body>
<style>
    .contenedor-icon{
        font-size: 25px;
    }
    .c-item{
      height: 480px;
    }
    .c-img{
      height: 100%;
      object-fit: cover;
      filter: brightness(0.6);

    }
    .ampliar-imagen {
  max-width: 160px;
  height: auto;
    }
    </style>
</html>