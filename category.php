<?php 
	get_header();
?>
	<article class="content">
		<div class="cat-description description-bg"><span class="aligncenter w60"><?php breadcrumb_output(); ?></span></div>
		<?php 
			if( get_option( 'show_left_sidebar' ) ){
				get_sidebar('left');
			}
			if( get_option( 'show_right_sidebar' ) ){
				get_sidebar('right');
			} 
		?>
		<section id="content" class="container <?php had_sidebar_class(); ?>">
		<?php if (have_posts()): while (have_posts()): the_post(); ?>
			<div class="post-list an-movetop" id="ajaxloader">
				<div class="post-box w60">
					<h1>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						<span class="meta-list ff"><?php 
							if(get_post_images_number() > 1){
								echo '<i class="fa fa-file-image-o" aria-hidden="true"></i> ' . get_post_images_number();
							} ?>
						</span>
					</h1>
					<?php the_tags('<div class="cat-tags"><label>Tags</label>', '', '</div>'); ?>
					<?php 
						//文章形式：相册 （有过更改，之前此项为文章形式：图像）
						if(has_post_format('gallery')){ ?>
							<div class="image-box">
								<a class="image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php 
									get_art_thumb( $art_id, 450, 300, 'thumb', 4);
									?>
								</a>
							</div>
							<div class="image-excerpt">
								<?php 
									$art_excerpt = $post -> post_excerpt ;
									if(!empty($art_excerpt)){
										echo wp_trim_words(strip_shortcodes(get_the_excerpt() ), 180, '...'); 
									} else {
										echo wp_trim_words(strip_shortcodes(get_the_content() ), 180, '...');
									}?>
							</div>
					<?php 
						//文章形式：日志
						} elseif(has_post_format('aside')) {?>
							<div class="aside-excerpt" open-status="false">
								<div class="scroll-height">
								<?php 
									the_content();
								?>
								</div>
								<div class="opacity"></div>
							</div>
							<div class="more-link"><a title="展开全文" class="open">+ 展开全文</a></div>
					<?php 
						//文章形式：图像（有过更改，之前此项为文章形式：相册）
						} elseif(has_post_format('image')) { ?>
							<div class="gallery-box">
								<a class="gallery" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php 
										if( get_post_images_number() < 3){
											get_art_thumb( $art_id, 600, 360, 'gallery-thumb w1', 2, 1);
										} elseif( get_post_images_number() >= 3 && get_post_images_number() < 5 ) {
											get_art_thumb( $art_id, 600, 360, 'gallery-thumb w1', 1, 1);
											get_art_thumb( $art_id, 282, 346, 'gallery-thumb w2', 2, 2);
										} elseif( get_post_images_number() >= 5 ) {
											get_art_thumb( $art_id, 600, 360, 'gallery-thumb w1', 1, 1);
											get_art_thumb( $art_id, 282, 169, 'gallery-thumb w2', 4, 2);
										}
									?>
								</a>
							</div>
					<?php 
						//文章形式：标准
						}else{ ?>					
							<div class="stan-box">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php get_art_thumb($art_id, 600, 280,'stan-thumb'); ?>
								</a>
								<div class="excerpt">
									<?php 
										if(!empty($art_excerpt)){
											echo wp_trim_words(strip_shortcodes(get_the_excerpt() ), 180, '...'); 
										} else {
											echo wp_trim_words(strip_shortcodes(get_the_content() ), 180, '...');
										}?>
								</div>
							</div>
					<?php 
						} //end for if(has_post_format('image')) 
					?>
					<div class="meta clear">
						<?php 
							//日期
							echo '<span class="meta-list"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> ';
							echo '<a href="/'. get_the_date('Y') . '/' . get_the_date('m') .'/" title="全部'; 
							echo get_the_date('Y年m月').'发表的文章">';
							echo get_the_date('Y . m').'</a></span>';
							//评论
							echo '<span class="meta-list"><i class="fa fa-comments-o" aria-hidden="true"></i> ';
							echo comments_popup_link('抢沙发（0评论）', '抢板凳（1评论）', '凑热闹（%评论）');
							echo '</span>';
							//浏览
							echo '<span class="meta-list"><i class="fa fa-eye" aria-hidden="true"></i> ';
							echo art_post_views('浏览', '次');
							echo '</span>';
							//进入
							echo '<span class="meta-list"><i class="fa fa-file-text-o" aria-hidden="true"></i> ';
							echo '<a href="'.get_the_permalink().'" title="'.get_the_title().'">阅读全文</a></span>';
						?>
					</div>
				</div><!-- post-box -->
			</div><!-- post-list -->
			<?php endwhile; ?>
		</section>
		<?php else: ?>
				<center><h2>还没有发布任何内容!</h2></center>
		<?php endif; ?>
	</article>
	<div id="pagin" class="ff"><?php next_posts_link('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i> 加载中...'); ?></div>
<?php 
	get_footer();
?>