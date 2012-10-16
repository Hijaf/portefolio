<h2><?php _e('Commentaires');?></h2>
<?php 
	if(have_comments()):
		while(have_comments()):
			the_comment();
?>

	<article <?php comment_class();?>>
				<?php 	comment_text();
						_e('Auteur: '); comment_author();
				?>
	</article>
<?php 	endwhile;
	endif;
	
	
	comment_form();
?>


	