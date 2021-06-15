<?php

namespace App\Controller;

use W1020\Table as ORMTable;
use App\View\View;

class Table
{
    protected ORMTable $model;
    protected View $view;

    public function __construct()
    {
        $config = include __DIR__ . "/../../Config.php";
//        print_r($config);
        $this->model = new ORMTable($config);
        $this->view = new View();
    }

    public function show()
    {
//        echo "123";
//        print_r($this->model->get());
        $this
            ->view
            ->setData($this->model->get())
            ->setTemplate("Table/show")
            ->view();
    }
}