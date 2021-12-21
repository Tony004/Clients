<?php
    require_once("Classes/Client.php");

    if(isset($_GET["name"]) && $_GET["name"] != ""){
        $client->setName($_GET["name"]);
    }
    if(isset($_GET["surname"]) && $_GET["surname"] != ""){
        $client->setSurname($_GET["surname"]);
    }
    if(isset($_GET["phone"]) && $_GET["phone"] != ""){
        $client->setPhone($_GET["phone"]);
    }
    if(isset($_GET["comment"]) && $_GET["comment"] != ""){
        $client->setComment($_GET["comment"]);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Send</title>
    </head>
    <body>
        <div class="main">
            <div id="info">
                <p>
                    <h3><?= $client->getNameError(); ?></h3>
                </p>
                <p>
                    <h3><?= $client->getSurnameError(); ?></h3>
                </p>
                <p>
                    <h3><?= $client->getPhoneError(); ?></h3>
                </p>
                <p>
                    <h3>
                        <?php
                            $client->sendClient();
                        ?>
                    </h3>
                </p>
            </div>

            <a href="index.php" class="btn btn-outline-info">Вернуться на главную</a>
            <a href="clientsTable.php" class="btn btn-outline-success">Таблица клиентов</a>
            <a href="addClient.php" class="btn btn-outline-primary">Добавить клиента</a>
        </div>

    </body>
</html>
