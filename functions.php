<?php

function wps_after_setup_theme()
{
    add_theme_support('title_tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');

    register_nav_menu('Header', 'Header location');
    register_nav_menu('Footer', 'Footer location');
}

add_action('after_setup_theme', 'wps_after_setup_theme');

add_action(
    'template_redirect',
    function () {
        if (is_attachment()) {
            wp_redirect('/404');
        }
    }
);
function wps_excerpt_more($more)
{
    return '';
}

function wps_excerpt_length($length = 20)
{
    return 20;
}

add_filter('excerpt_more', 'wps_excerpt_more');
add_filter('excerpt_length', 'wps_excerpt_length');

function wps_wp_enqueue_scripts()
{
    wp_enqueue_style('main', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_script('breakpoints', get_template_directory_uri() . '/js/breakpoints.min.js', [], false, true);
    wp_enqueue_script('browser', get_template_directory_uri() . '/js/browser.min.js', [], false, true);
    wp_enqueue_script(
        'jquery.dropotron',
        get_template_directory_uri() . '/js/jquery.dropotron.min.js',
        [],
        false,
        true
    );
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', [], false, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', [], false, true);
    wp_enqueue_script('util', get_template_directory_uri() . '/js/util.js', [], false, true);
    wp_enqueue_script('add-to-cart', get_template_directory_uri() . '/js/add-to-cart.js', [], false, true);
}

add_action('wp_enqueue_scripts', 'wps_wp_enqueue_scripts');

function wps_print_three_posts_in_row($posts)
{ ?>
    <div class="row">
        <?php foreach ($posts as $post) : ?>
            <div class="col-4 col-12-medium">
                <section class="box feature">
                    <a href="<?php
                    echo get_permalink($post); ?>" class="image featured"><?php
                        echo get_the_post_thumbnail($post); ?></a>
                    <div class="inner">
                        <header>
                            <h2><?php
                                echo get_the_title($post); ?></h2>
                        </header>
                        <p><?php
                            echo get_the_excerpt($post); ?></p>
                        <a href="<?php
                        echo get_permalink($post); ?>">Continue reading</a>
                    </div>
                </section>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}

function wps_print_footer_links($posts)
{ ?>
    <ul class="style2">
        <?php foreach ($posts as $post) : ?>
            <?php
            $title = get_the_title($post);
            $title = mb_strlen($title) > 30 ? substr($title, 0, 27) . '...' : $title;
            ?>
            <li><a href="<?php
                echo get_permalink($post); ?>"><?php
                    echo $title ?></a></li>
        <?php endforeach; ?>
    </ul>
    <?php
}


function my_navigation_template($template, $class)
{
    return '
	<div class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</div>    
	';
}


add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);


function prent($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}


add_filter('loop_shop_columns', function () { return 3; });

add_filter( 'loop_shop_per_page', function ($cols) { return 9; } );

function wps_save_feedback($contact_form)
{
    $submission = WPCF7_Submission::get_instance();
    if ( ! $submission) {
        return;
    }
    $posted_data   = $submission->get_posted_data();
    $feedback_data = [
        'post_content' => $posted_data['textarea-215'],
        'post_type'    => 'feedbacks',
        'post_title'   => $posted_data['text-422'],
    ];
    $feedback_id   = wp_insert_post($feedback_data, true);
    update_post_meta($feedback_id, 'author_name', $posted_data['text-422']);
    update_post_meta($feedback_id, 'author_email', $posted_data['email-180']);

    return;
}

add_action('wpcf7_before_send_mail', 'wps_save_feedback');

function woocommerce_custom_template_loop_product_link_open() {
    global $product;

    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

    echo '<a href="' . esc_url( $link ) . '" class="image featured woocommerce-LoopProduct-link woocommerce-loop-product__link">';
}
add_image_size('cart-thumb', 40, 40);


function mode_theme_update_mini_cart() {
    echo wc_get_template( './woocommerce/cart/mini-cart.php' );
    die();
}
add_filter( 'wp_ajax_nopriv_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart' );
add_filter( 'wp_ajax_mode_theme_update_mini_cart', 'mode_theme_update_mini_cart' );

