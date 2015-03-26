						
						<div class="widget-box">
							<div class="widget-title">								
								<span class="icon"><i class="icon-file"></i></span>
								<h5>System Code Form</h5>
								<div class="buttons">
									<a href="#" class="btn btn-mini" id="btn_CartReset"><i class="icon-repeat"></i> Reset</a>
								</div>
							</div>
							<div class="widget-content nopadding">
 
									<input type="hidden" name="cart_CID" id="cart_CID"> 
									<input type="hidden" name="cart_PID" id="cart_PID">
									<input type="hidden" name="cart_CNT" id="cart_CNT">
									<div class="control-group">
                                        <label class="control-label">Parent Cartgory</label>
                                        <div class="controls">
                                            <input type="text" name="cart_PNM" id="cart_PNM" value="" readonly>
                                        </div>
                                    </div>
									<!--div class="control-group">
                                        <label class="control-label">Cartgory Type</label>
                                        <div class="controls">
                                            <select name="cart_Type" id="cart_Type">
												<option value="menu">Menu</option>
												<option value="code">Common Code</option>
											</select>
                                        </div>
                                    </div-->
									<div class="control-group">
                                        <label class="control-label">Cartgory Name</label>
                                        <div class="controls">
                                            <input type="text" name="cart_Title" id="cart_Title" value="">
                                        </div>
                                    </div>
									<div class="control-group">
                                        <label class="control-label">Cartgory Sort</label>
                                        <div class="controls">
                                            <input type="text" name="cart_Sort" id="cart_Sort" value="">
                                        </div>
                                    </div>
									<div class="control-group">
                                        <label class="control-label">Cartgory Value</label>
                                        <div class="controls">
                                            <input type="text" name="cart_Value" id="cart_Value" value="">
                                        </div>
                                    </div>
									<div class="control-group">
										<label class="control-label">Cartgory Use</label>
										<div class="controls">
											<select name="cart_Use" id="cart_Use">
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</div>
									</div>

									<div class="form-actions">										
										<button id="btn_CartInsert" value="Insert" class="btn btn-primary"><i class="icon-edit icon-white"></i> 등록</button>
										<button id="btn_CartUpdate" value="Update" class="btn btn-success"><i class="icon-refresh icon-white"></i> 업데이트</button>
										<button id="btn_CartDelete" value="Delete" class="btn btn-danger"><i class="icon-remove icon-white"></i> 삭제</button>
                                    </div>

							</div>			
						</div>		
<script type="text/javascript"> 	
$(document).ready(function(){
	$("#btn_CartReset").click(function() {
			$("#cart_PID").val("");
			$("#cart_PNM").val("");
			$("#cart_CNT").val("");
			$("#cart_CID").val("");
			$("#cart_Title").val("");
			$("#cart_Value").val("");
			$("#cart_Sort").val("");
			$("#cart_Use").val("1");

			$("#btn_CartInsert").show();
			$("#btn_CartUpdate").show();
			$("#btn_CartDelete").show();
	});
	$("#btn_CartInsert").click(function() {
		if (String($("#cart_PID").val()).isEmpty()) {
			fnModalOpen("Cartegory Management", "상위 카테고리를 먼저 선택해 주세요.");
			return false;
		}
		if (String($("#cart_Sort").val()).trim().isEmpty() || !String($("#cart_Sort").val()).trim().isNumber()) {
			$("#cart_Sort").val("1");
		} 
		fnCallAjax({
				 "processApp":"category"
				,"processCmd":"insert"
				,"processSeq":$("#cart_CID").val()
				,"CART_SEQ":$("#cart_CID").val()
				,"CART_P_SEQ":$("#cart_PID").val()
				,"CART_SORT":$("#cart_Sort").val()
				,"CART_TITLE":$("#cart_Title").val()
				,"CART_VALUE":$("#cart_Value").val()
				,"CART_USE": $("#cart_Use").val()
			}, 
			function(data) {
				fnResetCartgoryTree("categoryTree", root_category, function() {
					//$("#"+tree).dynatree("getTree").activateKey($("#cart_PID").val());
				}, 3, $("#cart_PID").val(), "");
			}
		);
		return false;
	});
	$("#btn_CartUpdate").click(function() {
		if (String($("#cart_CID").val()).isEmpty()) {
			fnModalOpen("Cartegory Management", "수정하기 위한 카테고리를 먼저 선택해 주세요.");
			return false;
		}
		fnCallAjax({
				 "processApp":"category"
				,"processCmd":"update"
				,"processSeq":$("#cart_CID").val()
				,"CART_SEQ":$("#cart_CID").val()
				,"CART_P_SEQ":$("#cart_PID").val()
				,"CART_SORT":$("#cart_Sort").val()
				,"CART_TITLE":$("#cart_Title").val()
				,"CART_VALUE":$("#cart_Value").val()
				,"CART_USE": ($("#categoryTree").dynatree("getTree").getNodeByKey($("#cart_CID").val()).hasChildren() ? "1" : $("#cart_Use").val())
			}, 
			function(data) {
				fnResetCartgoryTree("categoryTree", root_category, function() {
					//$("#"+tree).dynatree("getTree").activateKey($("#cart_CID").val());
				}, 3, $("#cart_CID").val(), "");
			}
		);
		return false;
	});
	$("#btn_CartDelete").click(function() {
		if (String($("#cart_CID").val()).isEmpty()) {
			fnModalOpen("Cartegory Management", "삭제하기 위한 카테고리를 먼저 선택해 주세요.");
			return false;
		}
		if ($("#categoryTree").dynatree("getTree").selectKey($("#cart_CID").val()).hasChildren()) {
			fnModalOpen("Cartegory Management", "하위 카테고리가 있습니다. 삭게할 수 없습니다.");
			return false;
		}
		fnCallAjax({
				 "processApp":"category"
				,"processCmd":"delete"
				,"processSeq":$("#cart_CID").val()
			}, 
			function(data) {
				fnResetCartgoryTree("categoryTree", root_category, function() {
					//$("#"+tree).dynatree("getTree").activateKey($("#cart_PID").val());
				}, 3, $("#cart_PID").val(), "");
			}
		);
		return false;
	});
});	
</script>	