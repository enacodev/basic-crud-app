<?php 
	$id = isset($_GET['id']) ? $_GET['id'] : null ; 
	$from = isset($_GET['from']) ? $_GET['from'] : null ; 
	if ($id) {
        $employee = $Employee->delete($id);
	}
    else{
    	echo "Invalid Employee...";
    }
;?>
