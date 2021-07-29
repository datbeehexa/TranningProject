<?php
  class Pages extends Controller {
    public function __construct(){
     $this->aboutModel = $this->model('About');
     $this->postModel = $this->model('Post');
     $this->categoryModel = $this->model('Category');
    }
    
    public function index(){
      // if(isLoggedIn()){
      //   redirect('posts');
      // }

      $data = [
        'title' => 'ADMIN DASHBOARD HERE',
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $about = $this->aboutModel->getAbout();
      $listCate = $this->categoryModel->getCategory();
      $top5Popular = $this->postModel->findTop5Popular();
      $data = [
        'about' => $about,
        'listCate' => $listCate,
        'top5popular' => $top5Popular
      ];

      $this->view('pages/about', $data);
    }
  }