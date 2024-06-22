<?php

class Conexao {
    // Atributos para conexão
    private $host = 'localhost'; // Host do banco de dados
    private $usuario = 'root'; // Usuário do banco de dados
    private $senha = ''; // Senha do banco de dados
    private $banco = 'empresadecontas'; // Nome do banco de dados
    private $conexao; // Objeto de conexão

    // Método construtor para inicializar a conexão
    public function __construct() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        // Verifica se ocorreu algum erro na conexão
        if ($this->conexao->connect_error) {
            die('Erro de conexão: ' . $this->conexao->connect_error);
        }

        // Definindo o charset para UTF-8 
        $this->conexao->set_charset("utf8");
    }

    // Método para execução de consultas SQL
    public function executarQuery($sql) {
        $resultado = $this->conexao->query($sql);

        // Verifica se ocorreu algum erro na execução da query
        if (!$resultado) {
            die('Erro na consulta: ' . $this->conexao->error);
        }

        return $resultado;
    }

    // Método para fechar a conexão com o banco de dados
    public function fecharConexao() {
        $this->conexao->close();
    }
}

?>
