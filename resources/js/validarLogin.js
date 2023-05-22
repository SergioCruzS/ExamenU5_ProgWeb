validar = $(document).ready(function() {
    $('#login-form').submit(function(event) {
      // Validar el correo electrónico
      var email = $('#email').val();
      var emailRegex = /^\S+@\S+\.\S+$/;
      if (!emailRegex.test(email)) {
        alert('Por favor, ingrese un correo electrónico válido.');
        event.preventDefault();
        return;
      }

      // Validar la contraseña
      //var password = $('#password').val();
      //var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
      //if (!passwordRegex.test(password)) {
      //  alert('Por favor, ingrese una contraseña válida. La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.');
      //  event.preventDefault();
      //  return;
      //}
    });
});