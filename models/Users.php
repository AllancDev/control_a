<?php 
    class Users extends model {
        public function isLogged() {
            if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
                return true;
            } else {
                return false;
            }
        }

        public function doLogin($companies, $email, $password) {
            $sql = $this -> db -> prepare("SELECT id FROM tb_users WHERE id_company = :companie AND email = :email AND password = :password ");
            $sql -> bindValue(":companie", $companies);
            $sql -> bindValue(":email", $email);
            $sql -> bindValue(":password", md5($password));

            if($sql -> rowCount() > 0) {
                $row = $sql -> fetch();

                $_SESSION['ccUser'] = $row['id'];
                return true;
            } else {
                return false;
            }
        }
    }
