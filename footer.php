<?php $theme_option = get_option('theme_option');
if (isset($theme_option['footer_logo']['url'])){
    $footer_logo = $theme_option['footer_logo']['url'];
}
$footer_sublogo = $theme_option['footer_sublogo'];
$footer_address = $theme_option['footer_address'];
$footer_phone = $theme_option['footer_phone'];
$footer_email = $theme_option['footer_email'];
$footer_twitter = $theme_option['footer_twitter'];
$footer_facebook = $theme_option['footer_facebook'];
$footer_instagram = $theme_option['footer_instagram'];
$footer_linkedin = $theme_option['footer_linkedin'];
$footer_term = $theme_option['footer_term'];
$footer_policy = $theme_option['footer_policy'];
$mobile = wp_is_mobile(); ?>

<footer class="footer">
    <section class="footer-top">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-lg-ct-2 col-sm-6 footer-column footer-item">
                    <h4 onclick="myFunction(0)" class="heading-footer">COLLECTIONS 01 <i class="fa-solid fa-plus"></i></h4>
                    <div id="nav-content-footer" class="nav-content-list">
                        <ul class="menu-footer hover-list-style2">
                            <li class="item"><a href="#">Muse</a></li>
                            <li class="item"><a href="#">Torsos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-ct-2 col-sm-6 footer-column footer-item">
                    <h4 onclick="myFunction(1)" class="heading-footer">SPORT <i class="fa-solid fa-plus"></i></h4>
                    <div id="nav-content-footer" class="nav-content-list">
                        <ul class="menu-footer hover-list-style2">
                            <li class="item"><a href="#">Sport</a></li>
                            <li class="item"><a href="#">Tailored</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-ct-2 col-sm-6 footer-column footer-item">
                    <h4 onclick="myFunction(2)" class="heading-footer">GET INSPIRED! <i class="fa-solid fa-plus"></i></h4>
                    <div id="nav-content-footer" class="nav-content-list">
                        <ul class="menu-footer hover-list-style2">
                            <li class="item"><a href="#">Magazines</a></li>
                            <li class="item"><a href="#">Videos</a></li>
                            <li class="item"><a href="#">Newsletter</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-ct-2 col-sm-6 footer-column footer-item">
                    <h4 onclick="myFunction(3)" class="heading-footer">MADE 2 MEASURE <i class="fa-solid fa-plus"></i></h4>
                    <div id="nav-content-footer" class="nav-content-list">
                        <ul class="menu-footer hover-list-style2">
                            <li class="item"><a href="#">How we work</a></li>
                            <li class="item"><a href="#">Sustainability</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-ct-2 col-sm-6 footer-column">
                    <h4 class="heading-footer">CONTACT US</h4>
                    <ul class="menu-footer hover-list-style2">
                        <li class="item"><a href="tel:31103163200">+31 10 316 3200</a></li>
                        <li class="item"><a href="mailto:info@hansboodt.com">info@hansboodt.com</a></li>
                    </ul>
                </div>
            </div>
    </section>

    <section class="footer-midle">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-left">
                    <ul class="item-list-menu d-flex align-center hover-list-style2">
                        <li class="item"><a href="#">Home</a></li>
                        <li class="item"><a href="#">Colections</a></li>
                        <li class="item"><a href="#">Showrooms</a></li>
                        <li class="item"><a href="#">About us</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-4 col-right">
                    <ul class="item-list-icon d-flex align-center">
                        <li class="item"><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="item"><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="item"><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="footer-bottom">
        <div class="container-fluidd">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-left">
                    <ul class="item-link-hozi d-flex align-center hover-list-style2">
                        <li class="item"><a href="#">Jobs</a></li>
                        <li class="item"><a href="#">Disclaimer</a></li>
                        <li class="item"><a href="#">Terms and Conditions</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-6 col-right">
                    <p>© HANS BOODT MANNEQUINS 2024</p>
                </div>
            </div>
        </div>
    </section>
</footer>
</body>
</html>