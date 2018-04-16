<?php 
get_header('home');
?>
<main>
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		// Post Content here
		
		?>
		<article>
		<h2 class="heading"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

		<div class="exerpt">
			<?= the_excerpt();?>
				<a class="readmore" href="<?= the_permalink(); ?>">Läs mer</a>
			<?php 
			?>
		</div>
		<?php the_post_thumbnail('wallsize'); ?>
		<footer>
			<?php the_author_link(); the_date( '', ' ', '', true ); ?>
		</footer>
		</article>
		<?php
	} // end while
} // end if
?>
</main>
<?php
get_footer();
?>