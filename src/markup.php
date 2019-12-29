<?php

/**
 * 
 * ePHP v1.0.0 mini (Framework/Library)
 * Copyright 2017 amsrafid.
 * Licensed under A. M. Sadman Rafid (amsrafid.com)
 * 
 * GitHub: https://github.com/amsrafid
 * 
 * Part of Markup Generate
 * 
 * **/

class MarkUp {

	/**
		 * @param array $arg	Argument having following keys	DEFAULT []
		 * 	[
		 * 		name, id, cls, val, 
		 * 		ignore<-[],
		 * 		galery<-()
		 * 	]
		 * 
		 * 	fields are following
		 * 		bold, italic, underline, del,
		 * 		heading, fontFace, fontSize,
		 * 		justifyLeft, justifyCenter, justifyRight, justifyFull,
		 * 		subscript, superscript,
		 * 		unorderedList, orderedList,
		 * 		image, video,
		 * 		paragraph, blockquote,
		 * 		indent, outdent,
		 * 		createLink, unlink
		 * 
		 * @return String $textBox
		 */
		public static function richText ( $arg = [] ) {	// /* => name, => id, => cls, => val, => attr */

			$name	= isset($arg['name']) ? $arg['name'] : (isset($arg['id']) ? $arg['id'] : "");
			$id	= isset($arg['id']) ? $arg['id'] : $name;
			$cls	= isset($arg['cls']) ? " " . $arg['cls'] : "";
			$data = array(
				"bold" => true, "italic" => true, "underline" => true, "del" => true, "justifyLeft" => true,
				"justifyCenter" => true, "justifyRight" => true, "justifyFull" => true, "subscript" => true, "superscript" => true,
				"unorderedList" => true, "orderedList"		=>	true, "image" => true, "video" => true, "paragraph" => true, 'blockquote' => true,
				"heading" => true, "fontFace" => true, "fontSize" => true, "indent" => true, "outdent" => true, "createLink" => true, "unlink" =>	true
			);
			if (isset($arg['ignore'])) {
				foreach( $arg['ignore'] as $key )
					$data[$key] = false;
			}
			$galery = isset($arg['galery']) ? $arg['galery'] : function (){};

			$wrap = isset($arg['wrap']) ? $arg['wrap'] : null;
			$pTop = isset($arg['lbl_ptop']) ? $arg['lbl_ptop'] : true;
			$pLft = isset($arg['lbl_plft']) ? $arg['lbl_plft'] : true;

			if ($wrap) { ?>
			<div class = '<?php echo $wrap; ?>'>
			<?php }
			if ( isset ( $arg['lbl'] ) )
				self::label ( [ 'cls' => ($pTop ? 'padding-top-half ' : '') . ( $pLft ? 'padding-left-half' : ''), 'txt' => $arg['lbl']] );
			?>
			<div class='ep-text'>
				<div class='ep-text-styling'>		<!-- Styling -->
					<span class='ep-text-styling-group-border'>	<!-- B I U sT -->
						<?php if( $data['bold'] ){ ?>
						<a data-option = 'bold' > <i class='fa fa-bold'></i></a> 
						<?php }if( $data['italic'] ){ ?>
						<a data-option = 'italic' > <i class='fa fa-italic'></i></a> 
						<?php }if( $data['underline'] ){ ?>
						<a data-option = 'underline' > <i class='fa fa-underline'></i></a> 
						<?php }if( $data['del'] ){ ?>
						<a data-option = 'strikeThrough' > <i class='fa fa-strikethrough'></i></a> 
						<?php } ?>
					</span>
					<span class='ep-text-styling-group-border'>		<!-- H* Font[name, size] -->
						<?php if ($data['heading'] ){ ?>
						<select data-option = 'formatBlock'>
							<option>H*</option>
							<option value = 'H6'>H6</option>
							<option value = 'H5'>H5</option>
							<option value = 'H4'>H4</option>
							<option value = 'H3'>H3</option>
							<option value = 'H2'>H2</option>
							<option value = 'H1'>H1</option>
						</select>
						<?php } if ($data['fontFace'] ){ ?>
						<select data-option = 'fontName'>
							<option>Font</option>
							<option value = 'Arial'>Arial</option>
							<option value = 'Comic Sans MS'>Comic Sans MS</option>
							<option value = 'Courier'>Courier</option>
							<option value = 'Georgia'>Georgia</option>
							<option value = 'Tahoma'>Tahoma</option>
							<option value = 'Times New Roman'>Times New Roman</option>
							<option value = 'Verdana'>Verdana</option>
						</select>
						<?php } if ($data['fontSize'] ){ ?>
						<select data-option = 'fontSize'>
							<option>Size</option>
							<option value = '1'>1</option>
							<option value = '2'>2</option>
							<option value = '3'>3</option>
							<option value = '4'>4</option>
							<option value = '5'>5</option>
							<option value = '6'>6</option>
							<option value = '7'>7</option>
						</select>
						<?php } ?>
					</span>
					<span class='ep-text-styling-group-border'>	<!-- justify L R C F -->
						<?php if ( $data['justifyLeft'] ) { ?>
						<a data-option = 'justifyLeft'> <i class='fa fa-align-left'></i></a>
						<?php } if ( $data['justifyCenter'] ) { ?>
						<a data-option = 'justifyCenter'> <i class='fa fa-align-center'></i></a>
						<?php } if ( $data['justifyRight'] ) { ?>
						<a data-option = 'justifyRight'> <i class='fa fa-align-right'></i></a>
						<?php } if ( $data['justifyFull'] ) { ?>
						<a data-option = 'justifyFull'> <i class='fa fa-align-justify'></i></a>
						<?php } ?>
					</span>
					<span class='ep-text-styling-group-border'>		<!-- sub sup -->
						<?php if($data['subscript']) { ?>
						<a data-option = 'subscript'> <i class='fa fa-subscript'></i></a>
						<?php } if($data['superscript']) { ?>
						<a data-option = 'superscript'> <i class='fa fa-superscript'></i></a>
						<?php } ?>
					</span>
					<span class='ep-text-styling-group-border'>		<!-- List U O -->
						<?php if($data['unorderedList']) { ?>
						<a data-option = 'insertUnorderedList'> <i class='fa fa-list-ul'></i></a>
						<?php } if($data['orderedList']) { ?>
						<a data-option = 'insertOrderedList'> <i class='fa fa-list-ol'></i></a>
						<?php } ?>
					</span>
					<span class='ep-text-styling-group-border'>	<!-- Image, Video -->
						<?php if($data['image']) { ?>
						<a class = 'ep-text-image-toggle-button'> <i class='fa fa-camera'></i>
							<div class='ep-text-image-galery ep-text-image-toggle-galery' style='display: none'>
								<div class="ep-text-img-container"><?php $galery(); ?></div>
								
								<div class='ep-text-galary-query'>
									<input type = 'text' placeholder = 'search image' class = 'query-input' />
									<button class = 'query-submit btn-primary'>submit</button>
								</div>
							</div>
						</a>
						<?php } if($data['video']) { ?>
						<a data-option = 'embed'> <i class='fa fa-video-camera'></i></a>
						<?php } ?>
					</span>
					<span class='ep-text-styling-group-border'>		<!-- P q inden outdent -->
						<?php if($data['paragraph']) { ?>
						<a data-option = 'insertParagraph'> <i class='fa fa-paragraph'></i></a>
						<?php }if($data['blockquote']) { ?>
						<a data-option = 'formatBlock'> <i class='fa fa-quote-left'></i></a>
						<?php } if($data['indent']) { ?>
						<a class = 'ep-text-styling-options' data-option = 'indent'> <i class='fa fa-indent'></i></a>
						<?php } if($data['outdent']) { ?>
						<a class = 'ep-text-styling-options' data-option = 'outdent'> <i class='fa fa-outdent'></i></a>
						<?php } ?>
					</span>
					<span class='ep-text-styling-group'>		<!-- link unL -->
						<a data-option ='createLink'><i class='fa fa-link'></i></a>
						<a data-option ='unlink'><i class='fa fa-unlink'></i></a>
					</span>
				</div>

					<!-- Main Editing Area -->
				<textarea name='<?php echo $name; ?>' id='<?php echo $id; ?>' class='ep-text-append' hidden value = '<?php echo isset($arg['val']) ? $arg['val'] : ''; ?>'></textarea>
				<iframe class = 'ep-text-editor<?php echo $cls; ?>' id = "<?php echo "ep_text_" .$id."_editor"; ?>" frameborder='1'></iframe>
					<!-- /End Main Editing Area -->

				<div class='ep-text-size'>	<!-- Textarea sizing -->
					<span class='ep-text-styling-group'>
						<a class = 'ep-text-height-up'><i class='fa fa-sort-asc'></i></a>
						<a class = 'ep-text-height-down'><i class='fa fa-sort-desc'></i></a>
					</span>
				</div>
			</div>
			<?php
			if($wrap){ ?></div> <?php }
			
		}
		
}