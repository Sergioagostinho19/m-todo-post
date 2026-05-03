<?php
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ambiente = $_POST['ambiente'];

    switch ($ambiente) {

        case "residencial":
            $resultado = "
                <p><strong>Ambiente:</strong> Residencial</p>
                <p><strong>Equipamento:</strong> Roteador Wireless (SOHO)</p>
                <p>Ideal para conectar smartphones, TVs e notebooks.</p>
            ";
            break;

        case "escritorio":
            $resultado = "
                <p><strong>Ambiente:</strong> Pequeno Escritório</p>
                <p><strong>Equipamento:</strong> Switch Gerenciável de 24 Portas</p>
                <p>Garante estabilidade e segurança na rede local.</p>
            ";
            break;

        case "datacenter":
            $resultado = "
                <p><strong>Ambiente:</strong> Datacenter</p>
                <p><strong>Equipamento:</strong> Roteador de Borda + Switch Layer 3</p>
                <p>Alta capacidade para grande tráfego e roteamento avançado.</p>
            ";
            break;

        default:
            $resultado = "<p style='color:red;'><strong>Erro:</strong> Ambiente não reconhecido.</p>";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recomendador de Rede</title>

    <style>
        body {
            font-family: Arial;
            background: #020617;
            color: #22c55e;
            text-align: center;
            padding: 50px;
        }

        .box {
            background: #000;
            border: 1px solid #22c55e;
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
        }

        select, button {
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
            border: none;
        }

        button {
            background: #22c55e;
            color: #000;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #16a34a;
        }

        .resultado {
            margin-top: 20px;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="box">
        <h2>🔌 Recomendador de Equipamentos</h2>

        <form method="POST">
            <label>Selecione o ambiente:</label><br>

            <select name="ambiente" required>
                <option value="">-- Escolha --</option>
                <option value="residencial">Residencial</option>
                <option value="escritorio">Pequeno Escritório</option>
                <option value="datacenter">Datacenter</option>
            </select><br>

            <button type="submit">Recomendar</button>
        </form>

        <?php if (!empty($resultado)) { ?>
            <div class="resultado">
                <h3>💻 Resultado:</h3>
                <?php echo $resultado; ?>
            </div>
        <?php } ?>
    </div>

</body>
</html>
