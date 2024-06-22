<div class="fora4">

    <?php

    foreach ($contas as $con):
        ?>
        <div class='marg'>
            <div class='fora5'>
                <div class='expor2'>
                    <div class='inforeg2'>
                        <?php echo $con->nome ?>
                    </div>
                    <div class='inforeg2'>
                        <?php echo $con->cpf_cnpj ?>
                    </div>
                    <div class='inforeg2'>
                        <?php
                        $con->vencimento = date_create($con->vencimento);
                        echo $con->vencimento = date_format($con->vencimento, 'd-m-Y');
                        ?>
                    </div>
                    <div class='inforeg2'>
                        <?php
                        if ($con->recebimento != '' && $con->recebimento != null) {
                            $con->recebimento = date_create($con->recebimento);
                            echo $con->recebimento = date_format($con->recebimento, 'd-m-Y');

                        } else {
                            echo $con->recebimento = "";
                        }
                        ?>

                    </div>
                    <div class='inforeg2'>
                        <?php echo $con->valor ?>
                    </div>
                    <div class='inforeg2'>
                        <?php echo $con->forma_pagamento ?>
                    </div>
                    <div class='inforeg2'>
                        <?php echo $con->status_pagamento ?>
                    </div>
                    <div class='inforeg2'>
                        <form method='POST'>
                            <button name="pagar-conta" class='pagar' id='pago'><input type='hidden' name='idcontapaga'
                                    value='<?php echo $con->id_contas ?>' />
                                Pago
                                <i class='fa fa-check-circle' style='font-size:15px; margin-left:5px' ;></i>
                            </button>
                        </form>
                    </div>
                    <div class='inforeg2'>
                        <form method='POST'>
                            <button name="apagar-conta" class='pagar' id='excluir'>
                                <input type='hidden' name='idcontadel' value='<?php echo $con->id_contas ?>' />
                                Excluir Registro
                                <i class='fa fa-minus-circle' style='font-size:15px; margin-left:5px' ;></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>