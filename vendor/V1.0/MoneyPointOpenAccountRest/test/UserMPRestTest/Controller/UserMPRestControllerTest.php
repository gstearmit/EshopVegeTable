<?php
namespace UserMPRestTest\Controller;

use UserMPRestTest\Bootstrap;
use UserMPRestTest\Controller\UserMPRestControllerTest;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use PHPUnit_Framework_TestCase;
use UserMPRest\Controller\UserRestController;
use MoneyPointUsers\Controller\UsersController;
use Users\Controller\UserController;

class UserMPRestControllerTest extends PHPUnit_Framework_TestCase
{
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    protected function setUp()
    {
        $serviceManager = Bootstrap::getServiceManager();
        $this->controller = new UserRestController();//UsersController(); //UserRestController();
        $this->request    = new Request();
       // $this->routeMatch = new RouteMatch(array('controller' => 'signup'));
        $this->routeMatch = new RouteMatch(array('controller' => 'index'));
        $this->event      = new MvcEvent();
        $config = $serviceManager->get('Config');
        $routerConfig = isset($config['router']) ? $config['router'] : array();
        $router = HttpRouter::factory($routerConfig);
        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
        $this->controller->setServiceLocator($serviceManager);
    }

    public function testGetListCanBeAccessed()
    {
        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetCanBeAccessed()
    {
        $this->routeMatch->setParam('id', '16');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCreateCanBeAccessed()
    {
        $this->request->setMethod('post');
        $this->request->getPost()->set('id', '');
        $this->request->getPost()->set('email', 'Hoangphuc43@gmail.com');
        $this->request->getPost()->set('password', '$Hoangphuc215');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUpdateCanBeAccessed()
    {
        $this->routeMatch->setParam('id', '16');
        $this->request->getPost()->set('email', 'Hoangphuc43@gmail.com');
        $this->request->setMethod('put');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testDeleteCanBeAccessed()
    {
        $this->routeMatch->setParam('id', '24');
        $this->request->setMethod('delete');

        $result   = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetUsersTableReturnsAnInstanceOfUsersTable()
    {
        $this->assertInstanceOf('Users\Model\UsersTable', $this->controller->getUsersTable()); 
    }
}