function changeHash(hash) {
	if (location.hash != '') {
		var id = location.hash,
			jId = null,
			jIdParent = null,
			tabId = null,
			post = null,
			postId = null;
		
		if (id.indexOf('/') > -1) {
			//blog post
			post = id.split('/');
			id = post[0];
			jId = $(id);
			postId = post[1];
		} else {
			jId = $(id);
		}
		
		jIdParent = jId.data('parent');
		tabId = (jIdParent != undefined) ? jIdParent : id;
	
		$('.page:visible').slideUp(300);
		jId.slideDown(300);
		
		window.scrollTo(0, 0);
		$(window).one( 'scroll', function(){
			window.scrollTo(0, 0);
		});
		
		$('header nav ul li').removeClass('active');
		$("header nav ul li a[href='/" + tabId + "']").parent().addClass('active');
		
		if (post != null) {
			getPost(postId);
		}
	}
}

function getPost(id) {
	$.ajax({
		url: '/welcome/post/' + id,
		type:'GET',
		cache: false,
		dataType: 'json',
		success: function(response) {
			var post = $('#blogpost');
			
			post.find('h2.title').text(response.title);
			post.find('li.date').text(response.date);
			post.find('.post-content').html(response.content);
		}
	});
}

function loadBlogPage(pageId, category) {
	$.ajax({
		url: '/welcome/loadBlogPage/' + pageId + "/" + category,
		type:'GET',
		cache: false,
		dataType: 'html',
		success: function(response) {
			$('#blog').html(response);
		}
	});
	
	return false;
}

function submitContactForm(el) {
	$.ajax({type:'POST', url: '/welcome/contact', data: $('#contactForm').serialize(), success: function(response) {
		$('#contactForm').find('.result').html(response);
		$('#contactForm').find('.result').effect('highlight', 'slow');
	}});
	
	return false;
}

$(document).ready(function() {

	//Listen for when the hash changes (i.e. back button pressed)
	$(window).on('hashchange', function() {
		changeHash(location.hash);
	});
	
	//Tab Handler
	$('#inner-body nav ul li a').click(function() {
		if ($('#stack').is(':visible')) {
			$('#inner-body nav').slideToggle('fast');
		}
	});
	
	//Tag Selector on Portfolio page
	$('#portfolio-details ul.filter li button').click(function() {
		var tag = $(this).data('tag');
		
		$('.portfolio-item:hidden').filter('.' + tag).fadeIn('fast');
		$('.portfolio-item:visible').not('.' + tag).fadeOut('fast');
	});
	
	//Tab switcher for Portfolio Items
	$('.portfolio-item-contents .nav li a').on('click', function() {
		$(this).parents('ul').find('li').removeClass('active');
		$(this).parent().addClass('active');
		var contents = $(this).parents('.portfolio-item-contents');
		var id = $(this).data('href');
		
		contents.find('.tab-pane:visible').slideUp(300);
		contents.find(id).slideDown(300);
			
		return false;
	});
	
	//Sets the appropriate tab to display according to the has in the URL
	if (location.hash != '' && location.hash != '#profile') {
		changeHash(location.hash);
	}	
	
	//displays screenshots in gallery
	$('.screenshots .grid-list').magnificPopup({
	  delegate: 'a',
	  type: 'image',
	  gallery: {enabled: true}
	});
	
	$('#cv-details .accordion button').on('click', function() {
		$(this).find('span').toggleClass('glyphicon-plus').toggleClass('glyphicon-minus');
		$(this).parents('.accordion-item').find('.accordion-content').slideToggle('fast');
	});
});
