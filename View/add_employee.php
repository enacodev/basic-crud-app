<?php 
    if (isset($_POST['is_submitted'])) {
        $Employee->add($_POST);
        $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    ?>
    //reload to index
    <script>
        window.location.href = "<?php echo $url."?action=default";?>";
    </script>
<?php } ;?>


<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="align-self-center">
        <h3 class="text-themecolor">Add Employee</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">List of Employees</a></li>
            <li class="breadcrumb-item active">Add</li>
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
            <div class="card-block">
                <form class="form-horizontal form-material" method="post" action="">
                	<div class="form-group hide">
                         <input type="hidden" name="id" value="">
                    </div>
                    <div class="form-group">
                        <label for="firstname"  class="col-md-12">First Name</label>
                        <div class="col-md-12">
                            <input name="firstname" type="text" value="" placeholder="e.g. Jane" class="form-control form-control-line" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname"  class="col-md-12">Last Name</label>
                        <div class="col-md-12">
                            <input name="lastname" type="text" value="" placeholder="e.g. Doe" class="form-control form-control-line" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="position"  class="col-md-12">Position</label>
                        <div class="col-md-12">
                            <input name="position" type="text" value="" placeholder="e.g. Web Developer" class="form-control form-control-line" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-md-12">Address</label>
                        <div name="address" class="col-md-12">
                            <input name="address" type="text" value="" placeholder="e.g. Bacolod" class="form-control form-control-line" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input name="is_submitted" type="submit" class="btn btn-success" value="Add"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>