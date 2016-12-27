<?php
namespace Shop\Model;

/**
 * Shop 用户领域对象
 * @author chloroplast
 * @version 1.0.0:2016.09.11
 */

class Shop{

	/**
	 * @var int $id 店铺id
	 */
	private $id;
	/**
	 * @var User $user 店铺所属用户
	 */
	private $user;
	/**
	 * @var string $title 店铺标题
	 */
	private $title;
	/**
	 * @var string $contactPeople 联系人
	 */
	private $contactPeople;
	/**
	 * @var string $contactPeoplePhone 联系人电话
	 */
	private $contactPeoplePhone;
	/**
	 * @var string $contactPeopleQQ 联系人QQ
	 */
	private $contactPeopleQQ;
	/**
	 * @var int $province 店铺所在省
	 */
	private $province;
	/**
	 * @var int $city 店铺所在市
	 */
	private $city;
	/**
	 * @var string $address 店铺地址
	 */
	private $address;
	/**
	 * @var ShopAboutInfo $aboutInfo 店铺关于我们
	 */
	private $aboutInfo;
	/**
	 * @var ShopSlides $slides 店铺幻灯片
	 */
	private $slides;
	/**
	 * @var ShopNavigation $navigation 店铺导航
	 */
	private $navigation;

	/**
	 * Shop 用户领域对象 构造函数
	 */
	public function __construct(){
		global $_FWGLOBAL;
		$this->id = 0;
		$this->user = ;
		$this->title = '';
		$this->contactPeople = '';
		$this->contactPeoplePhone = '';
		$this->contactPeopleQQ = '';
		$this->province = 0;
		$this->city = 0;
		$this->address = '';
		$this->aboutInfo = ;
		$this->slides = ;
		$this->navigation = ;
	}

	/**
	 * Shop 用户领域对象 析构函数
	 */
	public function __destruct(){
		unset($this->id);
		unset($this->user);
		unset($this->title);
		unset($this->contactPeople);
		unset($this->contactPeoplePhone);
		unset($this->contactPeopleQQ);
		unset($this->province);
		unset($this->city);
		unset($this->address);
		unset($this->aboutInfo);
		unset($this->slides);
		unset($this->navigation);
	}

	/**
	 * 设置店铺id
	 * @param int $id 店铺id
	 */
	public function setId(int $id){
		$this->id = $id;
	}

	/**
	 * 获取店铺id
	 * @return int $id 店铺id
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * 设置店铺所属用户
	 * @param User $user 店铺所属用户
	 */
	public function setUser(User $user){
		$this->user = $user;
	}

	/**
	 * 获取店铺所属用户
	 * @return User $user 店铺所属用户
	 */
	public function getUser(){
		return $this->user;
	}

	/**
	 * 设置店铺标题
	 * @param string $title 店铺标题
	 */
	public function setTitle(string $title){
		$this->title = $title;
	}

	/**
	 * 获取店铺标题
	 * @return string $title 店铺标题
	 */
	public function getTitle(){
		return $this->title;
	}

	/**
	 * 设置联系人
	 * @param string $contactPeople 联系人
	 */
	public function setContactPeople(string $contactPeople){
		$this->contactPeople = $contactPeople;
	}

	/**
	 * 获取联系人
	 * @return string $contactPeople 联系人
	 */
	public function getContactPeople(){
		return $this->contactPeople;
	}

	/**
	 * 设置联系人电话
	 * @param string $contactPeoplePhone 联系人电话
	 */
	public function setContactPeoplePhone(string $contactPeoplePhone){
		$this->contactPeoplePhone = $contactPeoplePhone;
	}

	/**
	 * 获取联系人电话
	 * @return string $contactPeoplePhone 联系人电话
	 */
	public function getContactPeoplePhone(){
		return $this->contactPeoplePhone;
	}

	/**
	 * 设置联系人QQ
	 * @param string $contactPeopleQQ 联系人QQ
	 */
	public function setContactPeopleQQ(string $contactPeopleQQ){
		$this->contactPeopleQQ = $contactPeopleQQ;
	}

	/**
	 * 获取联系人QQ
	 * @return string $contactPeopleQQ 联系人QQ
	 */
	public function getContactPeopleQQ(){
		return $this->contactPeopleQQ;
	}

	/**
	 * 设置店铺所在省
	 * @param int $province 店铺所在省
	 */
	public function setProvince(int $province){
		$this->province = $province;
	}

	/**
	 * 获取店铺所在省
	 * @return int $province 店铺所在省
	 */
	public function getProvince(){
		return $this->province;
	}

	/**
	 * 设置店铺所在市
	 * @param int $city 店铺所在市
	 */
	public function setCity(int $city){
		$this->city = $city;
	}

	/**
	 * 获取店铺所在市
	 * @return int $city 店铺所在市
	 */
	public function getCity(){
		return $this->city;
	}

	/**
	 * 设置店铺地址
	 * @param string $address 店铺地址
	 */
	public function setAddress(string $address){
		$this->address = $address;
	}

	/**
	 * 获取店铺地址
	 * @return string $address 店铺地址
	 */
	public function getAddress(){
		return $this->address;
	}

	/**
	 * 设置店铺关于我们
	 * @param ShopAboutInfo $aboutInfo 店铺关于我们
	 */
	public function setAboutInfo(ShopAboutInfo $aboutInfo){
		$this->aboutInfo = $aboutInfo;
	}

	/**
	 * 获取店铺关于我们
	 * @return ShopAboutInfo $aboutInfo 店铺关于我们
	 */
	public function getAboutInfo(){
		return $this->aboutInfo;
	}

	/**
	 * 设置店铺幻灯片
	 * @param ShopSlides $slides 店铺幻灯片
	 */
	public function setSlides(ShopSlides $slides){
		$this->slides = $slides;
	}

	/**
	 * 获取店铺幻灯片
	 * @return ShopSlides $slides 店铺幻灯片
	 */
	public function getSlides(){
		return $this->slides;
	}

	/**
	 * 设置店铺导航
	 * @param ShopNavigation $navigation 店铺导航
	 */
	public function setNavigation(ShopNavigation $navigation){
		$this->navigation = $navigation;
	}

	/**
	 * 获取店铺导航
	 * @return ShopNavigation $navigation 店铺导航
	 */
	public function getNavigation(){
		return $this->navigation;
	}

}