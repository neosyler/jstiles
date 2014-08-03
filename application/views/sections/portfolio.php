<div id="portfolio-details">
	<ul class="filter">
		<li><button class="btn btn-primary" data-tag="portfolio-item">All</button></li>
		<li><button class="btn btn-primary" data-tag="design">Design</button></li>
		<li><button class="btn btn-primary" data-tag="development">Development</button></li>
		<li><button class="btn btn-primary" data-tag="management">Management</button></li>
	</ul>          
	<div class="clearfix">&nbsp;</div>
	<div class="portfolio-items">
		<ul>
			<?php
			foreach($portfolio as $item) {
				?>
				<li class="portfolio-item <?php echo $item['tags']; ?>" onclick="location.hash='<?php echo $item['href']; ?>'" style="background-image: url('<?php echo $item['img']; ?>');">
					<div class="title"><?php echo $item['title']; ?></div>
					<div class="desc">
						<?php echo $item['desc']; ?>
					</div>
				</li>
				<?php
			}
			?>
		</ul>
	</div>
	<div class="clearfix">&nbsp;</div>
</div>
