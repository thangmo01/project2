<?php


class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Project2',
            'description' => 'face recognition'
        ];
        $this->view('pages/index', $data);
    }
}