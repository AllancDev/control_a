<?php 
    class clientsController extends controller {
        public function __construct() {
            parent::__construct();

            $u = new Users();
            if($u -> isLogged() == false) {
                header("Location: " . BASE_URL . '/login');
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

            if($u -> hasPermission('clients_view') ) {
              $this -> loadTemplate('clients', $data);
            } else {
                header("Location: " . BASE_URL);
                exit;
            }


        }
    }
