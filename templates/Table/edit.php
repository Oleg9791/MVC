<?php
print_r($this->data);
?>
<form action="?type=<?= $this->data['controllerName'] ?>&action=edit&id=<?= $this->data['id'] ?>" method='post'>
    <?php
    //print_r($this->data);
    foreach ($this->data['row'] as $field => $value) {
        echo $this->data['comments'][$field] . "<br>";
        echo "<input name='$field' value='$value'><br>";
    }
    //?>

    <input type="submit" value="ok" class="btn btn-primary">

</form>

