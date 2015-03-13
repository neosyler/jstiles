<div id="blog-details" class="clearfix">
	<div class="col-md-8">
		<?php
		$first = true;
		foreach($posts as $post) {			
			$title_link = str_replace(" ", "_", $post['title']);
			$title_link = str_replace(":", "", $post['title']);
			?>
			<article id="post<?php echo $post['id']; ?>" class="post">
				<h2><a href="/#blogpost/<?php echo $title_link; ?>"><?php echo $post['title']; ?></a></h2>
				<ul class="post-details">
					<li><?php echo date("F jS, Y", strtotime($post['created'])); ?></li>
				</ul>
				<div class="post-content">
					<?php 
					$content = stripslashes($post['content']);
					
					$content = substr(strip_tags($content), 0, 500) . "...";
					echo $content;
					?>  <a class="link" href="/#blogpost/<?php echo $title_link; ?>">Read more.</a> 
				</div>
			</article>
			<?php
			$first = false;
		}
		
		$pages = ceil($post_count/5);
		$prev = ($page <= 1) ? 1 : $page-1;
		$next = ($page == $pages) ? $pages : $page+1;
		$last = $pages;
		?>
		<ul class="pagination">
			<li><a class="link" href="#" data-page="1" onclick="return loadBlogPage($(this).data('page'), '<?php echo $category; ?>');">&lt;&lt;</a></li>
			<li><a class="link" href="#" data-page="<?php echo $prev; ?>" onclick="return loadBlogPage($(this).data('page'), '<?php echo $category; ?>');">&lt;</a></li>
			<li><a class="link" href="#"><?php echo "Page $page of $pages"; ?></a></li>
			<li><a class="link" href="#" data-page="<?php echo $next; ?>" onclick="return loadBlogPage($(this).data('page'), '<?php echo $category; ?>');">&gt;</a></li>
			<li><a class="link" href="#" data-page="<?php echo $last; ?>" onclick="return loadBlogPage($(this).data('page'), '<?php echo $category; ?>');">&gt;&gt;</a></li>
		</ul>
	</div>
	<div class="col-md-4">
		<div class="categories">
			<h2>Categories</h2>
			<ul class="category-list">
				<li onclick="loadBlogPage(1, '');">All</li>
				<?php
				foreach($categories as $cat) {
					?><li onclick="loadBlogPage(1, '<?php echo $cat['tag']; ?>');"><?php echo $cat['tag']; ?></li><?php
				}
				?>
			</ul>
			<h2>Latest Posts</h2>
			<?php
			
			for($i = 0; $i < count($latest_posts); $i++) {
				$post= $latest_posts[$i];
				$title_link = str_replace(" ", "_", $post['title']);
				$title_link = str_replace(":", "", $post['title']);
				?>
				<h4><a href="/#blogpost/<?php echo $title_link; ?>"><?php echo $post['title']; ?></a></h4>
				<p class="date"><?php echo date("F jS, Y", strtotime($post['created'])); ?></p>
				<?php				
				$content = substr(strip_tags(stripslashes($post['content'])),0,125) . "...";
				echo $content;
				?> <a class="link" href="/#blogpost/<?php echo $title_link; ?>">Read more.</a> <?php
			}
			?>
		</div>
	</div>
</div>
