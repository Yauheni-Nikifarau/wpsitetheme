ARCHIVE-PRODUCT<?php
get_header(); ?>

<div class="container">
    <div class="row">
        <?php
        if (have_posts()) : ?>
            <?php
            while (have_posts()) : the_post(); ?>
                <div class="col-4 col-12-medium">
                    <section class="box feature">
                        <?php
                        woocommerce_custom_template_loop_product_link_open(); ?>
                        <?php woocommerce_template_loop_product_thumbnail(); ?>
                        <?php
                        woocommerce_template_loop_product_link_close(); ?>
                        <div class="inner">
                            <header>
                                <h2><?php
                                    woocommerce_template_loop_product_title(); ?></h2>
                            </header>
                            <p><?php
                                woocommerce_template_loop_price(); ?></p>
                            <?php
                            woocommerce_template_loop_add_to_cart(); ?>
                        </div>
                    </section>
                </div>
            <?php
            endwhile; endif; ?>
    </div>
    <?php
    the_posts_pagination(); ?>
</div>
<?php
get_footer(); ?>
