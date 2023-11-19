<!doctype html>
<html lang="es">

<head>
    <title>Formulario de Contacto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <link href="../css/navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/stylesContacto.css" />
</head>

<body>
    <header>
    <?php
    include('../templates/navbarSecciones.php');
    ?>
    </header>
    <main>
        <div id="contact" class="contact-area section-padding">
            <div class="container">
                <div class="section-title">
                    <h5>FORMULARIO DE CONTACTO</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.</p>
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="contact">
                            <form class="form" name="enq" method="post" action="contact.php" onsubmit="return validation();">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <input type="text" name="name" class="form-control mb-3" placeholder="Name" required="required">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required="required">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="subject" class="form-control mb-3" placeholder="Subject" required="required">
                                    </div>
                                    <div class="col-12">
                                        <textarea rows="6" name="message" class="form-control mb-3" placeholder="Your Message" required="required"></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" value="Send message" name="submit" id="submitButton" class="btn btn-contact-bg" title="Submit Your Message!">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div><!--- END COL -->
                    <div class="col-lg-5">
                        <div class="single_address">
                            <i class="fa fa-map-marker"></i>
                            <h4>Our Address</h4>
                            <p>3481 Melrose Place, Beverly Hills</p>
                        </div>
                        <div class="single_address">
                            <i class="fa fa-envelope"></i>
                            <h4>Send your message</h4>
                            <p>Info@example.com</p>
                        </div>
                        <div class="single_address">
                            <i class="fa fa-phone"></i>
                            <h4>Call us on</h4>
                            <p>(+1) 517 397 7100</p>
                        </div>
                        <div class="single_address">
                            <i class="fa fa-clock-o"></i>
                            <h4>Work Time</h4>
                            <p>Mon - Fri: 08.00 - 16.00. <br>Sat: 10.00 - 14.00</p>
                        </div>
                    </div><!--- END COL -->
                </div><!--- END ROW -->
            </div><!--- END CONTAINER -->
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>