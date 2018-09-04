<?php 
class teste{
	private $Id;
	private $Criado;
	private $Atualizado;
	private $Nome;
	private $Descricao;
	private $Tipo;
	private $Valor;
	
	public function setId($Id){
		$this->Id = $Id;
	}
	
	public function getId(){
		return $this->Id;
	}
	
	public function setCriado($Criado){
		$this->Criado = $Criado;
	}
	
	public function getCriado(){
		return $this->Criado;
	}
	
	public function setAtualizado($Atualizado){
		$this->Atualizado = $Atualizado;
	}
	
	public function getAtualizado(){
		return $this->Atualizado;
	}
	
	public function setNome($Nome){
		$this->Nome = $Nome;
	}
	
	public function getNome(){
		return $this->Nome;
	}
	
	public function setDescricao($Descricao){
		$this->Descricao = $Descricao;
	}
	
	public function getDescricao(){
		return $this->Descricao;
	}
	
	public function setTipo($Tipo){
		$this->Tipo = $Tipo;
	}
	
	public function getTipo(){
		return $this->Tipo;
	}
	
	public function setValor($Valor){
		$this->Valor = $Valor;
	}
	
	public function getValor(){
		return $this->Valor;
	}
}
?>