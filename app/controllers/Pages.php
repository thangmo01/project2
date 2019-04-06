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
            'description' => '555'
        ];
        $this->view('pages/index', $data);
    }
}