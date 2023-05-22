
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carrito</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="resources/js/validaciones.js"></script>

</head>
  <body>
  
  <div class="site-wrap">
  <?php include 'include/header.php'; ?>

  <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Imagen</th>
                    <th class="product-name">Servicio</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                    <th class="product-total">Subtotal</th>
                    <th class="product-remove">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    if(isset($_SESSION['carrito'])){
                        $arreglocarrito = $_SESSION['carrito'];
                    for($i=0;$i<count($arreglocarrito);$i++){
                        $total = $total + ($arreglocarrito[$i]['precio'] * $arreglocarrito[$i]['cantidad']);
                    
                    ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="images/<?php echo $arreglocarrito[$i]['imagen'];?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $arreglocarrito[$i]['nombre'];?></h2>
                    </td>
                    <td>$ <?php echo number_format($arreglocarrito[$i]['precio'] , 2 , '.', '');?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus btnIncrementar" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center txtCantidad" 
                               data-precio ="<?php echo $arreglocarrito[$i]['precio'];?>"
                               data-id ="$ <?php echo number_format($arreglocarrito[$i]['precio'] , 2 , '.', '');?>"
                               value="<?php echo $arreglocarrito[$i]['cantidad'];?>" 
                               placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus btnIncrementar" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td class = "cant<?php echo $arreglocarrito[$i]['id'];?>">$ <?php echo number_format($arreglocarrito[$i]['precio'] * $arreglocarrito[$i]['cantidad'], 2 , '.', ''  ) ?>    </td>
                    <td><a href="" class="btn btn-primary btn-sm btnEliminar" data-id="<?php echo $arreglocarrito[$i]['id'];?>" >X</a></td>
                  </tr>
                    <?php 
                    }
                    }?>
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6">
                 <a href="indexUsuario.php" class="btn btn-outline-primary btn-sm btn-block"> Agregar mas servicios</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Informe del Pedido</h3>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$ <?php echo number_format($total , 2 , '.', '');?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Confirmar Cita</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="js/carrito/jquery-3.3.1.min.js"></script>
  <script src="js/carrito/jquery-ui.js"></script>
  <script src="js/carrito/popper.min.js"></script>
  <script src="js/carrito/bootstrap.min.js"></script>
  <script src="js/carrito/owl.carousel.min.js"></script>
  <script src="js/carrito/jquery.magnific-popup.min.js"></script>
  <script src="js/carrito/aos.js"></script>

  <script src="js/carrito/main.js"></script>
      
      <script>
      $(document).ready(function(){
         $(".btnEliminar").click(function(event){
             event.preventDefault();
             var id = $(this).data('id');
             var boton = $(this);
             $.ajax({
                
            method: 'POST',
                 url: './php/eliminarCarrito.php',
                 data:{
                     id:id
                 }
             }).done(function(respuesta){
                 boton.parent('td').parent('tr').remove();
             });
         });
          $(".txtCantidad").keyup(function(){
            var cantidad = $(this).val(); 
              var precio = $(this).data('precio');
              var id = $(this).data('id');
              incrementar(cantidad,precio,id);
          });
          
          $(".btnIncrementar").click(function(){
             var precio = $(this).parent('div').parent('div').find('input').data('precio');
             var id = $(this).parent('div').parent('div').find('input').data('id');
             var cantidad = $(this).parent('div').parent('div').find('input').val();
              incrementar(cantidad, precio, id);
             
          });
          
          function incrementar(cantidad, precio, id){
              var mult = parseFloat(cantidad) * parseFloat(precio);
              $(".cant"+id).text("$ "+mult);
                       $.ajax({
                
            method: 'POST',
                 url: './php/actualizar.php',
                 data:{
                     id:id,
                     cantidad : cantidad
                 }
             }).done(function(respuesta){
                
             });
          
          }
          
      });
      </script>
    
  </body>
</html>