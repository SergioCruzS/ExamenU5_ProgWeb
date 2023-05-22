
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
        <div class="row">
			
			
			<div class="col-md-6">
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Tu servicio</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Servicio</th>
                      <th>Total</th>
                    </thead>
                    <tbody>

                      <tr>
                        <td>Producto</td>
                        <td>$ 100 , 2 , '.', '');?></td>
                        
                      </tr>

                        <tr>
                        <td>Total</td>
                        <td>      $   100</td>
                        </tr>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
			
			
          <div class="col-md-6 mb-5 mb-md-0">
            <form method="post" role="form" id="formulario">
			  <h2 class="h3 mb-3 text-black">Información Requerida</h2>
            <div class="p-3 p-lg-5 border">
         

            <div class="form-group">
                <label>Seleccione la fecha de su cita</label>
               <input type="date"  disable=»disabled» name="fecha" required=»required» min="<?php echo date("Y-m-d");?>" class="form-control" value="<?php echo date("Y-m-d");?>">
            </div>  
             
             <div class="form-group">
                <label>Seleccione la hora de su cita</label>
               <input type="time" name="hora" min="09:00" max="21:00"  required=»required» class="form-control">
            </div>
                
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Dirección<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address"  required=»required» name="c_address" placeholder="Calle , Numero">
                </div>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" name="colonia" required=»required»  placeholder="Colonia">
              </div>

            <div class="form-group">
                <label for="c_order_notes" class="text-black">Referencias del domicilio</label>
                <textarea name="ref" id="c_order_notes" cols="30" required=»required» rows="5" class="form-control" placeholder="Ejemplo: Casa blanca con porton color negro"></textarea>
              </div>
                

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Detalles adicionales para el servicio</label>
                <textarea name="detalles" id="c_order_notes" required=»required» cols="30" rows="5" class="form-control" placeholder="Ejemplo: Sabanas y/o cobija extra"></textarea>
              </div>
				
				<div class="form-group">
                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit" onclick="window.location='registrocarrito.php'">Confirmar cita</button>
                  </div>
				
            </div>
				</form>
          </div> 
        </div>
        <!-- </form> -->
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