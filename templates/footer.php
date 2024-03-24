<!-- Site footer -->
<footer class="site-footer">
    <div class="container">
      <ul class="nav justify-content-center pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2">Inicio</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Proyectos</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Monografias</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Integrantes</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Galeria</a></li>
      </ul>
      <hr>
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2023 Todos Los Derechos Reservados
            <a href="#">UNITIC</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
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