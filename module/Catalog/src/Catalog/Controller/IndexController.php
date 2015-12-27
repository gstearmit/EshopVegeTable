<?php

namespace Catalog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Catalog\Model\Catalog;
use Catalog\Model\CatalogTable;
use Catalog\Form\CatalogForm;
use Catalog\Form\CatalogFormFilter;
use Catalog\Form\CatalogueSearchForm as SearchFromCatalogue;
use Zend\Session\Container;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
// form upload
use Zend\Http\PhpEnvironment\Request;
use Main\Model\Utility;
// File Size
use Zend\Validator\File\Size;
use Zend\Validator\File\Extension;
// Paginator
use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\Null as PageNull;
use Zend\Db\Sql\Select;
use Crowler\Model\Getcrowler;

class IndexController extends AbstractActionController {

    public function searchAction() {
        $url = 'index';
        $request = $this->getRequest();
        if ($request->isPost()) {
            $formdata = (array) $request->getPost();
            $search_data = array();
            foreach ($formdata as $key => $value) {
                if ($key != 'submit') {
                    if (!empty($value)) {
                        $search_data [$key] = $value;
                    }
                }
            }
            if (!empty($search_data)) {
                $search_by = json_encode($search_data);
                $url .= '/search_by/' . $search_by;
            }
        }
        $this->redirect()->toRoute('Catalog', array(
            'action' => 'manacatalogue',
            'id' => null,
            'uenc' => null,
            'page' => null,
            'order_by' => null,
            'search_by' => $search_by
        ));
    }

    public function manacatalogueAction() {
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));

        $this->layout()->getuser = $getuser;
        // notlogin
        if (!$getuser) {
            $this->redirect()->toUrl(WEBPATH);
        }

        // search
        $searchform = new SearchFromCatalogue ();
        $searchform->get('submit')->setValue('Search');
        $this->layout()->formSearch = $searchform;

        $select = new Select ();
        $order_by = $this->params()->fromRoute('order_by') ? $this->params()->fromRoute('order_by') : 'id';
        $order = $this->params()->fromRoute('order') ? $this->params()->fromRoute('order') : Select::ORDER_DESCENDING;
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
        $search_by = $this->params()->fromRoute('search_by') ? $this->params()->fromRoute('search_by') : '';
        $select->order($order_by . ' ' . $order);
        $where = new \Zend\Db\Sql\Where ();
        $formdata = array();
        if (!empty($search_by)) {
            $formdata = (array) json_decode($search_by);
            if (!empty($formdata ['descriptionkey'])) {
                $where->addPredicate(new \Zend\Db\Sql\Predicate\Like('descriptionkey', '%' . $formdata ['descriptionkey'] . '%'));
            }
            if (!empty($formdata ['title'])) {
                $where->addPredicate(new \Zend\Db\Sql\Predicate\Like('title', '%' . $formdata ['title'] . '%'));
            }
        }
        if (!empty($where)) {
            $select->where($where);
        }

        $ContactpTable = $this->getCatalogTable();
        $allRecord = $ContactpTable->countAll();
        $pageNull = new PageNull($allRecord);
        $itemsPerPage = 20;
        $pageRange = 5;
        $page = $this->params()->fromRoute('page', 1);
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator($pageNull);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemsPerPage);
        $paginator->setPageRange($pageRange);

        // $listpr = $ContactpTable->getList($offset, $itemsPerPage);

        $listpr_tmp = $ContactpTable->getList($offset, $itemsPerPage);
        $i = 0;
        $listpr = array();
        foreach ($listpr_tmp as $key => $Object) {
            if ($Object->parent != null) {
                $name_parent = $ContactpTable->parent_find($Object->parent);
                if ($name_parent != 0) {
                    $naem_pare = $name_parent;
                } else
                    $naem_pare = 'Null';
            }
            $listpr[$i]->id = $Object->id;
            $listpr[$i]->name = $Object->name;
            $listpr[$i]->parent = $name_parent;
            $listpr[$i]->child = $Object->child;
            $listpr[$i]->date_creat = $Object->date_creat;
            $listpr[$i]->date_modified = $Object->date_modified;
            $listpr[$i]->hot = $Object->hot;
            $listpr[$i]->status = $Object->status;
            $listpr[$i]->new = $Object->new;
            $listpr[$i]->alias = $Object->alias;
            $listpr[$i]->img = $Object->img;
            $listpr[$i]->description = $Object->description;
            $i++;
        }

        $this->layout()->listNews = $listpr;
        $this->layout()->paginator = $paginator;
        $this->layout()->allRecord = $allRecord;
        $this->layout()->offset = $offset;
        $this->layout()->itemsPerPage = $itemsPerPage;

        $all_catalogue_tmp = $this->getCatalogTable()->fetchAll();


        $i = 0;
        $all_catalogue = array();
        foreach ($all_catalogue_tmp as $key => $Object) {
            if ($Object->parent != null) {
                $name_parent = $this->getCatalogTable()->parent_find($Object->parent);
                if ($name_parent != 0) {
                    $naem_pare = $name_parent;
                } else
                    $naem_pare = 'null';
            }
            $all_catalogue[$i]->id = $Object->id;
            $all_catalogue[$i]->name = $Object->name;
            $all_catalogue[$i]->parent = $name_parent;
            $all_catalogue[$i]->child = $Object->child;
            $all_catalogue[$i]->date_creat = $Object->date_creat;
            $all_catalogue[$i]->date_modified = $Object->date_modified;
            $all_catalogue[$i]->hot = $Object->hot;
            $all_catalogue[$i]->status = $Object->status;
            $all_catalogue[$i]->new = $Object->new;
            $all_catalogue[$i]->alias = $Object->alias;
            $all_catalogue[$i]->img = $Object->img;
            $all_catalogue[$i]->description = $Object->description;
            $i++;
        }

        $this->layout()->catalogue = $all_catalogue;
    }

    public function manacataloAction() {

        $this->layout('layout/apotravinyadmin');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));

        $this->layout()->getuser = $getuser;
        // notlogin
        if (!$getuser) {
            $this->redirect()->toUrl(WEBPATH);
        }

        // search
        $searchform = new SearchFromCatalogue ();
        $searchform->get('submit')->setValue('Search');
        $this->layout()->formSearch = $searchform;

        $select = new Select ();
        $order_by = $this->params()->fromRoute('order_by') ? $this->params()->fromRoute('order_by') : 'id';
        $order = $this->params()->fromRoute('order') ? $this->params()->fromRoute('order') : Select::ORDER_DESCENDING;
        $page = $this->params()->fromRoute('page') ? (int) $this->params()->fromRoute('page') : 1;
        $search_by = $this->params()->fromRoute('search_by') ? $this->params()->fromRoute('search_by') : '';
        $select->order($order_by . ' ' . $order);
        $where = new \Zend\Db\Sql\Where ();
        $formdata = array();
        if (!empty($search_by)) {
            $formdata = (array) json_decode($search_by);
            if (!empty($formdata ['descriptionkey'])) {
                $where->addPredicate(new \Zend\Db\Sql\Predicate\Like('descriptionkey', '%' . $formdata ['descriptionkey'] . '%'));
            }
            if (!empty($formdata ['title'])) {
                $where->addPredicate(new \Zend\Db\Sql\Predicate\Like('title', '%' . $formdata ['title'] . '%'));
            }
        }
        if (!empty($where)) {
            $select->where($where);
        }

        $ContactpTable = $this->getCatalogTable();
        $allRecord = $ContactpTable->countAll();
        $pageNull = new PageNull($allRecord);
        $itemsPerPage = 200;
        $pageRange = 5;
        $page = $this->params()->fromRoute('page', 1);
        $offset = ($page - 1) * $itemsPerPage;
        $paginator = new Paginator($pageNull);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($itemsPerPage);
        $paginator->setPageRange($pageRange);

        $listpr = $ContactpTable->getList($offset, $itemsPerPage);
        $this->layout()->listNews = $listpr;
//        $this->layout()->paginator = $paginator;
//        $this->layout()->allRecord = $allRecord;
//        $this->layout()->offset = $offset;
//        $this->layout()->itemsPerPage = $itemsPerPage;

        // echo "<pre>";
        // print_r($itemsPerPage);
        // echo "</pre>";
        // die;

        $all_catalogue = $this->getCatalogTable()->fetchAll();
        foreach ($all_catalogue as $key=>$value){
            $parent=$value->parent;
            $data_parent[$parent]=  $this->getCatalogTable()->parent_find($parent);
        }
        $this->layout()->catalogue = $all_catalogue;
        return new ViewModel(array(
            'listNews' => $listpr,
            'paginator' => $paginator,
            'allRecord' => $allRecord,
            'offset' => $offset,
            'itemsPerPage' => $itemsPerPage,
            'data_parent'=>$data_parent,
        ));
    }

    public function catalogitemscompareAction() {
        // so sang 2 san pham luon
        $this->layout('layout/ctalogprinter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $items = $this->params()->fromRoute('items');
        $uenc = $this->params()->fromRoute('uenc');

        echo "items :";
        var_dump($items);
        echo "</br>";
        echo "uenc :";
        var_dump($uenc);
    }

    public function productcompareclearallAction() {
        // xoa het session "product_compare" voi uenc duoc truyen vao
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $id = $this->params()->fromRoute('id');
        $uenc = $this->params()->fromRoute('uenc');

        echo "id :";
        var_dump($id);
        echo "</br>";
        echo "uenc :";
        var_dump($uenc);
    }

    public function productcompareremoveAction() {
        // xoa mot phan tu session "product_compare" voi id va uenc duoc truyen vao
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $id = $this->params()->fromRoute('id');
        $uenc = $this->params()->fromRoute('uenc');

        echo "id :";
        var_dump($id);
        echo "</br>";
        echo "uenc :";
        var_dump($uenc);
    }

    public function productcompareaddAction() {
        // check xem sessoin uenc khoa do da duoc tao chua
        // neu chua khoi tao
        // neu roi add them 1 phan tu vao sesion voi id va uenc da duoc tao
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $id = $this->params()->fromRoute('id');
        $uenc = $this->params()->fromRoute('uenc');

        echo "id :";
        var_dump($id);
        echo "</br>";
        echo "uenc :";
        var_dump($uenc);
    }

    public function statusAction() {
        $view = new ViewModel ();
        $this->layout('layout/bags');

        $id = $this->params()->fromRoute('id', 0);
        $status = $this->params()->fromRoute('status', 0);

        $CatogueTable = $this->getCatalogTable();

        if ($id == 0) {
            return $this->redirect()->toRoute('Catalog', array(
                        'controller' => 'catlogue',
                        'action' => 'manacatalogue'
            ));
        } else {

            $exchange_data = array();

            $exchange_data ['id'] = $id;
            $exchange_data ['status'] = $status;

            $Catalogue = new Catalog ();
            $Catalogue->exchangeArray($exchange_data);

            $checkupdate = $CatogueTable->savestatus($Catalogue);

            $view->id = $id;
            $view->check = $checkupdate;
            return $view;
        }
    }

    public function viewAction() {
        // check xem sessoin uenc khoa do da duoc tao chua
        // neu chua khoi tao
        // neu roi add them 1 phan tu vao sesion voi id va uenc da duoc tao
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;

        $id = $this->params()->fromRoute('id');
        $uenc = $this->params()->fromRoute('uenc');

        echo "id :";
        var_dump($id);
        echo "</br>";
        echo "uenc :";
        var_dump($uenc);
        die("view is update");
    }

    public function addAction() {
        $utility = new Utility ();
        $catalog = new Catalog ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
            $this->layout('layout/bags');
            $form = new catalogForm($dbAdapter);
            $form->setInputFilter(new CatalogFormFilter());
            $catalogarr = $this->getdataAction();

            $form->setId($catalogarr);

            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter($catalog->getInputFilter()); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());

                $form->setData($data);
                if ($form->isValid()) {
                    if ($data ['img'] ['name'] != '') {
                        // edit anh
                        $_array_img = $data ['img'];
                        // Recyle Bin img older
                        $id = $data ['id'];
                        $getcata = $this->getCatalogTable()->getCatalog($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                            $_dir = UPLOAD_PATH_IMG;
                            if ($get_img_older) {
                                $utility->deleteImage($get_img_older, $_dir);
                            }
                        }

                        // upload and rename
                        $renname_file_img = $utility->uploadImageCatalog($_array_img);
                        if (!$renname_file_img) {
                            $view->check = 0;
                            return $view;
                        }
                        $catalog = new Catalog ();
                        $catalog->dataArraySwap($data, $renname_file_img);
                        $check = $this->getCatalogTable()->saveCatalog($catalog);
                        if ($check != 0) {

                            $_url = WEBPATH . '/catalog/manacatalogue';
                            $this->redirect()->toUrl($_url);
                        } else {
                            $view->check = 0;
                            ;
                            return $view;
                        }
                    } else {
                        // echo "add duoc roi ";die;
                        $id = $data ['id'];
                        $getcata = $this->getCatalogTable()->getCatalog($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $catalog = new Catalog ();
                        $catalog->dataArraySwap($form->getData(), $get_img_older);
                        $check = $this->getCatalogTable()->saveCatalog($catalog);
                        $_url = WEBPATH . '/catalog/add/' . $id;
                        if ($check == 0) {
                            // notupdate
                            $_url = WEBPATH . '/catalog/manacatalogue';
                            $this->redirect()->toUrl($_url);
                        }
                        if ($check != 0) {
                            $_url = WEBPATH . '/catalog/manacatalogue';
                            $this->redirect()->toRoute('Catalog', array(
                                'action' => 'add',
                                'id' => $check
                            ));
                        }
                    }
                }
            }
            $form->setId($catalogarr);
            $catalog_id = (int) $this->params()->fromRoute('id', 0);
            $catalog_cr = $this->getCatalogTable()->getCatalog($catalog_id);

            if ($catalog_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Catalogue');
            } else
                $form->get('submit')->setAttribute('value', 'Edit Catalogue');

            if ($catalog_cr and $catalog_id != 0) {
                $form->bind($catalog_cr);
                $_img_thumb = $catalog_cr->img;
            }

            $view->setVariable('img_thumb', $_img_thumb);

            $view->setVariable('catalogform', $form);
            $view->setVariable('id_cata', $catalog_id);

            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }

    public function editAction() {
        $utility = new Utility ();
        $catalog = new Catalog ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
            $this->layout('layout/bags');
            $form = new catalogForm($dbAdapter);
            $form->setInputFilter(new CatalogFormFilter());
            $catalogarr = $this->getdataAction();
            $form->setId($catalogarr);

            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter($catalog->getInputFilter()); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());

                $form->setData($data);
                if ($form->isValid()) {
                    if ($data ['img'] ['name'] != '') {
                        // edit anh
                        $_array_img = $data ['img'];
                        // Recyle Bin img older
                        $id = $data ['id'];
                        $getcata = $this->getCatalogTable()->getCatalog($id);
                        $get_img_older = $getcata->img;
                        $_dir = UPLOAD_PATH_IMG;
                        if ($get_img_older) {
                            $utility->deleteImage($get_img_older, $_dir);
                        }

                        // upload and rename
                        $renname_file_img = $utility->uploadImageCatalog($_array_img);
                        if (!$renname_file_img) {
                            $view->check = 0;
                            return $view;
                        }
                        $catalog = new Catalog ();
                        $catalog->dataArraySwap($data, $renname_file_img);
                        $check = $this->getCatalogTable()->saveCatalog($catalog);

                        $view->check = $check;
                        return $view;
                    } else {
                        $id = $data ['id'];
                        $getcata = $this->getCatalogTable()->getCatalog($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $catalog = new Catalog ();
                        $catalog->dataArraySwap($form->getData(), $get_img_older);

                        $check = $this->getCatalogTable()->saveCatalog($catalog);
                        $_url = WEBPATH . '/catalog/edit/' . $id;
                        if ($check == 0) {
                            $this->redirect()->toUrl($_url);
                        }
                        // $view->check = $check;
                        // return $view;
                    }
                }
            }
            $form->setId($catalogarr);
            $catalog_id = (int) $this->params()->fromRoute('id', 0);
            $catalog_cr = $this->getCatalogTable()->getCatalog($catalog_id);
            if ($catalog_cr) {
                $form->bind($catalog_cr);
                $_img_thumb = $catalog_cr->img;
            }

            $view->setVariable('img_thumb', $_img_thumb);
            // $form->get ( 'submit' )->setAttribute ( 'value', 'Edit Catalogue' );

            if ($catalog_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Catalogue');
            } else {
                $form->get('submit')->setAttribute('value', 'Edit Catalogue');
                $view->setVariable('error', 1);
            }

            $view->setVariable('catalogform', $form);
            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }

   

    public function index_bkAction() {
        $this->layout('layout/bags');
        $checklogin = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'session'
        ));
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($checklogin) {
            if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
                $view = new ViewModel ();
                $this->layout('layout/layoutadmin');
                $arr = $this->getdataAction();
                $view->paginator = $arr;
                // var_dump($arr);
                return $view;
            } else {
                $this->layout()->check = 1;
                $this->layout('error/admin');
            }
        } else {
            $this->layout()->check = 2;
            $this->layout('error/admin');
        }
    }

    public function indexAction() {
        $this->layout('layout/ctalogprinter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        // var_dump($getuser);
        $this->layout()->getuser = $getuser;
    }

    public function getdataAction() {
        $Catalogs = $this->getCatalogTable()->fetchAll();
       
        $data = array();
        $idtmp = array();
        foreach ($Catalogs as $upload) :
           
            if ($upload->parent == 0 || $upload->parent == NULL) {
                $id = $upload->id;
                $cat = $upload->name;
                $data [$id] = $cat;
                array_push($idtmp, $id);
            } else {
                $parent = $upload->parent;
                $key = array_search($parent, $idtmp);
                $tmp = array();
                $id = $upload->id;
                $cat = $upload->name;
                array_splice($idtmp, $key + 1, 0, $id);
                if (isset($data [$key])) {
                    $str = $data [$key];
                    $begi = '';
                    $beg = substr_count($str, ' - ');
                    $tt = ' - ';
                    while ($beg != - 1) {
                        $tt = ' - ' . $tt;
                        $beg --;
                    }
                    $tmp [$id] = $tt . $cat;
                } else
                    $tmp [$id] = ' -  - ' . $cat;
                array_splice($data, $key + 1, 0, $tmp);
            }
        endforeach
        ;
        $result = array();
        $k = 0;
        $v = '';
        for ($i = 0; $i <= sizeof($data); $i ++) {
            $result [$k] = $v;
            $k = $idtmp [$i];
            $v = $data [$i];
        }
        return $result;
    }

    public function getbygroupAction() {
        $Catalogs = $this->getCatalogTable()->fetchAll();
        $data = array();
        $idtmp = array();
        foreach ($Catalogs as $upload) :
            if ($upload->parent == 0) {
                $id = $upload->id;
                $cat = $upload->name;
                $data [$id] = $cat;
                array_push($idtmp, $id);
            } else {
                $parent = $upload->parent;
                $key = array_search($parent, $idtmp);
                $tmp = array();
                $id = $upload->id;
                $cat = $upload->name;
                array_splice($idtmp, $key + 1, 0, $id);
                if (isset($data [$key])) {
                    $str = $data [$key];
                    $begi = '';
                    $beg = substr_count($str, ' - ');
                    $tt = ' - ';
                    while ($beg != - 1) {
                        $tt = ' - ' . $tt;
                        $beg --;
                    }
                    $tmp [$id] = $tt . $cat;
                } else
                    $tmp [$id] = ' -  - ' . $cat;
                array_splice($data, $key + 1, 0, $tmp);
            }
        endforeach
        ;
        $result = array();
        for ($i = 0; $i < sizeof($data); $i ++) {
            $k = $idtmp [$i];
            $v = $data [$i];
            $result [$i] = array(
                'id' => $k,
                'catalog' => $v
            );
        }
        return $result;
    }

    public function getallAction() {
        $res = $this->getCatalogTable()->fetchAll();
        $result = array();
        foreach ($res as $re) :
            $i = $re->id;
            $result [$i] = $re;
        endforeach
        ;
        return $result;
    }

    public function deleteAction() {
        $catalog_id = (int) $this->params()->fromRoute('id', 0);
        if ($catalog_id == 0) {
            return $this->redirect()->toRoute('Catalog');
        }

        $view = new ViewModel ();
        $utility = new Utility ();
        $this->layout('layout/bags');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost()->get('id');

                if ($id != 0) {
                    $getcata = $this->getCatalogTable()->getCatalog($id);
                    if ($getcata) {
                        $get_img_older = $getcata->img;
                        $_dir = UPLOAD_PATH_IMG;
                        if ($get_img_older) {
                            $utility->deleteImage($get_img_older, $_dir);
                        }
                    }

                    $view->check = $this->getCatalogTable()->delete($catalog_id);
                    return $view;
                } else {
                    $view->check = 0;
                    return $view;
                }
            }
        }

        $view->setVariable('id', $catalog_id);
        $view->setVariable('catalogue', $this->getCatalogTable()->getCatalog($catalog_id));

        return $view;
    }

// ------------------------------------------------------ ADMIN MASTER CATALOG ------------------------------------------------------------------

    public function addmasterAction() {
        $utility = new Utility ();
        $catalog = new Catalog ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
            $this->layout('layout/apotravinyadmin');
            $form = new catalogForm($dbAdapter);
            $form->setInputFilter(new CatalogFormFilter());
            $catalogarr = $this->getdataAction();
           // print_r($catalogarr);die;
            $form->setId($catalogarr);

            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter($catalog->getInputFilter()); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());
                //print_r($data);die;
                $form->setData($data);
                if ($form->isValid()) {
                    if ($data ['img'] ['name'] != '') {
                        // edit anh
                        $_array_img = $data ['img'];
                        // Recyle Bin img older
                        $id = $data ['id'];
                        $getcata = $this->getCatalogTable()->getCatalog($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                            $_dir = UPLOAD_PATH_IMG;
                            if ($get_img_older) {
                                $utility->deleteImage($get_img_older, $_dir);
                            }
                        }

                        // upload and rename
                        $renname_file_img = $utility->uploadImageCatalog($_array_img);
                        if (!$renname_file_img) {
                            $view->check = 0;
                            return $view;
                        }
                        $catalog = new Catalog ();
                        $catalog->dataArraySwap($data, $renname_file_img);
                        $check = $this->getCatalogTable()->saveCatalog($catalog);
                        if ($check == 1) {
                        	$view->check = 1;
                        	echo "<script>alert('Add Catalogue success.!!!!');</script>";
                            $this->redirect()->toRoute('Catalog', array(
							                            'action' => 'manacatalo'
							                     ));
                           
                        } else if($check == 0){
                            $view->check = 0;
                            return $view;
                        }
                    } else {
                        
                        $id = $data ['id'];
                        $getcata = $this->getCatalogTable()->getCatalog($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $catalog = new Catalog ();
                        $catalog->dataArraySwap($form->getData(), $get_img_older);
                        $check = $this->getCatalogTable()->saveCatalog($catalog);
                        $_url = WEBPATH . '/catalog/addmaster/' . $id;
                        if ($check == 0) {
                        	$this->redirect()->toRoute('Catalog', array(
                        			'action' => 'manacatalo'
                        	));
                        }
                        if ($check != 0) {
                        	
                        	$this->redirect()->toRoute('Catalog', array(
                        			'action' => 'manacatalo'
                        	));
                        	
//                             $_url = WEBPATH . '/catalog/manacatalo';
//                             $this->redirect()->toRoute('Catalog', array(
//                                 'action' => 'addmaster',
//                                 'id' => $check
//                             ));
                        }
                    }
                }
            }
            $form->setId($catalogarr);
            $catalog_id = (int) $this->params()->fromRoute('id', 0);
            $catalog_cr = $this->getCatalogTable()->getCatalog($catalog_id);

            if ($catalog_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Catalogue');
            } else
                $form->get('submit')->setAttribute('value', 'Edit Catalogue');

            if ($catalog_cr and $catalog_id != 0) {
                $form->bind($catalog_cr);
                $_img_thumb = $catalog_cr->img;
            }

            $view->setVariable('img_thumb', $_img_thumb);

            $view->setVariable('catalogform', $form);
            $view->setVariable('id_cata', $catalog_id);
            
            //-------------
            $data_catalog=$this->getCatalogTable()->fetchAll_SELECT();
            foreach ($data_catalog as $key=>$value){         
             $id= $value->id;             
            $sub_cat[$id]=  $this->getCatalogTable()->getCatalog_arr($id);    
              
            }
            $view->setVariable('data_catalog', $data_catalog);
            $view->setVariable('sub_cat', $sub_cat);
            //-----------
            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }
     public function editmasterAction() {
        $utility = new Utility ();
        $catalog = new Catalog ();
        $view = new ViewModel ();

        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;
        if ($getuser && ($getuser->group == 'admin' || $getuser->group == 'supperadmin')) {
            $this->layout('layout/apotravinyadmin');
            $form = new catalogForm($dbAdapter);
            $form->setInputFilter(new CatalogFormFilter());
            $catalogarr = $this->getdataAction();
            $form->setId($catalogarr);

            $request = $this->getRequest();
            if ($request->isPost()) {
                $form->setInputFilter($catalog->getInputFilter()); // check validate
                $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());
                //print_r($data);die;
                $form->setData($data);
                if ($form->isValid()) {
                    if ($data ['img'] ['name'] != '') {
                        // edit anh
                        $_array_img = $data ['img'];
                        // Recyle Bin img older
                        $id = $data ['id'];
                        $getcata = $this->getCatalogTable()->getCatalog($id);
                        $get_img_older = $getcata->img;
                        $_dir = UPLOAD_PATH_IMG;
                        if ($get_img_older) {
                            $utility->deleteImage($get_img_older, $_dir);
                        }
                        // upload and rename
                        $renname_file_img = $utility->uploadImageCatalog($_array_img);
                        if (!$renname_file_img) {
                            $view->check = 0;
                            return $view;
                        }
                        $catalog = new Catalog ();
                        $catalog->dataArraySwap($data, $renname_file_img);
                        $check = $this->getCatalogTable()->saveCatalog($catalog);

                        $view->check = $check;
                        return $view;
                    } else {
                        $id = $data ['id'];
                        $getcata = $this->getCatalogTable()->getCatalog($id);
                        if ($getcata) {
                            $get_img_older = $getcata->img;
                        }
                        $catalog = new Catalog ();
                        $catalog->dataArraySwap($form->getData(), $get_img_older);

                        $check = $this->getCatalogTable()->saveCatalog($catalog);
                        $_url = WEBPATH . '/catalog/editmaster/' . $id;
                        $sucess='Edit Catalog Sucess';
                        $view->setVariable('sucess', $sucess);
                        if ($check == 0) {
                            $this->redirect()->toUrl($_url);
                        }
                        // $view->check = $check;
                        // return $view;
                    }
                }
            }
            $form->setId($catalogarr);
            $catalog_id = (int) $this->params()->fromRoute('id', 0);
            $catalog_cr = $this->getCatalogTable()->getCatalog($catalog_id);
            if ($catalog_cr) {
                $form->bind($catalog_cr);
                $_img_thumb = $catalog_cr->img;
            }

            $view->setVariable('img_thumb', $_img_thumb);
            // $form->get ( 'submit' )->setAttribute ( 'value', 'Edit Catalogue' );

            if ($catalog_id == 0) {
                $form->get('submit')->setAttribute('value', 'Add Catalogue');
            } else {
                $form->get('submit')->setAttribute('value', 'Edit Catalogue');
                $view->setVariable('error', 1);
            }
             $view->setVariable('data_cat', $catalog_cr);
            $view->setVariable('catalogform', $form);
            //-------------
            $data_catalog=$this->getCatalogTable()->fetchAll_SELECT();
            foreach ($data_catalog as $key=>$value){         
             $id= $value->id;             
            $sub_cat[$id]=  $this->getCatalogTable()->getCatalog_arr($id);    
              
            }
            $view->setVariable('data_catalog', $data_catalog);
            $view->setVariable('sub_cat', $sub_cat);
            //-----------
            return $view;
        } else {
            $view->check = 2;
            $this->layout('error/admin');
        }
    }
    public function deletemasterAction() {
        $catalog_id = (int) $this->params()->fromRoute('id', 0);
        if ($catalog_id == 0) {
            return $this->redirect()->toRoute('Catalog');
        }

        $view = new ViewModel ();
        $utility = new Utility ();
        $this->layout('layout/apotravinyadmin');
        $getuser = $this->forward()->dispatch('Admin\Controller\Index', array(
            'action' => 'getuser'
        ));
        $this->layout()->getuser = $getuser;

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');
            
            if ($del == 'Yes') {
                $id = (int) $request->getPost()->get('id');

                if ($id != 0) {
                    $getcata = $this->getCatalogTable()->getCatalog($id);
                    if ($getcata) {
                        $get_img_older = $getcata->img;
                        $_dir = UPLOAD_PATH_IMG;
                        if ($get_img_older) {
                            $utility->deleteImage($get_img_older, $_dir);
                        }
                    }

                    $view->check = $this->getCatalogTable()->delete($catalog_id);
                    return $view;
                } else {
                    $view->check = 0;
                    return $view;
                }
            }
        }

        $view->setVariable('id', $catalog_id);
        $view->setVariable('catalogue', $this->getCatalogTable()->getCatalog($catalog_id));

        return $view;
    }
    
    public function statusmasterAction() {
       
        $view = new ViewModel ();
        $this->layout('layout/apotravinyadmin');

        $id = $this->params()->fromRoute('id', 0);
        $status = $this->params()->fromRoute('status', 0);
        $CatogueTable = $this->getCatalogTable();
         if($status =='1'){
           $status_update = '0';
       }  else if($status =='0') {
           $status_update ='1' ;
       }
        if ($id == 0) {
            return $this->redirect()->toRoute('Catalog', array(
                        'controller' => 'catlogue',
                        'action' => 'manacatalogue'
            ));
        } else {

            $exchange_data = array(
                'id' => $id,
                'status' => $status_update
            );

            $Catalogue = new Catalog ();
            $Catalogue->exchangeArray($exchange_data);

            $checkupdate = $CatogueTable->savestatus($Catalogue);

            $view->id = $id;
            $view->check = $checkupdate;
            return $view;
        }
    }

    public function getCatalogTable() {
        if (!$this->CatalogTable) {
            $sm = $this->getServiceLocator();
            $this->CatalogTable = $sm->get('Catalog\Model\CatalogTable');
        }
        return $this->CatalogTable;
    }

    protected $CatalogTable;

}

?>