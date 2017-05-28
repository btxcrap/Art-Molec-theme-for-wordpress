				<div class="article-content f-aside w60 showsidebar">
					<?php breadcrumb_output(); ?>
					<div class="article-nav">
						<span class="prev-btn"><?php 
							previous_post_link('%link' , '<i class="fa fa-chevron-left" aria-hidden="true"></i> 上一篇' , 'true');
							?>
						</span>
						<span class="next-btn"><?php 
							next_post_link('%link' , '下一篇 <i class="fa fa-chevron-right" aria-hidden="true"></i>' , 'true');
							?>
						</span>
					</div>
					<div class="aside-style clear single-content ff">
						<div class="aside-author-avatar"><?php 
							echo '<span class="asidebar-1"><img src="' . get_template_directory_uri();
							echo '/images/avatar.png" alt="' . get_the_author_meta('nickname') . '" /></span>';
							echo '<span class="asidebar-2"><h1>' . get_the_author_meta('nickname') . '</h1></span>';
							echo '<span class="asidebar-3">个人说明：' . get_the_author_meta('description') . '</span>';
						?></div>
						<?php the_content(); ?>
						<div class="opacity"></div>
					</div>
					<div class="more-link bf"><a title="展开全文" id="open">+ 展开全文</a></div>
				