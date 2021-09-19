<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/note/list">Note</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Delete</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Are you sure you want to delete: <?php echo getNoteName($_GET["id"],"name")?></h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="/note/storeDelete" method="post">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Are you sure: </label>
                                    <div class="col-sm-9">
                                    <select id="inputState" class="form-control default-select" name="confirm">
                                        <option selected value="0">No...</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ID: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="id" readonly value="<?php echo ($_GET['id']);?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->