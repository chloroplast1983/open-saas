<?php
namespace Shop\Model;
use GenericTestCase;
/**
 * Shop\Model\Shop.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.09.11
 */

class ShopTest extends GenericTestCase{

	private $stub;

	public function setUp(){
		$this->stub = new \Shop\Model\Shop();
	}

	/**
	 * Shop 用户领域对象,测试构造函数
	 */
	public function testShopConstructor(){
		//测试初始化店铺id
		$idParameter = $this->getPrivateProperty('Shop\Model\Shop','id');
		$this->assertEquals(0,$idParameter->getValue($this->stub));

		//测试初始化店铺所属用户
		$userParameter = $this->getPrivateProperty('Shop\Model\Shop','user');
		$this->assertEmpty($userParameter->getValue($this->stub));

		//测试初始化店铺标题
		$titleParameter = $this->getPrivateProperty('Shop\Model\Shop','title');
		$this->assertEmpty($titleParameter->getValue($this->stub));

		//测试初始化联系人
		$contactPeopleParameter = $this->getPrivateProperty('Shop\Model\Shop','contactPeople');
		$this->assertEmpty($contactPeopleParameter->getValue($this->stub));

		//测试初始化联系人电话
		$contactPeoplePhoneParameter = $this->getPrivateProperty('Shop\Model\Shop','contactPeoplePhone');
		$this->assertEmpty($contactPeoplePhoneParameter->getValue($this->stub));

		//测试初始化联系人QQ
		$contactPeopleQQParameter = $this->getPrivateProperty('Shop\Model\Shop','contactPeopleQQ');
		$this->assertEmpty($contactPeopleQQParameter->getValue($this->stub));

		//测试初始化店铺所在省
		$provinceParameter = $this->getPrivateProperty('Shop\Model\Shop','province');
		$this->assertEquals(0,$provinceParameter->getValue($this->stub));

		//测试初始化店铺所在市
		$cityParameter = $this->getPrivateProperty('Shop\Model\Shop','city');
		$this->assertEquals(0,$cityParameter->getValue($this->stub));

		//测试初始化店铺地址
		$addressParameter = $this->getPrivateProperty('Shop\Model\Shop','address');
		$this->assertEmpty($addressParameter->getValue($this->stub));

		//测试初始化店铺关于我们
		$aboutInfoParameter = $this->getPrivateProperty('Shop\Model\Shop','aboutInfo');
		$this->assertEmpty($aboutInfoParameter->getValue($this->stub));

		//测试初始化店铺幻灯片
		$slidesParameter = $this->getPrivateProperty('Shop\Model\Shop','slides');
		$this->assertEmpty($slidesParameter->getValue($this->stub));

		//测试初始化店铺导航
		$navigationParameter = $this->getPrivateProperty('Shop\Model\Shop','navigation');
		$this->assertEmpty($navigationParameter->getValue($this->stub));

	}


	//id 测试 ---------------------------------------------------------- start
	/**
	 * 设置 Shop setId() 正确的传参类型,期望传值正确
	 */
	public function testSetIdCorrectType(){
		$this->stub->setId(1);
		$this->assertEquals(1,$this->stub->getId());
	}

	/**
	 * 设置 Shop setId() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetIdWrongType(){
		$this->stub->setId('string');
	}

	/**
	 * 设置 Shop setId() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
	 */
	public function testSetIdWrongTypeButNumeric(){
		$this->stub->setId('1');
		$this->assertTrue(is_int($this->stub->getId()));
		$this->assertEquals(1,$this->stub->getId());
	}
	//id 测试 ----------------------------------------------------------   end

	//user 测试 -------------------------------------------------------- start
	/**
	 * 设置 Shop setUser() 正确的传参类型,期望传值正确
	 */
	public function testSetUserCorrectType(){
		$object = new User();		//根据需求自己添加对象的设置,如果需要
		$this->stub->setUser($object);
		$this->assertSame($object,$this->stub->getUser());
	}

	/**
	 * 设置 Shop setUser() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetUserWrongType(){
		$this->stub->setUser('string');
	}
	//user 测试 --------------------------------------------------------   end

	//title 测试 ------------------------------------------------------- start
	/**
	 * 设置 Shop setTitle() 正确的传参类型,期望传值正确
	 */
	public function testSetTitleCorrectType(){
		$this->stub->setTitle('string');
		$this->assertEquals('string',$this->stub->getTitle());
	}

	/**
	 * 设置 Shop setTitle() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetTitleWrongType(){
		$this->stub->setTitle(array(1,2,3));
	}
	//title 测试 -------------------------------------------------------   end

	//contactPeople 测试 ----------------------------------------------- start
	/**
	 * 设置 Shop setContactPeople() 正确的传参类型,期望传值正确
	 */
	public function testSetContactPeopleCorrectType(){
		$this->stub->setContactPeople('string');
		$this->assertEquals('string',$this->stub->getContactPeople());
	}

	/**
	 * 设置 Shop setContactPeople() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetContactPeopleWrongType(){
		$this->stub->setContactPeople(array(1,2,3));
	}
	//contactPeople 测试 -----------------------------------------------   end

	//contactPeoplePhone 测试 ------------------------------------------ start
	/**
	 * 设置 Shop setContactPeoplePhone() 正确的传参类型,期望传值正确
	 */
	public function testSetContactPeoplePhoneCorrectType(){
		$this->stub->setContactPeoplePhone('string');
		$this->assertEquals('string',$this->stub->getContactPeoplePhone());
	}

	/**
	 * 设置 Shop setContactPeoplePhone() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetContactPeoplePhoneWrongType(){
		$this->stub->setContactPeoplePhone(array(1,2,3));
	}
	//contactPeoplePhone 测试 ------------------------------------------   end

	//contactPeopleQQ 测试 --------------------------------------------- start
	/**
	 * 设置 Shop setContactPeopleQQ() 正确的传参类型,期望传值正确
	 */
	public function testSetContactPeopleQQCorrectType(){
		$this->stub->setContactPeopleQQ('string');
		$this->assertEquals('string',$this->stub->getContactPeopleQQ());
	}

	/**
	 * 设置 Shop setContactPeopleQQ() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetContactPeopleQQWrongType(){
		$this->stub->setContactPeopleQQ(array(1,2,3));
	}
	//contactPeopleQQ 测试 ---------------------------------------------   end

	//province 测试 ---------------------------------------------------- start
	/**
	 * 设置 Shop setProvince() 正确的传参类型,期望传值正确
	 */
	public function testSetProvinceCorrectType(){
		$this->stub->setProvince(1);
		$this->assertEquals(1,$this->stub->getProvince());
	}

	/**
	 * 设置 Shop setProvince() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetProvinceWrongType(){
		$this->stub->setProvince('string');
	}

	/**
	 * 设置 Shop setProvince() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
	 */
	public function testSetProvinceWrongTypeButNumeric(){
		$this->stub->setProvince('1');
		$this->assertTrue(is_int($this->stub->getProvince()));
		$this->assertEquals(1,$this->stub->getProvince());
	}
	//province 测试 ----------------------------------------------------   end

	//city 测试 -------------------------------------------------------- start
	/**
	 * 设置 Shop setCity() 正确的传参类型,期望传值正确
	 */
	public function testSetCityCorrectType(){
		$this->stub->setCity(1);
		$this->assertEquals(1,$this->stub->getCity());
	}

	/**
	 * 设置 Shop setCity() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetCityWrongType(){
		$this->stub->setCity('string');
	}

	/**
	 * 设置 Shop setCity() 错误的传参类型.但是传参是数值,期望返回类型正确,值正确.
	 */
	public function testSetCityWrongTypeButNumeric(){
		$this->stub->setCity('1');
		$this->assertTrue(is_int($this->stub->getCity()));
		$this->assertEquals(1,$this->stub->getCity());
	}
	//city 测试 --------------------------------------------------------   end

	//address 测试 ----------------------------------------------------- start
	/**
	 * 设置 Shop setAddress() 正确的传参类型,期望传值正确
	 */
	public function testSetAddressCorrectType(){
		$this->stub->setAddress('string');
		$this->assertEquals('string',$this->stub->getAddress());
	}

	/**
	 * 设置 Shop setAddress() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetAddressWrongType(){
		$this->stub->setAddress(array(1,2,3));
	}
	//address 测试 -----------------------------------------------------   end

	//aboutInfo 测试 --------------------------------------------------- start
	/**
	 * 设置 Shop setAboutInfo() 正确的传参类型,期望传值正确
	 */
	public function testSetAboutInfoCorrectType(){
		$object = new ShopAboutInfo();		//根据需求自己添加对象的设置,如果需要
		$this->stub->setAboutInfo($object);
		$this->assertSame($object,$this->stub->getAboutInfo());
	}

	/**
	 * 设置 Shop setAboutInfo() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetAboutInfoWrongType(){
		$this->stub->setAboutInfo('string');
	}
	//aboutInfo 测试 ---------------------------------------------------   end

	//slides 测试 ------------------------------------------------------ start
	/**
	 * 设置 Shop setSlides() 正确的传参类型,期望传值正确
	 */
	public function testSetSlidesCorrectType(){
		$object = new ShopSlides();		//根据需求自己添加对象的设置,如果需要
		$this->stub->setSlides($object);
		$this->assertSame($object,$this->stub->getSlides());
	}

	/**
	 * 设置 Shop setSlides() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetSlidesWrongType(){
		$this->stub->setSlides('string');
	}
	//slides 测试 ------------------------------------------------------   end

	//navigation 测试 -------------------------------------------------- start
	/**
	 * 设置 Shop setNavigation() 正确的传参类型,期望传值正确
	 */
	public function testSetNavigationCorrectType(){
		$object = new ShopNavigation();		//根据需求自己添加对象的设置,如果需要
		$this->stub->setNavigation($object);
		$this->assertSame($object,$this->stub->getNavigation());
	}

	/**
	 * 设置 Shop setNavigation() 错误的传参类型,期望期望抛出TypeError exception
	 *
	 * @expectedException TypeError 
	 */
	public function testSetNavigationWrongType(){
		$this->stub->setNavigation('string');
	}
	//navigation 测试 --------------------------------------------------   end
}