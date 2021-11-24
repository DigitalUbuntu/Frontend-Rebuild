<?php /* Template Name : Page Landing */ ?>
<?php

/*
 * Template Name: page test
 */
get_header('landing');

?>
<div class="container">

    <!-- Start Kindergarten Area -->
    <div class="kindergarten-area">
        <div class="container">
            <div class="kindergarten-content">
                <div class="kindergarten-heading">
                    <h2>Master en Finance</h2>
                </div>
                <div class="kindergarten-tab-content">
                    <div class="kindergarten-left-tab-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ucao1.png" alt="Images">
                    </div>
                    <div class="kindergarten-right-content">
                        <div class="kindergarten-right-tab-heading">
                            <h2>Master en Finance</h2>
                        </div>
                        <div class="kindergarten-right-tab-button tab">
                            <button class="tablinks active" onclick="openCity(event, 'About')">A propos</button>
                            <button class="tablinks" onclick="openCity(event, 'Offers')">Offre</button>
                            <button class="tablinks" onclick="openCity(event, 'Environment')">Environnement</button>
                        </div>
                        <div class="kindergarten-right-tab-content tabcontent" id="About" style="display: block;">
                            <p>Conformément à la charte de bonne gouvernance, et aux statuts de l’UCAO/UUZ,
                                l’institution Saint Michel se propose d’être un établissement de référence, dans le
                                domaine des sciences de gestion. L’institut participe à la diffusion du savoir dans le
                                respect des traditions universitaires au profit de la communauté.</p>
                        </div>
                        <div class="kindergarten-right-tab-content tabcontent" id="Offers">
                            <p>

                                Initier les jeunes à l’auto emploi, afin qu’ils puissent participer à la création
                                d’entreprises à travers l’incubateur d’entreprise installée au sein de l’ISG Saint
                                Michel.</p>
                        </div>
                        <div class="kindergarten-right-tab-content tabcontent" id="Environment">
                            <p>Il tend à créer les conditions qui favorisent la culture du mérite et de l’excellence,
                                dans le respect de toutes les spécificités dans un environnement marqué par une gestion
                                vertueuse.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Kindergarten Area -->

    <!-- Start The Best Area -->
    <div class="the-best-area">
        <div class="container">
            <div class="the-best-content">
                <h1>

                    UCAO, UNIVERSITE DE L’EXCELLENCE</h1>
            </div>
        </div>
    </div>
    <!-- End The Best Area -->
    <!-- Start Lan Footer Area -->

    <footer class="lan-footer-area">
        <div class="lan-footer-all-content">
            <div class="lan-footer-content">
                <!-- lan footer logo content -->
                <div class="lan-footer-logo-content">
                    <div class="lan-footer-logo">
                        <a href="#"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ucao_logo_foot.png"
                                          alt="Images"></a>
                    </div>
                    <div class="lan-footer-logo-text">
                        <p>L’UCAO/UUZ, un établissement de référence dans le domaine des sciences de gestion, se redéfinit
                            pour le bénéfice de la population apprenante africaine et devient l’Université Virtuelle de
                            l’UCAO</p>
                    </div>
                </div>
                <!-- lan footer logo content -->

                <!-- lan footer same content -->
                <div class="lan-footer-same-content">
                    <div class="lan-footer-heading-text">
                        <h4>Links</h4>
                    </div>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Download</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Service</a></li>
                    </ul>
                </div>
                <!-- lan footer same content -->

                <!-- lan footer same content -->
                <div class="lan-footer-same-content">
                    <div class="lan-footer-heading-text">
                        <h4>Support</h4>
                    </div>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">How it</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Reporting</a></li>
                    </ul>
                </div>
                <!-- lan footer same content -->

                <!-- lan footer same content -->
                <div class="lan-footer-same-content">
                    <div class="lan-footer-heading-text">
                        <h4>Contact Us</h4>
                    </div>
                    <ul>
                        <li><a href="tel:+221338230840">+221338230840</a></li>
                        <li><a href="mailto:elhadji.diop@ucao.edu.sn">elhadji.diop@ucao.edu.sn</a></li>
                        <li><a href="#">17, rue Saint Michel.</a></li>
                    </ul>
                </div>
                <!-- lan footer same content -->
            </div>

            <div class="lan-footer-copyright-area">
                <div class="lan-footer-copyright-text">
                    <p>2021 - UCAO LMS propulsé par Digital Ubuntu SA. Dakar, Sénégal</p>
                </div>
                <div class="lan-footer-privecy">
                    <ul>
                        <li><a href="#">Politique de confidentialité</a></li>
                        <li><a href="#">Modalités et conditions</a></li>
                    </ul>
                </div>
                <div class="lan-footer-social">
                    <ul>
                        <li><a href="#"><i class="fas fa-envelope"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- End Lan Footer Area -->



    <!-- link js -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/script-home.js"></script>
    <script>
        // Tab JS
        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

    </script>
