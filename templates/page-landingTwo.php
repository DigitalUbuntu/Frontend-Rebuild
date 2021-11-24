<?php /* Template Name : Page Landing */ ?>
<?php

/*
 * Template Name: page test
 */
get_header('landing');

?>
<div class="container">


    <!-- Start Group School Area -->
    <div class="group-school-area">
        <div class="container">
            <div class="group-school-content">
                <div class="group-school-left-content">
                    <h2 class="title-ucao">UNIVERSITE VIRTUELLE DE L'UCAO</h2>
                    <p>L’UCAO/UUZ, un établissement de référence dans le domaine des sciences de gestion, se redéfinit
                        pour le bénéfice de la population apprenante africaine et devient l’Université Virtuelle de
                        l’UCAO</p>
                    <button>Commencer</button>
                </div>
                <div class="group-school-right-content">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/g_school.png" alt="Images">
                </div>
            </div>
        </div>
    </div>
    <!-- End Group School Area -->

    <!-- Start Larners Area -->
    <div class="larners-area">
        <div class="container">
            <div class="larners-content">
                <div class="larners-left-contents">
                    <div class="larners-left-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/larners.png" alt="Images">
                    </div>
                </div>
                <div class="larners-right-contents">
                    <div class="larners-right-heading">
                        <h2 class="title-ucao">Etudiants</h2>
                    </div>
                    <div class="larners-right-content">
                        <!-- single larners content -->
                        <div class="single-larners-content">
                            <div class="single-larners-left-content">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/d_pic.png"
                                     alt="Images">
                            </div>
                            <div class="single-larners-right-content">
                                <h5>
                                    Retrouvez tous vos cours et contenus en ligne</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus
                                    enim,
                                    massa aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla
                                    elementum </p>
                            </div>
                        </div>
                        <!-- single larners content -->

                        <!-- single larners content -->
                        <div class="single-larners-content">
                            <div class="single-larners-left-content">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/v_pic.png"
                                     alt="Images">
                            </div>
                            <div class="single-larners-right-content">
                                <h5>Étudier dans une classe virtuelle immersive</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus
                                    enim,
                                    massa aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla
                                    elementum </p>
                            </div>
                        </div>
                        <!-- single larners content -->

                        <!-- single larners content -->
                        <div class="single-larners-content">
                            <div class="single-larners-left-content">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/m_pic.png"
                                     alt="Images">
                            </div>
                            <div class="single-larners-right-content">
                                <h5>Interagissez avec vos professeurs
                                    et camarades de classe</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus
                                    enim,
                                    massa aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla
                                    elementum </p>
                            </div>
                        </div>
                        <!-- single larners content -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Larners Area -->

    <!-- Start Parents Area -->
    <div class="parents-area">
        <div class="container">
            <div class="parents-content">
                <div class="parents-left-content">
                    <div class="parents-heading">
                        <h2 class="title-ucao">Parents</h2>
                    </div>
                    <div class="parents-tab-button tab">
                        <button class="tablinks active" onclick="openCity(event, 'Track')">Track</button>
                        <button class="tablinks" onclick="openCity(event, 'Chat')">Chat</button>
                        <button class="tablinks" onclick="openCity(event, 'Activities')">Activities</button>
                    </div>
                    <div class="kindergarten-right-tab-content tabcontent" id="Track" style="display: block;">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus enim, massa
                            aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla elementum

                        </p>
                    </div>
                    <div class="kindergarten-right-tab-content tabcontent" id="Chat">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus enim, massa
                            aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla elementum

                        </p>
                    </div>
                    <div class="kindergarten-right-tab-content tabcontent" id="Activities">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus enim, massa
                            aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla elementum

                        </p>
                    </div>
                </div>
                <div class="parents-right-content">
                    <div class="parents-right-image">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/parents_main.png"
                             alt="Images">
                        <div class="child-image">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/child.png"
                                 alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Parents Area -->

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
    <script src="assets/js/script.js"></script>
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

</div>
