<?php

require_once 'Model.php';

class UsuarioDAO extends Model
{
 
    public function __construct()
    {
     	parent::__construct();
     	$this->class = 'Usuario';
     	$this->tabela = 'usuarios';
    }

    public function insereUsuario(Usuario $usuario)
    {
    	$values = "null, '{$usuario->getNome()}', '{$usuario->getTelefone()}', '{$usuario->getEndereco()}', '{$usuario->getEmail()}', '{$usuario->getSenha()}'";
    	return $this->inserir($values);
    }
    public function alteraUsuario(Usuario $usuario)
    {
    	$altera_senha = ($usuario->getSenha() != '' ? ", senha = '{$usuario->getSenha()}'" : '');
    	$values = "
			nome = '{$usuario->getNome()}'
			, email = '{$usuario->getEmail()}'
			{$altera_senha}
    	";

    	$this->alterar($usuario->getId(), $values);
    }

    public function getLogin($email, $senha)
    {
        $sql = "SELECT * FROM {$this->tabela} 
                WHERE email = :email AND senha = :senha";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $stmt->execute();
        return $stmt->fetch();
    }
}