<!-- Datatable -->
<link href="/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/note/list">Notes</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">View: <?php echo getNoteName($_GET["id"],"name")?></a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo getNoteName($_GET["id"],"name")?></h5>
                    </div>
                    <div class="card-body">
                        <?php echo getNoteName($_GET["id"],"content")?>
                    </div>
                    <div class="card-footer d-sm-flex justify-content-between align-items-center">
                        <div class="card-footer-link mb-4 mb-sm-0">
                            <p class="card-text text-dark d-inline">Last Update: <?php echo getNoteName($_GET["id"],"updated_at")?></p>
                        </div>

                        <a href="/note/edit/<?php echo $_GET["id"];?>" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
