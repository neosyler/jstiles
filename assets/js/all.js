function changeHash(a){if(""!=location.hash){a=location.hash;var c=null,b=null,d=b=null,e=null;-1<a.indexOf("/")?(d=a.split("/"),a=d[0],c=$(a),e=d[1]):c=$(a);b=c.data("parent");b=void 0!=b?b:a;$(".page:visible").slideUp(300);c.slideDown(300);window.scrollTo(0,0);$(window).one("scroll",function(){window.scrollTo(0,0)});$("header nav ul li").removeClass("active");$("header nav ul li a[href='/"+b+"']").parent().addClass("active");null!=d&&getPost(e)}}
function getPost(a){$.ajax({url:"/welcome/post/"+a,type:"GET",cache:!1,dataType:"json",success:function(a){var b=$("#blogpost");b.find("h2.title").text(a.title);b.find("li.date").text(a.date);b.find(".post-content").html(a.content)}})}function loadBlogPage(a,c){$.ajax({url:"/welcome/loadBlogPage/"+a+"/"+c,type:"GET",cache:!1,dataType:"html",success:function(a){$("#blog").html(a)}});return!1}
function submitContactForm(a){$.ajax({type:"POST",url:"/welcome/contact",data:$("#contactForm").serialize(),success:function(a){$("#contactForm").find(".result").html(a);$("#contactForm").find(".result").effect("highlight","slow")}});return!1}
$(document).ready(function(){$(window).on("hashchange",function(){changeHash(location.hash)});$("#inner-body nav ul li a").click(function(){$("#stack").is(":visible")&&$("#inner-body nav").slideToggle("fast")});$("#portfolio-details ul.filter li button").click(function(){var a=$(this).data("tag");$(".portfolio-item:hidden").filter("."+a).fadeIn("fast");$(".portfolio-item:visible").not("."+a).fadeOut("fast")});$(".portfolio-item-contents .nav li a").on("click",function(){$(this).parents("ul").find("li").removeClass("active");
$(this).parent().addClass("active");var a=$(this).parents(".portfolio-item-contents"),c=$(this).data("href");a.find(".tab-pane:visible").slideUp(300);a.find(c).slideDown(300);return!1});""!=location.hash&&"#profile"!=location.hash&&changeHash(location.hash);$(".screenshots .grid-list").magnificPopup({delegate:"a",type:"image",gallery:{enabled:!0}});$("#cv-details .accordion button").on("click",function(){$(this).find("span").toggleClass("glyphicon-plus").toggleClass("glyphicon-minus");$(this).parents(".accordion-item").find(".accordion-content").slideToggle("fast")})});