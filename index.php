<?php
/*
    Part: Call dependencies
*/
include("scripts/autoload.php");
checkauth();
/*
    Part: Call header
*/
include ("includes/header.php");
?>
<link href="/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-sm-6">
                            <div class="widget-stat card bg-danger">
                                <div class="card-body  p-4">
                                    <div class="media">
									<span class="mr-3">
										<i class="flaticon-381-notepad"></i>
									</span>
                                        <div class="media-body text-white text-right">
                                            <p class="mb-1">Notes</p>
                                            <h3 class="text-white"><?php countNotes();?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-sm-6">
                            <div class="widget-stat card bg-success">
                                <div class="card-body p-4">
                                    <div class="media">
									<span class="mr-3">
										<i class="flaticon-381-list"></i>
									</span>
                                        <div class="media-body text-white text-right">
                                            <p class="mb-1">Category</p>
                                            <h3 class="text-white"><?php countCategories();?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Quick Access</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-list-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-2">
                                            <div class="list-group mb-4 " id="list-tab" role="tablist">
                                                <?php listCategoryDashboard();?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-10">
                                            <div class="tab-content" id="nav-tabContent">
                                                <?php echo listNotesDashboard();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
<?php
include ("includes/footer.php");
?>
<!--**********************************
    Custom CSS
***********************************-->
<!-- Dashboard 1 -->
<script src="/assets/js/dashboard/dashboard-1.js"></script>
<!-- Summernote -->
<script src="/assets/vendor/summernote/js/summernote.min.js"></script>
<!-- Summernote init -->
<script src="/assets/js/plugins-init/summernote-init.js"></script>
                <!-- Datatable -->
                <script src="/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
                <script src="/assets/js/plugins-init/datatables.init.js"></script>