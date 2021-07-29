<?php require APPROOT . '/views/ui-inc/header.php'; ?>

<section class="site-section">
    <div class="container">
        <div class="row blog-entries">
            <!-- main content -->
            <div class="col-md-12 col-lg-8 main-content">
                <h1 class="mb-4"><?php echo $data['post']->title ?></h1>
                <div class="post-meta">
                    <span class="category"><?php echo $data['post']->categoryName ?></span>
                    <span class="mr-2"><?php echo $data['post']->publish_date ?></span> &bullet;
                    <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $data['post']->views ?></span>
                    <span><a href="like?id=${blog.id}">Like</a></span>
                    <span class="ml-2"><span class="fa fa-thumbs-up"></span> <?php echo $data['post']->likes ?></span>
                </div>
                <div class="post-content-body">
                    <h4><?php echo $data['post']->short_content ?></h4>
                    <div class="row mb-5">
                        <div class="col-md-12 mb-4 element-animate fadeInUp element-animated">
                            <img src="<?php echo $data['post']->image ?>" alt="Image placeholder" class="img-fluid">
                        </div>
                    </div>  
                    <p><?php echo $data['post']->full_content ?></p>
                </div>

                <!--Khu vuc comment -->
                <div class="pt-5">
                    <h3 class="mb-5">Comments</h3>
                    <ul class="comment-list">
                        <c:forEach items="${commentList}" var="comment">
                            <li class="comment">
                                <div class="vcard">
                                    <img src="https://lovicouple.com/wp-content/uploads/2019/12/vai-avatar-cap-cho-cac-ban-de-facebook-25.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>${comment.username}</h3>
                                    <div class="meta">${comment.pushDate}</div>
                                    <p>${comment.comment}</p>
                                </div>
                            </li>
                        </c:forEach>
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <form method="post" class="p-5 bg-light">
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <div class="form-group">
                                    <label for="comment">Message</label>
                                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                                    <div class="form-group">
                                        <input type="submit" value="Post Comment" class="btn btn-primary">
                                    </div>
                                </div>
                            <?php else : ?>
                                Please <a href="<?php echo URLROOT ?>users/login">Login</a> or <a href="<?php echo URLROOT ?>users/register">Register</a>
                            <?php endif ?>
                        </form>
                    </div>
                </div>
            </div>

            <!--sidebar-->
            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box search-form-wrap">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon fa fa-search"></span>
                            <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                        </div>
                    </form>
                </div>

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

                <div class="sidebar-box">
                    <!-- list5Popular HIEN THI 5 TIN XEM NHIEU NHAT O DAY -->
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <?php foreach ($data['top5popular'] as $top5) : ?>
                                <li><a href="blog-single?id=${blog5Popular.id}">
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

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        <?php foreach ($data['cates'] as $cates) : ?>
                            <li><a href="<?php echo URLROOT; ?>cate/<?php echo $cates->id ?>"><?php echo $cates->category_name ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>

<!--3 post ngau nhien -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-3 ">Related Post</h2>
        </div>
        <?php foreach ($data['top3postran'] as $top3ran) : ?>
            <div class="post-entry-horzontal">
                <a href="blog-single?id=${blog3s.id}">
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