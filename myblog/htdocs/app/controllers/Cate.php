<?php
class Cate extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');
        $this->aboutModel = $this->model('About');
    }

    public function index($id)
    {
        $listCate = $this->categoryModel->getCategory();
        $cate = $this->categoryModel->getCateById($id);
        $about = $this->aboutModel->getAbout();
        $posts = $this->postModel->findByCate($id);
        $top5Popular = $this->postModel->findTop5Popular();

        $data = [
            'listCate' => $listCate,
            'cate' => $cate,
            'about' => $about,
            'posts'=>$posts,
            'top5popular' => $top5Popular
        ];

        $this->view('cate/index', $data);
    }
}
