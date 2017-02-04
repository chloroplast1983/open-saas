<?php
namespace Home\Controller;

use System\Classes\Controller;
use Common\Controller\JsonApiController;

class IndexController extends Controller
{

    use JsonApiController;
    
    /**
     * @codeCoverageIgnore
     */
    public function index()
    {	
        var_dump("Hello World saas open");
        return true;
    }
}
