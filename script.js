$(document).ready(function (){
		$(".rich_text_box").RichTextBox();
});
	
(function (){
	
	$.fn.RichTextBox = function ( options ) {
		'use strict';
		
		/**	----- Necessary Variables ----- **/
		let text = "";
		let editor = $(this);
		let selector = editor.parent();
		let append = editor.parent().find('.ep-text-append');
		let e = editor.contents();

		var config = {};
		var baseUrl = "";
		
		/**	----- Main Activity ----- **/
		if( options ){
			$.extend(config, options);
		}
		
		baseUrl = (config.base) ? config.base : "";

		e.prop('designMode', 'on');
		e.find('body').html(append.attr('value'));
		
		e.find('head').html("<style>\
			body{\
				font-family: Roboto, solaimanlipi, Open Sans, Arial, sans-serif; font-size : 14; color: #333;\
				overflow: hidden; }\
			img {\
				position: relative; display : block; width : 100%;\
			}\
			</style>");
		
		let height = 250;
		let inner;
		let innerH;
		
		setInterval ( function () {
			inner = e.find('body').html();
			innerH = e.find('body')[0].scrollHeight;
			
			if ( text != inner ) {
				text = inner;
				append.html(text);
			}
			if( height != innerH && innerH > 250 && ( Math.abs( height-innerH ) > 5 ) ) {
				height = innerH;
				editor.css('height', height + "px");
			} else
				height = innerH;

		}, 1 );

		function commandExec ( cmd, option = null ) {
			let action = document.getElementById(editor.attr('id')).contentWindow.document;

			if( cmd === 'embed')  {
				let embed = '<iframe src="'+ option.replace('watch?v=', 'embed/') +'" allowfullscreen="true" width="560" frameborder="0" height="315"></iframe>';
				if(embed != null)
					action.execCommand( 'insertHTML', false, '<div class = "post-vid-cont">' + embed + '</div>' );
			}
			else
				action.execCommand(cmd, false, option);

		}

		/* Non Select Options */
		selector.on('click', '.ep-text-styling-group-border>a, .ep-text-styling-group>a', function() {
			
			switch ( $(this).attr('data-option') ) {
				case 'embed':
					commandExec( $(this).attr('data-option'), prompt('YouTube url') );
					break;
				case 'formatBlock':
					commandExec( $(this).attr('data-option'), '<blockquote>' );
				break;
				case 'createLink':
					commandExec( $(this).attr('data-option'), prompt('Enter a URL', 'https://') );
					break;
				default:
					commandExec( $(this).attr('data-option') );
					break;
			}
		});

		selector.on('change', '.ep-text-styling-group-border>select, .ep-text-styling-group>select', function () {
			commandExec( $(this).attr('data-option'), $(this).children('option:selected').val() );
		});

		selector.on('click', '.ep-text-height-up', function() {
			editor.css ('height', ( parseInt(editor.height()) - 100 ) + "px");
		});
		
		selector.on('click', '.ep-text-height-down', function() {
			editor.css( 'height', ( parseInt(editor.height()) + 100 ) + "px" );
		});
		
		selector.on('click', '.ep-text-image-toggle-button', function() {
			$(this).find('.ep-text-image-toggle-galery').stop(true, true).toggle(300);
		});

		selector.on('click', '.ep-text-image-galery img', function(){
			commandExec( 'insertImage', $(this).attr('data-image') );
			if( $(this).attr('data-des') )
				commandExec( 'insertHTML', '<br><div class = "post-img-title">'+ $(this).attr('data-des') +'</div><br>' );
		});

	}
	
})(jQuery);