<!--**********************************
    Content body start
***********************************-->
<!-- Summernote -->

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/note/list">Notes</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">New Note</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="/note/storeNew" method="post">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Enter name here: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" value="" placeholder="New Name here">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select Category: </label>
                                    <div class="col-sm-9">
                                        <select id="inputState" class="form-control default-select" name="category">
                                            <option selected value="0">No category</option>
                                            <?php getCategoryList();?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Content: </label>
                                    <div class="col-sm-9">
                                        <textarea class="summernote" name="content" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tags(divided by comma): </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tags" value="" placeholder="Enter Tags here">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
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