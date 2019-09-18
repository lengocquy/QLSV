<div class="container">
    <div class="c1">
    	<span class="micon"></span>
        	<div style="float: right">
            </div>
            <span class="titleblack">&nbsp;Thông tin sinh viên</span>
    </div>
    <div class="containerpane">
    	<div id="ModuleContent">
			<div style="background:#fff;padding:10px;">
    			<div style="display: block">
    				<form name="frm1" action="./?frame=information" method="post" accept-charset='UTF-8' >
    					<div id="box_search" style="text-align: center;">
    						<label style="font-size: 15px; ">Mã sinh viên hoặc tên sinh viên: </label>
    						<input id="inp_masv" name="masv" type="text" value="" >
    						<input type="submit" class="submit_search" style="font-size: 15px;" name="Submit" value="Tìm kiếm">
    					</div>
    					<hr width="100%" align="center" >
    				</form>
    				<form name="frm2" action="./?frame=search" method="post" accept-charset='UTF-8' >
    					<div style="font-size: 15px; width: 924px; margin: 10px 10px 0 10px" class="clr">
    						<?php 
    						if(isset($_REQUEST['masv']))
    						{
    						    include 'Layout/Table_inf2.php';
    						}else include 'Layout/Table_inf.php';?>
    					</div>
    				</form>
				</div>
			</div>
    	</div>
    </div>
</div>