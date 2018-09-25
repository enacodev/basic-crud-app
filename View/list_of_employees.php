 <?php
	$employees = $Employee->all();
?>  

<div class="row">
    <!-- column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Position</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		if (mysqli_num_rows($employees) > 0):
									while($employee = mysqli_fetch_assoc($employees)): ?>
			                            <tr>
			                                <td><?php echo $employee['id'];?></td>
			                                <td><?php echo $employee['firstname'];?></td>
			                                <td><?php echo $employee['lastname'];?></td>
			                                <td><?php echo $employee['position'];?></td>
			                                <td><?php echo $employee['address'];?></td>
			                                <td>
			                                	<a  href="<?php echo "index.php?action=edit&id={$employee['id']}"; ?>"  class="btn btn-success"><span class="mdi mdi-lead-pencil"></span></a>
			                                	<a style="color:white;" class="btn btn-danger"><span class="mdi mdi-delete"></span></a>
			                                </td>
			                            </tr>
			                        <?php endwhile;
			                    endif;
		                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
