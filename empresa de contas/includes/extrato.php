<?php
include_once('controller/controller_conta.php');
?>
<div class="segura_saldo_receber">
        <div class="background_saldo_receber">
            <div class="agrupa_titulo_valor">
                <div class="titulo_valores">SALDO</div>
                <div class="valor" id="valor_saldo">R$
                    <?php
                        controller_conta::Exibe_saldo();
                    ?>
                </div>
            </div>
        </div>
        <div class="background_saldo_receber">
            <div class="agrupa_titulo_valor">
                <div class="titulo_valores">A RECEBER</div>
                <div class="valor" id="valor_receber">R$
                    <?php
                    controller_conta::Exibe_receita_pendente();
                    ?>
                </div>
            </div>
            <div class="agrupa_titulo_valor">
                <div class="titulo_valores" id="last_titulo_valores">DESPESAS</div>
                <div class="valor" id="valor_despesa">R$
                    <?php
                    controller_conta::Exibe_despesa_pendente();
                    ?>
                </div>
            </div>
        </div>
    </div>