<?php 

  class permissionController extends controller {
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


      if($u -> hasPermission('permissions_view')) {

        $permissions = new Permissions();
        $data['permissions_list'] = $permissions -> getList($u -> getCompany());
        $data['permissions_groups_list'] = $permissions -> getGroupList ($u -> getCompany());

        $this -> loadTemplate('permissions', $data);
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

      if($u -> hasPermission('permissions_view')) {
        $permissions = new permissions();

        if(isset($_POST['permission_title']) && !empty($_POST['permission_title'])) {
          $pname = addslashes($_POST['permission_title']);
          $permissions -> add($pname, $u -> getCompany());

          header("Location: " . BASE_URL . "/permission?a=1");

        }

        $this -> loadTemplate('permissions_add', $data);
      } else {
        header("Location: " . BASE_URL);
      }

    }

    public function add_group() {
      $data = array();
      $u = new Users();
      $u -> setLoggedUser();
      $company = new Companies($u -> getCompany());
      $data['company_name'] = $company -> getName();
      $data['user_email'] = $u -> getEmail();

      if($u -> hasPermission('permissions_view')) {
        $permissions = new permissions();
        if(isset($_POST['permission_title']) && !empty($_POST['permission_title'])) {
          $pname = addslashes($_POST['permission_title']);
          $plist = (isset($_POST['list_permissions']) && !empty($_POST['list_permissions'])) ? implode(",", $_POST['list_permissions']) : array();
          $permissions -> addGroup($pname, $plist, $u -> getCompany());
          header("Location: " . BASE_URL . "/permission?a=0");
        }

        $data['permissions_list'] = $permissions -> getList($u -> getCompany());

        $this -> loadTemplate('permissions_addgroup', $data);
      } else {
        header("Location: " . BASE_URL);
      }
      
    }

    public function delete($id) {
      $data = array();
      $u = new Users();
      $u -> setLoggedUser();
      $company = new Companies($u -> getCompany());
      $data['company_name'] = $company -> getName();
      $data['user_email'] = $u -> getEmail();

      if($u -> hasPermission('permissions_view')) {
        $permissions = new permissions();
        $permissions -> delete($id);
        header("Location: " . BASE_URL . "/permission?a=1" );

      } else {
        header("Location: " . BASE_URL);
      }

    } 
    
    public function delete_group($id) {
      $data = array();
      $u = new Users();
      $u -> setLoggedUser();
      $company = new Companies($u -> getCompany());
      $data['company_name'] = $company -> getName();
      $data['user_email'] = $u -> getEmail();

      if($u -> hasPermission('permissions_view')) {

        $permissions = new permissions();
        $permissions -> delete_group($id);
        header("Location: " . BASE_URL . "/permission?a=0" );

      } else {
        header("Location: " . BASE_URL);
      }

    } 

    public function editgroup($id) {
      $data = array();
      $u = new Users();
      $u -> setLoggedUser();
      $company = new Companies($u -> getCompany());
      $data['company_name'] = $company -> getName();
      $data['user_email'] = $u -> getEmail();

      if($u -> hasPermission('permissions_view')) {
        $permissions = new permissions();

        if(isset($_POST['permission_title']) && !empty($_POST['permission_title'])) {
          $pname = addslashes($_POST['permission_title']);
          $plist = (isset($_POST['list_permissions']) && !empty($_POST['list_permissions'])) ? implode(",", $_POST['list_permissions']) : array();
          $permissions -> editGroup($pname, $plist, $id, $u -> getCompany());
          header("Location: " . BASE_URL . "/permission?a=0");
        }

        $data['permissions_list'] = $permissions -> getList($u -> getCompany());
        $data['group_info'] = $permissions -> getGroup($id, $u -> getCompany());
        if(!$data['group_info']) {
          header("Location: " . BASE_URL . "/permission?a=0");
        }

        $this -> loadTemplate('permissions_editgroup', $data);
      } else {
        header("Location: " . BASE_URL);
      }
      
    }

}