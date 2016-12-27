<?php
namespace Contract\Model;
use GenericTestCase;
/**
 * Contract\Model\Contract.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.11.24
 */

class ContractTest extends GenericTestCase{

	private $stub;

	public function setUp(){
		$this->stub = new \Contract\Model\Contract();
	}

	/**
	 * Contract 合同领域对象,测试构造函数
	 */
	public function testContractConstructor(){
		//测试初始化合同id
		$idParameter = $this->getPrivateProperty('Contract\Model\Contract','id');
		$this->assertEquals(0,$idParameter->getValue($this->stub));

		//测试初始化合同所属店铺
		$shopParameter = $this->getPrivateProperty('Contract\Model\Contract','shop');
		$this->assertEmpty($shopParameter->getValue($this->stub));

		//测试初始化合同标题
		$titleParameter = $this->getPrivateProperty('Contract\Model\Contract','title');
		$this->assertEmpty($titleParameter->getValue($this->stub));

		//测试初始化合同内容
		$contentParameter = $this->getPrivateProperty('Contract\Model\Contract','content');
		$this->assertEmpty($contentParameter->getValue($this->stub));

		//测试初始化合同状态
		$statusParameter = $this->getPrivateProperty('Contract\Model\Contract','status');
		$this->assertEquals(STATUS_NORMAL,$statusParameter->getValue($this->stub));

	}


	//id 测试 ---------------------------------------------------------- start
	/**
	 * 设置 Contract setId() 正确的传参类型,期望传值正确
	 */
	public function testSetIdCorrectType(){
		$this->stub->setId(1);
		$this->assertEquals(1,$this->stub->getId());
	}

	/**
	 * 设置 Contract setId() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetIdWrongType(){
		$this->stub->setId('string');
	}

	/**
	 * 设置 Contract setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
	 */
	public function testSetIdWrongTypeButNumeric(){
		$this->stub->setId('1');
		$this->assertTrue(is_int($this->stub->getId()));
		$this->assertEquals(1,$this->stub->getId());
	}
	//id 测试 ----------------------------------------------------------   end

	//shop 测试 -------------------------------------------------------- start
	/**
	 * 设置 Contract setShop() 正确的传参类型,期望传值正确
	 */
	public function testSetShopCorrectType(){
		$object = new Shop();		//根据需求自己添加对象的设置,如果需要
		$this->stub->setShop($object);
		$this->assertSame($object,$this->stub->getShop());
	}

	/**
	 * 设置 Contract setShop() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetShopWrongType(){
		$this->stub->setShop('string');
	}
	//shop 测试 --------------------------------------------------------   end

	//title 测试 ------------------------------------------------------- start
	/**
	 * 设置 Contract setTitle() 正确的传参类型,期望传值正确
	 */
	public function testSetTitleCorrectType(){
		$this->stub->setTitle('string');
		$this->assertEquals('string',$this->stub->getTitle());
	}

	/**
	 * 设置 Contract setTitle() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetTitleWrongType(){
		$this->stub->setTitle(array(1,2,3));
	}
	//title 测试 -------------------------------------------------------   end

	//content 测试 ----------------------------------------------------- start
	/**
	 * 设置 Contract setContent() 正确的传参类型,期望传值正确
	 */
	public function testSetContentCorrectType(){
		$object = new ContractContent();		//根据需求自己添加对象的设置,如果需要
		$this->stub->setContent($object);
		$this->assertSame($object,$this->stub->getContent());
	}

	/**
	 * 设置 Contract setContent() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetContentWrongType(){
		$this->stub->setContent('string');
	}
	//content 测试 -----------------------------------------------------   end

	//status 测试 ------------------------------------------------------ start
	/**
	 * 循环测试 Contract setStatus() 是否符合预定范围
	 *
	 * @dataProvider statusProvider
	 */
	public function testSetStatus($actual,$expected){
		$this->stub->setStatus($actual);
		$this->assertEquals($expected,$this->stub->getStatus());
	}

	/**
	 * 循环测试 Contract setStatus() 数据构建器
	 */
	public function statusProvider(){
		return array(
			array(STATUS_NORMAL,STATUS_NORMAL),
			array(STATUS_DELETE,STATUS_DELETE),
			array(9999,STATUS_NORMAL),
		);
	}

	/**
	 * 设置 Contract setStatus() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetStatusWrongType(){
		$this->stub->setStatus('string');
	}
	//status 测试 ------------------------------------------------------   end
}