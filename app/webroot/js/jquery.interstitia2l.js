/* 
 * jQuery interstitial plugin v1.1
 * jquery.interstitial.js
 *
 * https://github.com/brettdewoody/jQuery-Interstitial
 *
 * Copyright (c) 2011 Brett DeWoody
 * 
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 * Special thanks to Soh Tanaka (http://www.sohtanaka.com) for inspiring 
 * this jQuery-based interstitial popup.  You can read about his original 
 * method here on Soh Tanaka's webite:
 *
 * http://www.sohtanaka.com/web-design/inline-modal-window-w-css-and-jquery 
 */

(function( $ ){

  var methods = {
     open : function( options ) {
     
       var defaults = {
         'url'         			: '',
         'width' 				: '100%',
         'height'				: 700,
         'opacity'				: 50,
         'id'					: 'popupBlock',
         'onInterstitialClose' 	: function(){}
    	};
    	
        var settings = $.extend({}, defaults, options);
		
		//Fade in Background
		$('body').append('<div id="fade"></div>'); 
		$('#fade').css({'filter' : 'alpha(opacity=' + settings.opacity + ')'}).fadeIn();

		//Fade in the Popup
		$('body').append('<div class="span8" id="' + settings.id + '"></div>');
		$('#' + settings.id).load(settings.url, function() {
			$('#' + settings.id).css({'max-width' : 0.8*parseInt($(window).width()),'height' : 0.8*parseInt($(window).height())}).fadeIn();
		});
		alert(($('#' + settings.id).css('height')) )
		//Define margin for center alignment (vertical + horizontal)
		var popMargTop = +  parseInt($('#' + settings.id).height()) / 2;
		var popMargLeft = +  parseInt($('#' + settings.id).width()) / 2;
		
		//Apply Margin to Popup
		$('#' + settings.id).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		$(function(){
		var scaleH=1
			var scaleW=1
		
	});

		
		//On click of the fade, close the popup and fade
		$(".pop_container").find(".close").live('click', function() {
	  	  $().interstitial('close', settings);		
		});
		$("#fade").live('click', function() {
	  	  $().interstitial('close', settings);		
		});

     },
     
     // Function: Close the interstitial
     close : function( options ) {
     
       var defaults = {
         'id'					: 'popupBlock',
         'onInterstitialClose' 	: function(){}
    	};
     
       var settings = $.extend({}, defaults, options);
     
		$('#fade , #' + settings.id).fadeOut(function() {
			$('#fade').remove();  
		});
		
		// onInterstitialClose callback
    	settings.onInterstitialClose.call(this);
		
 	 }
  };

  $.fn.interstitial = function( method ) {
    
    if ( methods[method] ) {
      return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on jQuery.interstitial' );
    }    
  
  };

})( jQuery );