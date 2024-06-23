<?php
include_once(__DIR__ . '/../model/conta.php');
include_once(__DIR__ . '/../controller/controller_conta.php');
$result = controller_conta::Ajuste_receita_despesa();

$maior_receita = Conta::Maior_receita_despesa_cliente("WHERE contas.tipo_de_conta = 'receita' AND contas.status_pagamento = 'pago'");
$maior_despesa = Conta::Maior_receita_despesa_cliente("WHERE contas.tipo_de_conta = 'despesa_fixa' OR contas.tipo_de_conta = 'despesa_variavel'");

$valorRe = array_column($result['receitas'], 'valor');
$valoresReceitas = implode(",", $valorRe);

$despesas = array_column($result['despesas'], 'valor');
$despesasV = implode(",", $despesas);

$meses = [
    '01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr',
    '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Aug',
    '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec'
];

$data = [];
foreach ($result['receitas'] as $resData) {
    $mesAno = explode('-', $resData['mes_ano']);
    if (count($mesAno) == 2 && array_key_exists($mesAno[1], $meses)) {
        $data[] = $meses[$mesAno[1]];
    }
}

$data = array_unique($data);
$ordemMeses = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
usort($data, function($a, $b) use ($ordemMeses) {
    return array_search($a, $ordemMeses) - array_search($b, $ordemMeses);
});

$dataF = json_encode(array_values($data));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.0/dist/echarts.min.js"></script>
</head>
<body>
    <div style="display: flex; justify-content: space-around; margin-bottom: 20px;">
        <div id="pizza-receita" style="width: 45%; height: 400px;"></div>
        <div id="pizza-despesa" style="width: 45%; height: 400px;"></div>
    </div>

    <div id="coluna" style="width: 100%; height: 600px;"></div>

    <script>
        // Configuração e dados para o gráfico de pizza - Receitas
        var chartDataReceita = <?php echo json_encode($maior_receita); ?>;
        var myChartReceita = echarts.init(document.getElementById('pizza-receita'));
        var optionReceita = {
            title: {
                text: 'Clientes que mais geraram Receita',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                top: '5%',
                left: 'center'
            },
            series: [{
                name: 'Clientes que mais geraram Receita',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: 40,
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: chartDataReceita.map(item => ({
                    value: item.total_valor,
                    name: item.nome
                })),
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    },
                    normal: {
                        color: function(params) {
                            var colorList = [
                                '#C5E1A5', '#AED581', '#9CCC65', '#8BC34A', '#7CB342'
                            ];
                            colorList.reverse();
                            return colorList[params.dataIndex % colorList.length];
                        }
                    }
                }
            }]
        };
        myChartReceita.setOption(optionReceita);

        // Configuração e dados para o gráfico de pizza - Despesas
        var chartDataDespesa = <?php echo json_encode($maior_despesa); ?>;
        var myChartDespesa = echarts.init(document.getElementById('pizza-despesa'));
        var optionDespesa = {
            title: {
                text: 'Clientes que mais geraram Despesa',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                top: '5%',
                left: 'center'
            },
            series: [{
                name: 'Clientes que mais geraram Despesa',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: 40,
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: chartDataDespesa.map(item => ({
                    value: item.total_valor,
                    name: item.nome
                })),
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    },
                    normal: {
                        color: function(params) {
                            var colorList = [
                                '#FFEBEE', '#FFCDD2', '#EF9A9A', '#E57373', '#EF5350',
                                '#F44336', '#E53935', '#D32F2F', '#C62828', '#B71C1C',
                                '#FF8A80', '#FF5252', '#FF1744', '#D50000'
                            ];
                            var max = Math.max.apply(null, chartDataDespesa.map(item => item.total_valor));
                            var min = Math.min.apply(null, chartDataDespesa.map(item => item.total_valor));
                            var normalizedValue = (params.data.value - min) / (max - min);
                            var colorIndex = Math.floor(normalizedValue * (colorList.length - 1));
                            return colorList[colorIndex];
                        }
                    }
                }
            }]
        };
        myChartDespesa.setOption(optionDespesa);

        // Configuração e dados para o gráfico de colunas (Receitas e Despesas)
        var myChartColuna = echarts.init(document.getElementById('coluna'));
        var optionColuna = {
            title: {
                text: 'Mapa de Receitas e Despesas',
                subtext: 'Dados Ilustrativos',
                left: 'center'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['Receita', 'Despesas'],
                top: 'bottom'
            },
            xAxis: {
                type: 'category',
                data: <?php echo $dataF; ?>
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name: 'Receita',
                    type: 'bar',
                    data: <?php echo json_encode($valorRe); ?>,
                    itemStyle: {
                        color: '#91CC75' // Cor para Receitas
                    }
                },
                {
                    name: 'Despesas',
                    type: 'bar',
                    data: <?php echo json_encode($despesas); ?>,
                    itemStyle: {
                        color: '#d69191' // Cor para Despesas
                    }
                }
            ]
        };
        myChartColuna.setOption(optionColuna);
    </script>
</body>
</html>
