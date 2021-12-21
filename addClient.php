<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="CSS/style.css">
        <title>Add client</title>
    </head>
    <body>
        <form class="myForm" action="send.php" method="get">
            <div class="mb-3 row">
                <label for="name" class="form-label">Имя:</label>
                <input type="text" name="name" id="name" class="form-control-sm">
            </div>
            <div class="mb-3 row">
                <label for="surname" class="form-label">Фамилия:</label>
                <input type="text" name="surname" id="surname" class="form-control-sm">
            </div>
            <div class="mb-3 row">
                <label for="phone" class="form-label">Телефонный номер:</label>
                <input type="text" name="phone" id="phone" class="form-control-sm">
            </div>
            <div class="mb-3 row">
                <label for="comment" class="form-label">Комментарий:</label>
                <textarea name="comment" rows="4" cols="40" class="form-control-sm"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Добавить клиента">
        </form>

        <div class="myNav addClientBtn">
            <a href="index.php" class="btn btn-outline-info">Вернуться на главную</a>
            <a href="clientsTable.php" class="btn btn-outline-success">Таблица клиентов</a>
        </div>

    </body>
</html>
