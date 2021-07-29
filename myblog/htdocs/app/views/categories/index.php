<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3 class="title-5 m-b-35">Category Manager</h3>
                </div>
                <div class="table-data__tool col-12">
                    <div class="table-data__tool-left">
                        <a href="<?php echo URLROOT;  ?>categories/add" class="au-btn au-btn-icon au-btn--green au-btn--small"> <i class="zmdi zmdi-plus"></i>add item
                        </a>

                    </div>
                    <div class="table-data__tool-right">
                        <form class="form-header" action="#">
                            <input type="hidden" name="action" value="find" />
                            <input class="au-input au-input--xl" type="text" name="name" placeholder="Search">
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php flash('cate_message'); ?>
            </div>

            <div class="row">
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['cates'] as $cate) : ?>
                                <tr class="tr-shadow">
                                    <td><?php echo $cate->category_name; ?></td>
                                    <td><?php echo $cate->description; ?></td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="<?php echo URLROOT; ?>categories/edit/<?php echo $cate->id; ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <form action="<?php echo URLROOT; ?>categories/delete/<?php echo $cate->id; ?>" method="post">
                                                <button type="submit" value="Delete" class="item" data-toggle="tooltip" data-placement="top" title="Delete"><i class="zmdi zmdi-delete"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="result"></div>
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
<script src="../../js/category.js">
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>