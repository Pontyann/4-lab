<?php

$xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="footer">

        <H1>Планировщик задач</H1>
    </div>
    <div class="container">
        <?php

        foreach ($xml->item as $item) {
        ?>
            <div class="task-card">
                <span class="task-card-name"><?= $item->name ?></span>
                <span class="task-card-deadline"><?= $item['deadline'] ?></span>
                <div class="text">
                   <p> <span class="task-card-Text"><?= $item->Text ?></span></p>
                </div>
                <a href="delete.php?id=<?= $item['id']?>">Задача выполнена</a>
            </div>
        <?php
        }

        ?>
        <a href="create.php">Добавить задачу</a>
    </div>
</body>

</html>
