<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3 class="title-5 m-b-35">Blog Manager</h3>
                </div>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <a href="/posts" class="au-btn au-btn-icon au-btn--green au-btn--small"> <i class="zmdi zmdi-collection-item"></i>list
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
                            <strong>Edit Post</strong>
                        </div>

                        <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Title</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="title" placeholder="Title" class="form-control form-control-lg
                                    <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="short_content" class=" form-control-label">Short Content</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="short_content" placeholder="Short Content" row="4" class="form-control form-control-lg
                                  <?php echo (!empty($data['short_content_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['short_content']; ?></textarea>
                                    <span class="invalid-feedback"><?php echo $data['short_content_err']; ?></span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="full_content" class=" form-control-label">Full Content</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="full_content" placeholder="Full Content" row="8" class="form-control form-control-lg
                                  <?php echo (!empty($data['full_content_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['full_content']; ?></textarea>
                                    <span class="invalid-feedback"><?php echo $data['full_content_err']; ?></span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="image" class=" form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" name="image" placeholder="Image Url" class="form-control form-control-lg
                                  <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>"><img src="<?php echo $data['image']; ?>" style="width: 100px;">
                                    <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Categoty</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="category_id" class="form-control form-control-lg">
                                        <option value="">Please choose...</option>
                                        <?php foreach ($data['cates'] as $cates) : ?>
                                            <option value="<?php echo $cates->id ?>"><?php echo $cates->category_name ?></option>
                                        <?php endforeach ?>
                                    </select>
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