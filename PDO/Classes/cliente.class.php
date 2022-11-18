<?php

class Cliente extends Crud{

    protected $tabela = 'Cliente';
    private $idCliente;
    private $nomeCliente;
    private $enderecoCliente;
    private $telefoneCliente;
    private $nascimentoCliente;

    # set's

    public function setId($id){
        $this->idCliente = $id;
    }

    public function setNome($nomeCliente){
        $this->nomeCliente = $nomeCliente;
    }

    public function setEndereco($enderecoCliente){
        $this->enderecoCliente = $enderecoCliente;
    }
    
    public function setTelefone($telefoneCliente){
        $this->telefoneCliente = $telefoneCliente;
    }
    
    public function setNascimento($nascimentoCliente){
        $this->nascimentoCliente = $nascimentoCliente;
    }

    #Gets
    
    public function getId(){
        return $this->idCliente;
    }

    public function getNome(){
        return $this->nomeCliente;
    }

    public function getEndereco(){
        return $this->enderecoCliente;
    }

    public function getTelefone(){
        return $this->telefoneCliente;
    }

    public function getNascimento(){
        return $this->nascimentoCliente;
    }


    #Implementando a Função Abstrata

    public function Inserir(){
        $sqlInserir = "INSERT INTO $this->tabela (nomeCliente, enderecoCliente, telefoneCliente, nascimentoCliente) VALUES (:nome, :endereco, :telefone, :nascimento)";
        $stmt= Conexao::prepare($sqlInserir);
        $stmt->bindParam(':nome', $this->nomeCliente, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $this->enderecoCliente, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefoneCliente, PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $this->nascimentoCliente, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function Atualizar($campo,$id)
    {
        $sqlAtualizar = "UPDATE $this->tabela SET nomeCliente = :nome, enderecoCliente = :endereco, telefoneCliente = :telefone, nascimentoCliente = :nascimento where $campo=:idAtt" ;
        $stmt= Conexao::prepare($sqlAtualizar);
        $stmt->bindParam(':nome', $this->nomeCliente, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $this->enderecoCliente, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefoneCliente, PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $this->nascimentoCliente, PDO::PARAM_STR);
        $stmt->bindParam(':idAtt', $id, PDO::PARAM_STR);
        $stmt->execute();
    }
}