    <?php
    include "db/db.php";
    if (isset($_SESSION["uid"])) {
        header("location:customer/Customer_profile.php");
    }
    ?> <?php
        include 'customer/includes/header.php';
        ?>

    <body>

        <!--header area start-->

        <?php
        include 'includes/header.php';
        ?>
        <!--offcanvas menu area start-->
        <div class="off_canvars_overlay">

        </div>

        <!--offcanvas menu area end-->


        <?php
        include 'includes/header_area_menu.php';
        ?>
        <!--header area end-->

        <!--breadcrumbs area start-->
        <!--breadcrumbs area end-->

        <!--breadcrumbs area start-->
        <div class="breadcrumbs_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb_content">
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li>contact us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs area end-->

        <div class="contact_page_bg">
            <!--contact map start-->
            <div class="contact_map">
                <div class="map-area">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2484.6701389278105!2d-0.13442558407566274!3d51.48256882033922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760532743b90e1%3A0x790260718555a20c!2sU.S.%20Embassy%2C%20London!5e0!3m2!1sen!2sbd!4v1623927462716!5m2!1sen!2sbd"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <!--contact map end-->
            <div class="container">
                <!--contact area start-->
                <div class="contact_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="contact_message content">
                                <h3>contact us</h3>
                                <p>The best platform to buy and sell gas products.
                                    Feel free to inquire more about the platform and user manual guidelines</p>
                                <ul>
                                    <li><i class="fa fa-fax"></i> Address : 2500-1000 , Baraton.</li>
                                    <li><i class="fa fa-phone"></i> <a
                                            href="mailto:joshuandungu2001@gmail.com">joshuandungu2001@gmail.com</a></li>
                                    <li><a href="tel:+254 743 314 978"><i class="fa fa-envelope-o"> +254 743 314
                                                978</i></a></li>


                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="contact_message form">
                                <h3>Tell us your project</h3>
                                <form id="contact-form" method="POST"
                                    action="https://htmldemo.hasthemes.com/mazlay/mazlay/assets/mail.php">
                                    <p>
                                        <label> Your Name (required)</label>
                                        <input name="name" placeholder="Name *" type="text">
                                    </p>
                                    <p>
                                        <label> Your Email (required)</label>
                                        <input name="email" placeholder="Email *" type="email">
                                    </p>
                                    <p>
                                        <label> Subject</label>
                                        <input name="subject" placeholder="Subject *" type="text">
                                    </p>
                                    <div class="contact_textarea">
                                        <label> Your Message</label>
                                        <textarea placeholder="Message *" name="message"
                                            class="form-control2"></textarea>
                                    </div>
                                    <button type="submit"> Send</button>
                                    <p class="form-messege"></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!--contact area end-->
            </div>
        </div>

        <!--brand area start-->
        <?php
        include 'customer/brandarea.php';
        ?>
        <!--brand area end-->

        <!--footer area start-->
        <?php
        include 'includes/footer.php';
        ?>


        <!-- JS
============================================ -->

        <!-- Plugins JS -->
        <script src="./assets/js/plugins.js"></script>

        <!-- Main JS -->
        <script src="./assets/js/main.js"></script>



    </body>


    </html>