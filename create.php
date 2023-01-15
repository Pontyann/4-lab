<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $task_name = $_POST['task_name'];
        $Text = $_POST['Text'];
        $deadline = $_POST['deadline'];

        $xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");
        
        $task = $xml->addChild('item', '');
        $task->addAttribute('deadline', $deadline);
        $task->addChild('name', $task_name);
        $task->addChild('Text', $Text);
        $task->addAttribute('id', $xml->count());

        $xml->saveXML('data.xml');
    }
    ?>
    <div class="task-card create">
        <form method="POST" action="create.php">
            <p>Название задачи: <input type="text" name="task_name" required /></p>
            <p>Текст задачи: <input type="text" name="Text" /></p>
            <p>Дедлайн: <input type="date" name="deadline" /></p>
            <input type="submit" value="Сохранить" />
        </form>
        <a href="index.php">Назад</a>
    </div>
</body>

</html>
