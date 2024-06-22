<?php
include_once(__DIR__ . '/../model/cliente.php');

class Controller_cliente
{

    function Cadastrar_Cliente()
    {
        if(isset($_POST['vazio']) && !empty($_POST['vazio'])) {
            // Coleta os dados do formulário
            $cliente = new Cliente(
                0, 
                $_POST['nome'],
                $_POST['cpf_cnpj'],
                $_POST['cep'],
                $_POST['rua'],
                $_POST['numero_casa'],
                $_POST['bairro'],
                $_POST['cidade'],
                $_POST['estado'],
                $_POST['telefone'],
                $_POST['celular'],
                $_POST['email'],
                $_POST['banco'],
                $_POST['agencia'],
                $_POST['conta'],
                $_POST['tipo_conta'],
                'ativo' 
            );
            $cliente->Cadastro_Cliente($cliente);
            echo "<html> <head></head><body>
                 <script> alert('Cliente cadastrado com sucesso!'); location.href='clientes.php';</script>
                 </body>
                </html>";

        }
    }

    function Get_Clientes()
    {
        return Cliente::Exibir_Clientes();
        
    }

    function Excluir_Cliente()
    {
        if(isset($_POST['apagar-cliente'])) {
            echo"";
            $idcliente = $_POST['opcao'];
            Cliente::Apagar_Cliente($idcliente);
        }
    }
    
}