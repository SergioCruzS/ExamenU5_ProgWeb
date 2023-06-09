//Validación del ordenamiento del catálogo
$(document).ready(function () {
    const selectElement = $("#ordenar");
    var currentURL = window.location.href;
    var index = currentURL.indexOf('&order=');

    // Verificar si existe el carácter '?' y recortar la URL si es necesario
    if (index !== -1) {
        var currentURL = currentURL.substring(0, index);
        console.log(currentURL); // Imprimir la URL recortada en la consola
    }
    console.log(currentURL);

    selectElement.on("change", function () {
        const selectedValue = selectElement.val();
        console.log("Se seleccionó la opción: " + selectedValue);
        switch (selectedValue) {
            case "Mayor precio":
                window.location.href = currentURL + "&order=PDESC";
                break;
            case "Menor precio":
                window.location.href = currentURL + "&order=PASC";
                break;
            case "Nombre A-Z":
                window.location.href = currentURL + "&order=NASC";
                break;
            case "Nombre Z-A":
                window.location.href = currentURL + "&order=NDESC";
                break;
            default:
                window.location.href = "../../catalogo.php?category=none&order=PDESC";
        }
    });
});
//Validación del ordenamiento de la búsqueda
$(document).ready(function () {
    const selectElement = $("#ordenar-busqueda");
    var currentURL = window.location.href;
    var index = currentURL.indexOf('&order=');

    // Verificar si existe el carácter '?' y recortar la URL si es necesario
    if (index !== -1) {
        var currentURL = currentURL.substring(0, index);
        console.log(currentURL); // Imprimir la URL recortada en la consola
    }
    console.log(currentURL);

    selectElement.on("change", function () {
        const selectedValue = selectElement.val();
        console.log("Se seleccionó la opción: " + selectedValue);
        switch (selectedValue) {
            case "Mayor precio":
                window.location.href = currentURL + "&order=PDESC";
                break;
            case "Menor precio":
                window.location.href = currentURL + "&order=PASC";
                break;
            case "Nombre A-Z":
                window.location.href = currentURL + "&order=NASC";
                break;
            case "Nombre Z-A":
                window.location.href = currentURL + "&order=NDESC";
                break;
            default:
                window.location.href = "../../buscar.php?busqueda=&order=PDESC";
        }
    });
});


$(document).ready(function () {
    
    //Agregar cantidad de producto
    $(".btn-add").click(function() {
        var input = $(this).siblings('.input-cantidad');
        var valorActual = parseInt(input.val());
        var nuevoValor = valorActual + 1;
    
        // Asignar el nuevo valor al input
        input.val(nuevoValor);
      });
      //Disminuir cantidad de producto
      $(".btn-min").click(function() {
        var input = $(this).siblings('.input-cantidad');
        // Obtener el valor actual del input y convertirlo a número
        var valorActual = parseInt(input.val());
        if (valorActual > 1) {
            var nuevoValor = valorActual - 1;
        }else{
            var nuevoValor = valorActual;
        }
    
        // Asignar el nuevo valor al input
        input.val(nuevoValor);
      });
});

