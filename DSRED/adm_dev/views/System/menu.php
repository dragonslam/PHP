<?php _template_print_Contents_Header(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span6">
		
		<?php
		$processApp = ($processApp == "") ? "menu" : $processApp;
		$processCmd = ($processCmd == "") ? "list" : $processCmd;				
		
		@include "menu.list.php";				
		?>
		</div>
		
		<div class="span6">
		<?php
		
		@include "menu.form.php";
		?>			
		</div>
	</div>
</div>	