<?php
namespace System\Classes;

use tests;
use Marmot\Core;
use System\Classes\Request;

class ControllerTest extends tests\GenericTestCase
{
    private $stub;

    public function setUp()
    {
        $this->stub = $this->getMockBuilder('System\Classes\Controller')
                      ->getMockForAbstractClass();
    }

    public function tearDown()
    {
        unset($this->stub);
    }

    /**
     * 期望 request 和 reponse 正确被赋值对象
     */
    public function testConstruct()
    {
        $this->assertInstanceof(
            'System\Classes\Request',
            $this->stub->getRequest()
        );
        $this->assertInstanceof(
            'System\Classes\Response',
            $this->stub->getResponse()
        );
    }

    /**
     * 因为response默认是jsonApi格式,所有数据都会被json_encode
     * 所以我们期望渲染一个数组,并且期望一个json_encode格式的数组
     */
    public function testRender()
    {
        //mock interface
        $ivew = $this->getMock('System\Interfaces\IView');
        $ivew->expects($this->any())
             ->method('display')
             ->will($this->returnValue(array('key'=>'value')));

        $this->stub->render($ivew);
        $this->expectOutputString(array('key'=>'value'));
    }
}
