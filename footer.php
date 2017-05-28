<?php 
	if(!is_home()){
		echo '</main>'; 
	} 

		if( get_option('site_footbar_toggle') ){ ?>
			<section class="widget-wrap clear">
				<div class="wid-content w60">
					<?php if( !dynamic_sidebar( 'site_footbar' ) ); ?>
				</div>
			</section>
<?php } ?>


		<footer>
			<?php 
				wp_nav_menu( array(
					'theme_location' => 'footermenu',
					'menu_class' => 'flink'
				)); 
			?>
			<div class="ftxt">
				<?php 
					echo stripslashes( get_option( 'footer_copyright_text') ); 
				?>
			</div>
		</footer>
		
		
		<div class="short-cut">
			<ul>
				<li class="backtotop"><span>回到顶部</span><i class="fa fa-arrow-up" aria-hidden="true"></i></li>
				<?php 
					if( !is_home() ) { 
						if( get_option( 'show_left_sidebar' ) ){
							echo '<li class="left-sidebar-toggle"><span>打开左栏</span><i class="fa fa-arrow-right" aria-hidden="true"></i></li>';
						}
						if( get_option( 'show_right_sidebar' ) ){
							echo '<li class="right-sidebar-toggle"><span>打开右栏</span><i class="fa fa-arrow-left" aria-hidden="true"></i></li>';
						}
					} 
				 ?>
			</ul>
		</div>

	<div class="search-screen">
		<div class="close pull-right"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="search-content">
			<?php get_search_form(); ?>
		</div>
		<div class="setag w60 margincenter">
			<h3>为您推荐以下内容：</h3>
			<?php 
				echo '<span class="btn white">';
				wp_tag_cloud( 'smallest=0.9&largest=0.9&unit=rem&number=20&orderby=count&order=DESC&separator=</span><span class="btn white">' ); 
				echo '</span>';
			?>
			<a href="/tag" target="_blank">更多&raquo;</a>
		</div>
	</div>
	
	<div class="thumb-cover">
		<a href="" id="thumb-border"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
	</div>
	
	<?php wp_footer(); ?>
	
</body>
</html>