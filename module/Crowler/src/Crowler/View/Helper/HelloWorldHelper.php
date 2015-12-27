<?php
namespace Crowler\View\Helper;
use Zend\View\Helper\AbstractHelper;

class AutoEscapeHelper extends AbstractHelper
{
    public function __invoke()
    {
        // business logic
        return 'hello world';
    }
}