<?php $item = $portfolio['potestivo-palms']; ?>
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
	  		<h4>Completed in April 2009</h4>
	  		<p>
	  			During my time at Potestivo & Associates, I was involved in several projects. One of these projects was to create 
	  			a sophisticated and custom Intranet for the company that would later develop into holding several different tools, and even an 
	  			entire case management system.
	  		</p><p>
	  			Starting out, PALMS was just a simple Intranet application where employees could log on, read about the company's 
	  			latest news and important announcements, and get access to company documents and useful web links. It eventually 
	  			evolved into an entire suite of applications all in one place. 
	  		</p><p>
	  			Not only was PALMS a complete and custom Content Management System, but it also contained a plethora of tools used 
	  			by the company such as: a complete time management system, a task manager, event calendar, employee management system, 
	  			reporting system, case management system, company classifieds, and so much more.
	  		</p><p>
	  			PALMS' case management system was designed to be fast and efficient without being too complicated to use.  This allowed workers to 
	  			 spend more time working the case file and less time fumbling around the interface.  In addition, PALMS 
	  			 made it easy to stay on task through use of a checklist system.  Each case file has its own checklist (i.e. a listing of steps that must be taken from when the case file is open until it is closed).  
	  			 Each step could either be manually completed by the case worker, or automatically by the system.  That's right, 
	  			 PALMS had several automation features.  Based on a set of conditions or scenarios, PALMS could automatically 
	  			 create tasks for case workers, schedule events, send out important emails or reminders, and even assemble 
	  			 important legal documents relevant to the case file. 
	  		</p>
	  		<h3>Technical Details</h3>
	  		<ul>
	  			<li><b>Back-End:</b> 
	  				<ul>
	  					<li>PHP</li>
	  					<li>MySQL</li>
	  					<li>Apache</li>
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
				?><li><a href="<?php echo $img_dir . "/$img"; ?>" data-effect="mfp-zoom-in" target="_blank"><img src="<?php echo $img_dir . "/$img"; ?>" /></a></li><?php
			}
			?>
		</ul>
	  </div>
	</div>
</div>
