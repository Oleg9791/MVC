<?php

use W1020\HTML\Table;

echo (new Table())
    ->setData($this->data['table'])
    ->setHeaders($this->data['comments'])
    ->addColumn(fn($row) => "<a href='?type={$this->data['controllerName']}&action=del&id=$row[id]'>❌</a>")
    ->addColumn(fn($row) => "<a href='?type={$this->data['controllerName']}&action=showEdit&id=$row[id]'>✏️</a>")
    ->setClass("table table-success table-striped")
    ->html();

//print_r($this->data);
?>

<a href="?type=<?= $this->data['controllerName'] ?>&action=showAdd" class='btn btn-primary'>Добавить</a>
