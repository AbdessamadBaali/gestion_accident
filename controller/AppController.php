<?php
session_start();

include_once "./model/AppModel.php";
include_once "./model/Logout.php";

class AppController 
{
    private $model_obj;

    public function __construct()
    {
        $this->model_obj = new Model_app();
    }
    public function execute_app () {
        
        if(isset($_POST['login_btn']) ) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $query = "SELECT * from users where login = '$email' and pass= '$pass'";
            $result = $this->model_obj->crud_query($query, "select");
            $_SESSION['login'] = $email;
            if($result !== 0 and $result !== 1) {
                $query = "SELECT * from accident";
                $data = $this->model_obj->crud_query($query, "select");
                $_SESSION['data'] = $data;

                if($data == 0 or $data == 1) {
                    unset($data);
                }
                include_once './template/home.php';
            } else {
                $logout =  new Logout();
                $_SESSION['feedback'] = 'login ou mos de pass inccorect !!';
                include_once './template/login.php';
            }

            
        } elseif(isset($_REQUEST['search'])){
            $query = "SELECT * from accident";
            $data = $this->model_obj->crud_query($query, "select");
            $_SESSION['data'] = $data;

            if($data == 0 or $data == 1) {
                unset($data);
            }
            include_once './template/show.php';

        } elseif(isset($_REQUEST['add'])) {
            include_once './template/add.php';

        } elseif(isset($_POST['add_accident'])) {
            $login = $_SESSION['login'];
            $date_acc = $_POST['date_acc'];
            $type_acc = $_POST['type_acc'];
            $desc_acc = $_POST['desc_acc'];

            $query = "INSERT into accident(date_acc,type_acc,desc_acc,login) values('$date_acc','$type_acc','$desc_acc','$login')";

            $result = $this->model_obj->crud_query($query, "INSERT");

            if($result !== 0) {
                $_SESSION['feedback'] = 'insertion bien !!';
                $_SESSION['alert'] = 'success';

            }else {
                $_SESSION['feedback'] = 'error !!';
                $_SESSION['alert'] = 'danger';
            }
            include_once './template/add.php';

        } elseif(isset($_GET['delete']) and isset($_GET['id'])){
            $id = $_GET['id'];
            
            $query = "DELETE from accident where id = $id";

            $result = $this->model_obj->crud_query($query, "DELETE");

            if($result !== 0) {
                $_SESSION['feedback'] = 'bien  supprimer!!';
                $_SESSION['alert'] = 'success';

            }else {
                $_SESSION['feedback'] = 'error !!';
                $_SESSION['alert'] = 'danger';
            }
            header('location: index.php?search');
            
        } elseif(isset($_REQUEST['statistique'])) {
            include_once './template/statistique.php';

        }else {
            $logout =  new Logout();
            include_once './template/login.php';

        }

    }
    
}