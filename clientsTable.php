<?php
    require_once("Classes/Client.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="CSS/style.css">
        <title>Таблица клиентов</title>
    </head>
    <body>
            <div class="container">
                <table class="table table-striped">
                    <tr>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Телефон</th>
                        <th>Комментарий</th>
                        <th>Дата</th>
                    </tr>
                    <?php
                        $allClients = $client->getClients();
                        foreach($allClients as $client){
                    ?>
                    <tr>
                        <td><?= $client["name"] ?></td>
                        <td><?= $client["surname"] ?></td>
                        <td><?= $client["phone"] ?></td>
                        <td><?= $client["comment"] ?></td>
                        <td><?= $client["date"] ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <div class="myNav main">
                <a href="index.php" class="btn btn-outline-info">Вернуться на главную</a>
                <a href="addClient.php" class="btn btn-outline-primary">Добавить клиента</a>
            </div>
        </div>
    </body>
</html>
