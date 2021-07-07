PAGE SHOP<?php get_header(); ?>

<div class="container">
<!--	--><?php //woocommerce_mini_cart();?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php woocommerce_template_loop_product_title(); ?>
<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
