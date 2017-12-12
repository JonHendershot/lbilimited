function mobile(){
	var isMobile = false; //initiate as false
	// device detection
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;
	    
	    return(isMobile);
}
jQuery(window).load(function(){
	var $ = jQuery;

	
	$('.lazy-load').each(function(){
		lazyLoader( $(this) );
	});
	
	$('#pre_loader').addClass('off');
	setTimeout(function(){
		$('.header-content.off').removeClass('off');
	},700);
	if($('.site-header').hasClass('off')){
		setTimeout(function(){
			$('.site-header').removeClass('off');
		}, 500);
		setTimeout(function(){
			$('.site-header').removeClass('timing');
		},2000)
	}
	if( $('.home_shade').length){
		setTimeout(function(){
			$('.home_shade').addClass('off');
		}, 4000);
		setTimeout(function(){
			$('body').removeClass('hide_header');
		}, 5500);
	}
	
});

/*
(function pageTransition(){
	var links = document.getElementsByTagName('a');
	
	for(x = 0; x < links.length; x++){
		var link = links[x];
		
		link.onclick = function(e){
	
			var url = this.getAttribute('href'),
				hostname = window.location.host;
		
			if( url.includes(hostname) ){
				
				e.preventDefault();
				
				document.getElementById('pre_loader').classList.remove('off');
				window.location = url;
		
			}
		}
	}
}());
*/


  //////////////////////
 // Offering Contact //
//////////////////////
(function offeringAutoFill($){
	
	if( $('.offering_contact').length ){
		var offeringName = $('section.contact_form').attr('data-car'),
			titleDisplay = document.querySelector('input[name="offering-name"]'),
			titleInput = document.getElementById('offering-title');
		
		titleInput.value = offeringName;
		titleDisplay.value = offeringName;
		titleDisplay.setAttribute('disabled',true);
				
		$('.offering_contact input[name="offering-name"]').parent().parent().addClass('filled_out');
	}
}(jQuery));


  ////////////////////////
 // Home Page Envelope //
////////////////////////
/*
(function homeEnvelope($){
	if($('.home_cta_content').length){
		var hoverTrigger = $('.featured_post');
		
		hoverTrigger.hover(function(){
			
			var featID = $(this).data('self').post_id;
			 $('.home_cta_image .post-' + featID).addClass('feat-visible');
			 console.log(featID);
		},function(){
			$('.feat-visible').removeClass('feat-visible');
		});
	}
}(jQuery));
*/

  ///////////////////
 // SCROLL EVENTS //
///////////////////
(function stickyMenu($){
	
	if( $('body.single-offerings').length ){
		var windowCo = 0.15;
	}else {
		var windowCo = 0.5;
	}
	
	var nav = $('.nav-wrapper'),
		menu = $('#main_menu'),
		windowHeight = (window.innerHeight * windowCo),
		lastScrollTop = window.pageYOffset,
		titleSpans = $('header .header-content h1 span');
	
	$(window).scroll(function(){
		var scrollDistance = window.pageYOffset;
/* 		console.log("Offset: " + scrollDistance + ' Height: ' + windowHeight); */
		if(scrollDistance > windowHeight && ! nav.hasClass('sticky')){
			nav.addClass('sticky');
			menu.addClass('sticky');
		}
		if(scrollDistance < windowHeight && nav.hasClass('sticky')){
			nav.removeClass('sticky');
			menu.removeClass('sticky');
		}
		
		if(scrollDistance > (windowHeight * 2) && ! nav.hasClass('hidden') && scrollDistance > lastScrollTop && !$('body').hasClass('single-offerings')){
			nav.addClass('hidden');
		}
		if(scrollDistance < lastScrollTop && nav.hasClass('hidden')){
			nav.removeClass('hidden');
		}
		
		
		// Animate Header Title Off of Page 
		if( $('body.single-offerings').length ){
			var percentScrolled = ( scrollDistance / windowHeight ) * 2,
				percentAnimate = (1 -  percentScrolled);
			
			if( percentAnimate > 0.7 ){
				if( scrollDistance < lastScrollTop && $('header .header-content').hasClass('hide') ){
					$('header .header-content, header .featured-media .media_overlay').removeClass('hide');
				}

				for(var i = 0; i <= titleSpans.length; i++){
					var adjust = ( i + 1 ) / 1.5,
						move = scrollDistance * adjust * -1;
					$('header .header-content h1 span.layer-' + i).css({
						'transform':'translateX('+ move +'px)',
						'opacity'  : percentAnimate
					});	
				}
				$('header .header-content .geo_elem').css({
					'transition' : '0ms all linear',
					'transform' : 'translate3d(-77px, -10px, 0) skew(-15deg) scaleX(' + percentAnimate + ')',
				});		
				
				$('header .header-content p.price .banner').css({
					'transform' : 'scaleY(' + percentAnimate  + ')'
				});
				$('header .header-content p.price .price-wrapper').css({
					'transform' : 'translateY(' + (35 * percentScrolled) * -1 + 'px)',
					'opacity' : percentAnimate
				});
				$('header .featured-media .media_overlay').css({
					'opacity' : percentAnimate
				});
			}else if(!$('header .header-content').hasClass('hide')){
				$('header .header-content, header .featured-media .media_overlay').addClass('hide');
				
			}
			
			
/* HARD THRESHOLD
			if( scrollDistance > 20 ){
				$('header .header-content, header .featured-media .media_overlay').addClass('hide');
			}
*/
			
		}
		lastScrollTop = scrollDistance;
		
		
		// WAYPOINT SCROLLER
		var waypointElem = $('.waypoint');
		
		waypointElem.each(function(){
			var elem = $(this);
			waypoint(elem,scrollDistance);
		});

	});
}(jQuery));


function waypoint(elem, scrollY){
	var offsetTop = (elem.offset().top),
		thresholdPadding = parseInt( elem.data('padding') ),
		waypointTrigger = offsetTop + thresholdPadding,
		windowHeight = window.innerHeight,
		threshold = scrollY + windowHeight;

	if( waypointTrigger < threshold && elem.hasClass('waypoint') ){
		elem.removeClass('waypoint');
	}
}

  //////////////////
 // STICKY SHARE //
//////////////////
(function stickyShare($){
	
	var shareContainer = $('.sharedaddy');
	
	if(shareContainer.length){
		var shareParent = shareContainer.parent(),
			topThreshold = 94,
			bottomThreshold = 115,
			bottomShare = topThreshold + shareContainer.height(),
			topOffset  = shareParent.offset().top, // this doesn't change so we don't want to decalre it inside fo the scroll event
			bottomOffset = ( topOffset + shareParent.height() ) - bottomShare; // this doesn't change so we don't want to declare it inside of the scroll event
		
		
	
		$(window).scroll(function(){
			var scrollDistance = window.pageYOffset,
				toTop = topOffset - scrollDistance,
				toBottom = bottomOffset - scrollDistance;
				
				if(toTop <= topThreshold && ! shareContainer.hasClass('fixed')){
					shareContainer.addClass('fixed');
				}
				if(toTop >= topThreshold && shareContainer.hasClass('fixed')){
					shareContainer.removeClass('fixed');
				}
				
				
				if(toBottom <= bottomThreshold && ! shareContainer.hasClass('bottom')){
					shareContainer.addClass('bottom').removeClass('fixed');
				}
				if(toBottom >= bottomThreshold && shareContainer.hasClass('bottom')){
					shareContainer.removeClass('bottom').addClass('fixed');
				}
				
		});
	}
}(jQuery));
  /////////////////
 // SCROLL HINT //
/////////////////
(function scrollHint($){
	if( $('.scroll_hint_container').length ){
		
		setInterval(function(){
			$('.scroll_hint_container .dot').addClass('visible');
		
			setTimeout(function(){
				$('.scroll_hint_container .dot').removeClass('visible');
			}, 700);
		}, 2000);
		
	}
}(jQuery));

  /////////////////
 // MAX HEIGHTS //
/////////////////
(function maxHeight($){
	if( $('.lbi_values .value').length ){
		$(window).load(function(){
			setMaxHeight('value');
		});
	}
}(jQuery));


  ///////////////////
 // SOUND TRIGGER //
///////////////////
(function soundTrigger($){
	var soundTrigger = $('.sound_trigger'),
		headerVideo = document.getElementById('header_video');
	
	if( soundTrigger.length ){
		soundTrigger.click(function(){
			if( $(this).hasClass('off') ){
				// Audio is muted
				
				// Toggle audio trigger
				// This is controlled with a css3 class
				$(this).removeClass('off').addClass('on');
				
				// Unmute the video audio
				headerVideo.muted = false;
			}else {
				// Audio is playing
				
				// Toggle audio trigger
				// This is controlled with a css3 class
				$(this).addClass('off').removeClass('on');
				
				// Mute the video
				headerVideo.muted = true;	
			}
		});
	}
}(jQuery));

  ////////////////////////
 // SPECIALISTS EXPAND //
////////////////////////
(function specialist_expand($){
		var trigger = $('.specialist_item'),
			expandContainer = $('.specialist_expand_container'),
			closeTrigger = $('.specialist_expand_container .close_expand');
		
		trigger.click(function(){
			updateSpecialist($(this));
		});
		
		closeTrigger.click(function(){
			
			// Hide Content 
				$('.specialist_expand_wrapper').removeClass('visible');
			
			// Hide Container 
				setTimeout(function(){
					expandContainer.removeClass('visible');
				}, 500);
		});
}(jQuery));

  ////////////////////////
 // OFFERING DOCUMENTS //
////////////////////////
(function documentsTrigger($){
	var trigger = $('.documents_trigger'),
		lightbox = $('.documents_lightbox'),
		closeTrigger = $('.nav-wrapper .search_trigger'); // this will change to a close lightbox trigger any time a lightbox is opened
		
		trigger.click(function(){
			if(!lightbox.hasClass('visible')){
				// OPEN IT UP				
				open_lightbox(lightbox);
			}
			
		});
}(jQuery));

function updateSpecialist(specialist){
	// Set Variables
				var $ = jQuery,
					data = specialist.data('self'),
					photo_blur = data.photo_blur,
					photo_full = data.photo_full,
					bio = data.bio,
					name = data.name,
					position = data.position,
					video = data.video_iframe,
					expandContainer = $('.specialist_expand_container'); 
				
			// Load Images
				$('.specialist_expand_image img').attr('src',photo_full);	
				$('.specialist_expand_content h3').text(name);
				$('.specialist_expand_content p').text(position);
				$('.specialist_expand_content .content').text(bio);
				
				if(video !== ''){
					$('.specialist_expand_content .launch_video').removeClass('hidden').attr('data-frame',video);
				}else {
					$('.specialist_expand_content .launch_video').addClass('hidden').attr('data-frame','');

				}
				
			// Show Container
				expandContainer.addClass('visible');
				
			// Show Content
				setTimeout(function(){
					$('.specialist_expand_wrapper').addClass('visible');
				}, 500);
}

  ///////////////////////
 // NOTIFY LIGHTBOX ////
///////////////////////
(function notifyLightbox($){
	var trigger = $('.notify_trigger'),
		lightbox = $('.notify_lightbox');
		
		trigger.click(function(){
			open_lightbox(lightbox);
		});
}(jQuery));

  /////////////////////////////////
 // CONSIGNMENT FORM LIGHTBOX ////
/////////////////////////////////
(function consignment_launch($){
	var option_trigger = $('.option_form_trigger'),
		lightbox = $('.lbi_lightbox.consignment_lightbox');
	
	option_trigger.click(function(){
		var form_title = $(this).attr('data-form-title');
		$('.lbi_lightbox.form_consignment .planner-meta h3').text(form_title);
		open_lightbox(lightbox);
	});
}(jQuery));

  ///////////////////////
 // OFFERING LIGHTBOX //
///////////////////////
(function mediaLightbox($){
	var offeringTrigger = $('.featured_slide'),
		lightbox = $('.media_lightbox'),
		closeTrigger = $('.nav-wrapper .search_trigger'),
		navbtn = $('.light_nav'),
		featuredHeader = $('header .featured-media-wrapper .featured-media');
	
	featuredHeader.click(function(){
		// Setup Variables 
		var data = $('.featured_slide.slide-0-glam').data('image');
		
		load_img(data);
		
		// Open Lightbox
		if( !lightbox.hasClass('visible') ){
			open_lightbox(lightbox);
		}
		
		// Update Lightbox Triger
			closeTrigger.text('click to close').addClass('open');
	});
	offeringTrigger.click(function(){
		if( ! $(this).hasClass('lbi_gallery_slide') ||  $(this).hasClass('media_house_gallery') ){
				var lightbox = $('.media_lightbox');
			}else {
				var galleryID = $(this).data('image').img_class,
					lightbox = $('.image_viewer-' + galleryID);
			
			}
		
			// Setup Variables
				var data = $(this).data('image');
				load_img(data, lightbox);
				
			// Open Lightbox
				if( !lightbox.hasClass('visible') && ! $(this).hasClass('lbi_gallery_slide') ){
					open_lightbox(lightbox);
					// Update Lightbox Triger
					closeTrigger.text('click to close').addClass('open');
				}
			
			
	
	});
	navbtn.click(function(){
		
		// remove the classname that is forcing the arrows to be visible once they're used
		navbtn.removeClass('force_show');
		
		var img = $(this).attr('data-img');

		
		next_img(img);
	});
	
	// Arrow Key Navigation
	$(document).keyup( function(e){
		if( lightbox.hasClass('visible') ){
	

			var nav = false;
			
			if( e.keyCode == 37 ){
				// left arrowkey, get previous image
				var data = $('.prev_img.light_nav').attr('data-img'),
					nav = true;
			}
			if( e.keyCode == 39 ){
				// right arrowkey, get next image
				var data = $('.next_img.light_nav').attr('data-img'),
					nav = true;
			}
			
			
			if( nav ){
				next_img(data);
			}

		}
	});
	
	// Swipe on desktop 
	var throttle = false;
	$('.media_lightbox').on('mousewheel',function(e){
	
		
		e.preventDefault();
		
		
		if(!throttle){
				if (e.deltaX>0) {
			        var data = $('.next_img.light_nav').attr('data-img');
			    } else {
					var data = $('.prev_img.light_nav').attr('data-img');
			    }
			    
			    next_img(data);
			    
			    setTimeout(function(){
				    throttle = false;
			    }, 900);
		}
	    
	    throttle = true;
		
	});
	
}(jQuery));
function next_img(id){
	var $ = jQuery,
		data = $('.featured_slide.slide-' + id).data('image'),
		lightbox = $('.media_lightbox');
		
		load_img(data, lightbox);	
}
function load_img(data, lightbox){
	// Setup Variables
	var $ = jQuery,		
		blur = data.blur_url,
		full = data.full_url,
		imgClass = data.img_class,
		id = parseInt(data.photo_id),
		blur_img = new Image(),
		img = new Image();
					
		// Hide Images
			lightbox.find('img').removeClass('visible');
			
		
		// Show loading Icon
			$('.cube_load_container').addClass('visible');
			
		// Apply Img URLs 
			blur_img.src = blur;
			blur_img.onload = function(){
				lightbox.find('.blur_image').attr('src',blur).addClass('visible');
			}
			
			img.src = full;
			img.onload = function(){
				lightbox.find('.full_res').attr('src',full).addClass('visible');
				
				// Hide loading icon
				$('.cube_load_container').removeClass('visible');
			};
			
			
		// Update Image Triggers 
// 			alert(id + ' ' + imgClass);
			next_trigger_id(id, imgClass);
		
}
function next_trigger_id(id, imgClass){
	var $ = jQuery,
		nextIndex = id + 1,
		prevIndex = id - 1,
		totalIndex = $('.featured_slide.' + imgClass).last().attr('data-id');
	
	
	// If the next slide exists, get the id, else get the first slide
	if( $('.featured_slide.slide-' + nextIndex + '-' + imgClass).length ){
		var nextSlideID = nextIndex;
	}else {
		var nextSlideID = 0;
	}
	
	// If the previous slide exists, get the id, else get the last slide
	if( $('.featured_slide.slide-' + prevIndex + '-' + imgClass).length ){
		var prevSlideID = prevIndex;
	}else {
		var prevSlideID = totalIndex;
	}
	
	// Apply index to nav buttons
		$('.media_lightbox .light_nav.next_img').attr('data-img',nextSlideID + '-' + imgClass);
		$('.media_lightbox .light_nav.prev_img').attr('data-img',prevSlideID + '-' + imgClass);
	
// 	alert( '.featured_slide.slide-' + prevSlideID + '-' + imgClass );
	
	// Use slide IDs to preload the next and previous images
		var next_image = $('.featured_slide.slide-' + nextSlideID + '-' + imgClass).data('image'),
			prev_image = $('.featured_slide.slide-' + prevSlideID + '-' + imgClass).data('image'),			
			nextblur = next_image.blur_url,
			nextfull = next_image.full_url,
			prevblur = prev_image.blur_url,
			prevfull = prev_image.full_url;
			
		// preload images
		preload(nextblur, nextfull, prevblur, prevfull);
			
	
}

// Function to handle when a slideshow gallery image is clicked to show the full aspect ratio of the image
var slideShowImage = jQuery('.ar-trigger');
	
slideShowImage.click(function(){
	
	var activeImage = jQuery(this).find('img'),
		imageWidth = activeImage.get(0).naturalWidth,
		imageHeight = activeImage.get(0).naturalHeight,
		imagePadding = ( imageHeight / imageWidth ) * 100,
		imageContainerClass = jQuery(this).data('image')['img_class'],
		imageContainer = jQuery('.image_viewer.image_viewer-' + imageContainerClass),
		initialPadding = "45%";

		imageContainer.css('paddingBottom',  imagePadding + '%');

		
		
			
		if( ! jQuery(this).hasClass('show_full') ){
			
			// jQuery(this).addClass('show_full');
			// jQuery('span.click_message').text('Click to crop image');
		}else {
			// this.style.paddingBottom = initialPadding;
			// jQuery(this).removeClass('show_full');
			// jQuery('span.click_message').text('Click to view full image');

		}
});

  /////////////////////////
 // HOME FEATURE SLIDER //
/////////////////////////
(function featureSlider($){
	// Establish a timeout variable outside of the loop function scope so that
	// we can clear it later when necessary without interfering with its functionality
	var scrollerTimeout;
	
	// Function to loop the slider displays
	function autoTimer(){

		scrollerTimeout = setTimeout(function(){
				
			if( $('.home_cta_image').length ){
				
					var	activeSlide = $('.home_cta_image .feat_full.feat-visible'),
						activeID = parseInt( activeSlide.data('slide') ),
						nextID = activeID + 1;
						
						
						// Show Next Slide
						showNextSlide(nextID);
						
						// Call this function again to make it loop 
						autoTimer();
			}
		}, 5000);
	}
	
	// Call the loop function for the first time to start it
	autoTimer();
	
	// Button Clicks
	var navBtn = $('.feat_post_nav .feat_bubble');
	
	navBtn.click(function(){
		// Get the ID of which element is being requested
		var calledID = parseInt( $(this).data('index') );
		
		// Show the next slide
		showNextSlide(calledID);
		
		// Stop & start the auto slider to reset the timeout Interval
		clearTimeout( scrollerTimeout );
		autoTimer();
	});
	
	// Update inquiry trigger on page load so that the first car name value will be set on the button
	$(window).load(function(){
		if($('.home_cta_content').length){
			var vehicleData = $('.featured_post.visible').data('self');
				
			document.getElementById('inquiry_trigger').setAttribute('data-title',vehicleData.post_title);
		}
	});
	
	// Inquiry trigger
	$('.home_cta_container .inquiry_trigger').click(function(){
		var lightbox = $('.lbi_lightbox.notify_lightbox'),
			vehicleTitle = $('#inquiry_trigger').attr('data-title');
		
		// Update Inquiry Form
		$('.lbi_lightbox.inquiry').find('input[name="offering-name"]').attr('value', vehicleTitle).attr('disabled',true).parent().parent().addClass('filled_out');
		$('.lbi_lightbox.inquiry').find('input[name="offering-title"]').attr('value', vehicleTitle);
		
		// Open it up
		open_lightbox(lightbox);
	});

	

}(jQuery));
function showNextSlide(nextID){
	
	var	$ = jQuery,
		activeSlide = $('.home_cta_image .feat_full.feat-visible'),
		activeTitle = $('.home_cta_content .featured_post.visible');
		
	// Reduce Z-index of current slide to ensure the next slide shows up over top of it
	activeSlide.css({ 'z-index' : '1' }).addClass('remove_stage');
	
	// Stage the next slide depending on if the next slide value element exists or not
	if( $('.home_cta_image .feat_full.post-' + nextID).length ){
		
		var nextSlide = $('.home_cta_image .feat_full.post-' + nextID),
			nextTitle = $('.home_cta_content .featured_post.post-title-' + nextID),
			nextSlideID = nextID;
		
	}else {
		
		var nextSlide = $('.home_cta_image .feat_full.post-0'),
			nextTitle = $('.home_cta_content .featured_post.post-title-0'),
			nextSlideID = 0;
		
	}
	
	// If we're showing Coming Soon items, we need to update the launch trigger metadata
	// so that it will properly autofill the car title field when clicked
	if( $('.inquiry_trigger').length ){
		// Get next slide object
		var nextSlideData = nextTitle.data('self');
		
		// Update launch button data
		document.getElementById('inquiry_trigger').setAttribute('data-title',nextSlideData.post_title);
	}
	
	
	
	// Animate next slide in
	nextSlide.css({ 'z-index' : 2 }).addClass( 'feat-visible' );
	activeTitle.removeClass('visible');
	nextTitle.addClass('visible');
	
	// Update Bubbles
	$('.feat_post_nav .feat_bubble.active').removeClass('active');
	$('.feat_post_nav .feat_bubble.bubble-' + nextSlideID).addClass('active');

	// Pull previous active slide off after the new active slide has animated in
	setTimeout(function(){
		$('.home_cta_image .feat_full.remove_stage').removeClass('feat-visible remove_stage');
	}, 1000);
	
}


  //////////////////
 // HEAR STARTUP //
//////////////////
(function hearStartup($){
	if($('.startup_trigger').length){
		
		var trigger = $('.startup_trigger'),
			src = trigger.data('src'),
			audioTrack = document.getElementById('startup_audio');
		
		trigger.click(function(){
			
			if(!audioTrack.paused && !audioTrack.ended){
				// Audio is playing
				audioTrack.pause();
				
				$('.audio_control_wrapper').removeClass('playing').addClass('paused');
			}else {
				// Audio is not playing
				audioTrack.play();
				
				$('.audio_control_wrapper').removeClass('paused').addClass('playing');
			}
		});
		
		$('.fa-backward').click(function(){
			audioTrack.currentTime = 0;
		});
		
		audioTrack.addEventListener('ended', function(){
			$('.audio_control_wrapper').removeClass('playing').removeClass('paused');
		});
	}
}(jQuery));

  /////////////
 // Masonry //
/////////////
/*
(function media_masonry($){
	var mediagrid = $('.lbi_media_container');
	
	if(mediagrid.length){
		mediagrid.packery({
			itemSelector: '.grid-item',
			percentPosition: true
		});
	}
}(jQuery));
*/

  //////////////////
 // Menu Trigger //
//////////////////
(function menu_trigger($){
	var trigger = $('.menu_trigger'),
		menu = $('#main_menu');
	
	trigger.click(function(){
		if(menu.hasClass('open')){
			menu.removeClass('menu_visible');
			setTimeout(function(){ menu.removeClass('open') },900);
			$('body').removeClass('noscroll');
			$(this).removeClass('open');
		}else {
			menu.addClass('open');
			$(this).addClass('open');
			setTimeout(function(){ menu.addClass('menu_visible') },500);
			$('body').addClass('noscroll');
			
			// If menu is open, change the Z index
			if( $('.search_form_container').hasClass('visible') ){

				$('.search_form_container').css({'z-index' : '1'});
			}
		}
	});
}(jQuery));

(function offering_video($){
	$('.offering, .lbi_media_container .grid-item').hover(function(){
		if( $(this).hasClass('video') ){
			var video = $(this).find('video');
			
			video.get(0).play();
			video.addClass('visible');
			
		}
		
	},function(){
		
		if( $(this).hasClass('video') ){
			var video = $(this).find('video');
			
			video.removeClass('visible');
			setTimeout( function(){
				video.get(0).pause();
				video.get(0).currentTime = 0;
			}, 600);
			
		}
	});
}(jQuery));

(function testEmbed($){
	
	
	// // Load YouTube API
/*
	if($('.featured_media_wrapper')){
	
			// 1. Create API Script Tag
			var api = document.createElement('script');
			
			// 2. Add src attribute to the new script tag
			api.src = 'https://www.youtube.com/iframe_api'; 
			
			// 3. Find the first script element in the DOM
			var first_script = document.getElementsByTagName('script')[0]; 
			
			// 4. Insert the API script before the first script element
			first_script.parentNode.insertBefore(api,first_script);
		
		
	}
*/
/*
	if($('.media_house_sliders').length){
		$(window).load(function(){
			$('.media_house_sliders .featured_image_slider_container').css({'display':'none'});
		});
	}
*/
	$('.photo_trigger').click(function(){
		var data = $(this).data('item'),
			img = data[0]['full_url'],
			lightbox = $('.media_lightbox'),
			closeTrigger = $('.nav-wrapper .search_trigger'),
			gallery_ID = parseInt( $(this).attr('data-id') );
			
			load_img(data[0], lightbox);
		
		// Open Lightbox
		if( !lightbox.hasClass('visible') ){
			open_lightbox(lightbox);
		}
		
		// Update Lightbox Triger
		closeTrigger.text('click to close').addClass('open');
		
		// Show relative gallery slider
		
		$('.media_house_sliders .featured_image_slider_container.gallery-' + gallery_ID).addClass('visible');
		$('.show_filter_trigger').addClass('showing');
		$('.featured_image_showcase .msg').text('hide');
		
		
		// Delay the display of the slider to animate on after lightbox has opened and to resolve a clunky animation trying to animate 
		// the elemnts on to screen while they're being switched from display:none
		setTimeout(function(){
			$('.media_house_sliders').addClass('visible').find('.featured_image_showcase').addClass('showing');
			$('.media_house_sliders .featured_image_showcase .featured_image_slider_container.gallery-' + gallery_ID).jScrollPane();
		}, 500);
		
	});
		
		
	$('.video_trigger').click(function(){
		// 1. Set Data
		var data = $(this).data('item'),
			iframe = data.iframe,
			iframe_wrapper = $('#iframe_wrapper'),
			video_lightbox = $('.lbi_lightbox.video_lightbox');
	
		// 2. Create New iFrame Element
			iframe_wrapper.html( iframe );
		
		
		// 3. Open Lightbox 
			open_lightbox(video_lightbox);
		
		// AUTOPLAY
			
			var iframe = iframe_wrapper.find('iframe');
				iframe_src = iframe.attr('src'),
				iframe_autoplay = (iframe_src.indexOf("?") >= 0 ? '&autoplay=1' : '?autoplay=1' ),
				iframe_src += iframe_autoplay;
			
			iframe.attr('src',iframe_src);
		
		// API
/*
		
			// Add ID attr to iframe
				var iframe = iframe_wrapper.find('iframe');
				
				iframe.attr('id','player');
			
			// Play video with YouTube API
				onYouTubeIframeAPIReady();
			
	
*/
		
	});

}(jQuery));

(function carousel($){
	// Specialist Carousel on About Page
	if($('.specilist_carousel').length){
		$('.specialist_carousel').owlCarousel({
			items: 1,
			nav: false,
			dots: true,
			dotsEach: true,
			autoplay: false,
			autoplayTimeout: 4000,
			autoplayHoverPause: true,
			autoHeight: true,
		});
	}
	
	
	// Featured Collection Home
/*
	if( $('.home_cta_content .featured_posts').length ){
		$('.home_cta_content .featured_posts').owlCarousel({
			items: 3,
			responsive: {
				900 : {
					items: 1,
					dots: true,
					dotsEac: true
				}
			}
		});
	}
*/
	// Specialists Wrapper 
	if( $('.specialists_wrapper').length && window.innerWidth < 1150 ){		
		
		// Init Carousel for mobile device width
		var specialistOwl = $('.specialists_wrapper').owlCarousel({
			items: 1
		});
		
		// The specialist meta container starts as an empty frame, which isn't a big deal
		// for desktop because it's hidden until the user interacts with it. For mobile,
		// it's visiblie imediately, so we need to update its content with the first active specialist
		var mobileSpecialist = $('.specialists_wrapper .owl-item.active .specialist_item');
		updateSpecialist(mobileSpecialist);
		
		// Update the specialist meta container on each chang event
		specialistOwl.on('changed.owl.carousel',function(e){
			setTimeout(function(){
				
				// we need to grab the active specialist each time the container changes
				// this allows us to update the information in the meta container
				var activeSpecialist = $('.specialists_wrapper .owl-item.active .specialist_item');
				
				updateSpecialist(activeSpecialist);
			}, 100);
		});
	}
	// Values
	if($('.value_wrapper').length){
		$('.value_wrapper').owlCarousel({
			items:1,
			dots: true,
			dotsEach: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplayHoverPause: true,
			loop: true,
			autoHeight: true,
			responsive : {
				1150 : {
					items: 3,
					dots: false,
					dotsEach: false,
					loop: false,
					autoplay: false,
				}
			}
		});
	}
	
}(jQuery));

(function inputFocus($){
	$('input, textarea').focus(function(){
		var wrapper = $(this).parent().parent();
		wrapper.addClass('active');
	});
	$('input, textarea').focusout(function(){
		var thisVal = $(this).val(),
			wrapper = $(this).parent().parent();;
		
		wrapper.removeClass('active');

		if(thisVal === ''){
			wrapper.removeClass('filled_out');
		}else {
			wrapper.addClass('filled_out');
		}
	});
}(jQuery));

(function searchTrigger($){
	$('.search_trigger').click(function(){
		if( ! $(this).hasClass('open')){
			
			
			
		}		
	});
}(jQuery));

  ///////////////////
 // OPEN LIGHTBOX //
///////////////////
function open_lightbox(lightbox_id){
	var $ = jQuery,
		timeout = 0,
		navWrapper = $('.nav-wrapper'), // need to make sure it's visible because lightboxes are hidden in nav wrapper for z-index issues
		closeTrigger = $('.nav-wrapper .search_trigger'); // this will change to a close lightbox trigger any time a lightbox is opened

	if( navWrapper.hasClass('hidden') ){
		navWrapper.removeClass('hidden');

	}
	if( !lightbox_id.hasClass('visible') ){
		lightbox_id.addClass('visible');
		closeTrigger.text('Click to close').addClass('open');	
	}
	$('body').addClass('noscroll');
	
	// If image scroller exists, and we triggered it, we need to clone it into the proper lightbox! 
	if( $('.featured_image_showcase').length && lightbox_id.hasClass('media_lightbox') && ! $('.media_house_sliders').length ){
		
		$('.featured_image_showcase').addClass('in_lightbox showing');
		$('.show_filter_trigger').addClass('showing');
		$('.featured_image_showcase .msg').text('hide');
		
		// reinitialize the jscroller to account for the new window width
		$('.featured_image_showcase .featured_image_slider_container').jScrollPane();		
			
	}
	
	if( lightbox_id.hasClass('consignment_lightbox') || lightbox_id.hasClass('notify_lightbox')){
		setTimeout(function(){
			lightbox_id.find('input:not([type="hidden"])').first().focus();
			
		},400);
	}
	
	// If we're opening the inquiry trigger, we need to update the vehicle field
/*
	if( lightbox_id.hasClass('inquiry') ){
		
	}
*/
}

  /////////////////////////////
 // SHOW FILTER IN LIGHTBOX //
/////////////////////////////
(function show_lightbox_filter($){
	$('.show_filter_trigger').click(function(){
		
		var that = $(this);
		
		if($(this).hasClass('showing')){
			$('.show_filter_trigger').removeClass('showing');
			$('.featured_image_showcase').removeClass('showing');
			$('.featured_image_showcase .msg').text('show more');
		}else {
			$('.show_filter_trigger').addClass('showing');
			$('.featured_image_showcase').addClass('showing');
			$('.featured_image_showcase .msg').text('hide');
		}
	});
}(jQuery));
  ////////////////////
 // CLOSE LIGHTBOX //
////////////////////
	// We're going to use this trigger to close other lightboxes as well as open the search form,
	// so we want to scope the close function appropriately here to close the current open lightbox (should it exist), and
	// if it doesn't exist, open the search form
(function closeLightbox($){
	var closeTrigger = $('.nav-wrapper .search_trigger'),
		focusField = $('#focus_field');
		
		closeTrigger.click(function(){
			
			var iframe = $('#iframe_wrapper iframe');
			
			if( $(this).hasClass('open') ){
				if( $('.search_form_container.lbi_lightbox').hasClass('visible')){ 
					// Animate Off
					focusField.focusout();
				}
				
				$('.lbi_lightbox.visible').removeClass('visible');
				closeTrigger.removeClass('open').text('click to search');
					
				iframe.attr('src',''); // stop video from playing
				$('body').removeClass('noscroll');
				
				// Reset photo sliders on media page
				if( $('.media_house_sliders').length ){
					$('.media_house_sliders').removeClass('visible').find('.featured_image_showcase').removeClass('showing');
					// Set slider to display:none on a timeout so it animates out first
					setTimeout(function(){
						$('.media_house_sliders .featured_image_slider_container.visible').removeClass('visible');
					}, 800);
				}
			}else {
				// Display Search Form
				$('.search_form_container').addClass('visible');
				$('.search_trigger.header').text('Click to close').addClass('open');
				setTimeout(function(){
					focusField.focus();
				}, 500);  
				// If menu is open, change the Z index
				if( $('#main_menu').hasClass('open') ){
					$('.search_form_container').css({'z-index' : '10'});
				}
			}
			
			if( $('.featured_image_showcase').length && ! $('.media_house_sliders').length ){
				$('.featured_image_showcase').removeClass('in_lightbox');
				$('.jspContainer').height($('.featured_image_showcase .featured_slide').height() + 8); // height isn't resetting properly so we need to force it before we reinitialize
				$('.featured_image_showcase .featured_image_slider_container').jScrollPane();	
			}
		});
		
		
		$(document).keyup(function(e) {
		     if (e.keyCode == 27 && $('.lbi_lightbox').hasClass('visible')) { // escape key maps to keycode `27`
		       exit_lightbox();
		    }
		});
		
		$('.lbi_lightbox .ribbon').click(function(){
			exit_lightbox();
		});
		
}(jQuery));

function exit_lightbox(){
	var $ = jQuery,
		closeTrigger = $('.nav-wrapper .search_trigger'),
		focusField = $('#focus_field'),
		iframe = $('#iframe_wrapper iframe');
		
	if( $('.search_form_container.lbi_lightbox').hasClass('visible')){ 
		// Animate Off
		focusField.focusout();
	}
	
	$('.lbi_lightbox.visible').removeClass('visible');
	closeTrigger.removeClass('open').text('click to search');
		
	if(iframe.length){
		iframe.attr('src',''); // stop video from playing
	}	
	$('body').removeClass('noscroll');
	
	// Reset photo sliders on media page
	if( $('.media_house_sliders').length ){
		$('.media_house_sliders').removeClass('visible').find('.featured_image_showcase').removeClass('showing');
		// Set slider to display:none on a timeout so it animates out first
		setTimeout(function(){
			$('.media_house_sliders .featured_image_slider_container.visible').removeClass('visible');
		}, 800);
	}
	
	if($('.featured_image_showcase').length && ! $('.media_house_sliders').length){
		$('.featured_image_showcase').removeClass('in_lightbox');
		$('.jspContainer').height($('.featured_image_showcase .featured_slide').height() + 8); // height isn't resetting properly so we need to force it before we reinitialize
		$('.featured_image_showcase .featured_image_slider_container').jScrollPane();		
	}
}

// Contact Form 7 doesn't support adding custom attributes to fields, so we'll need to add an event listener to our textareas
(function addKeyUp($){
	if($('textarea').length){
		$('textarea').each(function(){
			$(this).attr('onkeyup','textareaAdjust(this)');
		});
	}
}(jQuery));

// Contact Form 7 Checkboxes
(function checkboxes($){
	var elem = $('.cf7_checkbox_wrapper .wpcf7-list-item-label');
	
	if( elem.length ){
		
		elem.click(function(){
			cbox( $(this) );
		});
		
		$(window).load(function(){
			elem.each(function(){
				cbox( $(this) );
			});
		});
	}
	
	function cbox(item){
		var checkbox = item.parent().find('input[type="checkbox"]');
		
		if(checkbox.attr('checked') === 'checked'){
			checkbox.attr('checked',false);
			item.removeClass('checked');
		}else {
			checkbox.attr('checked',true);
			item.addClass('checked');
		}

	}
}(jQuery));

function textareaAdjust(t){
	var scrollHeight = t.scrollHeight;    
	
	t.style.height = (2 + t.scrollHeight)+"px";

    
 
}

function lazyLoader(img){
	
	var src = img.attr('data-src'); // Get image src
		if(img.is('img') || img.is('div')){
			var loader = new Image(); // create new DOM element
			loader.src = src; // load the new image with the src
			
			loader.onload = function(){ // when the image is loaded, apply the source appropriately to the element
				
				if(img.is('img')){
					img.attr('src',src); 
				}
				if( img.is('div') ){
					img.attr('style','background-image: url(' + src + ')');
					img.addClass('div_check');
				}
	
	
				img.addClass('visible');
			};
		}
		if( img.is('source') ){
			img.attr('src',src);
			var video = document.getElementById('social-video');
			video.load();
			if( ! video.classList.contains('thumbnail') ){
				video.play();
			}
		
		}
		
		img.removeClass('lazy-load');
}

function setMaxHeight(elemclass){
	var maxHeight = 0,
		$ = jQuery,
		elem = $('.' + elemclass);
		
	elem.each(function(){
	   maxHeight = $(this).outerHeight() > maxHeight ? $(this).outerHeight() : maxHeight;
	});
	
	elem.css({'height':maxHeight});
}










function preload() {
	var images = new Array();
	for (i = 0; i < preload.arguments.length; i++) {
		images[i] = new Image();
		images[i].src = preload.arguments[i];
		
/* 		console.log( 'Image load fired for: ' + preload.arguments[i] ); */
	}
}


(function projectPlanner($){
	
	// Planner Navigation
	$('.btns .main-btn').click(function(){
		var currentField = parseInt($('.ppsection.visible').data('part'));
		
		if($(this).hasClass('next-field')){
			var nextField = currentField + 1;
		}
		if($(this).hasClass('prev-field')){
			var nextField = currentField - 1;
		}
		
		ppNextField(currentField, nextField);
	});
	
	// Keypress

		var shiftKey = false;
		
		$(document).keydown(function(e) {
			if( $('.ppsection.visible').length ){
				
				var currentField = parseInt($('.ppsection.visible').data('part'));
				
				if( e.keyCode === 16 ){
					shiftKey = true;
				}
				
				if( $('.ppsection.visible input').is(':focus') || $('.ppsection.visible textarea').is(':focus')  ){
					// We're in an input, so tabbing through is appropriate
					if( e.keyCode === 9 ){
						
					
						
						// if the tab key was pressed, we need to check which input we're on
						// if it's the last one in the field, we need to advance the page - if not, let it
						// do its default functionality
						var	currentInput = $('.ppsection.visible input:focus, .ppsection.visible textarea:focus').parent().parent();
							
							if( ! currentInput.next().length && !shiftKey ){
								// Prevent default tab function to override and resolve any functionality conflicts
								e.preventDefault();
								
								// Going forward in the form
								
								var nextField = currentField + 1;
								ppNextField(currentField, nextField);
								
							}
							
							if( ! currentInput.prev().length && shiftKey ){
								// Prevent default tab function to override and resolve any functionality conflicts
								e.preventDefault();

								// Going backwards in the form
								var nextField = currentField - 1;
								ppNextField(currentField, nextField);
								
								// Set next field to active
							/*
	setTimeout(function(){
									$('.ppsection.visible .field:last-child input').focus();
								}, 2000);
*/
								
							}
					}
				}else {
					// We're not in an input, so we'll check if the key is an arrow and navigate accordingly
					if( e.keyCode === 37 ){
						// navigate left
						var nextField = currentField - 1;
						ppNextField(currentField, nextField);
					}
					if( e.keyCode === 39 ){
						// navigate right
						var nextField = currentField + 1;
						ppNextField(currentField, nextField);
					}
				}
				if(e.keyCode == 13){
					if (currentField !== 5){
						e.preventDefault();
						var nextField = currentField + 1;
						ppNextField(currentField, nextField);
					}else {
						// submit form
					}
				}
			   
			   
			   
			   
			   /*
 if( e.keyCode === 91 && ) {
			        
			    }
			    if (down[16] && down[37]){
				    var nextField = currentField - 1;
			    }
			    ppNextField(currentField, nextField);
*/
		    }
		});
		$(document).keyup(function(e){
			if(e.keyCode === 16 && shiftKey){
				shiftKey = false;
			}
		});
	
	// Checkboxes 
/*
	$('.wpcf7-list-item').click(function(){
		var object = $(this),
			value = $(this).text();
		
		checkbox(object,value);
	});
*/
	
	
	// Mail Sent Ok
	$(".wpcf7").on('wpcf7:mailsent', function(event){
		setTimeout(function(){
				  $('.submit-success').addClass('visible');
		}, 800);
	  $('.ppsection.visible').addClass('prev').removeClass('visible');
	  $('.planner-meta .curren-title').text('success!');
	  $('.project-planner-container .btns').addClass('hidden');
	});
	
	// Errors
	$(".wpcf7").on('wpcf7:invalid', function(event){
		var info = $('.wpcf7-not-valid-tip').first(),
			section = findParent(info,'ppsection'),
			current = $('.ppsection.visible').data("part");
			
		ppNextField(current, section);
		
		$('.project-planner-container .main-btn.submit').addClass('hidden');
		$('.project-planner-container .main-btn.next-field').removeClass('hidden');
		
		$('.ppsection.prev').each(function(){
			var part = $(this).data("part");
			
			if(part > section){
				$(this).removeClass('prev');
			}
		});
		
		
		
			
	  
	});	
}(jQuery));
(function dropZoneUploader($){
	if ($('#dropzone').length){
		
	
	uploads = [];
	
	// Drop files on dropzone
	var dropzone = document.getElementById('dropzone'),
		upload = function(file){
				var x;
			
				for(x = 0; x < file.length; x++){
					
					
					// Check that the file passes validation vefore uploading it
					validation = validateUploads(file[x]);
					
					if(typeof validation !== undefined && validation.length > 0){
						// There are errors, send them out and don't upload!
						
						for(er = 0; er < validation.length; er++){
						}
					}else {
						// AJAX 
						var formData = new FormData(),
							xhr = new XMLHttpRequest(),
							fileName = file[x].name,
							fileSize = file[x].size;
						
						
						
						
						formData.append('file[]', file[x]);
						
						
						// Update Display Info
						var fileStatus = $('#uploaded-files .uploaded-file:not(.visible)').first();
						
						if( ! fileStatus.hasClass('visible')){
							fileStatus.addClass('visible').find('.file-name').attr('id', fileID(file[x]));
							fileStatus.find('.file-name').text(file[x].name);
						}
						
						
						// Upload Progress
						xhr.upload.addEventListener("loadstart", function(e){

							
							this.progressID = "f_" + Math.round(Math.random() * e.timeStamp * 503413015.254); // global variable for progress uploader
							
							
							var progressContainer = $('#uploaded-files .uploaded-file:not(.hasFile)').first();
							
							if(progressContainer.length){
								progressContainer.attr('id',this.progressID).addClass('hasFile');
							} 
							
						});
						xhr.upload.addEventListener("progress", progressHandler, false);
						
						xhr.onload = function(){
							var data = JSON.parse(this.responseText);
							
							if(data.errors.length > 0){
								
								// There are errors, let's pass that information to the errors function
								uploadErrors(data.errors);
							}
							
							
							displayUpload(data.uploads);
							
						}
						
						var home_url = window.location.origin;
						
						if( home_url.includes('localhost') ){
							// we're either the local environment, so we need to adjust the filepath a little bit
							var uploadFilepath = home_url + '/lbi/wp-content/plugins/dragDrop/upload_file.php';
						}else if( home_url.includes('132') ){
							// we're in the staging environemnt, so we need to adjust the filepath a little bit
							var uploadFilepath = home_url + '/~lbi/wp-content/plugins/dragDrop/upload_file.php';
						}else{
							// we're likely in a live environment, smooth sailing to the upload file :)
							var uploadFilepath = home_url + '/wp-content/plugins/dragDrop/upload_file.php';
						}
						xhr.open('post',uploadFilepath); // fix this static link!
						xhr.send(formData);	
					}
				}
			},
		uploadErrors = function(array){
			for(er = 0; er < array.length; er++){
				var file_name 	= array[er].file_name,
					error_type 	= array[er].type,
					error 		= array[er].error,
					file_id 	= fileID(file_name),
					error_out	= "<li class='error'>" + error + "</li>";
					
				$('#' + file_id).addClass('error').parent().addClass('errors').find('.error-list').prepend(error_out);	
				
			}
		},
		displayUpload = function(data){
			// Display what's being uploaded for the user
			var	x;
			
			for(x=0; x <= data.length; x++){
				
				// Set Variables for sending uploaded file names to hidden inputs
				var loopNum = x + 1,
					input = $('#filenames input[type="text"]:not(.hasFile)').first();
				
				// Push filename to array
				uploads.push(data[x].name);
				
				// Add file name to inputs
				if( ! input.hasClass('hasFile')){
					var filename_split = data[x].name.split('.'),
						fileUP_id = 'f_' + filename_split[0];
					
					input.val(data[x].name).addClass('hasFile').attr('id',fileUP_id);
				}
				
				// Add uploaded class to filename in progress container
				$('#uploaded-files').find('.file-name').each( function(){
					var fileName = $(this).text();
					
					if(fileName == data[x].name){
						$(this).addClass('loaded');
					}	
				});
				
			}
			
		},
		progressHandler = function(e){
			var totalSize = e.total,
					totalLoaded = e.loaded,
					percentLoaded = (totalLoaded/totalSize),
					elemID = this.progressID;
					
	
				$('#uploaded-files .uploaded-file#' + elemID + ' .progress-bar .progress').css({'transform':'scaleX(' + percentLoaded + ')'});
			
		};
	
	dropzone.ondragover = function(){
		$(this).addClass('drag_over'); 
		return false;
	};
	dropzone.ondragleave = function() {
		$(this).removeClass('drag_over');
		return false;
	};
	dropzone.ondrop = function(e){
		// Prevent default browser action
		e.preventDefault();
		
		// Handle uploader styles
		$(this).removeClass('drag_over').addClass('uploading');
		
		// Create variables
		var fileLength = e.dataTransfer.files.length,
			fileType = e.dataTransfer.files[0]['type'];
			
		// Handle upload event
			if(fileLength <= 5 && uploads.length <= 5){ //  && fileType == 'audio/mp3'
				// Upload File
				upload(e.dataTransfer.files);
				
			}else if(uploads.length > 5 || fileLength > 5){
				alert("No more than 5 files please");
			}else {
				// Instruct user as to what uploads are accepted
				alert('please upload a single image file');
			}
		
	};
	
	// Click on browse
	$('#dropzone .browse-trigger').click(function(e){
		$('#file-upload-hidden').trigger('click');
	});
	
	// Upload file when input changes
	$('#file-upload-hidden').change(function(){
		
		$('#dropzone').removeClass('drag_over').addClass('uploading');
		
		// Create variables
		var fileLength = this.files.length,
			fileType = this.files[0]['type'];
			
		// Handle upload event
			if(fileLength <= 5 && uploads.length < 5){ //  && fileType == 'audio/mp3'
				// Pass file to upload
				upload(this.files);
				
			}else if(uploads.length >= 5 || fileLength > 5){
				alert("No more than five files, please.");
			}else {
				// Instruct user as to what uploads are accepted
				alert('please upload a single .mp3 file');
			}
			
			// Remove file from input
			this.value = '';
	});
	// Remove File from upload queue
	$('.remove-file').click(function(){
		var id = $(this).data('file'),
			uploadContainer = $('.uploaded-file.file-' + id),
			progressBar = uploadContainer.find('.progress-bar .progress'),
			fileNameContainer = uploadContainer.find('.file-name'),
			fileName = fileNameContainer.text(),
			filename_split = fileName.split('.'),
			fileUP_id = 'f_' + filename_split[0],
			input = $('input#'+fileUP_id),
			index = uploads.indexOf(fileName);
					
			progressBar.css({'transform' : 'scale(0)'});
			fileNameContainer.text('');
			input.val('').removeClass('hasFile').attr('id','');
			uploadContainer.removeClass('visible');
			
			$('.file-' + id).attr('id','').removeClass('hasFile errors').find('.upload-info').removeClass('errors').find('.file-name').removeClass('loaded error').attr('id','');
			$('.file-' + id).find('.error-list').text('');
			if(! $('.uploaded-file.visible').length){
				$('#dropzone').removeClass('uploading');
			}
			
			// Remove File from uploaded array
			if(index > -1){
				uploads.splice(index,1);
			}
	});
	}
}(jQuery));


function validateUploads(obj){
	
	var $ = jQuery,
		errors = [],
		f_Id = fileID(obj);
	
	// File Duplicate
	if($('#' + f_Id).length){
		errors.push('Oh shit, it looks like you already uploaded this one.');
	}
	
	// More than two files uploaded
	
	// File Type
	
	// File Size
	
	return errors;
}
function fileID(obj){
		// Global File ID Variable	
		
		
		if(obj.name !== undefined){
			// File object is being passed
			var fileName = obj.name;
		}else {
			// File-name string is being passed
			var fileName = obj;
		}
		
		var	file_ID = 'f_' + fileName.split('.')[0].replace(/ /g,'-');
		
		return file_ID;
}
function findParent(obj,cls){
	var child = obj,
		parent;
	for(ii = 1; ii < 6; ii++){
		
		if(child.parent().hasClass(cls)){
			parent = child.parent().data('part');
		}else {
			child = child.parent();
		}
		
	}
	return parent;
}

function ppNextField(currentFieldID, nextFieldID){
	var $ = jQuery,
		fieldCount = $('.ppsection').length,
		nextButton = $('.btns .next-field'),
		prevButton = $('.btns .prev-field'),
		submitButton = $('.btns .submit'),
		partName = $('.ppsection.part-' + nextFieldID).data('name'),
		currentName = $('.planner-meta .current-title').text(),
		partNumber = $('.ppsection.part-' + nextFieldID).data('part'),
		input = $('.ppsection.part-' + nextFieldID + ' input, .ppsection.part-' + nextFieldID + ' textarea' ).first();
		
	
	// HANDLE BUTTONS
	
	if(nextFieldID < currentFieldID && nextFieldID > 1){ // going back to a previous field in the form
		// Manage Buttons
		submitButton.addClass('hidden');
		nextButton.removeClass('hidden');
	
	}
	if(nextFieldID > currentFieldID && nextFieldID < fieldCount){ // going forward to next field
		// Manage Buttons
		prevButton.removeClass('hidden');
		$('.nav-hint').removeClass('visible');
	
	}
	if(nextFieldID == 1){ // first field
		// Manage Buttons
		prevButton.addClass('hidden');
		$('.nav-hint').addClass('visible');
	}
	if(nextFieldID == fieldCount){ // last field
		// Manage buttons
		nextButton.addClass('hidden');
		submitButton.removeClass('hidden');
	}
	
	//CHANGE FIELDS
	
	if(nextFieldID > currentFieldID && $('.ppsection.part-' + nextFieldID).length){ // Move Forward
		// Animate Fields
		$('.ppsection.part-' + nextFieldID).addClass('visible');
		$('.ppsection.part-' + currentFieldID).removeClass('visible').addClass('prev');
		
		// Setup input function
		var focusInput = $('.ppsection.part-' + nextFieldID + ' input, .ppsection.part-' + nextFieldID + ' textarea' ).first();
	}
	if(nextFieldID < currentFieldID && $('.ppsection.part-' + nextFieldID).length){ // Move Backwards
		// Animate Fields
		$('.ppsection.part-' + nextFieldID).addClass('visible').removeClass('prev');
		$('.ppsection.part-' + currentFieldID).removeClass('visible');

		// Setup input function
		var focusInput = $('.ppsection.part-' + nextFieldID + ' input, .ppsection.part-' + nextFieldID + ' textarea' ).last();
	
	}
	
	// UPDATE PROJECT PLANNER META
	if(partNumber !== undefined){
		$('.planner-meta .current-field').text('0' + partNumber);
	}
	if(partName !== currentName){
		$('.planner-meta .current-title').text(partName);
	}
	
	// Activate first field of the section if it's a typing field
	if(focusInput.length && focusInput.val() == ''){		
		setTimeout(function(){
			// put in set timeout because focus won't fire before animation has completed
			focusInput.focus();
		},1000);
	}
	
	// Hide datepicker calendar
	if( $('.ui-datepicker').is(':visible') ){
		$('.ui-datepicker').css({'display':'none'});
	}
	
}
// Fix VH Issue for mobile
(function vhFix($){
	var vhItem = $('.vhfix');
	
	if(mobile()){
		vhItem.each(function(){
			var height = $(this).height();
			
			$(this).css({'height' : height});
		});
	}
	
}(jQuery));
  /////////////////////
 // Offering Filter //
/////////////////////
(function offeringFilter($){
	if( $('.featured_image_showcase').length ){
		
		// Initialize the slider scrollbar which uses jquery ScrollPane 3rd party plugin
		$('.featured_image_slider_container').jScrollPane();
		
		// Grab the Filters
		var filter = $('ul.filter li span'),
			galleryTrigger = $('.gallery_trigger');
		
		// Filter content when a filter item is clicked
		filter.click(function(){
			var cat = $(this).data('cat'),
				photoClass = $(this).data('class'); // need to use this filter to distinguish which class of photos we're filtering, regs or glams
				

				filterSlider(photoClass, cat);

			});
			
		// Use select box to change fields
		$('.mobile_filter').change(function(e){
			
			
			var selectedClass = e.target.value,
				photoSet = $('.mobile_filter').find('option.' + selectedClass).attr('data-class');
				
				
				filterSlider(photoSet, selectedClass);
			
		});
		
		// Change photo gallery 
		galleryTrigger.click(function(){
			var gallery = $(this).data('gallery');
			
			$('.featured_image_showcase.visible').removeClass('visible');
			$('.featured_image_showcase.' + gallery).addClass('visible');
		});
	}
	
	function filterSlider(photoClass, photoCat){
		var showcaseScope = $('.featured_image_showcase.' + photoClass); // using the parent showcase wrappers to establish a scope of action for these filter events
			
			// Change slider content
				if(photoCat == 'all'){
					showcaseScope.find('.featured_slide').removeClass('hidden');
					showcaseScope.find('ul.filter li span').removeClass('acitve');
				}else {
					showcaseScope.find('.featured_slide.' + photoCat).removeClass('hidden');
					showcaseScope.find(' .featured_slide:not(.'+photoCat+')').addClass('hidden');
				}
			
			// Update Filter Information
				showcaseScope.find('ul.filter li span').removeClass('active');
				$(this).addClass('active');
				$('.jspPane, .jspDrag').css({'left':0}); //reset scroll position of slider
			
			// Re-initialize the ScrollPane plugin to update the slider width and scroll information
				$('.featured_image_showcase.visible .featured_image_slider_container').jScrollPane();
		
		
	}
}(jQuery));

function throttle(fn, wait) {
  var time = Date.now();
  return function() {
    if ((time + wait - Date.now()) < 0) {
      fn();
      time = Date.now();
    }
  }
}

function projectHover(event, elem){
	if(mobile()==false){
		
		var projectBox = elem, 
			projectBackground = document.getElementById('project-background'),
			boxOffsetHeight = projectBox.getBoundingClientRect().top, // offset from top edge to window edge
			boxOffsetWidth = projectBox.getBoundingClientRect().left, // ofset from left edge to window edge
			boxHeight = projectBox.offsetHeight, // height of box
			boxWidth = projectBox.offsetWidth, // width of box
			adjustCoefficient = 0.5, // divide height & width and use to measure box in 4 equal Quadrants
			widthAdjust = boxWidth * adjustCoefficient, // use this to adjust and get % of mouse X position
			heightAdjust = boxHeight * adjustCoefficient, // use this to adjust and get % of mouseY position
			mouseX = parseInt(event.clientX - boxOffsetWidth) - widthAdjust, // 0 = middle of box on X axis
		    mouseY = parseInt(event.clientY - boxOffsetHeight) - heightAdjust, // 0 = middle of box on Y axis
			percentX = (mouseX / widthAdjust), // precent mouse position on the X axis ( 1 - right : -1 = left )
			percentY = mouseY / heightAdjust, // precent mouse position on Y axis ( 1 = bottom : -1 = top )
			rotateValue = 0.000055, // the maxiumum value the container can rotate in any direction (using matrix3D, this would be the depth rating)
			shadowValue = 8, // the max distance the dropshadow can offset
			shadowX = (percentX * shadowValue) * -1,
			shadowY = (percentY * shadowValue) * -1,
			rotateX = (percentX * rotateValue),
			rotateY = (percentY * rotateValue);
		
		
	
		projectBox.style.transform = 'matrix3d(0.98,0,0.17,'+ rotateX +',0.00,0.98,0.17,' + rotateY + ',-0.17,-0.17,0.9603999999999999,0,0,0,0,1) translate3d(0,0,0)';
		jQuery('#project-background').css({'-webkit-transform':'matrix3d(0.98,0,0.17,'+ rotateX +',0.00,0.98,0.17,' + rotateY + ',-0.17,-0.17,0.9603999999999999,0,0,0,0,1)'});
		projectBox.style['box-shadow'] = shadowX + 'px ' + shadowY + 'px 26px rgba(22, 22, 22, 0.5)';


	}
}
function projectReset(elem){
	var projectBackground = elem;
	
		projectBackground.style.transform = 'matrix3d(1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1)';
		projectBackground.style['box-shadow'] ='0px 6px 26px rgba(22, 22, 22, 0.5)';	
}
(function anchorClick($){
	$('a.anchor').click(function(e){
		e.preventDefault();
		var dataID = $(this).data('cid');
		scrollToAnchor(dataID);

	});
}(jQuery));
function scrollToAnchor(aid){
    var aTag = jQuery("#"+ aid);
    jQuery('html,body').animate({scrollTop: ( aTag.offset().top - 150 )},'slow');
}