<?php
namespace Contract\Model;

/**
 * Contract 合同领域对象
 * @author chloroplast
 * @version 1.0.0:2016.11.24
 */

class Contract{

	/**
	 * @var int $id 合同id
	 */
	private $id;
	/**
	 * @var Shop $shop 合同所属店铺
	 */
	private $shop;
	/**
	 * @var string $title 合同标题
	 */
	private $title;
	/**
	 * @var ContractContent $content 合同内容
	 */
	private $content;
	/**
	 * @var int $status 合同状态
	 */
	private $status;

	/**
	 * Contract 合同领域对象 构造函数
	 */
	public function __construct(){
		global $_FWGLOBAL;
		$this->id = 0;
		$this->shop = '';
		$this->title = '';
		$this->content = ;
		$this->status = STATUS_NORMAL;
	}

	/**
	 * Contract 合同领域对象 析构函数
	 */
	public function __destruct(){
		unset($this->id);
		unset($this->shop);
		unset($this->title);
		unset($this->content);
		unset($this->status);
	}

	/**
	 * 设置合同id
	 * @param int $id 合同id
	 */
	public function setId(int $id){
		$this->id = $id;
	}

	/**
	 * 获取合同id
	 * @return int $id 合同id
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * 设置合同所属店铺
	 * @param Shop $shop 合同所属店铺
	 */
	public function setShop(Shop $shop){
		$this->shop = $shop;
	}

	/**
	 * 获取合同所属店铺
	 * @return Shop $shop 合同所属店铺
	 */
	public function getShop(){
		return $this->shop;
	}

	/**
	 * 设置合同标题
	 * @param string $title 合同标题
	 */
	public function setTitle(string $title){
		$this->title = $title;
	}

	/**
	 * 获取合同标题
	 * @return string $title 合同标题
	 */
	public function getTitle(){
		return $this->title;
	}

	/**
	 * 设置合同内容
	 * @param ContractContent $content 合同内容
	 */
	public function setContent(ContractContent $content){
		$this->content = $content;
	}

	/**
	 * 获取合同内容
	 * @return ContractContent $content 合同内容
	 */
	public function getContent(){
		return $this->content;
	}

	/**
	 * 设置合同状态
	 * @param int $status 合同状态
	 */
	public function setStatus(int $status){
		$this->status= in_array($status,array(STATUS_NORMAL,STATUS_DELETE)) ? $status : STATUS_NORMAL;
	}

	/**
	 * 获取合同状态
	 * @return int $status 合同状态
	 */
	public function getStatus(){
		return $this->status;
	}

}