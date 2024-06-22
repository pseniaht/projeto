<?php
include_once ('controller/controller_cliente.php');
include_once('controller/controller_conta.php');
$controller = new Controller_cliente();
$controller->Cadastrar_Cliente();
$controller2 = new controller_conta();
$controller2->Cadastra_Conta();
?>
<div class="fora7">
        <div class="cadastro">
            <div class="cad">Registrar Cliente / Fornecedor</div>
            <form method="post">
                <div class="formcadastro">
                    <div class="centcadastro">
                        <div class="formc">
                            <div class="info"><label for="">Nome Completo:</label></div>
                            <div class="inputcadastro"><input type="text" name="nome"></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">CPF/CNPJ:</label></div>
                            <div class="inputcadastro"><input type="text" name="cpf_cnpj" pattern="[0-9]{11}|[0-9]{14}"></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">CEP:</label></div>
                            <div class="inputcadastro"><input name="cep" type="text" id="cep" value="" onblur="pesquisacep(this.value);"></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Rua:</label></div>
                            <div class="inputcadastro"><input type="text" name="rua" id="rua" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">N°:</label></div>
                            <div class="inputcadastro"><input type="text" name="numero_casa" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Bairro:</label></div>
                            <div class="inputcadastro"><input type="text" name="bairro" id="bairro" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Cidade:</label></div>
                            <div class="inputcadastro"><input type="text" name="cidade" id="cidade" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Estado:</label></div>
                            <div class="inputcadastro"><input type="text" name="estado" id="uf" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Telefone Fixo:</label></div>
                            <div class="inputcadastro"><input type="number" name="telefone" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Celular:</label></div>
                            <div class="inputcadastro"><input type="number" name="celular" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">E-mail:</label></div>
                            <div class="inputcadastro"><input type="email" name="email" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Banco:</label></div>
                            <div class="inputcadastro"><input type="text" name="banco" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Agência:</label></div>
                            <div class="inputcadastro"> <input type="number" name="agencia" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Conta:</label></div>
                            <div class="inputcadastro"><input type="number" name="conta" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Tipo de Conta:</label></div>
                            <div class="inputcadastro">
                                <select id="sel" name="tipo_conta" required>
                                    <option value="poupança">Poupança</option>
                                    <option value="corrente">Corrente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="marge">
                    <input class="final" type="submit" name="vazio" value="Cadastrar">
                </div>
            </form>
        </div>

        <div class="cadastro">
            <div class="cad">Registrar Transação</div>
            <form method="post">
                <div class="formcadastro">
                    <div class="centcadastro">
                        <div class="formc">
                            <div class="info"><label for="">Cliente:</label></div>
                            <div class="inputcadastro">
                                <select id="sel" name="id_cliente">
                                <option selcted>Selcione</option>
                                <?php
                                $clientes = $controller->Get_Clientes();
                                foreach ($clientes as $cli):
                                ?>
                                    <option value='<?php echo $cli->getIdCliente(); ?>'> <?php echo $cli->getNome(); ?> </option>
                                <?php endforeach; ?>   
                                </select>
                            </div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Descrição:</label></div>
                            <div class="inputcadastro"><input type="text" name="descricao" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Vencimento:</label></div>
                            <div class="inputcadastro"><input type="date" name="vencimento" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Valor:</label></div>
                            <div class="inputcadastro"><input type="number" step=".01" name="valor" required></div>
                        </div>
                        <div class="formc">
                            <div class="info"><label for="">Forma de pagamento:</label></div>
                            <div class="inputcadastro">
                                <select id="sel" name="forma_pagamento">
                                    <option value="pix/ted/doc">PIX/TED/DOC</option>
                                    <option value="boleto">Boleto</option>
                                    <option value="cartao_credito">Cartão de Crédito</option>
                                </select>
                            </div>
                        </div>

                        <div class="formc">
                            <div class="info"><label for="">Tipo de Registro:</label></div>
                            <div class="inputcadastro">
                                <select id="sel" name="tipo_de_conta">
                                    <option value="receita">Receita</option>
                                    <option value="despesa_fixa">Despesa Fixa</option>
                                    <option value="despesa_variavel">Despesa Variável</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="marge">
                    <input class="final" type="submit" name="cad-conta" value="Cadastrar" />
                </div>
            </form>
        </div>

    </div>