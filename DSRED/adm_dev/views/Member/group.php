<?php _template_print_Contents_Header(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span6">					
		
		<?php
		$processApp = ($processApp == "") ? "member" : $processApp;
		$processCmd = ($processCmd == "") ? "list" : $processCmd;				
		
		@include "group.list.php";				
		?>
		</div>
		
		<div class="span6">
		<?php
		
		@include "group.form.php";
		?>			
		</div>
	</div>
</div>	