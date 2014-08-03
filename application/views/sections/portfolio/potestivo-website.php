<?php $item = $portfolio['potestivo-website']; ?>
<div class="portfolio-item-contents">
	<ul class="nav nav-tabs" role="tablist">
	  <li class="active"><a href="#overview" data-href="#overview">Overview</a></li>
	  <li><a href="#screenshots" data-href="#screenshots">Screenshots</a></li>
	</ul>
	<a class="closeThis" href="#portfolio">
		<button class="btn btn-primary">
			<span class="glyphicon glyphicon-remove"></span>
			Close
		</button>
	</a>
	<div class="tab-content">
	  <div class="tab-pane active clearfix" id="overview">
	  	<div class="portfolio-item-img col-sm-4">
	  		<a href="<?php echo $item['link']; ?>" target="_blank"><img src="<?php echo $item['img']; ?>" /></a>	
	  	</div>
	  	<div class="portfolio-item-content col-sm-8">
	  		<h2><?php echo $item['title']; ?></h2>
	  		<h4>Completed in May 2010</h4>
	  		<p>
	  			During my time at Potestivo & Associates, I was involved in several projects. One of these projects was to re-design the 
	  			company's website, and make it easy for the marketing staff to update it regularly.
	  		</p><p>
	  			The new website included a custom content management system (similar to PALMS) which made it super easy 
	  			to add new blog posts and articles to the site. It also mame it easy to add and update attorney and staff biography pages. The 
	  			website was also optimized for Search Engines, and included Google Analytics for tracking visitors.
	  		</p>
	  		<h3>Technical Details</h3>
	  		<ul>
	  			<li><b>Back-End:</b> 
	  				<ul>
	  					<li>PHP</li>
	  				</ul>
	  			</li>
	  			<li><b>Front-End:</b>
	  				<ul>
	  					<li>HTML</li>
	  					<li>CSS</li>
	  					<li>JavaScript</li>
	  					<li>jQuery</li>
	  				</ul>
	  			</li>
	  		</ul>
	  	</div>
	  </div>
	  <div class="screenshots tab-pane clearfix" id="screenshots">
	  	<ul class="grid-list clearfix">
			<?php
			$img_dir = $item['img_dir'];
			
			foreach($item['imgs'] as $img) {
				if (is_array($img)) continue;
				?><li><a href="<?php echo $img_dir . "/$img"; ?>" target="_blank"><img src="<?php echo $img_dir . "/$img"; ?>" /></a></li><?php
			}
			?>
		</ul>
	  </div>
	</div>
</div>
