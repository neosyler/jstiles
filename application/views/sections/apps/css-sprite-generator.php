<div id="css-sprite-generator-details" class="clearfix">
	<div class="clearfix">
		<a class="closeThis" href="#apps">
			<button class="btn btn-primary">
				<span class="glyphicon glyphicon-remove"></span>
				Close
			</button>
		</a>
	</div>
	<hr class="clearfix" />
	<h3>CSS Image Sprite Generator</h3>
	<p>
		To use this tool, simply upload a zip file containing images in either 
		JPG, GIF or PNG format.  The tool will automatically create a CSS Image 
		Sprite along with CSS Code for you to use in your project(s).
	</p>
	<form class="form-horizontal" role="form" action="/generate/#css-sprite-generator" method="POST" enctype="multipart/form-data">
	  <div class="form-group">
		<label for="fileUpload" class="col-sm-3">Upload a Zip File:</label>
		<div class="col-sm-7">
		  <input type="file" class="form-control" id="zipFile" name="zipFile" placeholder="Choose File">
		</div>
	  </div>
	  <div class="form-group">
		<label for="direction" class="col-sm-3">Build Direction:</label>
		<div class="col-sm-7">
		  	<select id="direction" name="direction" class="form-control">
				<option></option>
				<option value="horizontal">Horizontal</option>
				<option value="vertical" selected="selected">Vertical</option>		
			</select>
		</div>
	  </div>
	   <div class="form-group">
		<label for="padding" class="col-sm-3">Padding between Images (in pixels):</label>
		<div class="col-sm-7">
		  <input type="text" class="form-control" id="padding" name="padding" value="5" placeholder="5">
		</div>
	  </div>
	   <div class="form-group">
		<label for="prefix" class="col-sm-3">Output Filename Prefix:</label>
		<div class="col-sm-7">
		  <input type="text" class="form-control" id="prefix" name="prefix" value="css-" placeholder="css-">
		</div>
	  </div>
	  <div class="form-group">
		<label for="format" class="col-sm-3">Output File Format:</label>
		<div class="col-sm-7">
		  	<select id="format" name="format" class="form-control">
				<option></option>
				<option value="gif">GIF</option>
				<option value="jpg">JPG</option>
				<option value="png" selected="selected">PNG</option>		
			</select>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-3 col-sm-7">
		  <button type="submit" class="btn btn-primary">Generate</button>
		</div>
	  </div>
	</form>
	<?php
	if (isset($sprite_info) && is_array($sprite_info)) {
		?>
		<hr />
		<div class="alert alert-success" role="alert">
			<h3><b>It's Ready!</b> Your sprite is ready to download.</h3>
			<p>Filename: <b><?php echo $sprite_info['name']; ?></b></p>
			<p>Size: <b><?php echo $sprite_info['size'] . "Kb"; ?></b></p> 
			<p><a href="<?php echo $sprite_info['path']; ?>" target="_blank"><button class="btn btn-primary">Download</button></a></p>
			<hr />
			<h3>Here's the CSS code for each image within the zip file:</h3>
			<?php
			$images = $sprite_info['images'];
			foreach($images as $i) {
				echo $i['name'] . " { background-position: $i[x]px $i[y]px; width: $i[width]px; height: $i[height]px; }<br />";
			}
			?>
		</div>
		<?php
	}
	?>
</div>
