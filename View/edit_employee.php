<?php 
	$id = isset($_GET['id']) ? $_GET['id'] : null ; 
	$from = isset($_GET['from']) ? $_GET['from'] : null ; 

	if ($id) {
	    //validation
	    if (isset($_POST['is_submitted'])) {
	    	if($_GET['id'] === $_POST['id']){
	    		$Employee->update($_POST);
	    		$employee = $Employee->get($id);
	    	}
	        else{
	        	echo "Invalid Employee...";
	        }
	    }
	     $employee = $Employee->get($id);
	} else {
	    header('Location: index.php');
	}
;?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="align-self-center">
        <h3 class="text-themecolor">Edit Employee</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">List of Employees</a></li>
            <?php if($from == "view"):?>
				<li class="breadcrumb-item"><a href="<?php echo "index.php?action=view&id={$employee['id']}"; ?>">View</a></li>
            <?php endif;?>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

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