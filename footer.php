<?php $theme_option = get_option('theme_option');
if (isset($theme_option['footer_logo']['url'])){
    $footer_logo = $theme_option['footer_logo']['url'];
}
$footer_menu = $theme_option['footer_menu'];
$footer_menu_arr = explode("\n", trim($footer_menu));

$mobile = wp_is_mobile(); ?>

<footer class="footer">
    <section class="footer-top">
        <div class="container-fluidd">
            <div class="row">
                <?php if (!empty($footer_menu_arr)){
                    $t = 1;
                    foreach ($footer_menu_arr as $menus){
                        $i = 1;
                        $menu = explode('|',$menus);
                        $count = count($menu);
                        ?>
                        <div class="col-lg-ct-2 col-sm-6 footer-column footer-item">
                            <h4 onclick="myFunction(<?= $t ?>)" class="heading-footer"><?= $menu[0] ?> <i class="fa-solid fa-plus"></i></h4>
                            <div id="nav-content-footer" class="nav-content-list">
                                <ul class="menu-footer hover-list-style2">
                                    <?php
                                    for ($i = 1; $i < $count;$i++){
                                        if (strpos($menu[$i],'::') !== false){
                                            $menu2 = explode('::',$menu[$i]); ?>
                                            <li class="item"><a href="<?= $menu2[1] ?>"><?= $menu2[0] ?></a></li>
                                        <?php
                                            }else{ ?>
                                            <li class="item"><a href="#"><?= $menu[$i] ?></a></li>
                                        <?php }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <?php $t++; }
                } ?>

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
                        <li class="item"><a href="#">© NAM SAN COPYRIGHT 2024</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</footer>
</body>
</html>