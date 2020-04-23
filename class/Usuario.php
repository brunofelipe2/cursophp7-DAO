<?php 
//Nessa Classe será carregado os dados do Banco de dados para o Objeto
class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;
	
	//depois de criado os atributos private criar os Gets e Sets de cada um
	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	/*Metodo para consultar id no Banco de dados
		esse metodo vai fazer select e carregar em array
		as os campos do ID da Tabela selecionada	*/

	public function loadById($id){

		$sql = new Sql();

			$result=$sql->select("SELECT * FROM tb_usuarios WHERE  idusuario = :ID" , array(
				":ID"=>$id //:ID é a chave, $id valor que está sendo recebido pelo parametro				

			));//a chave select vai fazer a buscar pelo ID do usuario, deve retornar apenas 1 linha, retornando Array de array 
			
			//if para validar
			if(isset($result[0])) {
				$row = $result[0];

				//pegar os dados retornados associativo e enviar para os sets
				$this->setIdusuario($row['idusuario']);
				$this->setDeslogin($row['deslogin']);
				$this->setDessenha($row['dessenha']);
				$this->setDtcadastro(new DateTime($row['dtcadastro']));
			}

		}


		public function __toString(){//metodo magico retonando string com echo

			return json_encode(array(

				"idusuario"=>$this->getIdusuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
			));
		}


	}//Termino do Metodo loadById
	

//Termino da class Usuario	

 ?>