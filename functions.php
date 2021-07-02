<?php
function wps_after_setup_theme() {
	add_theme_support( 'title_tag' );
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menu( 'Header', 'Header location' );
	register_nav_menu( 'Footer', 'Footer location' );
}

add_action( 'after_setup_theme', 'wps_after_setup_theme' );


function wps_excerpt_more( $more ) {
	return '';
}

function wps_excerpt_length( $length = 20 ) {
	return 20;
}

add_filter( 'excerpt_more', 'wps_excerpt_more' );
add_filter( 'excerpt_length', 'wps_excerpt_length' );

function wps_wp_enqueue_scripts() {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_script( 'breakpoints', get_template_directory_uri() . '/js/breakpoints.min.js', [], false, true );
	wp_enqueue_script( 'browser', get_template_directory_uri() . '/js/browser.min.js', [], false, true );
	wp_enqueue_script( 'jquery.dropotron', get_template_directory_uri() . '/js/jquery.dropotron.min.js', [], false, true );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', [], false, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', [], false, true );
	wp_enqueue_script( 'util', get_template_directory_uri() . '/js/util.js', [], false, true );
}

;
add_action( 'wp_enqueue_scripts', 'wps_wp_enqueue_scripts' );

function wps_print_three_posts_in_row( $posts ) { ?>
    <div class="row">
		<?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <div class="col-4 col-12-medium">
                <section class="box feature">
                    <a href="<?php echo get_permalink(); ?>" class="image featured"><?php the_post_thumbnail(); ?></a>
                    <div class="inner">
                        <header>
                            <h2><?php the_title(); ?></h2>
                        </header>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php echo get_permalink(); ?>">Continue reading</a>
                    </div>
                </section>
            </div>
		<?php endwhile; endif; ?>
    </div>
<?php };

function wps_print_footer_links( $posts ) { ?>
    <ul class="style2">
		<?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<?php
			$title = get_the_title();
			$title = mb_strlen( $title ) > 30 ? substr( $title, 0, 27 ) . '...' : $title;
			?>
            <li><a href="<?php echo get_permalink(); ?>"><?php echo $title ?></a></li>
		<?php endwhile; endif; ?>
    </ul>
<?php };

function my_navigation_template( $template, $class ){
	return '
	<div class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</div>    
	';
};

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
