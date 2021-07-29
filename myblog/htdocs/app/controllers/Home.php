<?php
class Home extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');
        $this->aboutModel = $this->model('About');
    }

    public function index()
    {
        // Get posts
        $posts = $this->postModel->getPosts();
        $cates = $this->categoryModel->getCategory();
        $about = $this->aboutModel->getAbout();

        $top3Post = $this->postModel->findTop3();
        $top8Post = $this->postModel->findTop8();
        $top3PostRan = $this->postModel->findTop3Ran();
        $top5Popular = $this->postModel->findTop5Popular();

        $data = [
            'posts' => $posts,
            'cates' => $cates,
            'about'=> $about,
            'top3post' => $top3Post,
            'top8post' => $top8Post,
            'top3postran' => $top3PostRan,
            'top5popular' => $top5Popular
        ];

        $this->view('home/index', $data);
    }
}
