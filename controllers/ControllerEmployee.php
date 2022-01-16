<?php

    include_once("models/employee.php");
    include_once("connection/connection.php");


    class ControllerEmployee{

        public function home(){
            $employeeList = Employee::toList();

            include_once("views/employee/list.php");
        }

        public function create(){
            global $ruta;

            if($_POST){

                $name = $_POST["nombre"];
                $email = $_POST["email"];
                $area = $_POST["area"];
                $sex = $_POST["sex"];
                $description = $_POST["description"];
                $boletin = $_POST["boletin"];
                $roles = $_POST["role"];
                
                // FALTA VALIDAR DEL LADO DE PHP LOS DATOS

                Employee::create($name,$email,$area,$sex,$description,$boletin,$roles);
                header("Location: $ruta");
            }

            include_once("views/employee/create.php");
        }

        public function update(){
            global $ruta;

            $id = $_GET["id"];

            if($_POST){
                $name = $_POST["nombre"];
                $email = $_POST["email"];
                $area = $_POST["area"];
                $sex = $_POST["sex"];
                $description = $_POST["description"];
                $boletin = $_POST["boletin"];
                $roles = $_POST["role"];
                
                Employee::update($id,$name,$email,$area,$sex,$description,$boletin,$roles);
                $ruta = $ruta;
                header("Location: $ruta");
            }

            include_once("views/employee/update.php");
        }

        public function delete(){
            global $ruta;

            $id = $_GET["id"];
            Employee::delete($id);
            $ruta = $ruta;

            header("Location: $ruta");
        }
    }

?>