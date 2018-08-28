<?php
class IndexForm{
	private $textData;
	private $numberData;
	private $dateData;
	private $radioData;
	private $checkData;
	private $selectData;
	private $checkListHidden;
	private $checkList;
	
	public function setTextData($textData){
		$this->textData = $textData;
	}
	
	public function getTextData(){
		return $this->textData;
	}
	
	public function setNumberData($numberData){
		$this->numberData = $numberData;
	}
	
	public function getNumberData(){
		return $this->numberData;
	}
	
	public function setDateData($dateData){
		$this->dateData = $dateData;
	}
	
	public function getDateData(){
		return $this->dateData;
	}
	
	public function setRadioData($radioData){
		$this->radioData = $radioData;
	}
	
	public function getRadioData(){
		return $this->radioData;
	}
	
	public function setCheckData($checkData){
		$this->checkData = $checkData;
	}
	
	public function getCheckData(){
		return $this->checkData;
	}
	
	public function setSelectData($selectData){
		$this->selectData = $selectData;
	}
	
	public function getSelectData(){
		return $this->selectData;
	}
	
	public function setCheckListHiddenData($checkListHiddenData){
		$this->checkListHiddenData = $checkListHiddenData;
	}
	
	public function getCheckListHiddenData(){
		return $this->checkListHiddenData;
	}
	
	public function setCheckListData($checkListData){
		$this->checkListData = $checkListData;
	}
	
	public function getCheckListData(){
		return $this->checkListData;
	}
}
?>