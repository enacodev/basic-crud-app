<?php 
	$id = isset($_GET['id']) ? $_GET['id'] : null ; 
	if ($id) {
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
        <h3 class="text-themecolor">View Employee</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">List of Employees</a></li>
            <li class="breadcrumb-item active">View</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<div class="row">

    <!-- Column -->
    <div class="col-6 offset-3">
        <div class="card">
            <img class="card-img-top" src="assets/images/background/profile-bg.jpg" alt="Card image cap">
            <div class="card-block little-profile text-center">
                <div class="pro-img"><img src="https://via.placeholder.com/350x350" alt="user"></div>
                <p>First Name:<?php echo $employee['firstname'];?></p>
                <p>Last Name: <?php echo $employee['lastname'] ;?><p>
                <p>Position: <?php echo $employee['position'] ;?></p>
               	<p>Address: <?php echo $employee["address"];?></p>
               	<p>
               		<a  href="<?php echo "index.php?action=edit&id={$employee['id']}&from=view"; ?>" class="btn btn-success"> 
               			<span class="mdi mdi-lead-pencil"></span> Edit
               		</a>
			    	<a onClick="javascript: return confirm('Are you sure?');" href="<?php echo "index.php?action=delete&id={$employee['id']}"; ?>"  style="color:white;" class="btn btn-danger">
			    		<span class="mdi mdi-delete"> Delete</span>
			    	</a>
			   	</p>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>