<?php
interface iClient{
    public function getName();
    public function setName($name);

    public function getSurname();
    public function setSurname($surname);

    public function getPhone();
    public function setPhone($phone);

    public function getComment();
    public function setComment($comment);

    public function getNameError();
    public function getSurnameError();
    public function getPhoneError();

    public function sendClient();
    public function getClients();
}

class Client implements iClient{
    private $nameError;
    private $surnameError;
    private $phoneError;

    private $name;
    private $surname;
    private $phone;
    private $comment;

    public function getNameError(){
        if($this->nameError != ""){
            return $this->nameError;
        }
    }
    public function getSurnameError(){
        if($this->nameError != ""){
            return $this->surnameError;
        }
    }
    public function getPhoneError(){
        if($this->nameError != ""){
            return $this->phoneError;
        }
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        if($this->checkName($name)){
            $this->name = $name;
        }
    }

    public function getSurname(){
        return $this->surname;
    }
    public function setSurname($surname){
        if($this->checkSurname($surname)){
            $this->surname = $surname;
        }
    }

    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        if($this->checkPhone($phone)){
            $this->phone = $phone;
        }
    }

    public function getComment(){
        return $this->comment;
    }
    public function setComment($comment){
        $this->comment = $this->checkComment($comment);
    }

    // Проверка имени
    // Возвращает bool
    private function checkName($name){
        $strLen = mb_strlen($name, "utf-8");

        if($strLen < 2){
            $this->nameError = "Длина имени не может быть менее 2 символов";
            return false;
        }
        if($strLen > 150){
            $this->nameError = "Длина имени не может быть более 150 символов";
            return false;
        }

        preg_match("/^[-]+/", $name, $match);
        if(strlen($match[0]) > 0){
            $this->nameError = "Тире не может быть в начале";
            return false;
        }
        else{

            preg_match("/[^а-яА-Яa-zA-Z\-]+/u", $name, $match);
            if(strlen($match[0]) > 0){
                $this->nameError = "Имя может содержать только буквы и тире";
                return false;
            }
        }

        return true;
    }

    // Проверка фамилии
    // Возвращает bool
    private function checkSurname($surname){
        $strLen = mb_strlen($surname, "utf-8");

        if($strLen < 2){
            $this->surnameError = "Длина фамилии не может быть менее 2 символов";
            return false;
        }
        if($strLen > 150){
            $this->surnameError = "Длина фамилии не может быть более 150 символов";
            return false;
        }

        preg_match("/^[-]+/", $surname, $match);
        if(strlen($match[0]) > 0){
            $this->surnameError = "Тире не может быть в начале";
            return false;
        }
        else{
            preg_match("/[^а-яА-Яa-zA-Z\-]+/u", $surname, $match);
            if(strlen($match[0]) > 0){
                $this->surnameError = "Фамилия может содержать только буквы и тире";
                return false;
            }
        }

        return true;
    }

    // Проверка телефонного номера
    // Возвращает bool
    private function checkPhone($phone){
        $phoneNum = is_numeric($phone);
        if(!$phoneNum){
            $this->phoneError = "Ошибка в номере телефона. Нужно вводить только цифры";
            return false;
        }

        $numLen = strlen($phone);
        if($numLen < 10){
            $this->phoneError = "Номер не может быть менее 10 цифр";
            return false;
        }

        return true;
    }

    private function checkComment($comment){
        return htmlspecialchars($comment);
    }

    //Отправка данных клиента на сервер
    public function sendClient(){
            if($this->getName() != "" && $this->getSurname() != "" && $this->getPhone() != ""){
                require_once("dbConnect.php");

                $name = $this->getName();
                $surname = $this->getSurname();
                $phone = $this->getPhone();
                $comment = $this->getComment();

                $query = "INSERT INTO $tableName (name, surname, phone, comment, date) VALUES (?, ?, ?, ?, NOW())";
                $stmt = $pdo->prepare($query);
                $stmt->execute(array($name, $surname, $phone, $comment));

                echo "Данные успешно добавлены";
            }
    }

    //Получение данных о клиентах с сервера
    //Возвращает Array
    public function getClients(){
        require_once("dbConnect.php");

        $query = "SELECT * FROM $tableName ORDER BY name, surname";
        $data = $pdo->query($query)->fetchAll(PDO::FETCH_UNIQUE);

        return $data;
    }
}

$client = new Client;

?>
