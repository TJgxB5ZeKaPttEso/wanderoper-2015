<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wanderoper Brandenburg 2015
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<!-- this is content-page.php -->
	</header>
	<!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wanderoper-2015' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Bearbeiten', 'wanderoper-2015' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<!-- .entry-footer -->
</article><!-- #post-## -->
<?php
// the query
$post_id = (get_the_ID());
$post = get_post($post_id);
$slug = $post->post_name;
//echo $slug;

$query = new WP_Query( array( 'tag' => $slug ) );

if ( $query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php get_template_part( 'template-parts/content', 'single-repertoire' ); ?>
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php endif; ?>
