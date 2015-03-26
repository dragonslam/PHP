<?php _template_print_Contents_Header(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8">					
		
		<?php
		$processApp = ($processApp == "") ? "address" : $processApp;
		$processCmd = ($processCmd == "") ? "list" : $processCmd;				
		
		@include "address.list.php";				
		?>
		</div>
		
		<div class="span4">
		<?php
		
		@include "address.form.php";
		?>			
		</div>
	</div>
</div>	