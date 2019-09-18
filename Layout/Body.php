<div id="wrapper_body" class="clr">
	<div class="main-wrapper_body">
		<?php
        if (isset($_REQUEST['frame'])){
            switch ($_REQUEST['frame']){
                case "information": 
                    include 'XuLy/ThongTin.php';
                    break;
                case "search":
                default: 
                    include 'XuLy/TimKiem.php';
                    break;
            }
        }else {
            include 'XuLy/TimKiem.php';
        }
    ?>
	</div>
</div>