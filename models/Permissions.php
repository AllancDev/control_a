<?php 
  class Permissions extends model {
    private $group;
    private $permissions;

    public function setGroup($id, $id_company) {
      $this -> group = $id;
      $this -> permissions = array();


      $sql = $this -> db -> prepare("SELECT params FROM tb_permissions_groups WHERE id = :id AND id_company = :id_company");
      $sql -> bindValue(":id", $id);
      $sql -> bindValue(":id_company", $id_company);
      $sql -> execute();

      if($sql -> rowCount() > 0) {
        $row = $sql -> fetch();

        if(empty($row['params'])) {
          $row['params'] = '0';
        }

        $params = $row['params'];
        $sql = $this -> db -> prepare("SELECT name FROM tb_permissions_params WHERE id IN ($params) AND id_company = :id_company");
        $sql -> bindValue(":id_company", $id_company);
        $sql -> execute();

        if($sql -> rowCount() > 0) {
          foreach($sql -> fetchAll() as $item) {
            $this -> permissions[] = $item['name'];
          }

        }

      }
    }

    public function hasPermission($name) {
      if(in_array($name, $this -> permissions)) {
        return true;
      } else {
        return false;
      }
    }

    public function getList($id_company) {
      $array = array();
      $sql = $this -> db -> prepare("SELECT * FROM tb_permissions_params WHERE id_company = :id_company");
      $sql -> bindValue(":id_company", $id_company);
      $sql -> execute();

      if($sql -> rowCount() > 0) {
        $array = $sql -> fetchAll();
      } 

      return $array;
    }

    public function getGroupList($id_company) {
      $array = array();
      $sql = $this -> db -> prepare("SELECT * FROM tb_permissions_groups WHERE id_company = :id_company");
      $sql -> bindValue(":id_company", $id_company);
      $sql -> execute();

      if($sql -> rowCount() > 0) {
        $array = $sql -> fetchAll();
      } 

      return $array;
    }
 
    public function add($name, $id_company) {
      $sql = $this -> db -> prepare("INSERT INTO tb_permissions_params SET name = :name, id_company = :id_company");
      $sql -> bindValue(":name", $name);
      $sql -> bindValue(":id_company", $id_company);
      $sql -> execute();
    }


    public function getGroup($id, $id_company) {
      $array = array();
      $sql = $this -> db -> prepare("SELECT * FROM tb_permissions_groups WHERE id = :id AND id_company = :id_company");
      $sql -> bindValue(":id", $id);
      $sql -> bindValue(":id_company", $id_company);
      $sql -> execute();

      if($sql -> rowCount() > 0) {
        $array = $sql -> fetch();
        $array['params'] = explode(",",  $array['params']);
      } 

      return $array;
    }

    public function addGroup($name, $pList, $id_company) {
      $sql = $this -> db -> prepare("INSERT INTO tb_permissions_groups SET name = :name, id_company = :id_company, params = :params");
      $sql -> bindValue(":name", $name);
      $sql -> bindValue(":id_company", $id_company);
      $sql -> bindValue(":params", $pList);
      $sql -> execute();
    }

    public function delete($id) {
      $sql = $this -> db -> prepare("DELETE FROM tb_permissions_params WHERE id = :id");
      $sql -> bindValue(":id", $id);
      $sql -> execute();
    }

    public function delete_group($id) {
      $u = new Users();
      
      if($u -> findUsersInGroup($id) == false) {
        $sql = $this -> db -> prepare("DELETE FROM tb_permissions_groups WHERE id = :id");
        $sql -> bindValue(":id", $id);
        $sql -> execute();
      }
    }

    public function editgroup($name, $plist, $id, $id_company) {
      $sql = $this -> db -> prepare("UPDATE tb_permissions_groups SET name = :name, params = :params WHERE id = :id AND id_company = :id_company");
      $sql -> bindValue(":name", $name);
      $sql -> bindValue(":id_company", $id_company);
      $sql -> bindValue(":params", $plist);
      $sql -> bindValue(":id", $id);
      $sql -> execute();
    }

}

