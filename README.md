## EP TEXT
Simple jQuery Rich Text Box used into any php project but specially develped for **easyPHP** php Library developed with amsrafid.

## How to Use?

```
	<!-- style -->
	//style.css

	<!-- MarkUp Part -->
	<?php
		require_once 'markup.php';
		
		MarkUp::richText([ 'id' => 'id', 'cls => 'class' ]);
	?>

	<!-- Script -->
		//jQuery
		//script.js

	<script>
		$(document).ready(function (){
			$(".class").RichTextBox();
		});
	<script>
```

## Note
Change it with your own view.