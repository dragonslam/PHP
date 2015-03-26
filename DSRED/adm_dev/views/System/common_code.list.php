<?php

// dTree 관련 스크립트 추가. 
PS_Style("/js/jquery.plugin/dynatree-1.2.4/skin-vista/ui.dynatree.css");
PS_Script("/js/jquery.plugin/dynatree-1.2.4/jquery.dynatree.js", "jquery-dynatree", true);
?>
						<div class="widget-box">
							<div class="widget-title"> 
								<span class="icon"><i class="icon-th-list"></i></span>
								<h5>System Code</h5>
								<div class="buttons">									
									<a href="#" class="btn btn-mini" id="btn_CartExpand"><i class="icon-tags"></i> Expand all</a>
									<a href="#" class="btn btn-mini" id="btn_CartCollapse"><i class="icon-tag"></i> Collapse all</a>
									<a href="#" class="btn btn-mini" id="btn_CartAdd"><i class="icon-pencil"></i> Add</a>
								</div>
							</div>
							<div class="widget-content">
								<div id="categoryTree"> </div>
							</div>							
						</div>				
<script type="text/javascript">  
	
$(document).ready(function(){   					
		
	var root_category = "-1";

	// $("#categoryTree").activateKey("key1234");
	// $("#categoryTree").getNodeByKey("key1234").toggleExpand();

	$("#btn_CartRefresh").click(function() {
		$("#categoryTree").redraw();
	});
	$("#btn_CartAdd").click(function() {
		if ($("#cart_PID").val() == "") {
			fnModalOpen("Cartegory Management", "상위 카테고리를 먼저 선택해 주세요.");
			return false;
		} 
		else {
			$("#cart_PID").val($("#cart_CID").val());
			$("#cart_PNM").val($("#cart_Title").val());
			$("#cart_CID").val("");
			$("#cart_Title").val("");
			$("#cart_Sort").val("");
			$("#cart_Value").val("");
			$("#cart_Use").val("1");
			$("#btn_CartInsert").show();
			$("#btn_CartUpdate").hide();
			$("#btn_CartDelete").hide();
		}
		return false;
	});
	$("#btn_CartExpand").click(function() {
		 $("#categoryTree").dynatree("getRoot").visit(function(node){
			 node.expand(true);      
		});
		return false;
	});
	$("#btn_CartCollapse").click(function() {
		$("#categoryTree").dynatree("getRoot").visit(function(node){
			 node.expand(false);      
		});
		return false;
	});

	$("#categoryTree").dynatree({      
		title: "Contents Cartgory",
		autoFocus: true, // Set focus to first child, when expanding or lazy-loading.
		keyboard: true, // Support keyboard navigation.
		persist: true, // Persist expand-status to a cookie
		fx: { height: "toggle", duration: 200 },
		onActivate: function(node) {        
			var pNode = node.getParent();
			if (pNode == null) {
				$("#cart_PID").val("0");
				$("#cart_PNM").val("Root");
			} else {
				$("#cart_PID").val(pNode.data.key);
				$("#cart_PNM").val(String(pNode.data.title).isEmpty() ? "Root" : pNode.data.title);
			}
			
			$("#cart_CNT").val(node.hasChildren() ? "0" : "1");
			$("#cart_CID").val(node.data.key);
			$("#cart_Title").val(node.data.title);
			$("#cart_Sort").val(node.data.sort);
			$("#cart_Value").val(node.data.cValue); 
			$("#cart_Use").val(node.data.cUse ? "1" : "0"); 

			$("#btn_CartInsert").hide();
			$("#btn_CartUpdate").show();
			if (node.hasChildren()) {
				$("#btn_CartDelete").hide();
			} 
			else {
				$("#btn_CartDelete").show();
			}
			
		},      
		onDblClick: function(node, event) {
			$("#cart_CNT").val(node.hasChildren() ? "0" : "1");
			$("#cart_PID").val(node.data.key);
			$("#cart_PNM").val(node.data.title);
			$("#cart_CID").val("");
			$("#cart_Title").val("");
			$("#cart_Sort").val("");
			$("#cart_Value").val("");
			$("#cart_Use").val("1");
			$("#btn_CartInsert").show();
			$("#btn_CartUpdate").hide();
			$("#btn_CartDelete").hide();
			return false;
		},
		children: [        
			{key:root_category, pid:0, sort:0, title: "ROOT", isFolder:true, expand:true}
		]    
	});  

	$("#btn_CartReset").click();					
	
	// 카테고리 랜더링.
	fnSetCartgoryTree("categoryTree", root_category, null, 3, "", "");
}); 						
	
</script>					