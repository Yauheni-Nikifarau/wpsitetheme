GUEST<?php

$notes = get_posts(['post_type' => 'feedbacks']);

get_header(); ?>
    <div class="container">
        <h1>Guest Book</h1>
        <?php
        if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
            the_content(); ?>
        <?php
        endwhile; endif; ?>

        <?php
        foreach ($notes as $note) : ?>
            <?php

            $meta = get_post_meta($note->ID);?>
            <div class="box feature" style="margin: 20px 0">
                <?php
                if (isset($meta['author_name'])) : ?>
                    <p>Name: <?php
                        echo $meta['author_name'][0]; ?></p>
                <?php
                endif; ?>
                    <p>Text: <?php echo $note->post_content;?></p>
            </div>
        <?php
        endforeach; ?>
    </div>

<?php
get_footer(); ?>