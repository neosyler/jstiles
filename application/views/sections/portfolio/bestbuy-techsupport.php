<?php $item = $portfolio['bestbuy-techsupport']; ?>
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
	  		<h4>Completed in June 2014 | <a href="<?php echo $item['link']; ?>" target="_blank"><?php echo $item['link']; ?></a></h4>
	  		<p>
	  			During my time at Systems In Motion, I was involved in several projects. One of these projects was to create 
	  			a website that allowed customers to purchase Tech Support and Anti-Virus subscriptions. Additionally, the website also needed 
	  			to work inside of an iFrame that GeekSquad agents use when chatting with customers over the web. 
	  		</p><p>
	  			The course of this project spanned a few years where I held the Development Manager position and oversaw the entire project 
	  			delivery. I managed a team of developers and QA analysts, and followed the Agile methodology to deliver specific functionalities 
	  			each sprint.  I was also the point-of-contact from a technical perspective for the busineses team and answered questions as needed. 
	  		</p>
	  		<h3>Technical Details</h3>
	  		<ul>
	  			<li><b>Back-End:</b> 
	  				<ul>
	  					<li>Java</li>
	  					<li>Spring</li>
	  					<li>Websphere</li>
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
