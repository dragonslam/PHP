<?php _template_print_Contents_Header(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8">					
		
		<?php
		$processApp = ($processApp == "") ? "process_member" : $processApp;
		$processCmd = ($processCmd == "") ? "list" : $processCmd;				
				
		@include "customer.list.php";						
		?>
		</div>
		
		<div class="span4">
		<?php
		
		@include "customer.form.php";
		?>			
		</div>
	</div>
</div>