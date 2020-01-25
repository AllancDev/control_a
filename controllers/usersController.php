<?php 
    class usersController extends controller {
        public function __construct() {
          parent::__construct();
    
          $u = new Users();
          if($u -> isLogged() == false ) {
            header("Location: ". BASE_URL . "/login");
            exit;
          }
        } 
    
        public function index() {
          $data = array();
          $u = new Users($_SESSION['ccUser']);
          $u -> setLoggedUser();
          $company = new Companies($u -> getCompany());
          $company = explode(" ", $company -> getName());
          $email = explode("@", $u -> getEmail());
          $data['company_name'] = $company[0];
          $data['user_email'] = $email[0];
    
    
          if($u -> hasPermission('users_view')) {
            $data['users_list'] = $u -> getList($u -> getCompany());
            $this -> loadTemplate('users', $data);
          } else {
            header("Location: " . BASE_URL);
            exit;
          }
          
        }


        public function add() {
          $data = array();
          $u = new Users();
          $u -> setLoggedUser();
          $company = new Companies($u -> getCompany());
          $data['company_name'] = $company -> getName();
          $data['user_email'] = $u -> getEmail();
    
          if($u -> hasPermission('users_view')) {
              $p = new Permissions();  
            
            if(isset($_POST['users_email']) && !empty($_POST['users_email'])) {
              $email = addslashes($_POST['users_email']);
              $pass = addslashes($_POST['users_password']); 
              $groups = addslashes($_POST['users_group']);

              $a = $u -> add($email, $pass, $groups, $u -> getCompany());

              if(($a == '1')) {
                header("Location: " . BASE_URL . "/users");
                exit;
              } else {
                $data['error_msg'] = "Usuário já existe!";
              }

            }

            $p = new Permissions();
            $data['group_list'] = $p -> getGroupList($u -> getCompany());
            $this -> loadTemplate('users_add', $data);
          } else {
            header("Location: " . BASE_URL);
          }
    
        }
    
        public function edit($id) {
          $data = array();
          $u = new Users();
          $u -> setLoggedUser();
          $company = new Companies($u -> getCompany());
          $data['company_name'] = $company -> getName();
          $data['user_email'] = $u -> getEmail();
    
          if($u -> hasPermission('users_view')) {
              
            
            if(isset($_POST['users_email']) && !empty($_POST['users_email'])) {
              $email = addslashes($_POST['users_email']);
              $pass = addslashes($_POST['users_password']); 
              $groups = addslashes($_POST['users_group']);

              $a = $u -> edit($email, $pass, $groups, $u -> getCompany());

              if(($a == '1')) {
                header("Location: " . BASE_URL . "/users");
                exit;
              } else {
                $data['error_msg'] = "Usuário já existe!";
              }

            }

            $p = new Permissions();
            $data['group_list'] = $p -> getGroupList($u -> getCompany());
            $this -> loadTemplate('users_add', $data);
          } else {
            header("Location: " . BASE_URL);
          }
        }
    

    }

