<?php $item = $portfolio['iridescentmoments']; ?>
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
	  		<h4>Completed in Fall 2013 | <a href="<?php echo $item['link']; ?>" target="_blank"><?php echo $item['link']; ?></a></h4>
	  		<p>
	  			This is a photography portfolio website using a clean, minimalist design. The objectives 
	  			of this website was to showcase the photographer's portfolio and services.
	  		</p><p>
	  			The website was coding using the CodeIgnither PHP framework. The front-end uses HTML5, CSS, JavaScript, jQuery, and the jQuery ColorBox Plug-In.
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
	  					<li>HTML5</li>
	  					<li>CSS</li>
	  					<li>JavaScript</li>
	  					<li>jQuery</li>
	  				</ul>
	  			</li>
	  			<li><b>Tools:</b>
	  				<ul>
	  					<li><a href="http://www.jacklmoore.com/colorbox/" target="_blank">jQuery Colorbox</a></li>
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
