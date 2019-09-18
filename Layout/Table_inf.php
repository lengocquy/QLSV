<?php
    $result = isset($_REQUEST['datatable_length']);
    if(!$result){
        $length = 10;
    }
    else{
        $length = $_REQUEST['datatable_length'];
    }
?>

<div class="row">
	<div class="col-sm-6">
		<div class="dataTables_leght" id="datatable_length" >
			<label for="">
				<select name="datatable_length" aria-controls="datatable" id="select_length" class="form-control input-sm" onchange="this.form.submit()" >
                    <option <?php if ($length == 10) echo "selected=\"selected\" ";  ?> value="10" >10</option>
                    <option <?php if ($length == 25) echo "selected=\"selected\" ";  ?> value="25">25</option>
                    <option <?php if ($length == 50) echo "selected=\"selected\" ";  ?> value="50" >50</option>
                </select> Số dòng trên 1 trang
			</label>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<table id="datatable" class="table" style="font-size: 14px">
					<thead>
                        <tr role="row">
                        	<th style="width: 90px;">Mã SV</th>
                        	<th style="width: 210px;">Tên sinh viên</th>
                        	<th style="width: 140px;">Lớp</th>
                        	<th style="width: 140px;">Khoa</th>
                        	<th style="width: 140px;">Ngày sinh</th>
                        	<th style="width: 140px;">nơi sinh</th>
                        </tr>
                        <?php
                            $sql = 'SELECT *  FROM sinhvien'; 
                            if(! mysql_num_rows(mysql_query($sql)) )
                            {
                                die('Không thể lấy dữ liệu: ' . mysql_error());
                            }
                            $i = mysql_num_rows(mysql_query($sql));
                            if($i < $length){
                                $length = $i;
                            }
                            if(isset($_REQUEST['page'])){
                                $page = $_REQUEST['page'] - 1;
                                
                            }else{
                                $page = 0;
                            }
                            $count = 0;
                            $retval = mysql_query("SELECT *  FROM sinhvien LIMIT " . $page*$length . "," . $length);
                            while ( $row = mysql_fetch_array($retval )) {
                                $count++;
                            ?>
                            <tr <?php if($count%2 != 0) echo "id='column'";?>">
                            	<td><?php echo "{$row['MSSV']}";?></td>
                            	<td><?php echo "{$row['TenSV']}";?></td>
                            	<td><?php echo "{$row['MaLop']}";?></td>
                            	<td><?php echo "{$row['MaKhoa']}";?></td>
                            	<td><?php $date = date_format(date_create($row['NgaySinh']), "d/m/Y"); echo "$date";?></td>
                            	<td><?php echo "{$row['QueQuan']}";?></td>
                            </tr>
                            <?php
                                }
                            ?>
				</table>
 			</div>
		</div>
	</div>
</div>
<div>
	<div id="Paging" style="height: 35px;">
		<ul id="pging_ul" style="float: right;">
			<?php
    			if(!empty($_REQUEST['page'])){
        			if($_REQUEST['page'] != 1){?>
        			    <li id="pging_li"><a href="./?frame=information&datatable_length=<?php echo $length;?>&page=<?php echo ($_REQUEST['page'] - 1);?>"><?php echo '<<';?></a></li>
        			<?php }
                }
                $page = $i / $length;
                if($i % $length != 0){
                    $page = round($page, 0);
                }
                for($int = 1; $int <= $page; $int++){
                	if($page != 1){?>
                        <li id="pging_li"> 
                            <?php 
                            if(!empty($_REQUEST['page'])){
                                if($int == $_REQUEST['page']){
                                 echo '<span>' . $int . '</span>';
                                }else{?>
                                 <a href="./?frame=information&datatable_length=<?php echo $length;?>&page=<?php echo $int;?>"><?php echo $int;?></a>
                                <?php }
                            }else{
                             if($int == 1){
                                 echo '<span>' . $int . '</span>';
                             }else{?>
                                 <a href="./?frame=information&datatable_length=<?php echo $length;?>&page=<?php echo $int;?>"><?php echo $int;?></a>
                            <?php }
                            }
                            ?>
                        </li>
                <?php }
                }
                if(!empty($_REQUEST['page'])){
                    if($_REQUEST['page'] != $page){ ?>
        			    <li id="pging_li"><a href="./?frame=information&datatable_length=<?php echo $length;?>&page=<?php echo ($_REQUEST['page'] + 1);?>"><?php echo '<span>>></span>';?></a></li>
        			<?php }
                }else{
                    if($page != 1){ ?>
                    	<li id="pging_li"><a href="./?frame=information&datatable_length=<?php echo $length;?>&page=<?php echo 2;?>"><?php echo '>>';?></a></li>
        		<?php }
                }
            ?>
		</ul>
	</div>
</div>