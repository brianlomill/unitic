<!doctype html>
<html lang="es">

<head>
    <title>Formulario de Contacto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- ICONOS BOOTSTRAP -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

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
                                        <input type="text" name="nombres" class="form-control mb-3" placeholder="Nombres" required="required">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required="required">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="asunto" class="form-control mb-3" placeholder="Asunto" required="required">
                                    </div>
                                    <div class="col-12">
                                        <textarea rows="6" name="mensaje" class="form-control mb-3" placeholder="Tu Mensaje" required="required"></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" value="Send message" name="submit" id="submitButton" class="btn btn-contact-bg" title="Submit Your Message!">Enviar Mensaje</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div><!--- END COL -->
                    <div class="col-lg-5">
                        <div class="single_address">
                        <i class="fas fa-map-marker-alt"></i>
                            <h4>Nuestra Dirección</h4>
                            <p>Cra. 12a #102,, Girardot, Colombia</p>
                        </div>
                        <div class="single_address">
                        <i class="fas fa-envelope"></i>
                            <h4>Envías tu mensaje a</h4>
                            <p>bdavidlozano@gmail.com</p>
                        </div>
                        <div class="single_address">
                        <i class="fas fa-phone"></i>
                            <h4>Llamanos al</h4>
                            <p>(+57) 517 397 7100</p>
                        </div>
                        <div class="single_address">
                        <i class="fas fa-clock"></i>
                            <h4>Horario</h4>
                            <p>Lun - Vie: 08.00 - 18:00 <br>Sab: 08.00 - 12.00</p>
                        </div>
                    </div><!--- END COL -->
                </div><!--- END ROW -->
            </div><!--- END CONTAINER -->
        </div>

    </main>
    <?php
        include '../templates/footer.php';
    ?>