<div class="segura_tabela">
    <div class="registros">
        <div class="navegacao">
            <form class="tipo" action="#" method="get">
                <div class="nome_da_pagina" <?php echo basename($_SERVER['SCRIPT_NAME']) == 'receitas.php' ? "id='pag-ativa'" : ""; ?>>
                    <?php echo "<a href='receitas.php'>"; ?>
                    <input name="pagina" type="button" value="Receita"<?php echo basename($_SERVER['SCRIPT_NAME']) == 'receitas.php' ? "id='pag-ativa'" : ""; ?>/>
                    <?php echo "</a>"; ?>
                </div>
                <div class="nome_da_pagina" <?php echo basename($_SERVER['SCRIPT_NAME']) == 'despesaf.php' ? "id='pag-ativa2'" : ""; ?>>
                    <?php echo "<a href='despesaf.php'>"; ?>
                    <input name="pagina" type="button" value="Despesa Fixa" <?php echo basename($_SERVER['SCRIPT_NAME']) == 'despesaf.php' ? "id='pag-ativa2'" : ""; ?>/>
                    <?php echo "</a>"; ?>
                </div>
                <div class="nome_da_pagina" <?php echo basename($_SERVER['SCRIPT_NAME']) == 'despesav.php' ? "id='pag-ativa3'" : ""; ?>>
                    <?php echo "<a href='despesav.php'>"; ?>
                    <input name="pagina" type="button" value="Despesa Variável" <?php echo basename($_SERVER['SCRIPT_NAME']) == 'despesav.php' ? "id='pag-ativa3'" : ""; ?>/>
                    <?php echo "</a>"; ?>
                </div>
                <div class="nome_da_pagina" <?php echo basename($_SERVER['SCRIPT_NAME']) == 'clientes.php' ? "id='pag-ativa4'" : ""; ?>>
                    <?php echo "<a href='clientes.php'>"; ?>
                    <input name="pagina" type="button" value="Clientes" <?php echo basename($_SERVER['SCRIPT_NAME']) == 'clientes.php' ? "id='pag-ativa4'" : ""; ?>/>
                    <?php echo "</a>"; ?>
                </div>
            </form>
        </div>

        <?php include_once('includes/contas.php'); ?>
    </div>
</div>
<script>
    
</script>