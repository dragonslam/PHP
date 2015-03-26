<?php _template_print_Contents_Header(); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8">					
		
		<?php
		$processApp = ($processApp == "") ? "process_member" : $processApp;
		$processCmd = ($processCmd == "") ? "list" : $processCmd;				
		
		if ($processCmd == "form") {
			@include "member.form.php";
		}
		else {
			@include "member.list.php";
		}					
		?>
		</div>
		
		<div class="span4">
		<?php
		
		@include "member.log.php";
		?>			
		</div>
	</div>
</div>