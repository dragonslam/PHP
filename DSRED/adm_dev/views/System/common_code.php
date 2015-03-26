<?php _template_print_Contents_Header(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span6">
		
		<?php
		$processApp = ($processApp == "") ? "common_code" : $processApp;
		$processCmd = ($processCmd == "") ? "list" : $processCmd;				
		
		@include "common_code.list.php";				
		?>
		</div>
		
		<div class="span6">
		<?php
		
		@include "common_code.form.php";
		?>			
		</div>
	</div>
</div>	