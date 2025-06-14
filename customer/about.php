<body>

    <!--header area start-->

    <?php
    require_once "db/db.php";
    include 'includes/header.php';
    ?>
    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>

    <!--offcanvas menu area end-->


    <?php
    include 'includes/header_profile.php';
    if (!isset($_SESSION["uid"])) {
        header("location:customer_login.php");
    }
    ?>
    <!--header area end-->

    <!--breadcrumbs area start-->
    <!--breadcrumbs area end-->

    <!--about bg area start-->
    <div class="about_bg_area">
        <div class="container">
            <!--about section area -->
            <section class="about_section mb-60">
                <div class="row align-items-center">
                    <div class="col-12">
                        <figure>
                            <div class="about_thumb">
                                <img src="../assets/img/about/kosyin.jpg" alt="photo" height="300px" height="300px">
                            </div>
                            <figcaption class="about_content">
                                <h1>We are an online gas vendor focused on delivery quality gas products country wide.
                                </h1>
                                <p>Larry Energies is a multivendor online gas order and delivery platform
                                    tailored
                                    to connect customers and sellers in need of gas products. As a safety of concern we
                                    ensure supply of legit quality gas products that are efficient to use and upto to
                                    standards.</p>
                                <div class="about_signature">
                                    <img src="../assets/img/about/about-us-signature.png" alt="">
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </section>
            <!--about section end-->

            <!--chose us area start-->
            <div class="choseus_area" data-bgimg="../assets/img/about/about-us-policy-bg.jpg">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <img src="../assets/img/about/About_icon1.png" alt="">
                            </div>
                            <div class="chose_content">
                                <h3>Quality Products</h3>
                                <p>Quality products for better customer experience</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <img src="../assets/img/about/About_icon2.png" alt="">
                            </div>
                            <div class="chose_content">
                                <h3>100% Delivery Delivery</h3>
                                <p>Maximum tracking of products after purchase </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_chose">
                            <div class="chose_icone">
                                <img src="../assets/img/about/About_icon3.png" alt="">
                            </div>
                            <div class="chose_content">
                                <h3>Online Support 24/7</h3>
                                <p>Online support for both customers and sellers is guaranteed</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--chose us area end-->

            <!--services img area-->
            <div class="about_gallery_section mb-55">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <article class="single_gallery_section">
                            <figure>
                                <div class="gallery_thumb">
                                    <img src="../assets/img/about/about2.jpg" alt="">
                                </div>
                                <figcaption class="about_gallery_content">
                                    <h3>What do we do?</h3>
                                    <p>We offer a platform to experience and shop online for customers connecting them
                                        to legit suppliers/retailers. We this we ensure clients purchase safe-to-use
                                        quality gas products from legit certfied suppliers/retailers</p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <article class="single_gallery_section">
                            <figure>
                                <div class="gallery_thumb">
                                    <img src="../assets/img/about/about3.jpg" alt="">
                                </div>
                                <figcaption class="about_gallery_content">
                                    <h3>Our Mission</h3>
                                    <p>Offer perfect online shopping to clients </p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <article class="single_gallery_section">
                            <figure>
                                <div class="gallery_thumb">
                                    <img src="../assets/img/about/about4.jpg" alt="">
                                </div>
                                <figcaption class="about_gallery_content">
                                    <h3>History Of Us</h3>
                                    <p> Our company began as a small startup online business in Baraton a small town in
                                        the outskirts of Kapsabet 41Km fom Eldoret. It began as spear of Interest from
                                        Envious student by the Name 'JOSHUA NDUNG'U' fostering to address the challenge
                                        faced by many people when it comes to purchasing of gas products online. As a
                                        matter of course easening this process makes it a life changing endevour
                                        whereby
                                        one can check available gas products online, compare prices from various
                                        vendors, purchase and order from anywhere at anytime within his/her comfort .
                                    </p>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </div>
            </div>
            <!--services img end-->

            <!--testimonial area start-->
            <div class="faq-client-say-area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="faq-client_title">
                            <h2>What can we do for you ?</h2>
                        </div>
                        <div class="faq-style-wrap" id="faq-five">
                            <!-- Panel-default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a id="octagon" class="collapsed" role="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq-collapse1" aria-expanded="true"
                                            aria-controls="faq-collapse1"> <span class="button-faq"></span>Fast Free
                                            Delivery</a>
                                    </h5>
                                </div>
                                <div id="faq-collapse1" class="collapse show" aria-expanded="true" role="tabpanel"
                                    data-parent="#faq-five">
                                    <div class="panel-body">
                                        <p>Name and Our Location .</p>
                                        <p>Larry Energies
                                        </p>
                                        <p> Located in Baraton Chesumei Ward.</p>
                                    </div>
                                </div>
                            </div>
                            <!--// Panel-default -->

                            <!-- Panel-default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a class="collapsed" role="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq-collapse2" aria-expanded="false"
                                            aria-controls="faq-collapse2"> <span class="button-faq"></span>More Than 30
                                            Years In The Business</a>
                                    </h5>
                                </div>
                                <div id="faq-collapse2" class="collapse" aria-expanded="false" role="tabpanel"
                                    data-parent="#faq-five">
                                    <div class="panel-body">
                                        <p>We are working with vendors nad suppliers with experience in gas business
                                            for
                                            over 10 years.</p>
                                        <p>Our goal is to connect customers to legit certified gas vendors and
                                            suppliers
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--// Panel-default -->

                            <!-- Panel-default -->
                            <!--// Panel-default -->

                            <!-- Panel-default -->
                            <!--// Panel-default -->
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="testimonials-area">
                            <div class="faq-client_title">
                                <h2>What Our Customers Says ?</h2>
                            </div>
                            <div class="testimonial-two owl-carousel">
                                <div class="testimonial-wrap-two text-center">
                                    <div class="quote-container">
                                        <div class="quote-image">
                                            <img src="../assets/img/about/testimonial1.jpg" alt="">
                                        </div>
                                        <div class="testimonials-text">
                                            <p>Support and response has been amazing, helping me with several issues I
                                                came across and got them solved almost the same day. A pleasure to work
                                                with them!</p>
                                        </div>
                                        <div class="author">
                                            <h6>Kathy Young</h6>
                                            <p>CEO of SunPark</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="testimonial-wrap-two text-center">
                                    <div class="quote-container">
                                        <div class="quote-image">
                                            <img src="../assets/img/about/testimonial2.jpg" alt="">
                                        </div>
                                        <div class="testimonials-text">
                                            <p>Support and response has been amazing, helping me with several issues I
                                                came across and got them solved almost the same day. A pleasure to work
                                                with them!</p>
                                        </div>
                                        <div class="author">
                                            <h6>Kathy Young</h6>
                                            <p>CEO of SunPark</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-wrap-two text-center">
                                    <div class="quote-container">
                                        <div class="quote-image">
                                            <img src="../assets/img/about/testimonial3.jpg" alt="">
                                        </div>
                                        <div class="testimonials-text">
                                            <p>Support and response has been amazing, helping me with several issues I
                                                came across and got them solved almost the same day. A pleasure to work
                                                with them!</p>
                                        </div>
                                        <div class="author">
                                            <h6>Kathy Young</h6>
                                            <p>CEO of SunPark</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--testimonial area end-->
        </div>
    </div>
    <!--about bg area end-->

    <!--brand area start-->
    <?php
    include 'brandarea.php';
    ?>
</body>

<!--brand area end-->

<!--footer area start-->
<?php
include 'includes/footer.php';
?>
<!--footer area end-->



<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="../assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>



</body>


</html>