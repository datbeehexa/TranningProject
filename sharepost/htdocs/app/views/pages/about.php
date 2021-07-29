<?php require APPROOT . '/views/ui-inc/header.php'; ?>
<section class="site-section">
  <div class="container">
    <div class="row blog-entries">
      <!-- main content -->
      <div class="col-md-12 col-lg-8 main-content">
        <h1 class="mb-4"><?php echo $data['about']->title ?></h1>
        <div class="post-meta">
          <span class="category"><?php echo $data['about']->short_content ?></span>
          <span class="mr-2"><?php echo $data['about']->content?></span> &bullet;
          <span class="ml-2"><span class="fa fa-comments"></span> ${blog.views}</span>
          <span><a href="like?id=${blog.id}">Like</a></span>
          <span class="ml-2"><span class="fa fa-thumbs-up"></span> ${blog.likes}</span>
        </div>
        <div class="post-content-body">
          <h4><?php echo $data['about']->short_content ?></h4>
          <div class="row mb-5">
            <div class="col-md-12 mb-4 element-animate fadeInUp element-animated">
              <img src="<?php echo $data['about']->image ?>" alt="Image placeholder" class="img-fluid">
            </div>
          </div>
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
            <img src="${about.imageUrl}" alt="Image Placeholder" style="height: 100px" class="img-fluid">
            <div class="bio-body">
              <h2>${about.title}</h2>
              <p>${about.shortContent}</p>
              <p>
                <a href="/blog-about?id=${about.id}" class="btn btn-primary btn-sm">Read my bio</a>
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
              <c:forEach items='${requestScope["listTop5Popular"]}' var='blog5Popular'>
                <li><a href="blog-single?id=${blog5Popular.id}">
                    <img src="${blog5Popular.imageUrl}" alt="Image placeholder" class="mr-4">
                    <div class="text">
                      <h4>${blog5Popular.title}</h4>
                      <div class="post-meta">
                        <span class="mr-2">${blog5Popular.publishDate} </span>
                        &bullet; <span class="ml-2"><span class="fa fa-comments"></span> ${blog5Popular.likes}</span>
                      </div>
                    </div>
                  </a></li>
              </c:forEach>
            </ul>
          </div>
        </div>

        <div class="sidebar-box">
          <h3 class="heading">Categories</h3>
          <ul class="categories">
            <c:forEach items='${requestScope["listCat"]}' var='cate'>
              <li><a href="category?id=${cate.id}">${cate.nameCategory} </a></li>
            </c:forEach>
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