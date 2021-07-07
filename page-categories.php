PAGE-CATEGORIES<?php
$sportPosts    = get_posts ( [ 'category_name' => 'sport', 'numberposts' => 3 ] );
$politicsPosts = get_posts ( [ 'category_name' => 'politics', 'numberposts' => 3 ] );
$financePosts  = get_posts ( [ 'category_name' => 'finance', 'numberposts' => 3 ] );
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
