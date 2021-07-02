<?php
$sportPosts    = new WP_Query( [ 'category_name' => 'sport', 'posts_per_page' => 3 ] );
$politicsPosts = new WP_Query( [ 'category_name' => 'politics', 'posts_per_page' => 3 ] );
$financePosts  = new WP_Query( [ 'category_name' => 'finance', 'posts_per_page' => 3 ] );
?>
<?php get_header(); ?>
<div class="container">
    <h1 class="category-title"><a href="/category/finance">Finance</a></h1>
	<?php wps_print_three_posts_in_row( $financePosts ); ?>
</div>
<div class="container">
    <h1 class="category-title"><a href="/category/politics">Politics</a></h1>
	<?php wps_print_three_posts_in_row( $politicsPosts ); ?>
</div>
<div class="container">
    <h1 class="category-title"><a href="/category/sport">Sport</a></h1>
	<?php wps_print_three_posts_in_row( $sportPosts ); ?>
</div>
<?php get_footer(); ?>
