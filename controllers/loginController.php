<?php 
    class loginController extends controller {
        public function index() {
            $data = array();

            if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
                header("Location: " . BASE_URL);
                exit;
            }

            if(isset($_POST['companies']) && !empty($_POST['companies'])) {
                $companies = addslashes($_POST['companies']);
                $email = addslashes($_POST['email']);
                $password = addslashes($_POST['i_password']);
            
                $u = new Users();

                if($u -> doLogin($companies, $email, $password) ) {
                    header("Location: " . BASE_URL);
                    exit;
                } else {
                    $data['error'] = 'Acesso negado! verifique seus dados e tente novamente.';
                } 
            }

            $this -> loadViewInTemplate('login', $data);
        }


        public function logout() {
            $u = new Users();
            $u -> setLoggedUser();
            if($u -> hasPermission('logout')) {
                $u -> logout();
                header("Location: " . BASE_URL . "/login");
                exit;
            } else {
                echo "Não pode fazer logout";
                exit;
            }
        }

    }

