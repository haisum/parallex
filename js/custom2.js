


/* Site Main plug-in initilize */

$(document).ready(function(){
	
	jQuery(function($){
		$("body").mainFm({
		
		/* set page background src is used for large size image(desktop) src_small is used for small size image(mobile)*/
		pageBackground 	: [	{ src : 'images/background/background1.jpg', src_small : 'images/background/background1_s.jpg'} ],
			
		/* Set background overlay patter */							
			backgroundOverlay 	: 'images/background_overlay.png',
			
		/* set whether it's an one page or separate page file, if it's set false, the template works like a separate page version*/
			onePage : true,
			
		/* Set the opening page. 
			leave it blank value if you need to show the home page as a opening page*/
			homePage : "",
			
		/* Full screen gallery options for autoplay and slideshow delay time*/
			galleryAutoplay : "true",
			gallerySlideshowDelay : 1.5,
		/* Full screen gallery default image resize types. Options are fill/fit/none */
			galleryImageResize : "fill",
			
		/* FlexSlider slideshow speed */
			slideshowSpeed : 5000
			
		});
	});
	
	
	//.parallax(xPosition, speedFactor, outerHeight) options:
	//xPosition - Horizontal position of the element
	//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
	//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
	$('.parallax').each(function(){
		$(this).parallax("50%", 0.4, true);
	}); 
	
	
	
/* Home page Slider */			
	$(function(){
		$(".slider1").fmMainSlider({ 
			slideNumber : false, 		// Boolean: Create slide number
			playPause : true, 			// Boolean: Create play pause button
			nextPreviousButton : true, 	// Boolean: Create next button
			dotButtons : true, 			// Boolean: Create dot buttons
			autoplay : true, 			// Boolean: Enable auto play
			mouse_drag : true,			// Boolean: Mouse/Touch drag
			slideshowDelayTime : 2.5 	// Integer: slideshow delay time
		});
	});

				
// Email submit action			
	$("#email_submit").click(function() { 
							
		$('#reply_message').removeClass();
		$('#reply_message').html('')
		var regEx = "";	 
						
		// validate Name				
		var name = $("input#name").val();  
		regEx=/^[A-Za-z .'-]+$/; 
		if (name == "" || name == "Name"  || !regEx.test(name)) { 
			$("input#name").val(''); 
			$("input#name").focus();  
			return false;  
		}
		
		// validate Email						  
		var email = $("input#email").val();  
		regEx=/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;											
		if (email == "" || email == "Email" || !regEx.test(email)) { 
			$("input#email").val(''); 
			$("input#email").focus();  
			return false;  
		}  
		
		// validate comment			
		var comments = $("textarea#comments").val(); 
		if (comments == "" || comments == "Comments..." || comments.length < 2) { 
			$("textarea#comments").val(''); 
			$("textarea#comments").focus();  
			return false;  
		}  
							
		var dataString = 'name='+ $("input#name").val() + '&email=' + $("input#email").val() + '&comments=' + $("textarea#comments").val();									
		$('#reply_message').addClass('email_loading');
		
		// Send form data to mailer.php 
		$.ajax({
			type: "POST",
			url: "mailer.php",
			data: dataString,
			success: function() {
				$('#reply_message').removeClass('email_loading');
				$('#reply_message').addClass('list3');
				$('#reply_message').html("Mail sent sucessfully")
				.hide()
				.fadeIn(1500);
					}
				});
		return false;
		
	});	
});
$(function(){
	$("#about-us-link").click(function(){
		$(".slider1 .about-us").css({'visibility': 'visible', 'opacity': 1, 'position': 'relative', 'left':0, 'top':0});
		$(".slider1 .fmSlider_animate").not(".about-us").css({'visibility': 'hidden', 'opacity': 0, 'position': 'absolute', 'top': '-10000px'});
		$('html, body').animate({
				scrollTop: - $(".header").outerHeight()
		}, 2000);
	});
	$("#tune-in-link").click(function(){
		$(".slider1 .tune-in").css({'visibility': 'visible', 'opacity': 1, 'position': 'relative', 'left':0, 'top':0});
		$(".slider1 .fmSlider_animate").not(".tune-in").css({'visibility': 'hidden', 'opacity': 0, 'position': 'absolute', 'top': '-10000px'});
		$('html, body').animate({
				scrollTop: - $(".header").outerHeight()
		}, 2000);
	});
	$('[href="#bottom_page"]').click(
		function(){
			
			stage = $("#bottom-page");
			pageID = $(this).attr("data-page-id");
			page = $('[data-id="'+pageID+'"]');
			stage.fadeOut(750, function(){
				stage.empty();
				stage.append(page.html());
			});
			stage.fadeIn(750);				
			$('html, body').animate({
				scrollTop: stage.offset().top - $(".header").outerHeight()
			}, 1500);
		}
	);
	var page = $("#bottom-page");
	var verticalPadding = parseInt(page.css("padding-top"), 10)+parseInt(page.css("padding-bottom"), 10);
	var requiredHeight = $(window).height()-$(".header").outerHeight()-$(".footer").outerHeight()-verticalPadding;
	page.css("min-height", requiredHeight);
	/* Initialize the fancybox plug-in for portfolio */
	var privacy_popup = $(".pop-up-link");
	privacy_popup.fancybox({
		'padding'			: 0,
		'titlePosition'		: 'outside',
		'transitionIn'		: 'elastic',
		'transitionOut'		: 'elastic',
		'overlayColor'		: '#000',
		'overlayOpacity'	:.75
		
	});
	
	$(".program").click(
		function(){
			stage = $(this).siblings(".stage");
			stage.slideUp(750);
			stage.empty();
			stage.append($(this).children(".program-details").clone());
			stage.slideDown(750);				
			$('html, body').animate({
				scrollTop: stage.offset().top - $(".header").outerHeight()
			}, 1500);
		}
	);

	$(document).on("click", ".likes,.dislikes", function(e){
		var current = parseInt($(this).find("span").text());
		dataObj = {
			type : $(this).is(".likes") ? "like" : "dislike",
			id : $(this).data("id")
		};
		$this = $(this);
		$.ajax({
			url : 'program/like',
			data : dataObj,
			type : 'post',
			dataType : 'json',
			success : function(data){
				if(data.status === "ok"){
					$this.find("span").fadeOut("slow", function(){
						$(this).text(data.newCount).css("font-weight", "bold").fadeIn();
					});
				}
			}
		})
	});
});