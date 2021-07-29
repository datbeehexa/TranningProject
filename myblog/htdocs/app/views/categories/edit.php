<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3 class="title-5 m-b-35">Category Manager</h3>
                </div>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <a href="/categories" class="au-btn au-btn-icon au-btn--green au-btn--small"> <i class="zmdi zmdi-collection-item"></i>list
                        </a>

                    </div>
                    <div class="table-data__tool-right"></div>
                </div>
            </div>
            <div class="row">
                <?php flash('cate_message'); ?>
            </div>
            <div class="row">
                <!-- FORM ADD-->
                <div class="col-12 col-md-12">
                    <form id="form" action="" method="post" class="form-horizontal">
                        <div class="card-header">
                            <strong>Edit Category</strong>
                        </div>
                        <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="category_name" class=" form-control-label">Name Category</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="category_name" placeholder="Category Name" class="form-control form-control-lg
                                    <?php echo (!empty($data['category_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['category_name']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['category_name_err']; ?></span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description" placeholder="Description" row="4" class="form-control form-control-lg
                                  <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description']; ?></textarea>
                                    <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>
                            Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- END MAIN CONTENT-->
<?php require APPROOT . '/views/inc/footer.php'; ?>