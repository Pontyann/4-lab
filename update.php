<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $id = 0;
    $name = '';
    $Text = '';
    $deadline = '';

    $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $name = $item->name;
                $Text = $item->Text;
                $deadline = $item['deadline'];
                $node = $item;
                break;
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        foreach ($xml->item as $item) {
            if ($item['id'] == $id) {
                $item->name = $_POST['task_name'];
                $item->Text = $_POST['Text'];
                $item['deadline'] = $_POST['deadline'];
                break;
            }
        }
        $xml->saveXML('data.xml');
    }
    ?>

    <form method="POST" action="update.php?id=<?= $id ?>">
        Название задачи: <input type="text" name="task_name" required value="<?= $name ?>" /><br />
        Имя исполнителя: <input type="text" name="Text" value="<?= $Text ?>" /><br />
        Дедлайн: <input type="date" name="deadline" value="<?php $deadline ?>" /><br />
        <input type="hidden" value="<?= $id ?>" name="id"/>
        <input type="submit" value="Сохранить" />
    </form>
</body>

</html>
