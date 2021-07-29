<?php require APPROOT . '/views/ui-inc/header.php'; ?>

<section class="site-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="owl-carousel owl-theme home-slider">
                    <?php foreach ($data['top3post'] as $top3) : ?>
                        <div>
                            <a href="<?php echo URLROOT; ?>single/<?php echo $top3->id ?>" class="a-block d-flex align-items-center height-lg" style="background-image: url('<?php echo $top3->image ?>');">
                                <div class="text half-to-full">
                                    <div class="post-meta">
                                        <span class="category"><?php echo $top3->categoryName ?></span> <span class="mr-2"> <?php echo $top3->publish_date ?> </span> &bullet; <span class="ml-2"><span class="fa fa-comments"></span>
                                            <?php echo $top3->views ?></span>
                                    </div>
                                    <h3><?php echo $top3->title ?></h3>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <!--3 post moi nhat -->
    <div class="container">
        <div class="row">
            <?php foreach ($data['top3post'] as $top3post) : ?>
                <div class="col-md-6 col-lg-4">
                    <div>
                        <a href="<?php echo URLROOT ?>single/<?php echo $top3post->id ?>" class="a-block d-flex align-items-center height-md" style="background-image: url('<?php echo $top3post->image ?>');">
                            <div class="text">
                                <div class="post-meta">
                                    <span class="category"><?php echo $top3post->categoryName ?></span> <span class="mr-2"> <?php echo $top3post->publish_date ?> </span> &bullet; <span class="ml-2"><span class="fa fa-comments"></span>
                                        <?php echo $top3post->views ?></span>
                                </div>
                                <h3><?php echo $top3post->title ?></h3>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<!-- END section -->

<section class="site-section py-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="mb-4">Blog</h2>
            </div>
        </div>
        <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                <div class="row">
                    <!-- Khu vuc hien thi 8 blog moi nhat list12Blogs -->
                    <?php foreach ($data['top8post'] as $top8) : ?>
                        <div class="col-md-6">
                            <a href="<?php echo URLROOT ?>single/<?php echo $top8->id ?>" class="blog-entry element-animate" data-animate-effect="fadeIn"> <img src="<?php echo $top8->image ?>" alt="Image placeholder">
                                <div class="blog-content-body">
                                    <div class="post-meta">
                                        <span class="category"><?php echo $top8->categoryName ?></span> <span class="mr-2"> <?php echo $top8->publish_date ?> </span> &bullet; <span class="ml-2"><span class="fa fa-comments"></span>
                                            <?php echo $top8->views ?></span>
                                    </div>
                                    <h2><?php echo $top8->title ?></h2>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>

                <!--phân trang -->
                <!-- <div class="row">
                    <c:set var="currentPage" value="${param.page == null ? 1 : param.page}" />
                    <div class="col-md-12 text-center">
                        <nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination">
                                <c:if test="${currentPage > 1}">
                                    <li class="page-item">
                                        <a class="page-link" href="${pageContext.request.contextPath}/home?page=${currentPage - 1}">Prev</a>
                                    </li>
                                </c:if>

                                <c:forEach begin="1" end="${maxPage}" var="i">
                                    <li class="page-item">
                                        <a class='page-link ${i == currentPage ? "active" : "" }' href="${pageContext.request.contextPath}/home?page=${i}">
                                            ${i}
                                        </a>
                                    </li>
                                </c:forEach>
                                <c:if test="${currentPage + 1 <= maxPage}">
                                    <li class="page-item">
                                        <a class="page-link" href="${pageContext.request.contextPath}/home?page=${currentPage + 1}">Next</a>
                                    </li>
                                </c:if>
                            </ul>
                        </nav>
                    </div>
                </div> -->
                <!-- Khu vuc 3 post ngau nhien-->
                <div class="row mb-5 mt-5">
                    <div class="col-md-12">
                        <h2 class="mb-4">More Blog Posts</h2>
                    </div>
                    <div class="col-md-12">
                        <?php foreach ($data['top3postran'] as $top3ran) : ?>
                            <div class="post-entry-horzontal">
                                <a href="<?php echo URLROOT ?>single/<?php echo $top3ran->id ?>">
                                    <div class="image element-animate fadeIn element-animated" data-animate-effect="fadeIn" style="background-image: url('<?php echo $top3ran->image ?>');"></div>
                                    <span class="text">
                                        <div class="post-meta">
                                            <span class="category"><?php echo $top3ran->categoryName ?></span>
                                            <span class="mr-2"><?php echo $top3ran->publish_date ?> </span> •
                                            <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $top3ran->views ?></span>
                                        </div>
                                        <h2><?php echo $top3ran->title ?></h2>
                                    </span>
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>


            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="<?php echo $data['about']->image ?>" alt="Image Placeholder" style="height: 100px" class="img-fluid">
                        <div class="bio-body">
                            <h2><?php echo $data['about']->title ?></h2>
                            <p><?php echo $data['about']->short_content ?></p>
                            <p>
                                <a href="<?php echo URLROOT; ?>pages/about" class="btn btn-primary btn-sm">Read my bio</a>
                            </p>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <!-- list5Popular HIEN THI 5 TIN XEM NHIEU NHAT O DAY -->
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <?php foreach ($data['top5popular'] as $top5) : ?>
                                <li><a href="<?php echo URLROOT ?>single/<?php echo $top5->id ?>">
                                        <img src="<?php echo $top5->image ?>" alt="Image placeholder" class="mr-4">
                                        <div class="text">
                                            <h4><?php echo $top5->title ?></h4>
                                            <div class="post-meta">
                                                <span class="mr-2"><?php echo $top5->publish_date ?> </span>
                                                &bullet; <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $top5->views ?></span>
                                            </div>
                                        </div>
                                    </a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        <?php foreach ($data['cates'] as $cates) : ?>
                            <li><a href="<?php echo URLROOT; ?>cate/<?php echo $cates->id ?>"><?php echo $cates->category_name ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <!-- END sidebar-box -->
            </div>
            <!-- END sidebar -->
        </div>
    </div>
</section>


<footer class="site-footer">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->

<!-- loader -->
<div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214" />
    </svg>
</div>

<?php require APPROOT . '/views/ui-inc/footer.php'; ?>