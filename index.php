<?php 
	get_header(); 
?>
	<div class="bg" id="bg-slider">
		<?php art_index_background(); ?>
	</div>
	
	<div class="cover">
		<hgroup class="cell">
			<div class="cover-content w60">
				<h1 class="index-center-text an-movetop"><?php echo get_option('index_center_text'); ?></h1>
				<h3 class="an-show"><?php echo stripslashes(get_option( 'index_small_text' )); ?></h3>
			</div>
		</hgroup>
	</div>
	
	<div class="index-bg-explain"><?php art_index_description(); ?></div>

<?php 
	if( is_home() ){
		echo '</main>';
	}
	
	if ( get_option( 'index_message_box') ){ ?>
		<section class="skill-wrap" id="position-sidebar">
			<h1 class="aligncenter"><?php echo strip_tags( get_option('index_mb_title') ); ?></h1>
			<div class="w60 skill-content">
				<span class="skill"><?php echo index_skills_content('a'); ?></span>
				<span class="skill"><?php echo index_skills_content('b'); ?></span>
				<span class="skill"><?php echo index_skills_content('c'); ?></span>
				<span class="skill"><?php echo index_skills_content('d'); ?></span>
			</div>
		</section>
	<?php } //endif; index_message_box 
	
	if( get_option( 'index_about_toggle' ) ){?>
		<section class="about-wrap">
			<?php 
				echo '<h1>' . get_option( 'index_about_title' ) . '</h1>' ; 
			?>
			<div class="about w60">
				<?php echo stripslashes( get_option( 'index_about_meta' ) ); ?>
			</div>
		</section>
	<?php }
	
	if( get_option( 'post_index_toggle' ) ){ ?>
		<section class="sticky-wrap">
			<h1><?php echo get_option('post_index_title'); ?></h1>
			<div class="sticky w60">
				<?php index_sticky_post(); ?>
			</div>
		</section>
	<?php } ?>
	
<?php
	get_footer();
?>