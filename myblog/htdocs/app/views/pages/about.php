<?php require APPROOT . '/views/ui-inc/header.php'; ?>
<section class="site-section">
  <div class="container">
    <div class="row blog-entries">
      <!-- main content -->
      <div class="col-md-12 col-lg-8 main-content">
        <h1 class="mb-4"><?php echo $data['about']->title ?></h1>
        <div class="post-content-body">
          <div class="row mb-5">
            <div class="col-md-12 mb-4 element-animate fadeInUp element-animated">
              <img src="<?php echo $data['about']->image ?>" alt="Image placeholder" class="img-fluid">
            </div>
          </div>
          <p><?php echo $data['about']->short_content ?></p>
          <p><?php echo $data['about']->content ?></p>
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
              <h2>
                <p><?php echo $data['about']->title ?></p>
              </h2>
              <p>
              <p><?php echo $data['about']->short_content ?></p>
              </p>
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

        <div class="sidebar-box">
          <h3 class="heading">Categories</h3>
          <ul class="categories">
            <?php foreach ($data['listCate'] as $cates) : ?>
              <li><a href="<?php echo URLROOT; ?>cate/<?php echo $cates->id ?>"><?php echo $cates->category_name ?></a></li>
            <?php endforeach ?>
          </ul>
        </div>

      </div>
    </div>
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