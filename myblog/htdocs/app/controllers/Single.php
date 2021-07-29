<?php
class Single extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');
        $this->commentModel = $this->model('Comment');
        $this->aboutModel = $this->model('About');
        $this->userModel = $this->model('User');
    }

    public function index($id)
    {
        $post = $this->postModel->getPostById($id);
        $cates = $this->categoryModel->getCategory();
        $top3PostRan = $this->postModel->findTop3Ran();
        $top5Popular = $this->postModel->findTop5Popular();
        $about = $this->aboutModel->getAbout();
        // $comment = $this->commentModel->getComment();


        $data = [
            'post' => $post,
            'cates' => $cates,
            'top3postran' => $top3PostRan,
            'top5popular' => $top5Popular,
            'about'=> $about,
            // 'comment'=>$comment
        ];

        $this->view('single/index', $data);
    }

    // public function add(){
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Sanitize POST array
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //         $data = [
    //             'comment' => trim($_POST['comment']),
    //             'post_id' => trim($_POST['post_id']),
    //             'user_id' => $_SESSION['user_id'],
    //         ];
    //         $this->commentModel->addComment($data);
    //     } else {
    //         $data = [
    //             'comment' => '',
    //         ];

    //         $this->view('single/', $data['post_id']);
    //     }
    // }
}