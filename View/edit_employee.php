<?php 
	$id = isset($_GET['id']) ? $_GET['id'] : null ; 


	if ($id) {
	    $employee = $Employee->get($id);
	    //validation
	    if (isset($_POST['is_submitted'])) {
	    	if($_GET['id'] === $_POST['id']){
	    		print_r($_POST);
	    		$Employee->update($_POST);
	    	}
	        else{
	        	echo "Invalid";
	        }
	    }
	} else {
	    header('Location: index.php');
	}
;?>

<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-block">
                <center class="m-t-30"> <img src="https://via.placeholder.com/350x350" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">
                    	<?php echo "{$employee["firstname"]} {$employee["lastname"]}";?>
                    </h4>
                    <h6 class="card-subtitle"><?php echo $employee["position"];?></h6>
                    <div class="row text-center justify-content-md-center">
                    	<a href="javascript:void(0)" class="link"><i class="mdi mdi-google-maps"></i> <?php echo $employee["address"];?></a>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-block">
                <form class="form-horizontal form-material" method="post" action="">
                	<div class="form-group hide">
                         <input type="hidden" name="id" value="<?php echo $employee['id'];?>">
                    </div>
                    <div class="form-group">
                        <label for="firstname"  class="col-md-12">First Name</label>
                        <div class="col-md-12">
                            <input name="firstname" type="text" value="<?php echo $employee["firstname"];?>" placeholder="Jane" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname"  class="col-md-12">Last Name</label>
                        <div class="col-md-12">
                            <input name="lastname" type="text" value="<?php echo $employee["lastname"];?>" placeholder="Doe" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="position"  class="col-md-12">Position</label>
                        <div class="col-md-12">
                            <input name="position" type="text" value="<?php echo $employee["position"];?>" placeholder="Web Developer" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-12">Address</label>
                        <div name="address" class="col-md-12">
                            <input name="address" type="text" value="<?php echo $employee["address"];?>" placeholder="Bacolod" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input name="is_submitted" type="submit" class="btn btn-success" value="Update"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>