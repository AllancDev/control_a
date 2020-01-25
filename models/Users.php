<?php 
    class Users extends model {


        private $userInfo;
        private $permissions;

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
            $sql -> execute();

            if($sql -> rowCount() > 0) {
                $row = $sql -> fetch();

                $_SESSION['ccUser'] = $row['id'];
                return true;
            } else {
                return false;
            }
        }

        public function setLoggedUser() {
            if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
                $id = $_SESSION['ccUser'];

                $sql = $this -> db -> prepare("SELECT * FROM tb_users WHERE id = :id");
                $sql -> bindValue(":id", $id);
                $sql -> execute();

                if($sql -> rowCount() > 0) {
                    $this -> userInfo = $sql -> fetch();
                    $this -> permissions = new Permissions();
                    $this -> permissions -> setGroup($this -> userInfo['groups'], $this -> userInfo['id_company']);
                }

            }
        }

        public function logout() {
            unset($_SESSION['ccUser']);
        }


        public function hasPermission($name) {
            return $this -> permissions -> hasPermission($name); 
        }

        public function getCompany() {
            if(isset($this -> userInfo['id_company'])) {
                return $this -> userInfo['id_company'];
            } else {
                return 0;
            }   
        }

        public function getEmail() {
            if(isset($this -> userInfo['email'])) {
                return $this -> userInfo['email'];
            } else {
                return 0;
            }
        }

        public function findUsersInGroup($id) {
            $sql = $this -> db -> prepare("SELECT COUNT(*) as c FROM tb_users WHERE groups = :group");
            $sql -> bindValue(":group", $id);
            $sql -> execute();
            $row = $sql -> fetch();
            if($row['c'] == '0') {
                return false; 
            } else {
                return true;
            }
        } 


        public function getList($id_company) {
            $array = array();
            $sql = $this -> db -> prepare("SELECT u.id, u.email, p.name FROM tb_users u LEFT JOIN tb_permissions_groups p ON p.id = u.groups WHERE u.id_company = :id_company");
            $sql -> bindValue(":id_company", $id_company);
            $sql -> execute();


            if($sql -> rowCount() > 0) {
                $array = $sql -> fetchAll();

            }

            return $array;
        }

        public function add($email, $pass, $group, $id_company) {
            $sql = $this -> db -> prepare("SELECT COUNT(*) as c FROM tb_users WHERE email = :email");
            $sql -> bindValue(":email", $email);
            $sql -> execute();
            $row = $sql -> fetch();

            if($row['c'] == '0') {
                $sql = $this -> db -> prepare("INSERT INTO tb_users SET email = :email, password = md5(:password), groups = :groups, id_company = :id_company");
                $sql -> bindValue(":email", $email);
                $sql -> bindValue(":password", $pass);
                $sql -> bindValue(":groups", $group);
                $sql -> bindValue(":id_company", $id_company);
                $sql -> execute();
                return '1';
            } else {
                return '0';
            }
        }

    }
