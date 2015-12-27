<?php

namespace Admin\Model;

use Zend\Crypt\Password\Bcrypt;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Db\Sql\Where;
use Zend\Session\Container;

class AdminTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($paginated = false) {
        if ($paginated) {
            // create a new Select object for the table album
            $select = new Select('admin');
            // $select->where(array('catelog'=>$id));
            $select->order('id ASC');
            // create a new result set based on the Album entity
            $resultSetPrototype = new ResultSet ();
            $resultSetPrototype->setArrayObjectPrototype(new Admin());
            // create a new pagination adapter object
            $paginatorAdapter = new DbSelect(
                    // our configured select object
                    $select,
                    // the adapter to run it against
                    $this->tableGateway->getAdapter(),
                    // the result set to hydrate
                    $resultSetPrototype);
            $paginator = new Paginator($paginatorAdapter);
            return $paginator;
        }
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getAdmin($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array(
            'id' => $id
        ));
        $row = $rowset->current();
        if (!$row) {
            return false;
        }
        return $row;
    }

    public function checkuser($username) {
        $rowset = $this->tableGateway->select(array(
            'username' => $username
        ));
        $row = $rowset->current();
        if (!$row) {
            return false;
        }
        //echo $row->username . ' ';
        return true;
    }

    public function checkemail($email) {
        $rowset = $this->tableGateway->select(array(
            'email' => $email
        ));
        $row = $rowset->current();
        if (!$row) {
            return false;
        }
        return true;
    }

    public function getUserbyEmail($email) {
        $email = (string) $email;
        $rowset = $this->tableGateway->select(array(
            'email' => $email
        ));
        $row = $rowset->current();
        if (!$row) {
            return 0;
        }
        return $row;
    }

    public function getuser($username) {

        $rowset = $this->tableGateway->select(array(
            'username' => $username
        ));
        $row = $rowset->current();
        if (!$row) {
            return false;
        }
        // var_dump($row);
        return $row;

        /*
          $select=new Select('admin');
          $select->join('settings','settings.id_admin = admin.id')
          ->where(array('username' => $username ));

          $rowset = $this->tableGateway->getSql()->prepareStatementForSqlObject($select);
          //	return $rowset;die;
          $results = $rowset->execute();
          //return $results;
          if(!$results)
          {

          return $results = null;
          } //
          else{

          //$res = array();
          foreach ($results as $val=>$Vlaue)
          {
          $res = $Vlaue;
          }
          return $res;
          }
         */
    }

    public function checkpass($pass) {
        $bcrypt = new Bcrypt ();
        $secPass = $bcrypt->create('$pass');
        // $encrypt=md5(md5($pass));
        $rowset = $this->tableGateway->select(array(
            'pass' => $secPass
        ));
        $row = $rowset->current();
        if (!$row) {
            return false;
        }

        return true;
    }

    public function saveAdmin(Admin $admin) {
        $bcrypt = new Bcrypt ();
        $data = array(
            'lastname' => $admin->lastname,
            'firstname' => $admin->firstname,
            'username' => $admin->username,
            'password' => $bcrypt->create($admin->password),
            'email' => $admin->email,
            'datetime' => date('Y-m-d H:i:s'),
            'company' => $admin->company,
            'telephone' => $admin->telephone,
            'fax' => $admin->fax,
            'street_1' => $admin->street_1,
            'street_2' => $admin->street_2,
            'city' => $admin->city,
            'region' => $admin->region,
            'postcode' => $admin->postcode,
            'country' => $admin->country,
        );


        $id = (int) $admin->id;
        if ($this->checkuser($admin->username)) {
            echo 'user already exits';
            // echo
        } else {
            if ($this->checkemail($admin->email)) {
                echo 'email already exits';
            } else {
                if ($id == 0) {
                    $this->tableGateway->insert($data);
                } else {

                    /*
                     * if ($this->getAdmin($id)) { // $this->tableGateway->update($data, array('id' => $id)); return true; } else { throw new \Exception('Album id does not exist'); } }
                     */
                }
            }
        }
    }

    public function register(Admin $admin) {
        $bcrypt = new Bcrypt ();
        $data = array(
            'username' => $admin->username,
            'password' => $bcrypt->create($admin->password),
            'email' => $admin->email,
            'datetime' => date('Y-m-d H:i:s'),
        );
        $id = (int) $admin->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {

            /*
             * if ($this->getAdmin($id)) { // $this->tableGateway->update($data, array('id' => $id)); return true; } else { throw new \Exception('Album id does not exist'); } }
             */
        }
    }

    public function editAdmin(Admin $admin) {
        $data = array(
            'group' => $admin->group
                )
        ;
        $id = (int) $admin->id;
        if ($this->getAdmin($id)) {
            $this->tableGateway->update($data, array(
                'id' => $id
            ));
            return true;
        } else {
            return false;
        }
    }

    public function update_address($id, $user) {
        $id = (int) $id;
        $dataupdte = array(
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'company' => $user->company,
            'street_1' => $user->street_1,
            'street_2' => $user->street_2,
            'telephone' => $user->telephone,
            'fax' => $user->fax,
            'city' => $user->city,
            'region' => $user->region,
            'postcode' => $user->postcode,
            'country' => $user->country,
            'default_billing' => $user->default_billing,
            'default_shipping' => $user->default_shipping,
        );



        if (!$id) {
            return 0;
        } else {
            if ($this->getAdmin($id)) {

                return $this->tableGateway->update($dataupdte, array(
                            'id' => $id
                ));
            } else
                return 0;
        }
    }

    public function update_exsv($exsv) {
        $data = array(
            'externalsv_id' => $exsv ['externalsv_id'],
            'folder_key' => $exsv ['folder_key'],
            'folder_name' => $exsv ['folder_name']
        );
        $id = (int) $exsv ['id'];
        if (!$id) {
            return 0;
        } else {
            $this->tableGateway->update($data, array(
                'id' => $id
            ));
            return 1;
        }
    }

    public function loginemailpass($admin) {
        $bcrypt = new Bcrypt ();

        $rowset = $this->tableGateway->select(array(
            'email' => $admin->email
        ));
        $row = $rowset->current();
        if (!$row) {
            return 1;
            // echo 'User is not exits';
        } else {
            // echo $row->password;
            if ($bcrypt->verify($admin->password, $row->password)) {

                $session_user = new Container('user');
                $session_user->username = $row->username;
                $session_user->time = time() + 14400;
                $session_user->group = $row->group;
                $session_user->avatar = $row->avatar;
                $session_user->email = $row->email;

                return 0;
            } else {
                // echo "The password is NOT correct.\n";
                return 2;
            }
        }
    }

    public function checklogin($admin) {
        $bcrypt = new Bcrypt ();

        $rowset = $this->tableGateway->select(array(
            'username' => $admin->username
        ));
        $row = $rowset->current();
        if (!$row) {
            return 1;
            // echo 'User is not exits';
        } else {
            // echo $row->password;
            if ($bcrypt->verify($admin->password, $row->password)) {

                $session_user = new Container('user');
                $session_user->username = $admin->username;
                $session_user->time = time() + 14400;
                $session_user->group = $row->group;
                $session_user->avatar = $row->avatar;

                return 0;
            } else {
                // echo "The password is NOT correct.\n";
                return 2;
            }
        }
    }

    public function generateRandomString($length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i ++) {
            $randomString .= $characters [rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function recoverpass($email) {
        $row = $this->getbyemail($email);
        if (!$row)
            return 1;
        else {
            $bcrypt = new Bcrypt ();
            $pass = $this->generateRandomString();

            $data = array(
                'password' => $bcrypt->create($pass)
                    )
            ;
            $this->tableGateway->update($data, array(
                'id' => $row->id
            ));
            return $pass;
        }
    }

    public function forgotpass($email, $endpass) {
        $row = $this->getbyemail($email);
        if (!$row)
            return 1;
        else {

            $data = array(
                'password' => $endpass,
                    )
            ;
            $this->tableGateway->update($data, array(
                'id' => $row->id
            ));
            return 2;
        }
    }

    public function acounteditpass($user, $current_password, $news_password) {
        $bcrypt = new Bcrypt ();
        $data = array(
            'password' => $bcrypt->create($news_password)
        );

        // so sanh pass hien tai va pass curent nhap vao 
        if ($bcrypt->verify($current_password, $user->password)) {
            $this->tableGateway->update($data, array('id' => $user->id));
            return 0;
        } else
            return 1;
    }

    public function changepass($getuser, $form) {
        $bcrypt = new Bcrypt ();
        $data = array(
            'password' => $bcrypt->create($form->passwordrepeat1)
        );

        if ($form->passwordrepeat1 != $form->passwordrepeat2) {
            return 2;
        }
        if ($bcrypt->verify($form->password, $getuser->password)) {
            $this->tableGateway->update($data, array(
                'id' => $getuser->id
            ));
            return 0;
        } else
            return 1;
    }

    public function updateava($form, $getuser) {
        $allowedExts = array(
            "gif",
            "jpeg",
            "jpg",
            "png"
        );
        $temp = explode(".", $form ["imagefile"] ["name"]);
        $extension = strtolower(end($temp));
        if ((($form ["imagefile"] ["type"] == "image/gif") || ($form ["imagefile"] ["type"] == "image/jpeg") || ($form ["imagefile"] ["type"] == "image/jpg") || ($form ["imagefile"] ["type"] == "image/pjpeg") || ($form ["imagefile"] ["type"] == "image/x-png") || ($form ["imagefile"] ["type"] == "image/png")) && (($form ["imagefile"] ["size"] / 1000000) < 5) && in_array($extension, $allowedExts)) {
            if ($form ["imagefile"] ["error"] > 0) {
                return 1;
            } else {
                $filename = $form ["imagefile"] ["name"];
                $hhh = md5($getuser->id);
                if (!file_exists('public_html/data/uploads/user/' . $hhh)) {
                    mkdir('public_html/data/uploads/user/' . $hhh, 0777, true);
                }

                move_uploaded_file($form ["imagefile"] ["tmp_name"], "public_html/data/uploads/user/" . $hhh . "/avatar." . $extension);
                $data = array(
                    'avatar' => "http://eclip.tv/data/uploads/user/" . $hhh . "/avatar." . $extension
                        )
                ;
                if (!file_exists("eclip.tv/data/uploads/user/" . $hhh . "/avatar." . $extension)) {
                    return 2;
                } else {
                    $this->tableGateway->update($data, array(
                        'id' => $getuser->id
                    ));
                    return 3;
                }
            }
        } else
            return 4;
    }

    public function deleteAdmin($id) {
        $this->tableGateway->delete(array('id' => (int) $id));
        // return 1
    }

    public function cookieAdmin() {
        
    }

    public function getbyemail($email) {
        $rowset = $this->tableGateway->select(array('email' => $email));
        $row = $rowset->current();
        if (!$row) {
            return false;
        }
        return $row;
    }

    public function recoverpassmaster($email) {
        $row = $this->getbyemail($email);
        if (!$row)
            return 0;
        else {
            $bcrypt = new Bcrypt();
            $pass = $this->generateRandomString();
            $data = array(
                'password' => $bcrypt->create($pass),
            );
            if ($this->tableGateway->update($data, array('id' => $row->id))) {
                return $pass;
            } else
                return 0;
        }
    }

}

?>