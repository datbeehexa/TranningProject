<?php
class Categories extends Controller
{
    public function __construct()
    {
        $this->categoryModel = $this->model('Category');
    }


    public function index()
    {
        // Get posts
        $cates = $this->categoryModel->getCategory();

        $data = [
            'cates' => $cates
        ];
        $this->view('categories/index', $data);
        echo json_encode($data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'category_name' => trim($_POST['category_name']),
                'description' => trim($_POST['description']),
                'user_id' => $_SESSION['user_id'],
                'category_name_err' => '',
                'description_err' => ''
            ];

            // Validate data
            if (empty($data['category_name'])) {
                $data['category_name_err'] = 'Please enter name category';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }

            // Make sure no errors
            if (empty($data['category_name_err']) && empty($data['description_err'])) {
                // Validated
                if ($this->categoryModel->addCate($data)) {
                    flash('cate_message', 'Category Added');
                    redirect('categories');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('categories/add', $data);
            }
        } else {
            $data = [
                'category_name' => '',
                'description' => ''
            ];
           
            $this->view('categories/add', $data);
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'category_name' => trim($_POST['category_name']),
                'description' => trim($_POST['description']),
                'category_name_err' => '',
                'description_err' => ''
            ];

            // Validate data
            if (empty($data['category_name'])) {
                $data['category_name_err'] = 'Please enter category text';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter description text';
            }

            // Make sure no errors
            if (empty($data['category_name_err']) && empty($data['category_name_err'])) {
                // Validated
                if ($this->categoryModel->updateCate($data)) {
                    flash('cate_message', 'Category Updated');
                    redirect('categories');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('categories/edit', $data);
            }
        } else {
            // Get existing post from model
            $cate = $this->categoryModel->getCateById($id);
            
            // // Check for owner
            // if ($post->user_id != $_SESSION['user_id']) {
            //     redirect('posts');
            // }

            $data = [
                'id' => $id,
                'category_name' => $cate->category_name,
                'description' => $cate->description
            ];

            $this->view('categories/edit', $data);
        }
    }

    public function show($id)
    {
        $cate = $this->categoryModel->getCateById($id);
        $data = [
            'cate' => $cate,
        ];
        $this->view('categories/show', $data);
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // $data = [
            //     'id' => $id,
            //     'category_name' => trim($_POST['category_name']),
            //     'description' => trim($_POST['description']),
            //     'category_name_err' => '',
            //     'description_err' => ''
            // ];

            // Get existing post from model
            $cate = $this->categoryModel->getCateById($id);

            // Check for owner
            if ($cate->user_id != $_SESSION['user_id']) {
                redirect('categories');
            }

            if ($this->categoryModel->deleteCate($id)) {
                flash('cate_message', 'Category Removed');
                redirect('categories');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('categories');
        }
    }
}
