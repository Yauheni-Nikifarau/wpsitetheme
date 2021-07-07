</div>
<?php
$args = [
	'theme_location' => 'Footer',
	'menu' => 'Footer',
	'container' => 'div',
	'container_class' => 'footer_nav',
	'container_id' => 'footer_nav',
	'items_wrap' => '<ul>%3$s</ul>'
];
$sportPostsFooter    = get_posts( [ 'category_name' => 'sport', 'numberposts' => 5 ] );
$politicsPostsFooter = get_posts( [ 'category_name' => 'politics', 'numberposts' => 5 ] );
$financePostsFooter  = get_posts( [ 'category_name' => 'finance', 'numberposts' => 5 ] );
?>
<!-- Footer -->
<div id="footer-wrapper">
    <footer id="footer" class="container">
        <div class="row">
            <div class="col-3 col-6-medium col-12-small">

                <!-- Links -->
                <section class="widget links">
                    <h3>Politics</h3>
                    <?php wps_print_footer_links($politicsPostsFooter); ?>
                </section>

            </div>
            <div class="col-3 col-6-medium col-12-small">

                <!-- Links -->
                <section class="widget links">
                    <h3>Sport</h3>
	                <?php wps_print_footer_links($sportPostsFooter); ?>
                </section>

            </div>
            <div class="col-3 col-6-medium col-12-small">

                <!-- Links -->
                <section class="widget links">
                    <h3>Finance</h3>
	                <?php wps_print_footer_links($financePostsFooter); ?>
                </section>

            </div>
            <div class="col-3 col-6-medium col-12-small">
                <section class="widget links">
                    <h3>Categories</h3>
                    <?php wp_nav_menu( $args ); ?>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="copyright">
                    <ul class="menu">
                        <li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

</div>
<!-- Scripts -->
<?php wp_footer(); ?>

</body>
</html>
