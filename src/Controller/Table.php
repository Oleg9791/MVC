<?php

namespace App\Controller;

use W1020\Table as ORMTable;
use App\View\View;

class Table extends AbstractController
{
    protected ORMTable $model;
//    protected View $view;

    public function __construct()
    {
        parent::__construct();
        $config = include __DIR__ . "/../../Config.php";
//        print_r($config);
        $this->model = new ORMTable($config);
//        $this->view = new View();
    }

    public function actionShow()
    {
//        echo "123";
//        print_r($this->model->get());
        $headers['id'] = "№";
        foreach ($this->model->columnComments() as $key => $value) {
            $headers[$key] = $value;
        }
        $headers['del'] = "Удалить";
        $headers['edit'] = "Редактировать";

        $this
            ->view
            ->setData(["table" => $this->model->get(), "comments" => $headers])
            ->setTemplate("Table/show")
            ->view();
    }

    public function actionDel()
    {
//        print_r($_GET);
        $this->model->del($_GET['id']);
//        header("Location:?type=Table&action=show");
        $this->redirect("?type=Table&action=show");
    }

    public function actionShowAdd()
    {
        $this
            ->view
            ->setData($this->model->columnComments())
            ->setTemplate("Table/add")
            ->view();

    }

    public function actionAdd()
    {
//        print_r($_POST);
        $this->model->ins($_POST);
//        header("Location:?type=Table&action=show");
        $this->redirect("?type=Table&action=show");


    }

    public function actionShowEdit()
    {
        $row = $this->model->getRow($_GET['id']);
        unset($row['id']);
        $this
            ->view
            ->setData(
                ["comments" => $this->model->columnComments(),
                    "row" => $row,
                    "id" => $_GET['id']]
            )
            ->setTemplate("Table/edit")
            ->view();

    }

    public function actionEdit()
    {
        $this->model->upd($_GET['id'], $_POST);
//        header("Location:?type=Table&action=show");
        $this->redirect("?type=Table&action=show");


    }

}