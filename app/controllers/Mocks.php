<?php


class Mocks extends Controller
{
    public function __construct()
    {
        $this->mockdata_model = $this->model('Mock');
    }

    public function index()
    {
        $data = [
            'title' => 'Project2',
            'description' => '555'
        ];
        // $this->view('mocks/index', $data);
        redirect('');
    }

    public function mockStudents() {
        // $this->mockdata_model->mockStudents();
        redirect('');
    }

    public function mockClassStudets() {
        // $this->mockdata_model->mockClassStudets();
        // die('DONE!');
        redirect('');
    }

    public function updateImage() {
        // $this->mockdata_model->updateImage();
        redirect('');
    }
}