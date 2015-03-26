<?php _template_print_Contents_Header(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span4">					
		
		<?php
		$processApp = ($processApp == "") ? "process_auth" : $processApp;
		$processCmd = ($processCmd == "") ? "list" : $processCmd;				
		
		@include "auth.list.php";				
		?>
		</div>
		
		<div class="span8">
		<?php
		
		@include "auth.form.php";
		?>			
		</div>
	</div>
</div>	