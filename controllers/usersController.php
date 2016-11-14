<?php

cLass usersController extends AppsController
{
  public function __construct(){
    parent::__construct();
  }
  public function index(){

    $conditions = array(
      "conditions" => "users.type_id = types.id"
    );
    $users = $this->users->find("users, types", "all", $conditions);
    $usersCount = $this->users->find("users", "count");
    $this->set(compact("users", "usersCount"));

  }

  public function add(){
    if ($_SESSION["type_name"] == "Administradores") {

      if ($_POST) {
        //include_once(ROOT."libs".DS."password.php");
        $pass = new password();
        $_POST["password"] = $pass->getPassword($_POST["password"]);
        //print_r($_POST);
        if ($this->users->save("users", $_POST)) {
          $this->redirect(array("controller"=>"users"));
        }else{
          $this->redirect(array("controller"=>"users", "method"=>"add"));
        }
      }

      $this->set("types", $this->users->find("types"));
      $this->_view->setView("add");
    }else{
      $this->redirect(array("controller"=>"users"));
    }
  }

  public function edit($id){
    //if($_GET){ 
      
      if ($id) {
        $options = array(
          "conditions" => "id=".$id
        );
        $user = $this->users->find("users","first", $options);
        $this->set("user", $user);
        $this->set("types", $this->users->find("types"));
      }

      if ($_POST) {
        //print_r($_POST);
        //$this->users->update("users", $_POST);
        if (!empty($_POST["newPassword"])) {
          $pass = new password();
          $_POST["password"] = $pass->getPassword($_POST["newPassword"]);
        }
        if ($this->users->update("users", $_POST)) {
          $this->redirect(
            array(
              "controller"=>"users"
            )
          );
        }else{
          $this->redirect(
            array(
              "controller"=>"users",
              "method"=>"edit/".$_POST["id"]
            )
          );
        }
      }

    //}
  }


  public function delete($id){
    if ($_GET) {
      $conditions = "id=".$id;
      if ($this->users->delete("users", $conditions)) {
        $this->redirect(array("controller"=>"users"));
      }else{
        $this->redirect(array("controller"=>"users", "method"=>"add"));
      }
    }
    
  }

  public function login(){
    $this->_view->setLayout("login");
    //$this->_view->setView("login");

    if ($_POST) {

      $pass = new Password();
      $auth = new Authorization();
      $filter = new Validations();

      $username = $filter->sanitizeText($_POST["username"]);
      $password = $filter->sanitizeText($_POST["password"]);

      $options = array(
        "field" => 
          "users.id as user_id,
          users.password as password, 
          users.username as username, 
          types.name as type_name",
        "conditions" => "username = '$username' and users.type_id=types.id"
      );
      $user = $this->users->find("users, types", "first", $options);

      //print_r($user);
      //exit;
      if ($pass->getPassword($password, $user["password"])) {
        $auth->login($user);
        $this->redirect(array("controller"=>"pages"));
      }else{
        echo "Usuario no valido";
      }

    }
  }

  public function logout(){
    $auth = new Authorization();
    $auth->logout();
    $this->_view->render("login");
  }


}
