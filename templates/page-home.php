<?php /* Template Name : Page Home */ ?>
<?php

/*
 * Template Name: page test
 */
get_header('landing');

?>

<!-- Start Raira Group Area  -->
<div class="raira-group-area">
    <div class="container">
        <div class="raira-group-content">
            <div class="raira-group-heading">
                <h2 class="title-ucao">UNIVERSITE VIRTUELLE DE L'UCAO</h2>
                <p>L’UCAO/UUZ, un établissement de référence dans le domaine des sciences de gestion, se redéfinit
                    pour le bénéfice de la population apprenante africaine et devient l’Université Virtuelle de
                    l’UCAO</p>
            </div>
            <div class="raira-group-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about.png" alt="Images">
            </div>
        </div>
    </div>
</div>
<!-- End Raira Group Area  -->

<!-- Start Description Area -->
<div class="description-area">
    <div class="container">
        <div class="description-content">

            <!-- single description content -->
            <div class="single-description-content">
                <div class="single-description-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/d_pic.png" alt="Images">
                </div>
                <div class="single-description-text">
                    <h4>Description</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus enim, massa
                        aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla elementum

                    </p>
                </div>
            </div>
            <!-- single description content -->

            <!-- single description content -->
            <div class="single-description-content">
                <div class="single-description-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/m_pic.png" alt="Images">
                </div>
                <div class="single-description-text">
                    <h4>Mission</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus enim, massa
                        aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla elementum

                    </p>
                </div>
            </div>
            <!-- single description content -->

            <!-- single description content -->
            <div class="single-description-content">
                <div class="single-description-image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/v_pic.png" alt="Images">
                </div>
                <div class="single-description-text">
                    <h4>Vision</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus enim, massa
                        aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla elementum

                        .</p>
                </div>
            </div>
            <!-- single description content -->

        </div>
    </div>
</div>
<!-- End Description Area -->

<!-- Start Raira School Area -->
<div class="raira-school-area">
    <div class="container">
        <div class="raira-school-content">
            <div class="raira-school-left-content">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/raira_school.png" alt="Images">
            </div>
            <div class="raira-school-right-content">
                <div class="raira-school-right-heading">
                    <h3>UCAO</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus enim, massa
                        aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla elementum

                        .</p>
                </div>
                <div class="raira-school-tab-system">
                    <div class="kindergarten-right-tab-button tab">
                        <button class="tablinks active" onclick="openCity(event, 'Description')">Description</button>
                        <button class="tablinks" onclick="openCity(event, 'Mission')">Mission</button>
                        <button class="tablinks" onclick="openCity(event, 'Vision')">Vision</button>
                    </div>
                    <div class="kindergarten-right-tab-content tabcontent" id="Description" style="display: block;">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus enim, massa
                            aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla elementum

                        </p>
                    </div>
                    <div class="kindergarten-right-tab-content tabcontent" id="Mission">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus enim, massa
                            aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla elementum

                        </p>
                    </div>
                    <div class="kindergarten-right-tab-content tabcontent" id="Vision">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam sed cursus enim, massa
                            aliquam. Urna morbi ipsum eget sagittis, elit fermentum. Sed in fringilla elementum

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Raira School Area -->

<!-- Start Send Message Area -->
<div class="send-message-area">
    <div class="container">
        <div class="send-message-content">
            <div class="send-message-heading-content">
                <h2 class="title-ucao">Envoyez-nous un message</h2>
                <p>Si vous avez d'autres questions à nous poser, n'hésitez pas à le faire. Nous sommes toujours prêts
                    à répondre à votre question.</p>
            </div>
            <div class="send-message-form">
                <form action="">
                    <!-- single form item -->
                    <div class="single-form-item">
                        <label for="y_name">Surnom</label>
                        <input type="text" id="y_name">
                    </div>
                    <!-- single form item -->

                    <!-- single form item -->
                    <div class="single-form-item">
                        <div class="double-single-input">
                            <div class="single-input">
                                <label for="f_name">Prénom</label>
                                <input type="text" id="f_name">
                            </div>
                            <div class="single-input">
                                <label for="l_name">Nom</label>
                                <input type="text" id="l_name">
                            </div>
                        </div>
                    </div>
                    <!-- single form item -->

                    <!-- single form item -->
                    <div class="single-form-item">
                        <label for="email">Entrer votre email</label>
                        <input type="email" id="email">
                    </div>
                    <!-- single form item -->

                    <!-- single form item -->
                    <div class="single-form-item">
                        <label for="phone">Téléphone Mobile</label>
                        <input type="text" id="phone">
                    </div>
                    <!-- single form item -->

                    <!-- single form item -->
                    <div class="single-form-item">
                        <div class="checkbox-form-item">
                            <div class="checkbox-form-heading">
                                <h4>Quels sont vos besoins ?</h4>
                            </div>
                            <div class="checkbox-form-input">
                                <div class="single-checkbox-form-input">
                                    <input type="checkbox" id="one">
                                    <label for="one">Informations générales</label>
                                </div>
                                <div class="single-checkbox-form-input">
                                    <input type="checkbox" id="two">
                                    <label for="two">Solutions</label>
                                </div>
                                <div class="single-checkbox-form-input">
                                    <input type="checkbox" id="three">
                                    <label for="three">Modalités et conditions</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single form item -->

                    <!-- single form item -->
                    <div class="single-form-item">
                        <label for="message">Message</label>
                        <textarea id="message"></textarea>
                    </div>
                    <!-- single form item -->

                    <!-- single form submit button -->
                    <div class="single-form-submit-button">
                        <input type="submit" value="Envoyer un Message">
                    </div>
                    <!-- single form submit button -->


                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Send Message Area -->

<!-- Start The Best Area -->
<div class="the-best-area">
    <div class="container">
        <div class="the-best-content">
            <h1>UCAO, UNIVERSITE DE L’EXCELLENCE</h1>
        </div>
    </div>
</div>
<!-- End The Best Area -->


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


