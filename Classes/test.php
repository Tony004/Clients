<?php
    use PHPUnit\Framework\TestCase;
    require "Client.php";

    class test extends TestCase{
        // Проверка имени
        public function testCheckName(){
            $class = new ReflectionClass("Client");
            $clientCheckName = $class->getMethod("checkName");
            $clientCheckName->setAccessible(true);
            $client = new Client;

            $res1 = $clientCheckName->invoke($client, "Ivan");
            $this->assertSame(true, $res1);
            // Тире разрешены, но не в начале
            $res2 = $clientCheckName->invoke($client, "-Ivan");
            $this->assertSame(false, $res2);

            $res3 = $clientCheckName->invoke($client, "Iv@n");
            $this->assertSame(false, $res3);
        }
        // Проверка фамилии
        public function testCheckSurame(){
            $class = new ReflectionClass("Client");
            $clientCheckSurname = $class->getMethod("checkSurname");
            $clientCheckSurname->setAccessible(true);
            $client = new Client;

            $res1 = $clientCheckSurname->invoke($client, "Ivanov");
            $this->assertSame(true, $res1);
            // Тире разрешены, но не в начале
            $res2 = $clientCheckSurname->invoke($client, "-Ivanov");
            $this->assertSame(false, $res2);

            $res3 = $clientCheckSurname->invoke($client, "Iv@nov");
            $this->assertSame(false, $res3);
        }
        // Проверка телефона
        public function testCheckPhone(){
            $class = new ReflectionClass("Client");
            $clientCheckPhone = $class->getMethod("checkPhone");
            $clientCheckPhone->setAccessible(true);
            $client = new Client;

            $res1 = $clientCheckPhone->invoke($client, 123456789123);
            $this->assertSame(true, $res1);

            $res2 = $clientCheckPhone->invoke($client, 12345);
            $this->assertSame(false, $res2);

            $res3 = $clientCheckPhone->invoke($client, "12345A54321");
            $this->assertSame(false, $res3);
        }
        // Проверка комментария
        public function testCheckComment(){
            $class = new ReflectionClass("Client");
            $clientCheckComment = $class->getMethod("checkComment");
            $clientCheckComment->setAccessible(true);
            $client = new Client;

            $res1 = $clientCheckComment->invoke($client, "<b>Hello</b>");
            $str1 = htmlspecialchars("<b>Hello</b>");
            $this->assertSame($str1, $res1);

            $res2 = $clientCheckComment->invoke($client, 123456);
            $str2 = 123456;
            $this->assertNotSame($str2, $res2);

            $res3 = $clientCheckComment->invoke($client, "<br/><br/><br/><br/><br/>");
            $str3 = htmlspecialchars("<br/><br/><br/><br/><br/>");
            $this->assertSame($str3, $res3);
        }
    }
?>
