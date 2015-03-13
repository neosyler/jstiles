<div class="intro clearfix">
	<div class="col-sm-4">
		<img class="intro-pic" src="/assets/css/images/family.jpg" alt="A picture of my family" title="A picture of my family" />
	</div>
	<div class="col-sm-8">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47235.89963094148!2d-83.73768944999999!3d42.2733204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883cb00dd4431f33%3A0xdb09f94686c8b5e2!2sAnn+Arbor%2C+MI!5e0!3m2!1sen!2sus!4v1406694502096" width="760" height="368" frameborder="0" style="border:0"></iframe>
	</div>
</div>
<div id="contact-details" class="clearfix">
	<div class="col-md-4">
		<div class="profile-details-section">
			<h3>Contact Details</h3>
			<div class="contact-details">
				<dl>
					<dt>Name</dt>
					<dd>Jason T. Stiles</dd>
					<dt>Date of Birth</dt>
					<dd>April 20th, 1983</dd>
					<dt>Location</dt>
					<dd>Ann Arbor, MI<br />U.S.A.</dd>
					<dt>Status</dt>
					<dd>Employed, Full-Time</dd>
					<dt>Degree</dt>
					<dd>B.S. Computer Science</dd>
				</dl>
				<div class="clearfix">&nbsp;</div>
			</div>
		</div>
	</div>
	<div class="contact-form col-md-8">
		<h3>Send Me a Message</h3>
		<form id="contactForm" action="contact" method="POST" role="form" class="form" onsubmit="return submitContactForm(this);">
			<div class="row">
				<div class="col-sm-6">
					<p>
						<input type="text" id="name" class="form-control" name="name" value="" placeholder="Name" />
					</p>
				</div>
				<div class="col-sm-6">
					<p>
						<input type="text" id="email" class="form-control" name="email" value="" placeholder="Email" />
					</p>
				</div>
			</div>	
			<div class="row">
				<div class="col-sm-6">
					<p>
						<input type="text" id="subject" class="form-control" name="subject" value="" placeholder="Subject" />
					</p>
				</div>
				<div class="col-sm-6">
					<p>
						<input type="text" id="phone" class="form-control" name="phone" value="" placeholder="Phone Number" />
					</p>
				</div>
			</div>	
			<div class="container-fluid">
				<div class="row">
					<p>
						<textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 result">
					
				</div>
				<div class="submit col-sm-6">
					<button class="btn btn-primary">
						<span class="glyphicon glyphicon-envelope"></span>
						Send Message
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
