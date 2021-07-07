FRONT<?php $posts = new WP_Query( [ 'posts_per_page' => 3 ] ); ?>
<?php get_header(); ?>
<div class="container">
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
</div>
<?php get_footer(); ?>