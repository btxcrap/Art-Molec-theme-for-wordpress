<?php
	get_header();
	while(have_posts()): the_post();
	?>
	<article class="article">
		<header class="article-header description-bg">
			<h1><?php the_title(); ?></h1>
			<div class="article-description w60">
				<?php 
					echo '<span class="meta-list">发布于 '.get_the_date('Y年m月').'</span>';
					echo '<span class="meta-list"><i class="fa fa-tags" aria-hidden="true"></i> ';
					if( !empty( get_the_tags() ) ) { the_tags('标签：<span class="art-tag">' , ' , ' , '</span>'); } 
					else { echo '没有标签'; }
					echo '</span>';
					echo '<span class="meta-list">';
					echo art_post_views('<i class="fa fa-eye" aria-hidden="true"></i> 本文被浏览', '次') . '</span>';
				?>
			</div>
		</header>
		<?php 
			if( get_option( 'show_left_sidebar' ) ){
				get_sidebar('left');
			}
			if( get_option( 'show_right_sidebar' ) ){
				get_sidebar('right');
			} 
		?>
		<section class="content <?php had_sidebar_class(); ?>">
			<div class="content-wrap" id="position-sidebar">
				<?php 
					get_template_part('content' , get_post_format());
				?>
				<div class="single-interact">
				<?php
					if( get_option( 'content_footer_adjpost' ) ){
				?>
					<span class="prev-link"><?php 
						previous_post_link('%link' , '<i class="fa fa-chevron-left" aria-hidden="true"></i>' , 'true');?>
					</span>
				<?php
					}
					if( get_option( 'post_baidu_share_toggle' ) ){
				?>
					<span class="bdsharebuttonbox">
						<p class="bdshare-list" id="bdshare-list">
							<a href="#" class="bds_weixin fa fa-weixin" data-cmd="weixin" title="分享到微信"></a>
							<a href="#" class="bds_tsina fa fa-weibo" data-cmd="tsina" title="分享到新浪微博"></a>
							<a href="#" class="bds_sqq fa fa-qq" data-cmd="sqq" title="发送给QQ好友"></a>
							<a href="#" class="bds_more fa fa-plus-square" data-cmd="more" title="点击查看更多分享链接"></a>
						</p>
						<p class="bdshare-button">
							<i class="fa fa-share-alt" aria-hidden="true"></i>
						</p>
					</span>
				<?php
					}
					if( get_option( 'content_footer_donate' ) ){
				?>
					<span class="donate">
						<p class="donate-qr" id="donate-qr">
							<img src="<?php echo get_option( 'content_footer_donate_qr' ); ?>" alt="请博主喝咖啡">
						</p>
						<p class="donate-button">
							赏
						</p>
					</span>
				<?php
					}
					if( get_option( 'content_footer_adjpost' ) ){
				?>
					<span class="next-link"><?php 
						next_post_link('%link' , '<i class="fa fa-chevron-right" aria-hidden="true"></i>' , 'true');
						?>
					</span>
				<?php
					}
					echo '</div>';	// .single-interact
					wp_link_pages('before=<div class="post-paga">&after=</div>&link_before=<span class=pagalink>&link_after=</span>'); 
				?>
			</div><!-- single-content -->
		
			<section class="toolbar-wrap">
				<div class="toolbar w60 showsidebar">
					<div class="toolbar-title">
						<span class="glike-title">相关文章</span>
					</div>
					<div class="toolbar-content">
						<div class="glike-content pull-left"><?php art_glike(4,'rand'); ?></div>
						<div class="related-content pull-left"><?php art_related(8); ?></div>
					</div>
				</div>
			</section>
	<?php endwhile; comments_template(); ?>
		</section>
	</article>

	<?php get_footer(); ?>