/**
	Afresh - Parallax Responsive Creative Portfolio
 	Copyright (c) 2012, Subramanian 

	Author: Subramanian
    Profile: themeforest.net/user/FMedia/
	
    Version: 1.0.0
	Release Date: 14 December 2012
	
	Built using: jQuery 		version:1.6.2	http://jquery.com/
								jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
	
**/


(function( $ ){	
	
	function mainFm(selector, params){
		
		var defaults = $.extend({}, {
				
				// default variables
				
				onePage : true,						// Set whether this template will work as one page or separate page 				
				
				pageBackground : [],				// Background image
				backgroundOverlay : '',				// Background image overlay patter
				
				homePage : "",						// Set the home page

				animationSpeed : 1000,				// Default animation speed
				
				galleryImageResize : "fill",		// Default full screen gallery resize options
				galleryAutoplay : true,				// Default full screen gallery autoplay
				gallerySlideshowDelay : 1.5,		// Default full screen gallery  slideshow delay time
				
				slideshowSpeed : 5000				// Flexslider slideshow delaytime on porfolio detail page 
				
			} , params);

			
// Initialize required variables and objects
			var self = this;
			self.pageHolderHeight_desktop = self.pgHigDesk = "100%";
			self.pageHolderHeight_ipad = self.pgHigIpad = "100%";
			self.winWidth =   $(window).width();
			self.winHeight =   $(window).height();
			self.IE_old = $.browser.msie;
			self.mobile = $(window).width() <= 959;
			self.midMobile = $(window).width() <= 767 && $(window).width() > 479;
			self.minMobile = $(window).width() <= 480;
			self.mobileDevice = screen.width < 1024 && screen.height < 1024;
			ipad = ($(window).width() == 768 || $(window).height() == 768) && ($(window).width() == 1024 || $(window).height() == 1024) ;
			self.ipadPort = (self.winWidth >= 768 &&  self.winWidth < 1024);
			self.navTop = $(window).width() <= 959;	
			self.aniSpeed = defaults.animationSpeed;
			self.flxDelay =  defaults.slideshowSpeed;
			
			self.onePage = defaults.onePage;
			
			self.bdy = $("body");
			self.pHol = $(".pageHolder");
			self.conWarp = $(".contentWarp");
			self.lCon = $(".logo");
			self.tCon = $(".header");
			self.bCon = $(".footer .container");
			self.foot = $(".footer");
			self.pHpg = $(".pageHolder .page");			
			self.pgs = $(".page");
			self.navUl = $('.header .headerContent .nav ul');
			self.mNav = $('#mobile_nav');
			self.backPage  = $('#backArea');
			
			self.bdy.data("width", Number($(window).width()));
			self.bdy.data("height", Number($(window).height()))

			self.mCon = $(".mainContainer");
					
			self.backgroundOverlay = defaults.backgroundOverlay;
			self.pageBackground = defaults.pageBackground;

			galleryImageResize = defaults.galleryImageResize;
			self.preNav = 0;
			self.curNav = 0;
			self.pageLoaded = false;
			self.homePage = defaults.homePage;
			self.txtAniTim = [];
			self.pageLoadfinished = false;
			self.projFm = false;
			self.apis = [];
			self.ff = -1;
			
			self.singleBg = true;
			
			// set main content area
			$("#bodyMain").css({"width":"100%"});
			self.backPage.css({"overflow-x":"hidden"});
			$("#bodyContent").css({"opacity":1});
			self.pHol.css({"right":"0px"});
			if(self.IE_old || self.mobileDevice ){ self.bdy.find(".circle_border").css({"visibility":"hidden"}) }
			
			// IE7 fix for overflow property
			if( parseInt($.browser.version, 10) == 7 && $.browser.msie){
				$("body").css({"overflow-y":"hidden"});
			}

			
// Add background image loaded div
			self.bdy.prepend('<div id="pgBackground" style="width:100%; height:50%; z-index:-10; position:absolute; right:0 "></div>');
			self.pgB = $('#pgBackground');
			self.pgB.addClass('menu_color');
			self.menuColor = self.pgB.css('color');
			self.pgB.toggleClass('menu_highlight_color', 'menu_color');
			self.menuHighlightColor = self.pgB.css('color');
			self.pgB.removeAttr('class');
			
			// create Menu fadeout layer
			self.headerFad = $(".pageFade");
			self.contClose = $(".closeBtn");

			
			// Scroll bar added for require div
			var scroll_bar = '<div id="scrollbar_holder"> <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div> <div class="viewport"> <div class="overview" ></div> </div> </div>';		
			self.bdy.find('.add_scroll').each(function(){
				var aa = $(this).children();
				$(this).wrapInner( scroll_bar);
				$(this).find('.overview').append(aa);
			});
						
			// Initialize the site after the required time interval
			var intV = setInterval(function() {
				clearInterval(intV);
				self.initialize();
			},10);
			
			
// Full screen Gallery variables
//=======================================================

			self.fsPly = true;
			self.fsArr = [];
			self.fsCur = -1;
			self.fsInt;
			self.fsDly;
			self.fsNum = 0;
			self.fmImgLoaded = true;
			self.fsImgInt;
			self.txtAniInt;
			self.txtEndAni = true;
			self.txtAniSpd = 600; 	// Text animation speed
			self.txtAniDly = 200;	// Text  animation delay
			self.fsAutoPlay = defaults.galleryAutoplay == "true" ? true : false;	// gallery slideshow autoplay
			self.fsDelay = defaults.gallerySlideshowDelay;	// Gallery slide show delay time
			self.fsTxtSho = false;
			self.isFsGal = false;
			self.fsgalInter;
			self.sliderArr = [];
			
			self.fsWra = $(".fs_gallery");
			self.fsGal = $(".fs_thumbs");
			
			self.fsView = true;
			self.fsThuHig = $(".fsThumb").outerHeight(true);
			self.fpp = 0;
			
			// create page open button
			self.bdy.prepend('<div  class="pgOpen" style="visibility:hidden" ><div class="pgOpen_inner"></div></div>');
			self.pgOpe =  self.bdy.children(":first-child");
			
			// create gallery Next image button
			self.bdy.prepend('<a class="next_button"></a>');
			self.fsNxt = self.bdy.children(":first-child");
			// create gallery previous button
			self.bdy.prepend('<a class="previous_button"></a>');
			self.fsPre = self.bdy.children(":first-child");
			
			// create gallery image Text container
            self.fsTxt = $("#fsTextWarp");
			
			// Gallery thumbnail mouse events
			self.bdy.find('.fs_thumbs').each(function(){
				
				($(this).children()).each(function(){
					var thu = $(this);
					
					thu.bind('mouseover mouseup mouseleave', function() {
						self.fsSlideshow("stop");
					});
					thu.bind('mouseout', function() {
						self.fsSlideshow("delay");
					});
					
					thu.click(function(){
						if(self.mobile  && !self.ipadPort){
							self.pageClose();
						}
						self.fsSlideshow("stop");
						self.fsImgLoad($(this));
					});
					
				});
			});
			
			// Gallery next image button mouse event
			self.fsNxt.bind('mouseover mouseup mouseleave', function() {
				self.fsSlideshow("stop");
			});
			
			self.fsNxt.bind('mouseout', function() {
				self.fsSlideshow("delay");
			});
			
			self.fsNxt.click(function(){
				self.fsSlideshow("delay");
				self.fsCur = self.fsCur+1 < self.fsArr.length ? self.fsCur+1 : 0;
				self.fsImgLoad(self.fsArr[self.fsCur]);
			});
			
			
			// Gallery previous image button mouse event
			self.fsPre.bind('mouseover mouseup mouseleave', function() {
				self.fsSlideshow("stop");
			});
			
			self.fsPre.bind('mouseout', function() {
				self.fsSlideshow("delay");
			});
			
			self.fsPre.click(function(){
				self.fsSlideshow("delay");
				self.fsCur = self.fsCur-1 > -1 ? self.fsCur-1 : self.fsArr.length-1;
				self.fsImgLoad(self.fsArr[self.fsCur]);
			});

//===================================================================================
	
			// Portfolio , News full detail content div reset
			$(".fullDetails, .projDetails").css( { "height":"auto", "overflow":"visible" });
			// Portfolio , News slider Initialize
			self.initPortfolioSlider();
			

// Page buttons ==================================================================

			
			// Page open button
			self.pgOpe.click(function(){
				var sel = $(this);
				self.viewPage = true;
				
				self.pHol.css({"padding-left":0, "top": "0px"});
				
				self.conWarp.stop();
				self.pgOpe.stop();
				self.conWarp.css({"visibility":"visible"});

				if(!self.mobile){
					self.pgOpe.animate({"width": "0px"}, self.aniSpeed, "easeInOutQuart"); 
					self.conWarp.animate({"height"  : self.pHol.height()}, self.aniSpeed, "easeInOutQuart", 
					function(){ 
						$(".pageHolder .fmSlider").each(function(){
							$(this).fmMainSlider("Resume");
						})
					});
				}else{
					self.conWarp.css({"height"  : self.pHol.height()});
					self.pgOpe.animate({"width": "0px"}); 
					$(".pageHolder .fmSlider").each(function(){
						$(this).fmMainSlider("Resume");
					})
				}
				
			});
			
			
			// Page scrollUp button
			self.bdy.prepend('<div  class="pgScrollUp" ></div>');
			self.pgScrUp =  self.bdy.children(":first-child");
			self.pgScrUp.hide();
			
			self.pgScrUp.click(function(){
				self.scrollObj.animate({ scrollTop: "0px" }, 500, "easeInOutQuart" );
			});
			
			// Cache the Window object
			self.scrollObj = $("body, html");
			self.$html = $("html");
			self.$window = $("body");
			self.sliderStop = false;

			// Window scroll event
			$(window).scroll(function() {	
				self.scrollPos = self.$html.scrollTop() > 0 ?  self.$html.scrollTop() :  self.$window.scrollTop();
				if(self.scrollPos > self.winHeight){
					if(!self.sliderStop){
						self.fsAutoPlay = false;
						self.sliderStop = true;
						self.pgScrUp.fadeIn();
						$(".fmSlider").each(function(){
							$(this).fmMainSlider("pause_slideshow");
						})
					}
				}else{
					if(self.sliderStop){
						self.fsAutoPlay = true;
						self.sliderStop = false;
						self.pgScrUp.fadeOut();
					}
				}

			});
			
			
			
	}	
	
	
	mainFm.prototype = {
		

		// Initialize the require objects and variables 
		initialize : function(){
			
			var self = this;
			self.bdy.css("display","block");			
			self.loading    =  $( '<div />' ).addClass( 'loading' );
			self.bdy.prepend(self.loading);
			

			self.loading.css({"left":($(window).width()/2-self.loading.width()/2), "top": $(window).height()/2-15});
			self.loading.css("visibility","visible");
			
			self.prePg = "";
			self.curPg = "";
			self.bdy.prepend('<div id="dumDiv" style="position:absolute"> </div>');	
			self.dumDiv = self.bdy.children(':first-child');
			self.menuList = [];
			
			// Loading object added
			self.bdy.prepend('<div id="preloadImg" style="width:150px; height:150px; visibility:hidden; position:absolute; left:0; top:0; overflow:hidden"> </div>');
			self.dumDiv.addClass('email_loading');
			self.dumDiv.removeClass('email_loading');
			
			$(".headerContent").prepend('<div />');	
			self.higLig = $(".headerContent").children(':first-child');
			self.higLig.addClass("highlight");
			
			self.pgs.css("visibility","hidden");
			$(".isotope_option").show();	
			
			self.nexButton_detailPg = $("a.next_button");
			self.preButton_detailPg = $("a.previous_button");
			self.slideNumber_detailPg = $(".sliderNumber");
			
// Initialize the menu navigation action
			var kk = -1;
			var qq = -1;
			self.rez = false;
			
			if( parseInt($.browser.version, 10) == 7 && $.browser.msie){
				$(".header").css({"background":"","filter":"none"});
				self.dumDiv.addClass("mobile_menuBg_ie");
				$(".header").css({"background-color": self.dumDiv.css("background-color")});
			}
			
			try {
				document.createEvent('TouchEvent');
				if(!self.mobile){
					self.mCon.bind('click', function() {
					})
				}
			} catch (e) {
				// nothing to do			
			}
			
			
			self.navUl.each(function() {			

				var slf = $(this);
				qq++;

				if(qq>0){
					slf.children(":first-child").find("a").addClass("first");
					slf.children(":last-child").find("a").addClass("last");
				}
				
				var uuu = slf.parent().children(":first-child");
				var vvv = slf.parent().children(":last-child");
				if(qq>0){
					if(!self.mobile){
						vvv.css({"top": slf.parent().position().top+uuu.outerHeight()+"px", 
						"margin-left": (uuu.outerWidth()-vvv.outerWidth())/2});
					}else{
						vvv.css({"top": "0px", 
						"margin-left": "0px"});
					}
				}
				
				if(qq==0){
					slf.children().each(function() {
						
					 	if(!self.mobile){
							$(this).find("ul").css({"opacity":0, "height":"0px"});
						}
							
						mnu = $(this).children();
						
						mnu.bind('mouseover', function() {
							if(!self.mobile){
								var tpMenu = $(this).parent().find("ul");
								tpMenu.css({"height":"auto"});
								tpMenu.stop();
								tpMenu.animate({"opacity":1},500, false, "easeInOutQuart");
							}
						});
						
						mnu.bind('mouseout', function() {
							if(!self.mobile){
								var tpMenu = $(this).parent().find("ul");
								tpMenu.stop();
								tpMenu.animate({"opacity":0}, 500, "easeInOutQuart", function(){
									tpMenu.css({"height":"0px"});
								});
							}
						});
						
					});
				}
				
				
				slf.children().each(function() {
					var meu = $(this);
					kk++;
					self.menuList[kk] = $('a', meu).attr("href");
					
					meu.children(":first-child").bind('click', function() {
						
						var gg =  $(this).attr("href").split("#");
						if(gg[1] == self.url){
							self.page_position();
						}
						
						if($(this).parent().children().length<2 && !self.mobile){
							self.navUl.children().each(function() {			
								if($(this).children(":last-child").children().length>0){
									$(this).children(":last-child").css({"height":"0px", "opacity":0});
								}
							});
						}
					});
					
					meu.children(":first-child").bind('mouseover mouseup mouseleave', function() {
						 if(!$(this).data("act")){
							 $(this).css("color", self.menuHighlightColor);
						 }
					});
					
					meu.children(":first-child").bind('mouseout', function() {
						var gg =  $(this).attr("href").split("#");
						var gs = self.onePage ? gg[1] : gg[0];
						if(self.url != gs && !$(this).data("act")){
							 $(this).css("color", self.menuColor);
						}
					});
					
				});
				
			});
			
			// Store the page background image path in pageBackground array 
			var ll = self.pageBackground.length;
			if(self.menuList.length > self.pageBackground.length){
				for(var jj=ll; jj< self.menuList.length; jj++){
					self.pageBackground[jj] = ({src : ""});
				}
			}
			
			self.homePg = self.homePage == "" ? self.menuList[0].substr(1, self.menuList[0].length): self.homePage;
			self.cM = $('a[href$="'+self.menuList[0]+'"]').parent();
			
			self.pgs.addClass("pageHidden");
			$("#"+self.homePg).css("visibility","visible");			
			$("#"+self.homePg).hide();
			
			// Initialize the mobile button action
			self.navUl.data('view',false);
			
			self.mNav.bind('mouseover mouseup mouseleave', function() {
				if(!self.navUl.data('view')){
					$(this).css("color", self.menuHighlightColor);
				}
			});
				
			self.mNav.bind('mouseout', function() {
				if(!self.navUl.data('view')){
					$(this).css("color", self.menuColor);
				}
			});
			
			self.mNav.bind('click', function() {
				if(self.navUl.data('view')){
					self.navUl.css("display","none");
					self.navUl.data('view',false);
					$(this).css("color", self.menuColor);
					
				}else{
					self.navUl.css("display","block");
					self.navUl.data('view',true);
					$(this).css("color", self.menuHighlightColor);
				}
			});
			
			
			self.bdy.find('img').each(function() {
				$(this).data("src",$(this).attr('src'));
			});
			
			// Initialize the video	
			self.intVideoObject(self.bdy);
			
			// Add portfolio image mouse over action			
			$("body").find('.isotope_items').each(function(){				
				$(this).find('.item').each(function(){
					$(this).bind('mouseover mouseup mouseleave', function() {
						var el = $(this).find('img');
						el.removeClass("isotope_img_normal");
						el.addClass("isotope_img_over");
					});
					
					$(this).bind('mouseout', function() {
						var ele = $(this).find('img');
						ele.removeClass("isotope_img_over");
						ele.addClass("isotope_img_normal");
					});
				});
			
			});

			// Add background overlay patter, only desktop/tablet device
			if(self.backgroundOverlay != "" && !self.mobileDevice){
				$.vegas('overlay', {  src : self.backgroundOverlay });
			}
			
			$(".vegas-overlay").hide();
			
			if(self.mobileDevice){
				for( var ii=0; ii < self.pageBackground.length; ii++){
					if(self.pageBackground[ii].src_small != "" && self.pageBackground[ii].src_small){
						self.pageBackground[ii].src = self.pageBackground[ii].src_small;
					}
				}
			}
			
			// Enable/disable the image scale animation
			if(isTouch){
				$(".fmSliderNode img").removeClass("enableTransition"); 
				$(".circle_large").removeClass("enableTransition");  
			}else{
				$(".fmSliderNode img").addClass("enableTransition"); 
				$(".circle_large").addClass("enableTransition"); 
			}
			
			// Initialize the window resize function
			clearInterval(self.intr);
			$(window).resize(function() {	
				clearInterval(self.intr);
				self.intr = setInterval(function(){clearInterval(self.intr); self.windowRez();},100);
			});
			
			//Initialize the mobile orientationchange function
			$(window).bind( 'orientationchange', function(){
			  self.windowRez();
			});
			
			self.bdy.prepend('<div style="position:absolute; top:0; left:0; width:1px;" ></div>');
			self.bugRet = self.bdy.children(":first-child");

			// Reset the page in mobile device
			self.mobileInterval ;
			if(!ipad && ((screen.width <= 959) || (screen.height <= 959))){
				/*clearInterval(self.mobileInterval);
				self.mobileInterval = setInterval(function(){
					self.pageResize();
					self.pageBgRepos();
				},1000);*/
			}else{
				clearInterval(self.mobileInterval);
			}
			

			
			// Preload the required images
			var ik = 0;
			preLoadImgs.push(self.pageBackground[0].src);
			
			function intImgLoad (img){
				var _im =$("<img />");
					 _im.hide();
					 _im.bind("load",function(){
							$(this).remove();	

							if(ik < preLoadImgs.length-1){
								ik = ik+1;
								intImgLoad(preLoadImgs[ik]);
							}else{
								self.history();
								self.page_setup();	
							}
							
					 
					   }).error(function () { 		 
							$(this).remove();
							if(ik < preLoadImgs.length-1){
								ik = ik+1;
								intImgLoad(preLoadImgs[ik]);
							}else{
								self.history();
								self.page_setup();	
							};							
					});
					
					$("#preloadImg").append(_im);
					_im.attr('src',img);	
			}
			
			var chkInt = setInterval(function() {
				if(googleFontLoad){
					clearInterval(chkInt);
					intImgLoad(preLoadImgs[ik]);
				} 
			}, 300);
			
			// display isotope item
			$('.isotope_items').show();
		},

			
		// Update the menu and hightlight bar
		menuUpdate : function(e){
			
			var self = this;
			var curMenuSho = self.cM_;
			var qq = -1;
			
			var sMenu = $(".header .headerContent .nav ul li ul");

			self.navUl.removeClass();
			self.navUl.css("display","block");

				
			$(".header .headerContent .nav ul li ul li a").removeClass("subMenu_bg");
			$(".header .headerContent .nav ul li ul li a").removeClass("mobile_subMenuBg");
				
			if($(window).width() > 1149){
				$(".header .headerContent .nav ul li ul li a").addClass("subMenu_bg");
			}else{
				self.navUl.addClass('mobile_menuBg');
				$(".header .headerContent .nav ul li ul li a").addClass("mobile_subMenuBg");
			}
			
			self.navUl.each(function() {			
				var slf = $(this);
				qq++;
				
				if(qq == 0){
					slf.children().each(function() {
						if($(this).children().length>1){
							if(!self.mobile){
								$(this).children(":first-child").removeClass("arrow");
							}else{
								$(this).children(":first-child").addClass("arrow");
							}
						}	
					});	
				}
				
				if(qq>0){
					var uuu = slf.parent().children(":first-child");
					var vvv = slf.parent().children(":last-child");
					if(!self.mobile){
						var ptt = isNaN(parseInt(self.tCon.css("border-bottom"))) ? 0 : parseInt(self.tCon.css("border-bottom"))+1;
						vvv.css({"top": slf.parent().position().top+uuu.outerHeight()+ptt+"px", 
						"margin-left": (uuu.outerWidth()-vvv.outerWidth())/2});
						
						if(self.rez || !self.pageLoaded){
							vvv.css({"opacity": 0, "height":"0px"});
						}
					}else{
						vvv.css({"top": "0px", "margin-left": "0px", "height":"auto"});
					}
				}
			});
			
			var menuOnTop = false;
			
			var qs = -1;
			

			self.navUl.each(function() {
				
				qs++;
				if(qs == 0){
					$(this).find("li a").each(function() {
						$(this).data("act",false);
						if(self.cM_.attr("href") == $(this).attr("href")){
							curMenuSho = $(this);
							curMenuSho.css("color", self.menuHighlightColor);
							curMenuSho.data("act",true);
						};
					});
				}
					
				if(qs>0){
					$(this).find("li a").each(function() {
						$(this).data("act",false);
						if(self.cM_.attr("href") == $(this).attr("href")){
							curMenuSho = $(this).parent().parent().parent().children(":first-child");
							curMenuSho.css("color", self.menuHighlightColor);
							curMenuSho.data("act",true);
						}
					});
				}
				
				$(this).find("a").each(function() {
					if($(this).attr("href") == curMenuSho.attr("href")){
						menuOnTop = true;
					}
				});
			})

			

			if(!self.mobile || self.IE_old){
				self.navUl.css("display","block");
				self.higLig.css("display","block");
				if((curMenuSho.position()) != null && menuOnTop){
					var pdLef = isNaN(parseInt(curMenuSho.css('padding-left'))) ? 0 : parseInt(curMenuSho.css('padding-left'));
					self.higLig.animate({"width" : curMenuSho.width(), 
					"left" : curMenuSho.position().left+pdLef, 
					"top" : (curMenuSho.position()).top+curMenuSho.outerHeight()-self.higLig.height()});
				}else{
					self.higLig.hide();
				}
				
			}else{
				self.navUl.css({"opacity":1});
				if(self.navUl.data('view')){
					self.navUl.css("display","block");
				}else{
					self.navUl.css({"display":"none"});
				}
			}
				
		},
		
		
		
		// Initialize video cover image
		intVideoObject : function(obj){
			var self = this;
			
			obj.find('.addVideo').each(function(){		
				var addCover = false;							
				$(this).find('.video_hover').each(function(){
									
					addCover = true;			
					$(this).hover(function() {
						$(this).stop().animate({opacity:0}, 200);
					}, function() {
						$(this).stop().animate({opacity:1}, 200);
					});
									
					var vid = $(this).parent();
					vid.data("added", true);
									
					vid.click(function(){
						$("#bodyContent").find('.addVideo').each(function(){
							$(this).find('.vid').remove();
				
							if(!$(this).data("added")){

								var vid = $(this);
								var W = vid.attr('data-width') ? vid.attr('data-width') : "100%";
								var H = vid.attr('data-height') ? vid.attr('data-height') : "100%";
								var A = vid.attr('data-autoplay') == "true" && !self.mobileDevice? true : false;
								vid.prepend('<div class="vid" ></div>');
								vid.children(':first-child').embedPlayer(vid.attr('data-url'), W, H, A);
							}
											
							$(this).find('img').fadeIn();
							$(this).find('.video_hover').fadeIn();
							$(this).find('.video_hover').css({"z-index":"5"});
						});
										
						$(this).prepend('<div class="vid" ></div>');
						$(this).find('.video_hover').css({"z-index":"-1"});
						$(this).find('img').fadeOut(100,function(){
							var vid = $(this).parent();
							vid.children(':first-child').embedPlayer(vid.attr('data-url'), vid.width()+"px", vid.height()+"px", vid.width(), false);
						});
									
					});
				});	
							
			});
			
		},
		

// initPortfolioSlider function is used to create a portfolio and news items
 		
		initPortfolioSlider : function(){
			
			var self = this;
			$('#backArea').hide();
			
			$("body").find('.fmSlides').each(function(){
				var ff2 = $(this);
				var sArry = [];
				var iii = 0;
				ff2.data("slides",$(this).find('.fmSliderNode').length);

				$(this).find('.fmSliderNode').each(function(){
					sArry.push($(this));
					$(this).data("iii",iii++);
					$(this).find('.flexSlideshow').addClass('flexslider');
					$(this).data("details",$(this).find(".fullDetails"));
					$(this).find(".fullDetails").remove();
				});
				
				ff2.data("sArry",sArry);
			});
			
			$("body").prepend(' <a class="alignRight next_button" ></a');
			self.n_Btn = $("body").children(":first-child");
			$("body").prepend('<a class="alignRight previous_button"></a>');
			self.p_Btn = $("body").children(":first-child");
			
			$("body").prepend('<div class="alignRight sliderNumber">1/10</div>');
			self.n_sli = $("body").children(":first-child");
				
			self.n_Btn.hide();
			self.p_Btn.hide();
			self.n_sli.hide();
			
			self.n_Btn.click(	function() {
				self.curSlide = self.curSlide+1 < self.curFmSlider.length ? self.curSlide+1 : 0;
				self.showDetailPage(self.curFmSlider[self.curSlide]);
				if(!self.onePage){
					window.location.href = "#?p="+self.curSlide;
				}else{
					window.location.href = "#"+self.url+"?p="+self.curSlide;
				}
			});
			
			self.p_Btn.click(	function() {
				self.curSlide = self.curSlide-1 > -1 ? self.curSlide-1 : self.curFmSlider.length-1;
				self.showDetailPage(self.curFmSlider[self.curSlide]);
				if(!self.onePage){
					window.location.href = "#?p="+self.curSlide;
				}else{
					window.location.href = "#"+self.url+"?p="+self.curSlide;
				}
			});
			
			$(".fmSliderNode .slider_nav").click(function() {
				self.curFmSlider = $(".pageHolder .fmSlides").data("sArry");
				var ppp = isNaN($(this).parent().data("iii")) ? $(this).parent().parent() : $(this).parent();
				self.curSlide = ppp.data("iii");
				self.showDetailPage(ppp);
				if(!self.onePage){
					window.location.href = "#?p="+self.curSlide;
				}else{
					window.location.href = "#"+self.url+"?p="+self.curSlide;
				}
			});
				
		},
		

// Remove the content that load inside the backArea div
		removeBackCon : function(){
			var self = this;
			
			try{ self.removeScrollbar(); } catch (e) { }
			
			try{
				self.backPage.children(":first-child").find(".slider_loading").each(function(){
					try{ $(this).remove();  } catch (e) { }
				});
			} catch (e) { }
			
			try{	
				for(var ss=0; ss < self.sliderArr.length; ss++){
					self.sliderArr[ss].pause();
					self.sliderArr[ss].destroy();
				}
				self.sliderArr=[];	
			} catch (e) { }
			
			
			try{
				self.backPage.children(":first-child").find('.flexSlideshow').each(function(){
					try{ $(this).flexslider("remove") } catch (e) { }

				});
				
				self.backPage.children(":first-child").find('.flexSlideshow').each(function(){
					try{ $(this).flexslider.remove()} catch (e) { };
				});
				
			} catch (e) { }
			
			try{ 
				('#backArea').children(":first-child").find("img").each(function(){
					try{ $(this).remove(); } catch (e) { }
				});
			} catch (e) { }
			
			try{ $('#backArea').children(":first-child").remove();  } catch (e) { }

		},
		

// Show the details page		
		showDetailPage : function(el){

				var self = this;
				var pr = el;

				self.scrollObj.animate({ scrollTop: "0px" }, 500, "easeInOutQuart" );
				
				self.n_sli.text((self.curSlide+1)+"/"+(self.curFmSlider.length));
				if(!pr){ return; }
				
				// Remove the flex slider and content before load the new content
				if(pr.data("details").length == 0){
					self.backPage.stop();
					$(".vegas-background").stop();
					$(".vegas-overlay").show();
					$(".vegas-background").css({"visibility":"visible"});
					$(".vegas-background").show();

					try { 
						for(var ss=0; ss < self.sliderArr.length; ss++){
							self.sliderArr[ss].pause();
						}
					} catch (e) { }
					
					if(!self.mobile){
						self.backPage.animate({"height": "0px"}, 1000, "easeInOutQuart", function(){ 
							self.removeBackCon();
						});
					}else{
						self.backPage.css({"height": "0px"});
						self.removeBackCon();
					}
					return;
				}
				
				// show the next previous button
				if(!self.mobile){
					self.n_Btn.fadeIn();
					self.p_Btn.fadeIn();
					self.n_sli.fadeIn();
				}else{
					self.n_Btn.show();
					self.p_Btn.show();
					self.n_sli.show();
				}

				self.backPage.show();

				
				// reset the detail page size 
				 
				self.backPage.css({"width": "100%"});
				 
				self.backPage.stop();
				self.backPage.children(":first-child").css("width", $("#bodyContent").width());
				
				
				if(self.mobile){
					self.backPage.css({"height": "0px"});
				}
				
				self.backPage.animate({"height": "0px"}, 1000, "easeInOutQuart", function(){ 
				
					// Remove the previous page if it not remove completely
					self.removeBackCon();
					// load the lazyload image
					if(pr.data("details").length>0){
						$('#backArea').prepend('<div style="position:releative; "></div>');
						pr.data("details").clone().appendTo(self.backPage .children(":first-child"));
						self.backPage.children(":first-child").children(":last-child").find(" a.lazyload").each(function(){
							var img = !self.mobileDevice ? $(this).attr("href") : ($(this).attr("data-src-small")? $(this).attr("data-src-small")  :$(this).attr("href"));
							var cc = $(this).attr('class');
							$(this).replaceWith('<img class="'+cc+'" data-src="'+img+'"/>');
							$(this).removeClass('lazyload');
						});
					}
						
					self.detailNoMar = pr.data("details").hasClass("noMargin");
					self.intVideoObject($('#backArea'));
						
					self.detailPage();
					self.pageResize();
					self.backPage.css({"height": "0px"});
					self.addScrollbar();
					
					
					
					// Add loading bar for each image and fadein the image after image completely load
					self.backPage.children(":first-child").children(":last-child").find("img").each(function(){	
						if($(this).parent().hasClass('large_image')){
							var im2 = $(this);
							im2.hide();
							im2.parent().append('<div class="slider_loading"></div>');
							im2.parent().children(":last-child").css({"top":im2.parent().height()/2});
							var imSrc = im2.attr("data-src") ? im2.attr("data-src") : im2.attr("src")
							im2.attr('src', imSrc).load(function() {
								$(this).parent().find(".slider_loading").remove();
								$(this).fadeIn(1000);
							}).error(function () { 
								$(this).parent().find(".slider_loading").remove();
							})
							.each(function() {
							  if(this.complete) $(this).trigger('load');
							});
							
						}else{
							$(this).hide();
							var imSrc = $(this).attr("data-src") ? $(this).attr("data-src") : $(this).attr("src");
							$(this).attr('src', imSrc).load(function() {
								$(this).fadeIn(1000);
							})
							.each(function() {
							 if(this.complete) $(this).trigger('load');
							});
						}
					});						
					
					// Store the flex slider in array
					self.sliderArr = [];
					$('#backArea').children(":first-child").find('.flexSlideshow').each(function(){
						var ffx = $(this);
						ffx.append('<div class="slider_loading" ></div>');
						ffx.children(":last-child").css({"top":ffx.height()/2-15});
						ffx.flexslider({
							slideshow: true,
							slideshowSpeed: self.flxDelay,
							start: function(slider){
								var vv = false;
								ffx.parent().parent().find(".projImgs").each(function(){
									vv = true;
								});
								if(!vv){ ffx.find(".slider_loading").remove(); }
								self.sliderArr.push(slider);
							}
						});
					});
					
					// Show the full detail page					
					if(self.mobile){
						self.backPage.css({"height": "auto", "overflow-x":"hidden"});
						self.detailPage();
						$('#backArea').find('.addVideo').each(function(){
							if(!$(this).data("added")){
								var vid = $(this);
								var W = vid.attr('data-width') ? vid.attr('data-width') : "100%";
								var H = vid.attr('data-height') ? vid.attr('data-height') : "100%";
								var A = vid.attr('data-autoplay') == "true" && !self.mobileDevice? true : false;
								if(H == "100%"){
									vid.css({"height":"100%"})
								}
								vid.prepend('<div class="vid"></div>');
								vid.children(':first-child').embedPlayer(vid.attr('data-url'), W, H, A);
							}
						});
					}else{
						self.backPage.animate({"height": self.winHeight}, 1000, "easeInOutQuart", function(){
							self.backPage.css({"overflow-x":"hidden", "height": "auto"})
							self.detailPage();
							$('#backArea').find('.addVideo').each(function(){
								if(!$(this).data("added")){
									var vid = $(this);
									var W = vid.attr('data-width') ? vid.attr('data-width') : "100%";
									var H = vid.attr('data-height') ? vid.attr('data-height') : "100%";
									var A = vid.attr('data-autoplay') == "true" && !self.mobileDevice? true : false;
									if(H == "100%"){
										vid.css({"height":"100%"})
									}
									vid.prepend('<div class="vid"></div>');
									vid.children(':first-child').embedPlayer(vid.attr('data-url'), W, H, A);
								}
							});
						});
					}
				});
		},
		
/* Full detail page 
	The detailPage function is used to set the dimension of the 
	slideshow image and text as pre the content */

		detailPage : function (){
			
			var self = this;
			
			var headerHig = $(".header").height();
			
			if(self.projFm){
				
				
				
				var topSpace = $(window).width() > 1360 ? headerHig : 50;
				var kkk = 0;
				var spacing = self.mobile ? 0 : self.detailNoMar ? 0 : 50;
				var mobspac = self.mobile ? 20 : self.detailNoMar ? 0 : 50;
				var imgHig = self.mobile ? "auto" : "520";
				self.backPage.css({"width": "100%", "height": "auto"});
				
				
				
				var detailYes = false;
				self.backPage.children(":first-child").find(".projDetails").each(function(){
					detailYes = true;
				})
				

					self.backPage.children(":first-child").css({"margin-top": 0});
					self.backPage.css({"top":0+"px"});
					if($(window).width() > 1149){ 
						//self.backPage.children(":first-child").css({"margin-top": kkk });
						//self.backPage.css({"top":kkk+"px"});
					}else{
						//self.backPage.css({"top":0+"px"});
						//self.backPage.children(":first-child").css({"margin-top": 0 });
					}
					
					
					
					
				self.backPage.children(":first-child").css({ "width": $("#bodyContent").width(), "height": "auto", "overflow":"visible"});
				$('#bodyContent').css({"overflow":"visible"});
				
						
				var fg = self.backPage.children(":first-child").find(".projImgs");
				var ff = self.backPage.children(":first-child").find(".scroll-pane");
				
				if(detailYes){
					if($("#bodyContent").width() < 1360){
						if(self.mobile){
							fg.css({"width":"100%", "height": "280px"});
						}else{
							fg.css({"width":($("#bodyContent").width()-(spacing*2))+"px", "height": imgHig+"px"});
						}
						
						fg.css({"position":"relative", "float":"none", 
						"margin-top":topSpace+"px","margin-right":spacing+"px","margin-bottom":"0px","margin-left":spacing+"px"});
						
						ff.css({"position":"relative", "width":"auto", "height": "auto", "float":"none", "top":50+"px",
						"margin-top":"0px","margin-right":mobspac+"px","margin-bottom":100+"px","margin-left":mobspac+"px" });
						self.removeScrollbar();
					}else{
						fg.css({"height":$(window).height()-(50+topSpace+headerHig), "width":($("#bodyContent").width()-520)+"px", "margin":"0px 50px 50px 50px", "float":"left"});
						ff.css({"margin":"50px 75px 0px 0px", "top":"0px" , "position":"relative", "height": $(window).height()-(50+topSpace+headerHig)});
					}
				}else{
					var hh = self.ipadPort ? $(window).height()-(headerHig) : $(window).height()-(kkk+spacing+headerHig);
					if(self.mobile){
						fg.css({"height":"280px", "width":($("#bodyContent").width())+"px", "margin":"50px 0px 0px 0px", "float":"left"});
					}else{
						if(self.detailNoMar){
							self.backPage.children(":first-child").css({"margin":"0px"});
							fg.css({"height":$(window).height()-headerHig, "width":"100%", "top":"0px", "padding":"0px","margin":"0px", "float":"left"});
						}else{
							fg.css({"height":hh-spacing, "width":($("#bodyContent").width()-(spacing*2))+"px", "margin":"20px 50px 0px 50px", "float":"left"});
						}
					}
				}
				if(self.backPage.height() < self.winHeight-headerHig && self.backPage.children(":first-child").length>0){
					self.backPage.css({"height":self.winHeight-headerHig});
				}
				
				 
			}else{
				var pp = self.mobile || $(window).width() <= 959 ? 0 : headerHig;
				self.backPage.css({"height": "0px", "top":pp+"px"}); 
			}

		},
		
		
// Gallery slideshow function
		fsSlideshow : function (ev){
			var self = this;
			clearInterval(self.fsInt);
			clearInterval(self.fsDly);
			// pause the slideshow for few seconds
			if(ev == "delay"){
				self.fsDly = setInterval(function(){
					clearInterval(self.fsDly);
					self.fsSlideshow("play");
				},500);
			}
			
			// Play slideshow
			if(ev == "play"){				
				self.fsInt = setInterval(function(){
					if(self.fsAutoPlay){
						self.fsCur = self.fsCur+1 < self.fsArr.length ? self.fsCur+1 : 0;
						self.fsImgLoad(self.fsArr[self.fsCur]);
					}
					clearInterval(self.fsInt);
				}, self.fsDelay*2500);
			}
		},
		
// Gallery image text fade out animation function
		fsTextOut : function(){
			
			var self = this;
			clearInterval(self.txtAniInt);

			if(!self.mobileDevice){
			var ii = -1;
			self.txtAniInt = setInterval(function(){
				if(self.txtEndAni){
					clearInterval(self.txtAniInt);
					if(self.fsTxt.children().length>0){
						if($(self.fsTxt.data("con")).data("num") != self.fsNum || !self.fsTxtSho){
							self.fsTxt.find(".fs_caption").each(function(){
								var ll = self.fsTxt.find(".fs_caption").children().length;
								if(!isNaN($(this).data("lt"))){
									var css1 = { "left": $(this).data("lt")-70, "opacity":0 };
								}else{
										css1 = { "right": $(this).data("rt")-70, "opacity":0 };
								}
								self.fsTxt.data("pg", $(".pageHolder .page").attr("data-id"));
								self.fsTxt.find(".fs_caption div").each(function(){
									ii++;
									$(this).data("pos",ii);
									$(this).delay(Number(ii*170)).animate(css1, 250, "easeOutSine", function(){
										if($(this).data("pos") == ll-1){
											self.fsTxt.data("con").append(self.fsTxt.children());
											self.fsTxt.data("con").find(".fs_caption").css("visibility","hidden");
											self.txtEndAni = false;
											if(self.fsTxtSho){
												self.fsTextIn();
											}else{
												self.txtEndAni = true;
											}
											if(!self.pageLoadfinished){
												self.bg_setup();				
											}
										}
									});
								});
							});
						}else{
							self.txtEndAni = true;
						}
					}else{
						if(!self.pageLoadfinished){
							self.bg_setup();				
						}
						if(self.fsTxtSho){
							self.txtEndAni = false;
							self.fsTextIn();
						}else{
							self.txtEndAni = true;
						}
					}
				}
	
			}, 200);
			}
			
		},
			
// Gallery image text fade In function
		fsTextIn : function(){
			
			var self = this;
			var tt = false;
			var ii = 0;
			if(self.fsArr.length > 0){
				self.fsArr[self.fsNum].find(".fs_caption").each(function(){
					tt = true;
				})
			}
			if(tt){
				self.fsArr[self.fsNum].find(".fs_caption").css({"visibility":"visible"});
				self.fsArr[self.fsNum].find(".fs_caption").hide();
				self.fsTxt.append(self.fsArr[self.fsNum].find(".fs_caption"));
				self.fsTxt.data("con",self.fsArr[self.fsNum]);
				
				self.fsTxt.find(".fs_caption").each(function(){
					if(!$(this).data("lt")){
						$(this).data({"lt":parseInt($(this).css("left"))});
						$(this).data({"rt":parseInt($(this).css("right"))});
					}
					$(this).show();
					if(!isNaN($(this).data("lt"))){
						var css1 = { "left": $(this).data("lt")+150, "opacity":0 };
						var css2 = { "left": $(this).data("lt"), "opacity":1 };
					}else{
						css1 = { "right": $(this).data("rt")+150, "opacity":0 };
						css2 = { "right": $(this).data("rt"), "opacity":1 }
					}
					var ll = self.fsTxt.find(".fs_caption").children().length;
					self.fsTxt.find(".fs_caption div").each(function(){
						ii++;
						$(this).data("pos",ii);
						$(this).css(css1);
						$(this).delay(Number(ii*(self.txtAniDly))).animate(css2, self.txtAniSpd , "easeOutSine", function(){
							if($(this).data("pos") == ll){
								self.txtEndAni = true;
							}
						});
					})					
				})
			}else{
				self.txtEndAni = true;
			}
		},
		
// Gallery image load test function
		fsImgLoadTest : function(){
			var self = this;
			clearInterval(self.fsImgInt);
			self.fsImgInt = setInterval(function(){
				if(self.fmImgLoaded){
					clearInterval(self.fsImgInt);
					if(self.fsNum ==  self.fsCur){
						self.fsSlideshow("play");
						self.loading.fadeOut(300, function(){$(this).css("visibility","hidden")});
					}else{
						self.fsImgLoad(self.fsArr[self.fsCur]);
					}
				}
			}, 500);	
		},
		
// Gallery image load function
		fsImgLoad : function (ob){
				
				var self = this;

				self.scrollObj.animate({ scrollTop: "0px" }, 500, "easeInOutQuart" );
				
				if(self.fsArr.length<1 || self.fsCur<0){
					return(0);
				}
				for(var ii=0; ii<self.fsArr.length; ii++){
					if(ii != ob.data("num") && self.fsArr[ii].css("opacity") < .99){
						self.fsArr[ii].css({"opacity":"1"});
					}
				}	
				self.fsArr[ob.data("num")].css({"opacity":".25"});
				self.fsCur = ob.data("num");
				
				self.n_sli.text((self.fsCur+1)+"/"+(self.fsArr.length));
				
				self.fsImgLoadTest();
				
				if(self.mobileDevice){
					self.pageClose();
				}
				
				if(self.fmImgLoaded){
					self.fmImgLoaded = false;
					var imgSrc = !self.mobile? ob.attr("data-src") : (ob.attr("data-src-small")? ob.attr("data-src-small")  :ob.attr("data-src"));
					self.fsNum = ob.data("num");
					rezType = ob.attr("data-imgResize");
					
					self.bdy.prepend('<div class="fsLoading"></div>');
					self.fflod = self.bdy.find(".fsLoading");
					if(self.mobile){ self.fflod.css({"bottom":"60px"}) }
					self.fflod.hide();
					setTimeout(function(){  
						try { self.fflod.fadeIn(500); } catch (e) { }	
					},1000);

					// initialize to load the image
					if(imgSrc != ""){					
						var _im =$("<img />");
						_im.hide();
						_im.bind("load",function(){
							$(this).remove();
							$.vegas({ src:  imgSrc , fade:500,
								complete:function() {
									self.fmImgLoaded = true;
									try { self.fflod.remove(); } catch (e) { }
									self.fsTextOut();
								}
							})
						}).error(function () { 
							$(this).remove();
							self.fmImgLoaded = true;
							try { self.fflod.remove(); } catch (e) { }
							self.fsTextOut();
						});				
						$(".loading").fadeIn();
						$("#preloadImg").append(_im);
						_im.attr('src',imgSrc);					
					}else{
						self.fmImgLoaded = true;
						try { self.fflod.remove(); } catch (e) { }
						self.fsTextOut();
						$(".vegas-background").fadeOut();
					}
				}
		},



// Page close function		
		pageClose : function (){
				var self = this;
				var sel = self.pgScrUp;
				
				$(".pageHolder .fmSlider").each(function(){
					$(this).fmMainSlider("Pause");
				})

				self.viewPage = false;
				sel.children(":first-child").children(":first-child").css({"right" : "0px"});
				self.conWarp.stop();
				self.pgOpe.stop();
				
				var hh = $(window).height();
				
				if(!self.mobile){
					
					self.conWarp.animate({"height"  : "0px"}, self.aniSpeed, "easeInOutQuart", 
					function(){
						self.pgOpe.animate({"width": "30px"}, self.aniSpeed, "easeInOutQuart"); 
						self.conWarp.css({"visibility":"hidden"});
						$(".vegas-background").attr("src", $(".vegas-background").attr("src"));
					});
				}else{
					self.pgOpe.css({"width":"30px"});
					self.conWarp.css({"height"  : "0px", "visibility":"hidden"});
					$(".vegas-background").attr("src", $(".vegas-background").attr("src"));
				}
		},


// Page background setup function
		bg_setup : function (){
				var self = this;
				var imgSrc = "";
				rezType = "fill";
				
				// Remove the google map if it place on the current page
				$(".pageHolder .page").find('#mapWrapper').each(function(){
					if(!self.IE_old){
						$(this).children(':first-child').remove();
					}
				});
				
				// Remove the video from the previous page
				$("#bodyContent").find('.addVideo').each(function(){
					$(this).find('.vid').remove();
					$(this).find('img').show();
				});

				imgSrc = String(self.pageBackground[0].src);
				
				// initialize to load the page background
				if(imgSrc != "" ){	
					if((self.singleBg && imgBgSrc == imgSrc) ){ 
						self.bg_load();
					}else{
						var _im =$("<img />");
						_im.hide();
						_im.bind("load",function(){
							$(this).remove();
							$.vegas({ src:  imgSrc , fade:500,
								complete:function() {
										self.bg_load();
									}
								});
						}).error(function () { 
							$(this).remove();
							self.bg_load();
						});
											
						$(".loading").fadeIn();
						$("#preloadImg").append(_im);
						_im.attr('src',imgSrc);	
					}
				}else{					
					
					self.bg_load();
					$(".vegas-background").fadeOut();
				}
		},


// Page Background load function
		bg_load : function(){
			var self = this;
			
			// Fade-in Header, footer and logo after the first page background loaded
			if(!self.pageLoaded){
				self.pageLoaded = true;
				self.menuUpdate();
				$("#bodyMain").css({"overflow-y":"visible"});

				self.tCon.addClass('header_shadow');
				self.headerFad.delay(100).fadeOut(1000, "easeInOutQuart", function(){  self.headerFad.remove(); });

				$(".footer").css({"display":"table"});

				if(!self.IE_old){
					$(".isotope_items .item a .img_text").css("visibility","visible");
				}
				
				$("body").data("bgType",isMobileChk);
				$("body").find('.parallax').each(function(){
					var img = !isMobileChk ? $(this).attr("data-src") : ($(this).attr("data-src-small")? $(this).attr("data-src-small")  : $(this).attr("data-src"));
					var imgAtt = !isTouch ? "fixed" : "scroll";
					if(img != undefined){
						$(this).css({"background-image":"url("+img+")", "background-attachment": imgAtt});
					}
				});
				
				$(".staticContent").find('#mapWrapper').each(function(){
					if(!self.IE_old){
						$(this).parent().prepend($(this).data('map'));
						$(this).parent().children(":first-child").addClass('mapStyle');
						$(this).remove();
					}
				});

			}

			self.loading.fadeOut(300, function(){$(this).css("visibility","hidden")});
			
			$(".vegas-overlay").fadeIn(1000);
			
			
			self.page_display();


			var isInCont = undefined;
			$("body").find('.staticContent').each(function(){
				if($(this).attr("data-id") == self.url){
					isInCont = $(this);
				}
			});
			
			if(isInCont != undefined ){
				self.page_position();
			}

		},


// The entire page can be reposition, resize and modified by page_setup function
		page_setup : function (){
			
			var self = this;
			$("#bodyMain").css({"width":"100%"});
			self.winWidth =   $(window).width();
			self.winHeight =   $(window).height();
			
			self.ipadPort = (self.winWidth >= 768 &&  self.winWidth < 1024);
			self.mobile = self.winWidth <= 959 && !self.ipadPort;
			self.midMobile = self.winWidth <= 767 && self.winWidth > 479;
			self.minMobile = self.winWidth <= 480;
			isMobileChk = self.winWidth < 768;
			self.navTop = true;	
			
			// Reset the required variable

			
			self.pgHeight = "100%";
			self.pgHeight =  "100%";

			
			self.pgOpe.css({"top": (self.winHeight-self.pgOpe.height())/2});
			
			$("#bodyContent").css({"width": "100%"});
			
			
			
			// Change the default image in img tag, if mobile version(data-src-small) image is assign on the img tag
			self.bdy.find('img').each(function() {
				if(!self.mobile || self.IE_old || !$(this).attr('data-src-small')){
					if($(this).data('src')){
						if($(this).data('src') != $(this).attr("src")){
							$(this).attr("src",$(this).data('src'));
						}
					}
				}else{
					if($(this).attr('data-src-small')){
						if(String($(this).attr('src')) != String($(this).attr('data-src-small'))){
							$(this).attr("src",$(this).attr('data-src-small'));
						}
					}
				}
			});
			
			self.menuUpdate();
			
			
			
			if($(window).width() <= 959 ){
				//self.lCon.hide();
				//self.mHea.show();
				
			}else{
				//self.lCon.show();
			}
			
			self.pageResize();
			
			if(self.mobile ){
				self.removeScrollbar();
			}else{
				self.addScrollbar();
			}	
					
			//var kk = (self.winHeight-$(".header").height())/2 < 100 ? 100 : ($(window).height()-$(".header").height())/2;
			//	kk =  self.mobile  ? $(".mobile_header").outerHeight()+40 : kk;
			//$(".header").css({"margin-top": kk});
			
			// Remove the video if playing and show video cover image
			$("#bodyContent").find('.addVideo').each(function(){
				if($(this).data("added")){
					$(this).find('.vid').remove();
				}
				$(this).find('img').show();
				$(this).find('.video_hover').show();
				$(this).find('.video_hover').css({"z-index":"5"});
			});
			
			
			// Resize the portfolio
			$("body").find('.isotope_items').each(function(){
				if(!self.IE_old){
					var gaIt = $('.isotope_items .item');
					if(self.midMobile){
						gaIt.removeClass('large');
						gaIt.removeClass('small');
						gaIt.addClass('medium');
					}else if(self.minMobile){
						gaIt.removeClass('medium');
						gaIt.removeClass('large');
						gaIt.addClass('small');
					}else{
						gaIt.removeClass('medium');
						gaIt.removeClass('small');
						gaIt.addClass('large');
					}
				}
				$(this).isotope( {}, 'reLayout' );						 
			});
			
			//self.fsTxt.css({"height":"0px"});		
			self.fsTxtSho = (!self.mobile && !self.mobileDevice);


			$(".pageHolder .page").find('.fs_gallery').each(function(){
				if(self.mobile || self.mobileDevice || self.fsTxt.data("pg") != $(".pageHolder .page").attr("data-id")){
					if(self.fsTxt.children().length > 0){
						self.fsTextOut();
					}
				}else{
					if(self.fsTxt.children().length < 1){
						self.fsTextIn();
					}
				}
				$('.fsThumb').addClass("fsThumbAnimation");
				$('.fs_thumbs').addClass("fsThumbAnimation");
				
				
				self.fpp = 0;
				if(!self.mobile){
					setTimeout(function(){  
						if(self.fsCur < 0 && self.isFsGal && parseInt(self.pHol.css("left")) == 0 ){ 
							self.fsCur = 0; self.fsImgLoad(self.fsArr[0]); 
						} 
					},500);
				}else{
					if( self.fsCur < 0 && parseInt(self.pHol.css("left") ) == 0){ 
						self.fsCur = 0; self.fsImgLoad(self.fsArr[0]); 
					}
				}
			});
			
			if(self.rez){
				$.vegas('resize_');
			}
			
			if(!self.mobile){
				self.navUl.find("ul").css({"z-index":"inherit"});
			}else{
				self.navUl.find("ul").css({"z-index":1000});
			}
			
			// Detailpage button position
			if(self.mobile){
				if(self.isFsGal){
					self.nexButton_detailPg.removeClass("next_mobile_top_pos next_pos").addClass("next_mobile_bottom_pos");
					self.preButton_detailPg.removeClass("previous_mobile_top_pos previous_pos").addClass("previous_mobile_bottom_pos");
					self.slideNumber_detailPg.removeClass("sliderNumber_mobile_top_pos sliderNumber_pos").addClass("sliderNumber_mobile_bottom_pos");
				}else{
					self.nexButton_detailPg.removeClass("next_mobile_bottom_pos next_pos").addClass("next_mobile_top_pos");
					self.preButton_detailPg.removeClass("previous_mobile_bottom_pos previous_pos").addClass("previous_mobile_top_pos");
					self.slideNumber_detailPg.removeClass("sliderNumber_mobile_bottom_pos sliderNumber_pos").addClass("sliderNumber_mobile_top_pos");
				}
			}else{
				self.nexButton_detailPg.removeClass("next_mobile_bottom_pos next_mobile_top_pos").addClass("next_pos");
				self.preButton_detailPg.removeClass("previous_mobile_bottom_pos previous_mobile_top_pos").addClass("previous_pos");
				self.slideNumber_detailPg.removeClass("sliderNumber_mobile_bottom_pos sliderNumber_mobile_top_pos").addClass("sliderNumber_pos");
			}
			
			
			$(".fmSliderNode img").removeClass("enableTransition"); 
			
			$(".pageHolder .page").find("img.scale_fill, img.scale_fit").each(function(){
				$(this).css({"left":-($(this).width()-$(this).parent().width())/2});
				$(this).css({"top":-($(this).height()-$(this).parent().height())/2});
			})
				
			if(!isTouch){
				$(".fmSliderNode img").addClass("enableTransition"); 
			}
			
			if(self.rez){
				$(".pageHolder .fmSlider").each(function(){
					$(this).fmMainSlider("posNav");
				})
				if(!isMobileChk){
					self.mCon.css({"height": "auto"});
				}
			}
			
			if(self.rez){
				$(self.contClose.attr("data-content")).css({"top":"0px"});
				self.contClose.children(":first-child").children(":first-child").css({"right" : "-40px"});
			}
			
			if(self.rez && $("body").data("bgType") != isMobileChk && $("body").data("bgType") != undefined){
				$("body").data("bgType",isMobileChk);
				$("body").find('.parallax').each(function(){
					var img = !isMobileChk ? $(this).attr("data-src") : ($(this).attr("data-src-small")? $(this).attr("data-src-small")  : $(this).attr("data-src"));	
					var imgAtt = !isTouch ? "fixed" : "scroll";
					if(img != undefined){
						$(this).css({"background-image":"url("+img+")", "background-attachment": imgAtt});
					}
				});
			}
			
			setTimeout(function(){  
				self.mrgTop = self.isFsGal? self.winHeight : 0;
				self.mrgTop = 0;
				if(!isMobileChk){ 
					var ptt = isNaN(parseInt(self.tCon.css("border-bottom"))) ? 0 : parseInt(self.tCon.css("border-bottom"));
					self.mrgTop = self.tCon.outerHeight()- ptt;
				}
				self.mCon.css({"margin-top": self.mrgTop});
				self.pageResize();
				self.pageBgRepos();
			},100);
			
		},


// Page resize		
		pageResize : function(e){
			
			var self = this;
			self.winWidth =   $(window).width();
			self.heaWid = 0;
			self.heaPos = 0;	
			self.fsTxt.css({"width"  :  self.winWidth});
			if(self.rez){
				if(self.isFsGal){
					self.fsTxt.css({"height":self.winHeight-self.tCon.outerHeight()});
				}else{
					self.fsTxt.css({"height":0});
				}
			}
			
			self.pHol.css({"padding-left":0, "top": 0});
			self.conWarp.css({"width"  :  self.winWidth });

			
			if(self.viewPage && self.pgViewed){
				self.conWarp.css({"height" : "auto"});
			}
			
				
			self.pHol.css("left", (self.conWarp.width()-self.pHol.width())/2);	
			self.pgB.css({"width": self.winWidth-(self.heaWid+self.heaPos)});
			self.detailPage();
			$.vegas('resize_');

		},
		
// Page background resize as per page content	
		pageBgRepos : function(e){
			var self = this;
			if(self.viewPage && self.pgViewed){
				self.conWarp.stop();
				if(!self.mobile){
					self.conWarp.animate({"height"  : self.pHol.height()}, self.aniSpeed, "easeInOutQuart", function(){ } );
				}else{
					self.conWarp.css({"height"  : "auto"});
				}
			}
		},

		
		page_position : function (e){
			var self = this;
			self.kko = self.kko == undefined ? 1 : self.kko+1

			if(self.rez){
				self.page_setup();
			}

			self.openYes = true;

			var isInCont = undefined;
			$("body").find('.staticContent').each(function(){
				if($(this).attr("data-id") == self.url){
					isInCont = $(this);
				}
			});
					
			self.scrollObj.stop();
			
			var posT = 0;
			
			if(self.firstScrol == undefined){
				self.firstScrol = true;
				setTimeout(function(){  
					posT = isInCont != undefined ? parseInt(isInCont.position().top)+1-self.mrgTop : 0;
					self.scrollObj.animate({ scrollTop: posT }, self.aniSpeed, "easeInOutQuart");
				},1000);
			}else{
				posT = isInCont != undefined ? parseInt(isInCont.position().top)+1-self.mrgTop : 0;
				self.scrollObj.animate({ scrollTop: posT }, self.aniSpeed, "easeInOutQuart");
				
			}	
			
			$( '.headerContent li a' ).css({"color":self.menuColor});
			
			if(self.mobile){
				self.navUl.data('view',false);
				self.navUl.css({"display":"none"});
				self.mNav.css("color", self.menuColor);
			}
			
			self.menuUpdate();
		},
		
// The page_load function is used to load the current page inside the pageHolder div
		page_load : function (e){
				
			var self = this;
			self.url = e ? e : self.homePg;
			self.cM = $('a[href$="#'+self.url+'"]').parent();
			self.cM_= !self.onePage ? $('a[href="'+self.url+'"]') : $('a[href$="#'+self.url+'"]');
			self.pgViewed = false;
			clearInterval(self.fsgalInter);

			var isInCont = undefined;
			$("body").find('.staticContent').each(function(){
				if($(this).attr("data-id") == self.url){
					isInCont = $(this);
				}
			});
			
			if(isInCont != undefined ){
				
				if(self.curPg == ""){
					self.curPg = self.prePg = self.url;	
					if(self.pgSub == undefined && self.onePage){
						window.location.href = "#"+self.url;	
					}
					self.cM = $('a[href$="#'+self.curPg+'"]').parent();
					self.pgs.css("visibility","hidden");
					self.pHpg.removeClass("pageShow");
					self.pHpg.addClass("pageHidden");						
					self.bg_setup();
					
				}else{
					self.page_position();	
				}
				
				return;
			}
			
			self.firstScrol = true;
			
			// Check the previous and current page
			
			if(self.prePg == self.curPg){
				
				try { self.fflod.remove(); } catch (e) { }
				
				if(self.loading.css("visibility") == "hidden" ){
					self.loading.css({"left": self.winWidth/2-self.loading.height()/2, "top": self.tCon.height()+50});
				}
				self.loading.css("visibility","visible");
		
				self.pHol.stop();
				
				for(var s=0; s<self.txtAniTim.length; s++){					
					clearInterval(self.txtAniTim[s]);
					self.ff = -1;
				}
								
				// Initialize to load the opening page as per history
				if(self.curPg == "" ){						
					self.curPg = self.prePg = self.url;	
					if(self.pgSub == undefined && self.onePage){
						window.location.href = "#"+self.url;	
					}
					self.cM = $('a[href$="#'+self.curPg+'"]').parent();
					self.pgs.css("visibility","hidden");
					self.pHpg.removeClass("pageShow");
					self.pHpg.addClass("pageHidden");
					self.bdy.append(self.pHpg);	
					self.scrollObj.animate({ scrollTop: "0px" }, 0, "easeInOutQuart");										
					self.bg_setup();				
				}else{	
					// Initialize to load current page, background and animate to left side			
					self.curPg = self.url;
					self.pHol.stop();
					self.fsNxt.fadeOut();
					self.fsPre.fadeOut();
					self.fsSlideshow("stop");
					clearInterval(self.fsImgInt);
					clearInterval(self.fsInt);
					clearInterval(self.fsDly);
					self.fsTxtSho = false;
					self.curSlide = undefined;
					
					self.n_Btn.fadeOut();
					self.p_Btn.fadeOut();
					self.n_sli.fadeOut();
					
					if(self.fsTxt.children().length>0){
						if(!self.mobileDevice){
							self.fsTextOut();
						}
					}
					
					self.isFsGal = false;
					$(".pageHolder .page").find('.fs_gallery').each(function(){
						self.isFsGal = true;
					});
					
					if(self.backPage.width() != 0){
						self.backPage.animate({"height": "0px"}, self.aniSpeed, "easeInOutQuart", function(){
							self.removeBackCon();
							if($(".vegas-overlay").css("display") == "none" && self.pageLoaded){
								$(".vegas-overlay").fadeIn(50);
							} 
						});
					}

					self.scrollObj.stop();
					
					var pagScrl_Speed = window.pageYOffset != 0 ? self.aniSpeed : 50;
					
					var con_Speed = self.conWarp.height() > 50 ? self.aniSpeed : 0;
					
					if(self.prePg != self.url){
						
						self.fsTxt.animate({"height":0}, self.aniSpeed, "easeInOutQuart");
						
						$(".dynamicLoad").find("a.next_btn, a.previous_btn").each(function(){
							if($(this).css("visibility")){
								$(this).fadeOut("1000", function(){ $(this).css({"visibility":"hidden"})});
							}
						});
						
						self.scrollObj.stop();
						self.scrollObj.animate({ scrollTop: "0px" }, pagScrl_Speed, "easeInOutQuart" ,function(){
								if($(this).prop("tagName") == "BODY"){ return }
								if(!self.mobile){
									self.conWarp.animate({"height": "0px"}, con_Speed, "easeInOutQuart",
										function(){
											self.pageLoadfinished  = false;
											self.removeBackCon();
											self.conWarp.css({"visibility":"hidden"});
											$(".vegas-background").attr("src", $(".vegas-background").attr("src"));
											//self.loading.fadeIn(1000);
											self.bg_setup();
										});
								}else{
									self.conWarp.stop();
									self.conWarp.css({"height": "0px"});
									//self.loading.show();
									self.pageLoadfinished  = false;
									self.removeBackCon();
									$(".vegas-background").attr("src", $(".vegas-background").attr("src"));
									self.bg_setup();
								}
						
						});
					}else{

						if(isInCont != undefined || self.openYes){
							
							// full screen Gallery
							$(".pageHolder .page").find('.fs_gallery').each(function(){
								self.isFsGal = true;
								self.fsView = true;
								self.fsNxt.show().fadeIn();
								self.fsPre.show().fadeIn();
								self.n_sli.show().fadeIn();
								self.fsTxtSho = true;
								self.fsThuHig = ppg.find(".fsThumb").outerHeight(true);
							});
			
							self.page_position();
						}
						self.scrollObj.animate({ scrollTop: 0 }, 500, "easeInOutQuart" );
					}
				}
			}
				
			// Change menu color and position the menu highlight
			$( '.headerContent li a' ).css({"color":self.menuColor});
			
			if(self.mobile){
				self.navUl.data('view',false);
				self.navUl.css({"display":"none"});
				self.mNav.css("color", self.menuColor);
			}
			
			self.menuUpdate();
		},


		// Display the current page
		page_display : function(){
			var self = this;
			// Make visible the current page and position to left side		
			$(".page").hide();							
			var obj = !self.onePage ? $("body .page") : $('body .page[data-id="'+self.curPg+'"]');
			obj.css("visibility","visible");
			obj.show();	
			self.pHol.stop();
				
			// Remove the video from the previous page
			$("body").find('.addVideo').each(function(){
				$(this).find('.vid').remove();
				$(this).find('img').show();
			});
			
			// Remove the slider from the previous page
			$(".fmSlider").each(function(){
				$(this).fmMainSlider("Stop");
			})
					
			if(self.curPg != ""){
				// Remove the previous page from the pageHolder
				$("body").append($(".pageHolder .page"));
				// Add the current page to the pageHolder
				$(".pageHolder").append(obj);
				$(".pageHolder .page").removeClass("pageHidden");
				$(".pageHolder .page").addClass("pageShow");
					
				self.pageHolderHeight_desktop = "100%";
				self.pageHolderHeight_ipad = "100%";
				
				
				// Update the portfolio image size
				if(!self.IE_old){
					$("body").find('.isotope_items').each(function(){
						var gaIt = $('.isotope_items .item');
						if(self.midMobile){
							gaIt.removeClass('large');
							gaIt.removeClass('small');
							gaIt.addClass('medium');
						}else if(self.minMobile){
							gaIt.removeClass('medium');
							gaIt.removeClass('large');
							gaIt.addClass('small');
						}else{
							gaIt.removeClass('medium');
							gaIt.removeClass('small');
							gaIt.addClass('large');
						}
					});
				}
				
				self.isFsGal = false;	
				$(".pageHolder .page").find('.fs_gallery').each(function(){
					self.isFsGal = true;
				});
				
				if(!self.isFsGal){
					self.fsTxt.animate({"height":0}, self.aniSpeed, "easeInOutQuart");
				}
				
				self.projFm = false;
				$(".pageHolder .page").find('.fmSlides .fmSliderNode').each(function(){
					self.projFm = true;
				});
					
				try {
					$(".pageHolder .page").find('.flexslider').each(function(){
						if($(this).data("slid").currentSlide != 0 ){
							$(this).data("slid").flexAnimate(0);
						}
						$(this).data("slid").resume();
					})
				} catch (e) {
					// Nothing to do
				}
				
				//vegas background resize
				$.vegas('resize_');

				// Update the current page	
				self.page_setup();
						
				var ppg = $('.pageHolder .page');
					
				// Remove the google map before the page display
				ppg.find('#mapWrapper').each(function(){
					if(!self.IE_old){
						$(this).children(':first-child').remove();
					}
				});

					
				// Graph display	
				ppg.find('.graph_container li').each(function() {
					$(this).each(function() {
						$(this).children(':first-child').css("width","0px");
					});
				});
					
				// Feature Image
				ppg.find("ul.feature_wrap li .fea").css({"height":"0%", "opacity":"0"});
							
				// full screen Gallery
				self.fsCur = -1;
				self.fsView = false;
				self.fsArr = [];	
				ppg.find('.fs_gallery').each(function(){
					self.fsTxtSho = true;
					self.fsThuHig = ppg.find(".fsThumb").outerHeight(true);
					$(this).find('.fs_thumbs').each(function(){
						($(this).children()).each(function(){	
							self.fsArr.push($(this));
							if($(this).css("opacity")<.99 ){
								$(this).css({"opacity":"1"});
							}
							$(this).data("num",self.fsArr.length-1);
							self.fsArr[0].css("opacity",.25);
						});
					});
				});

				ppg.find('.animate').each(function(){	
					$(this).css("width","1px");
				});
								
				ppg.find('.animate2').each(function(){	
					$(this).css("opacity","0");
				});
				
				self.viewPage = true;
				self.pgOpe.animate({"width": "0px"}, self.aniSpeed, "easeInOutQuart");

				
				self.conWarp.css({"visibility":"visible", "height" : 0});
				
				
				self.pHig = self.pHol.height();
				self.fmsliderYes = false;
				var conSppd = self.aniSpeed;

				$(".pageHolder .fmSlider").each(function(){
					self.pHig = self.winHeight-self.mrgTop+1;
					self.fmsliderYes = true;
				});
				
				if(self.openYes == undefined ){
					if(self.isFsGal){
						self.fsTxt.css({"height":self.winHeight-self.tCon.outerHeight()});
					}
					self.openYes = true;
					if(self.fmsliderYes){
						self.conWarp.css({"height"  : self.pHig});
						conSppd = 0;
					}
				}
						
				if(!self.mobile){
					self.conWarp.animate({"height"  : self.pHig}, conSppd, "easeInOutQuart",
						function(){
							self.pageLoadfinished  = true;
							self.conWarp.find(".scroll-pane").css("overflow-y","auto")
							self.addScrollbar();
							if(!self.fmsliderYes){
								self.conWarp.css({ "height":"auto"});
							};
							self.pgViewed = true;
							self.arrangePgContent();
							
							if(self.isFsGal){
								self.fsTxt.animate({"height":self.winHeight-self.tCon.outerHeight()}, self.aniSpeed, "easeInOutQuart");
							}
							 
						});
				}else{
					self.pageLoadfinished  = true;
					self.conWarp.find(".scroll-pane").css("overflow-y","auto")
					self.addScrollbar();
					self.conWarp.stop();
					self.conWarp.css({"height"  : "auto"});
					self.pgViewed = true;
					self.arrangePgContent();
					if(self.isFsGal){
						self.fsTxt.css({"height":self.winHeight-self.tCon.outerHeight()});
					}
				}
			
			}else{
				self.prePg = self.curPg;
			}
		},
		
		
		// Reset page 
		resetPage : function(){

			var self = this;
			self.pHol.stop();
			self.fsNxt.fadeOut();
			self.fsPre.fadeOut();
			self.fsSlideshow("stop");
			clearInterval(self.fsImgInt);
			clearInterval(self.fsInt);
			clearInterval(self.fsDly);
			self.fsTxtSho = false;
			self.curSlide = undefined;
					
			self.n_Btn.fadeOut();
			self.p_Btn.fadeOut();
			self.n_sli.fadeOut();
					
			if(self.backPage.height() != 0){
				self.backPage.animate({"height": "0px"}, self.aniSpeed, "easeInOutQuart", function(){
					self.removeBackCon();
					if($(".vegas-overlay").css("display") == "none" && self.pageLoaded){
						$(".vegas-overlay").fadeIn(50);
					} 
				});
			}
				
			$(".vegas-background").stop();
			if(!self.mobile){
				$(".vegas-background").css({"visibility":"visible"});
				$(".vegas-background").fadeIn(500, function(){});
			}else{
				$(".vegas-background").css({"visibility":"visible"});
				$(".vegas-overlay").show();
				$(".vegas-overlay").fadeIn(50);
			}
				
				
			var sel = self.pgOpe;
			self.viewPage = true;

			self.conWarp.stop();
			self.pgOpe.stop();
			self.conWarp.css({"visibility":"visible"});
			
			$(".pageHolder .fmSlider").each(function(){
				$(this).fmMainSlider("Resume");
			})
				
			if(self.mobile){
				self.navUl.data('view',false);
				self.navUl.css({"display":"none"});
				self.mNav.css("color", self.menuColor);
			}				
			
			self.menuUpdate();
		},
		
		// Reset/start page content animation
		arrangePgContent : function(){
			var self = this;
			// Reset the requierd object after page display
			self.prePg = self.curPg;	
			// Reload the page if the current page is not equal to history url								
			if(self.curPg != self.url){
				self.page_load(self.url);
			}								
			ppg = $('.pageHolder .page');
				
			// Add the google map if it present on the current page							
			ppg.find('#mapWrapper').each(function(){
				if(!self.IE_old){
					$(this).append($(this).data('map'));
				}
			});

			// Update the portfolio if it present 
			$("body").find('.isotope_items').each(function(){						
				if(!$(this).data('loaded')){
					$(this).isotope({
					itemSelector : '.item',
					animationOptions: {
						complete: function() {  if(!self.onePage){ self.pageResize(); } }
						}
					});
				}
								
				$(this).isotope({
					_fitRowsReset : function() {
						this.fitRows = { x : 0, y : 0, height : 0 };
						}
	 				});
				$(this).data('loaded',true);
			});
			
			// full screen Gallery
			ppg.find('.fs_gallery').each(function(){
				self.fsView = true;
				self.fsNxt.fadeIn();
				self.fsPre.fadeIn();

				if(!self.mobile){
					if(self.fsCur < 0 && self.isFsGal ){ 
						self.fsCur = 0; self.fsImgLoad(self.fsArr[0]); 
					} 
					self.n_sli.fadeIn();
					
				}else{
					if( self.fsCur < 0 ){ 
						self.fsCur = 0; self.fsImgLoad(self.fsArr[0]); 
					}
					self.n_sli.show();
				}
				
				self.n_sli.text((1)+"/"+(self.fsArr.length))
			
			});
							
			// Video 
			$("#bodyContent").find('.addVideo').each(function(){
				if(!$(this).data("added")){
					var vid = $(this);
					var W = vid.attr('data-width') ? vid.attr('data-width') : "100%";
					var H = vid.attr('data-height') ? vid.attr('data-height') : "100%";
					var A = (vid.attr('data-autoplay') == "true" && !self.mobileDevice);
					vid.prepend('<div class="vid"></div>');
					vid.children(':first-child').embedPlayer(vid.attr('data-url'), W, H, A);
				}
			});
							
			// Feature Tag
			var iu=0;
			if(self.IE_old){
				ppg.find("ul.feature_wrap li").show();
			}
			ppg.find("ul.feature_wrap li .fea").each(function(){
				iu++;
				$(this).parent().show();
				$(this).delay(Number(iu*(150))).animate({"height":"100%", "opacity":"1"}, 1200,"easeInOutQuart");
			});
			
			// Restar fmslider 
			
			$(".pageHolder .fmSlider").each(function(){
				$(this).fmMainSlider("ReStart");
			});
			
			if(self.pgSub != undefined && self.projFm){
				self.curFmSlider = $(".pageHolder .fmSlides").data("sArry");
				var p2 = self.pgSub.split("=");
				self.curSlide = Number(p2[1]);
				self.showDetailPage(self.curFmSlider[Number(p2[1])]);
			}
							
			// Text animation
			for(var s=0; s<self.txtAniTim.length; s++){
				clearInterval(self.txtAniTim[s]);
				self.ff = -1;
			}
							
			ppg.find('.animate').each(function(){
				var sel = $(this);
				self.ff = self.ff+1;
				sel.data('i',self.ff);
				self.txtAniTim[self.ff] = setInterval(function(){
					clearInterval(self.txtAniTim[Number(sel.data('i'))]); 
					sel.animate({"width":"100%"},1000,"easeOutQuart");
				}, Number($(this).attr("data-time"))*200 );		
								
			});
							
			ppg.find('.animate2').each(function(){
				var sel2 = $(this);
				self.ff = self.ff+1;
				sel2.data('i',self.ff);
				self.txtAniTim[self.ff] = setInterval(function(){ 
					clearInterval(self.txtAniTim[Number(sel2.data('i'))]); 
					sel2.animate({"opacity":"1"},1000,"easeOutQuart");
				},  Number($(this).attr("data-time"))*200);						
			});
							
			// Graph display
			ppg.find('.graph_container').each(function(){
				self.graph_display($(this));
			});
			
		},
		
		
// Initialize the History 
		history : function(){
			var self = this;

			(function($){
				var origContent = "";			
				function loadContent(hash2) {
					
					var splt = hash2.split("?");
					var hash = !self.onePage ? self.homePg : splt[0];
					self.pgSub = splt[1];

					if(hash != "") {
						if(origContent == ""  && self.curPg == "") {
							origContent = $(self.homePage);
						}
						if(self.hisPath != hash ){
							self.hisPath = hash;
							self.page_load(hash);
						}else{
							
							if(self.pgSub != undefined && self.projFm){
								var p2 = self.pgSub.split("=");
								if((Number(p2[1]) != self.curSlide)){
									self.curFmSlider = $(".pageHolder .fmSlides").data("sArry");
									self.curSlide = Number(p2[1]);
									self.showDetailPage(self.curFmSlider[Number(p2[1])]);
								}
							}else{
								self.resetPage();
							}
						}
					} else {

						if(origContent != "" && self.curPg == "") {
							if(self.hisPath != hash ){
								self.hisPath = hash;
								self.page_load(self.homePg);
							}
						}else{
							if(!self.onePage){
								if(self.pgSub != undefined && self.projFm){
									var p2 = self.pgSub.split("=");
									
									if((Number(p2[1]) != self.curSlide)){
										self.curFmSlider = $(".pageHolder .fmSlides").data("sArry");
										self.curSlide = Number(p2[1]);
										self.showDetailPage(self.curFmSlider[Number(p2[1])]);
									}
								}else{
									self.resetPage();
								}
							}
						}
					}
					
					if(hash == "" && self.curPg == ""){
						self.page_load(self.homePg);
					}
				}

				$(document).ready(function() {
						$.history.init(loadContent);
						$('#navigation a').not('.external-link').click(function() {
								var url = $(this).attr('href');
								url = url.replace(/^.*#/, '');
								$.history.load(url);
								return false;
							});
					});
			})(jQuery);
			
		},
		

// Add scrollbar
		addScrollbar : function (){
			var self = this;
			$('#bodyContent .scroll-pane').each(
				function()
					{	
						self.apis.push($(this).jScrollPane({ autoReinitialise: true, verticalDragMinHeight		: 70 }).data().jsp);
					}
				)
			},

// Remove scrollbar			
		removeScrollbar : function(){
				 var self = this;
				if (self.apis.length) {
					$.each(
						self.apis,
						function(i) {
									this.destroy();
							}
						)
					self.apis = [];
				}
		},

		
// Graph display function
		graph_display : function (e){
			e.find('li').each(function() {
					$(this).each(function() {
							$(this).children(':first-child').css("width","0px");
							$(this).children(':first-child').stop();
							$(this).children(':first-child').animate( { width: $(this).attr('data-level') },  1500, "easeInOutQuart");
						});
					});
		},
		
// Window Resize function
		windowRez : function (){			
			var self = this;
			if(Number(self.bdy.data("width")) != Number($(window).width()) || Number(self.bdy.data("height")) != Number($(window).height())){
				self.bdy.data("width", Number($(window).width()));
				self.bdy.data("height", Number($(window).height()));
				self.rez = true;
				self.page_setup();
				self.pageResize();
				if(self.mobile){
					self.detailPage();
				}
				
				self.rez = false;
			}
			
		}
		
	};
	

		
// Initizlize and create the main plug-in
	$.fn.mainFm = function(params) {
	var $fm = $(this);
		var instance = $fm.data('GBInstance');
		if (!instance) {
			if (typeof params === 'object' || !params){
				return $fm.data('GBInstance',  new mainFm($fm, params));	
			}
		} else {
			if (instance[params]) {					
				return instance[params].apply(instance, Array.prototype.slice.call(arguments, 1));
			}
		}
		
	};

	
})( jQuery );