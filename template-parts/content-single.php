<!--this is content-single.php-->

<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wanderoper Brandenburg 2015
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if (has_post_thumbnail()) {
        echo '<div class="single-post-thumbnail clear">';
        echo the_post_thumbnail('index-thumb');
        echo '</div>';
    }
    ?>
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

        <div class="entry-meta">
            <?php wanderoper_2015_posted_on(); ?>
        </div>
        <!-- .entry-meta -->
    </header>
    <!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'wanderoper-2015'),
            'after' => '</div>',
        ));
        ?>
    </div>
    <!-- .entry-content -->

<!--    <footer class="entry-footer">
        <?php /*wanderoper_2015_entry_footer(); */?>
    </footer>
-->    <!-- .entry-footer -->
</article><!-- #post-## -->

