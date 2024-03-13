<footer class="bg-light text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn text-white btn-floating m-1" style="background-color: #4267B2;" href="https://www.facebook.com/semillero.unitic.uniminuto" target="_blank" role="button">
        <i class="fab fa-facebook-f"></i>
      </a>

      <!-- Twitter -->
      <a class="btn text-white btn-floating m-1" style="background-color: #1DA1F2;" href="https://twitter.com/SemilleroUnitic" target="_blank" role="button">
        <i class="fab fa-twitter"></i>
      </a>

      <!-- Instagram -->
      <a class="btn text-white btn-floating m-1" style="background-color: #E1306C;" href="https://www.instagram.com/semillero.untic/" target="_blank" role="button">
        <i class="fab fa-instagram"></i>
      </a>

      <!-- Linkedin -->
      <a class="btn text-white btn-floating m-1" style="background-color: #c4302b ;" href="https://www.youtube.com/@uniticsemillerouniminuto5397" target="_blank" role="button">
        <i class="fab fa-youtube"></i>
      </a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #0A4D68;">
    © 2023 Copyright: Semillero Unitic
  </div>
  <!-- Copyright -->
</footer>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>

<script>
    function mostrarAlerta(mensaje, tipo) {
        // Crear un elemento de alerta con el mensaje y tipo proporcionados
        var alerta = document.createElement('div');
        alerta.className = 'alert alert-' + tipo;
        alerta.role = 'alert';
        alerta.innerText = mensaje;

        // Agregar la alerta al formulario
        var formulario = document.querySelector('.form');
        formulario.insertBefore(alerta, formulario.firstChild);

        // Ocultar la alerta después de 3 segundos
        setTimeout(function() {
            alerta.style.display = 'none';
        }, 3000);
    }

    function validation() {
        // Mostrar el mensaje de "enviando"
        var enviandoMensaje = document.createElement('div');
        enviandoMensaje.className = 'alert alert-info';
        enviandoMensaje.role = 'alert';
        enviandoMensaje.innerText = 'Enviando...';

        var formulario = document.querySelector('.form');
        formulario.insertBefore(enviandoMensaje, formulario.firstChild);

        // Envía el formulario utilizando AJAX
        var formData = new FormData(formulario);

        fetch('servidor/contacto.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            // Ocultar el mensaje de "enviando"
            enviandoMensaje.style.display = 'none';

            if (response.ok) {
                mostrarAlerta('¡El mensaje se ha enviado correctamente!', 'success');
                formulario.reset(); // Limpiar el formulario si se envió correctamente
                return true;
            } else {
                mostrarAlerta('Error al enviar el mensaje. Por favor, inténtelo de nuevo más tarde.', 'danger');
                return false;
            }
        })
        .catch(error => {
            // Ocultar el mensaje de "enviando"
            enviandoMensaje.style.display = 'none';

            console.error('Error:', error);
            mostrarAlerta('Error al enviar el mensaje. Por favor, inténtelo de nuevo más tarde.', 'danger');
            return false;
        });

        // Evitar que el formulario se envíe de forma tradicional
        return false;
    }
</script>


</body>

</html>