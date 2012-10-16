<?php 
	get_header();
?>

<section id="accueil">
<?php
	$page_id = 24;
	$page_data[0] = get_page($page_id);
?>
    <h1> <?php echo($page_data[0]->post_title);?></h1>
    <p>
        <?php echo($page_data[0]->post_content);?> 
    </p>
</section>
<section id="travaux">
<?php
	$page_id = 26;
	$page_data[1] = get_page($page_id);
?>
    <h1> <?php echo($page_data[1]->post_title);?></h1>
	<ul>
		<?php 
			$args = array('post_type' => 'works', 'posts_per_page' => 4, 'orderby'=>'date');
			$loop = new WP_query($args);
			
			if($loop->have_posts()):
				while($loop->have_posts()):
					$loop->the_post();
		?>
		<li class="colonne <?php post_class();?>">
			<dl>
				<dt><a href="<?php the_permalink();?>" title="vers <?php the_title();?>"><?php the_title();?></a></dt>
				<dd><a href="<?php the_permalink();?>" title="vers <?php the_title();?>"><?php the_post_thumbnail('thumbnail');?></a></dd>
			</dl>
		</li>
		<?php 
				endwhile;
			endif;
		?>
	</ul>
</section>
<section id="propos">
    <?php
	$page_id = 28;
	$page_data[2] = get_page($page_id);
	echo($page_data[2]->post_content);
	
	/*code compétences*/
	?>
	<section>
		<h1>Compétences</h1>
		<ul >
			<?php 
				$args = array('post_type' => 'skills', 'posts_per_page' => -1, 'order'=>'ASC');
				$loop = new WP_query($args);
				
				if($loop->have_posts()):
					while($loop->have_posts()):
						$loop->the_post();
			?>
			<li class="colonne <?php post_class();?>">
				<?php the_title(); the_post_thumbnail('medium');?>
			</li>
			<?php 
					endwhile;
				endif;
			?>
		</ul>
	</section>
</section>
<?php wp_footer();?>
	<section id="contact">
		<?php
			$page_id = 30;
			$page_data[3] = get_page($page_id);
		?>
			<div id="conteneur">
				<h1><?php echo($page_data[3]->post_title);?></h1>
				<div id="largeur">
					<?php echo($page_data[3]->post_content);?>
				</div>
				<form action="#">
					<p>
					<label for="nom">Nom&thinsp;:</label>
					<input type="text" id="nom" name="nom"/>
					</p>
					<p>
					<label for="email">Email&thinsp;:</label>
					<input type="text" id="email" name="email"/>
					</p>
					<p>
					<label for="msg" id="message">Message&thinsp;:</label>
					<textarea id="msg" name="msg"></textarea>
					<input type="submit" value="Envoyer" id="submit"/>
					</p>
				</form>
			</div>
	</section>
	<?php	
		get_footer();