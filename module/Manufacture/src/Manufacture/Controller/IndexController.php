<?php

namespace Manufacture\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Manufacture\Model\Manufacture;
use Manufacture\Model\Utility;
use Zend\Db\Sql\Select;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\Iterator as paginatorIterator;
use Zend\Session\Container;

class IndexController extends AbstractActionController {

    protected $Manufacture;

    public function getManufactureTable() {
        if (!$this->Manufacture) {
            $pst = $this->getServiceLocator();
            $this->Manufacture = $pst->get('Manufacture\Model\ManufactureTable');
        }
        return $this->Manufacture;
    }

    public function indexAction() {
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');

        $select = new Select();
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
        $data_manu = $this->getManufactureTable()->listmanu();
        $itemsPerPage = 10;
        $data_manu->current();
        $paginator = new Paginator(new paginatorIterator($data_manu));
        $paginator->setCurrentPageNumber($page)
                ->setItemCountPerPage($itemsPerPage)
                ->setPageRange(5);

        return new ViewModel(array(
            'page' => $page,
            'paginator' => $paginator,
        ));
    }

    public function addAction() {
        $Uty = new Utility;
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');



        if ($this->request->isPost()) {
            $name = addslashes(trim($this->params()->fromPost('name')));
            $status = addslashes(trim($this->params()->fromPost('status')));
            $description = addslashes(trim($this->params()->fromPost('description')));
            $alias = strtolower($Uty->chuyenDoi($name));
            $filename = $_FILES["img"]["name"];
            if ($name == null) {
                $alert = '<div class="alert alert-danger" role="alert">Manufacture name not empty.</div>';
                return array('alert' => $alert);
            }
            if ($filename == null) {
                $alert = '<div class="alert alert-danger" role="alert">Image manufactured not empty.</div>';
                return array('alert' => $alert);
            }


            $checkname = $this->getManufactureTable()->checkname($name);
            if ($checkname) {

                $dirpath = str_replace("\\", "/", UPLOAD_PATH_IMG . "/imgManufa");

                $tmpimg = $_FILES["img"]["tmp_name"];
                $filename = $_FILES["img"]["name"];
                $ext = substr(strrchr($filename, '.'), 1);
                $fileupload = substr(base64_encode($filename), 0, -1) . time() . '.' . $ext;
                copy($tmpimg, $dirpath . '/' . $fileupload);
                $Uty->load($tmpimg);
                $Uty->resizeToWidth(300);
                $Uty->save($dirpath . '/' . $fileupload); // ảnh thumb

                $data_mn = array(
                    'manu_name' => $name,
                    'alias' => $alias,
                    'description' => $description,
                    'status' => $status,
                    'img' => 'imgManufa/' . $fileupload,
                );
                $obj_mn = new Manufacture();
                $obj_mn->exchangeArray($data_mn);
                $this->getManufactureTable()->addmanu($obj_mn);
                $alert = '<div class="alert alert-success" role="alert">Add Manufactured Successful.</div>';
                return array('alert' => $alert);
            } else {
                $alert = '<div class="alert alert-danger" role="alert">The automaker already exists</div>';
                return array('alert' => $alert);
            }
        }
    }

    public function editAction() {
        $Uty = new Utility;
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array('action' => 'getuser'));
        if (!$getuser) {
            // not yet login
            $this->redirect()->toRoute('home');
        }
        $this->layout()->getuser = $getuser;
        $this->layout('layout/apotravinyadmin');
        $id = addslashes(trim($this->params()->fromRoute('id', 0)));
        $data_detail = $this->getManufactureTable()->mannu_detail($id);

        if ($this->request->isPost()) {
            $name = addslashes(trim($this->params()->fromPost('name')));
            $status = addslashes(trim($this->params()->fromPost('status')));
            $description = addslashes(trim($this->params()->fromPost('description')));
            $alias = strtolower($Uty->chuyenDoi($name));

            if ($name == null) {
                $alert = '<div class="alert alert-danger" role="alert">Manufacture name not empty.</div>';
                return array('alert' => $alert);
            }


            $dirpath = str_replace("\\", "/", UPLOAD_PATH_IMG . "/imgManufa");
            $tmpimg = $_FILES["img"]["tmp_name"];
            $filename = $_FILES["img"]["name"];

            if ($filename == null) {
                $dataimg = $data_detail['img'];
            } else {
                $url_img_old = str_replace("\\", "/", UPLOAD_PATH_IMG . '/' . $data_detail['img']);
                unlink($url_img_old);
                $ext = substr(strrchr($filename, '.'), 1);
                $fileupload = substr(base64_encode($filename), 0, -1) . time() . '.' . $ext;
                $dataimg = 'imgManufa/' . $fileupload;
                copy($tmpimg, $dirpath . '/' . $fileupload);
                $Uty->load($tmpimg);
                $Uty->resizeToWidth(300);
                $Uty->save($dirpath . '/' . $fileupload); // ảnh thumb
            }
            $data_mn = array(
                'manu_name' => $name,
                'alias' => $alias,
                'description' => $description,
                'status' => $status,
                'img' => $dataimg,
            );
            $checkname = $this->getManufactureTable()->checkname($name);
            if ($name == $data_detail['manu_name']) {

                $obj_mn = new Manufacture();
                $obj_mn->exchangeArray($data_mn);
                $this->getManufactureTable()->update_manu($id, $obj_mn);
                $alert = '<div class="alert alert-success" role="alert">Edit Manufactured Successful.</div>';
                return array('data_detail' => $data_detail, 'alert' => $alert);
            } else {
                if ($checkname) {

                    $obj_mn = new Manufacture();
                    $obj_mn->exchangeArray($data_mn);
                    $this->getManufactureTable()->update_manu($id, $obj_mn);
                    $alert = '<div class="alert alert-success" role="alert">Edit Manufactured Successful.</div>';
                    return array('data_detail' => $data_detail, 'alert' => $alert);
                } else {
                    $data_detail = $this->getManufactureTable()->mannu_detail($id);
                    $alert = '<div class="alert alert-danger" role="alert">The automaker already exists</div>';
                    return array('data_detail' => $data_detail, 'alert' => $alert);
                }
            }
        }
        return array('data_detail' => $data_detail);
    }

    public function statusAction() {
        $id = addslashes(trim($this->params()->fromRoute('id', 0)));
        $status = addslashes(trim($this->params()->fromRoute('status', 0)));
        if ($status == 0) {
            $data = array('status' => 1);
        } else {
            $data = array('status' => 0);
        }
        $obj = new Manufacture();
        $obj->exchangeArray($data);
        $this->getManufactureTable()->changestatus($id, $obj);
        $this->redirect()->toRoute('Manufacture');
    }

    public function deleteAction() {
        
        $id = addslashes(trim($this->params()->fromRoute('id', 0)));
        $data_detail = $this->getManufactureTable()->mannu_detail($id);        
         $url_img_old = str_replace("\\", "/", UPLOAD_PATH_IMG . '/' . $data_detail['img']);
        unlink($url_img_old);
        $this->getManufactureTable()->delete_manu($id);
        $this->redirect()->toRoute('Manufacture');
    }

}

?>