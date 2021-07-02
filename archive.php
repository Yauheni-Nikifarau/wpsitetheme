<?php get_header(); ?>
<?php $arhive_title = preg_replace( '~^[^:]+: ~', '', get_the_archive_title() ); ?>
<div class="container">
    <h1 class="category-title"><?php echo $arhive_title; ?></h1>
    <div class="row">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <div class="col-4 col-12-medium">
                    <section class="box feature">
                        <a href="<?php echo get_permalink(); ?>"
                           class="image featured"><?php the_post_thumbnail(); ?></a>
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
    <?php the_posts_pagination(); ?>
<?php get_footer(); ?>