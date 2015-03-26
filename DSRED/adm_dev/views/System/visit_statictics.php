<?php _template_print_Contents_Header(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span6">
		
		<?php
		$processApp = ($processApp == "") ? "visit_statictics" : $processApp;
		$processCmd = ($processCmd == "") ? "list" : $processCmd;				
		
		@include "visit_statictics.list.php";				
		?>
		</div>
		
		<div class="span6">
		<?php
		
		@include "visit_statictics.form.php";
		?>			
		</div>
	</div>
</div>	