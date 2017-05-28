				<div class="article-content f-standard w60 bf showsidebar">
					<?php breadcrumb_output(); ?>
					<div class="article-nav">
						<span class="prev-btn"><?php 
							previous_post_link('%link', '<i class="fa fa-chevron-left" aria-hidden="true"></i> 上一篇' , 'true');
							?>
						</span>
						<span class="next-btn"><?php 
							next_post_link('%link', '下一篇 <i class="fa fa-chevron-right" aria-hidden="true"></i>' , 'true');
							?>
						</span>
					</div>
					<div class="standard-style clear single-content ff">
						<?php the_content(); ?>
					</div>