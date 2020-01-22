<?php 
    class loginController extends controller {
        public function index() {
            $data = array();

            if(isset($_POST['companies']) && !empty($_POST['companies'])) {
                $companies = addslashes($_POST['companies']);
                $email = addslashes($_POST['email']);
                $password = addslashes($_POST['i_password']);
            
                $u = new Users();

                if($u -> doLogin($companies, $email, $password) ) {
                    header("Location: " . BASE_URL);
                } else {
                    $data['error'] = 'Acesso negado! verifique seus dados e tente novamente.';
                } 
            }

            $this -> loadViewInTemplate('login', $data);
        }
    }

