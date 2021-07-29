<?php
class Posts extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');
    }

    public function index()
    {
        // Get posts
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts,
        ];

        $this->view('posts/index', $data);
    }

    public function getAdd(){

    }

    public function add()
    {
      
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'short_content' => trim($_POST['short_content']),
                'full_content' => trim($_POST['full_content']),
                'image' => trim($_POST['image']),
                'category_id' => trim($_POST['category_id']),
                'title_err' => '',
                'short_content_err' => '',
                'full_content_err' => '',
                'image_err' => '',
                'category_id_err' => '',
            ];

            // Validate data
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['short_content'])) {
                $data['short_content_err'] = 'Please enter short content text';
            }
            if (empty($data['full_content'])) {
                $data['full_content_err'] = 'Please enter full content text';
            }
            if (empty($data['image'])) {
                $data['image_err'] = 'Please enter image';
            }
            if (empty($data['category_id'])) {
                $data['category_id_err'] = 'Please enter category';
            }

            // Make sure no errors
            if (
                empty($data['title_err']) && empty($data['short_content_err']) && empty($data['full_content_err'])
                && empty($data['image_err'])  && empty($data['category_id_err'])
            ) {
                // Validated
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/add', $data);
            }
        } else {

            $cates = $this->categoryModel->getCategory();

            $data = [
                'cates' => $cates,
                'title' => '',
                'short_content' => '',
                'full_content' => '',
                'image' => '',
                'category_id' => ''
            ];
            $this->view('posts/add', $data);
        }
    }

    public function edit($id)
    {
      
        // $this->view('posts/edit', $data);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'short_content' => trim($_POST['short_content']),
                'full_content' => trim($_POST['full_content']),
                'image' => trim($_POST['image']),
                'category_id' => trim($_POST['category_id']),
                'title_err' => '',
                'short_content_err' => '',
                'full_content_err' => '',
                'image_err' => '',
                'category_id_err' => '',
            ];


            // Validate data
            // Validate data
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['short_content'])) {
                $data['short_content_err'] = 'Please enter short content text';
            }
            if (empty($data['full_content'])) {
                $data['full_content_err'] = 'Please enter full content text';
            }
            if (empty($data['image'])) {
                $data['image_err'] = 'Please enter image';
            }
            if (empty($data['category_id'])) {
                $data['category_id_err'] = 'Please enter category';
            }


            // Make sure no errors
            if (
                empty($data['title_err']) && empty($data['short_content_err']) && empty($data['full_content_err'])
                && empty($data['image_err'])  && empty($data['category_id_err'])
            ) {
                // Validated
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post Updated');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/edit', $data);
            }
        } else {
            // Get existing post from model
            $post = $this->postModel->getPostById($id);

            $cates = $this->categoryModel->getCategory();

            // // Check for owner
            // if ($post->user_id != $_SESSION['user_id']) {
            //     redirect('posts');
            // }

            $data = [
                'id' => $id,
                'cates'=>$cates,
                'title' => $post->title,
                'short_content' => $post->short_content,
                'full_content' => $post->full_content,
                'image' => $post->image,
                'category_id' => $post->category_id
            ];

            $this->view('posts/edit', $data);
        }
    }

    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        // $user = $this->userModel->getUserById($post->user_id);
        $cates = $this->categoryModel->getCategory();

        $data = [
            'id' => $id,
            'cates'=>$cates,
            'title' => $post->title,
            'short_content' => $post->short_content,
            'full_content' => $post->full_content,
            'image' => $post->image,
            'category_id' => $post->category_id
            // 'user' => $user
        ];

        $this->view('posts/show', $data);
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // // Get existing post from model
            // $post = $this->postModel->getPostById($id);

            // // Check for owner
            // if ($post->user_id != $_SESSION['user_id']) {
            //     redirect('posts');
            // }

            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('posts');
        }
    }

    
}
