<?php 
	get_header();
?>	

<section id="travaux">
		<?php 
			if(have_posts()):
				while(have_posts()):
					the_post();
		?>
		<article id="article" <?php post_class();?>>
			<hgroup>
				<h2><?php the_title();?></h2>
				<h3><?php _e('Publié le '); echo get_the_date();?></h3>
			</hgroup>
			<p><?php the_post_thumbnail('large');?></p>
			<div class="post_content"><?php the_content();?></div>
		</article>
		<?php 
				endwhile;
			endif;
		?>
</section>

<?php	
	get_footer();