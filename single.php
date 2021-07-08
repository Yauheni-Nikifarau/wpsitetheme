SINGLE<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php
	$categoriesArr = get_the_category();
	$categoryTitle = $categoriesArr[0]->name;
	$categoryLatestPosts = get_posts( [ 'category_name' => $categoryTitle, 'numberposts' => 5 ] );
	$categories = '';
	foreach ( $categoriesArr as $category ) {
		$categories .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';
	}
	?>
    <div class="container">
        <div class="row gtr-200">
            <div class="col-8 col-12-medium">
                <div id="content">
                    <article>
                        <h2><?php the_title(); ?></h2>
                        <?php the_post_thumbnail('full'); ?>
	                    <?php the_content(); ?>
                        <p>Author: <?php the_author(); ?></p>
                        <p>Date: <?php the_date(); ?></p>
                        <p>Categories: <?php echo $categories; ?></p>
                    </article>
                </div>
            </div>
            <div class="col-4 col-12-medium">
                <div id="sidebar">
                    <section>
                        <h3><?php echo $categoryTitle; ?></h3>
                        <?php wps_print_footer_links($categoryLatestPosts); ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; endif; ?>


<?php get_footer(); ?>
