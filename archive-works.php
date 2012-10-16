<?php 
	get_header();
?>	
	<hgroup>
		<h1><a href="<?php bloginfo('wpurl');?>"><?php bloginfo('name');?></a></h1>
		<h2><?php bloginfo('description');?></h2>
	</hgroup>
	
	<div><p>Test voici le test de machin</p></div>
	
	<section id="content">
		<?php 
			$args = array('post_type' => 'works', 'posts_per_page' => 10);
			$loop = new WP_query($args);
		
			if($loop->have_posts()):
				while($loop->have_posts()):
					$loop->the_post();
		?>
		<article <?php post_class();?>>
			<hgroup>
				<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				<h3><?php _e('Publié le '); echo get_the_date();?></h3>
			</hgroup>
			<p><?php the_post_thumbnail('medium');?></p>
			<div class="post_content"><?php the_content();?></div>
		</article>
		<?php 
				endwhile;
			endif;
		?>
	</section>
	<section>
		<?php
			get_sidebar('primary');
			get_sidebar('secondary');
		?>
	</section>
<?php	
	get_footer();