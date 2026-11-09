<?php
function escapar($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= \Illuminate\Support\Facades\Vite::asset('resources/css/helpdesk.css') ?>">
    <title>Chamados</title>
</head>
<body>
    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome">

        <label>Setor da empresa:</label>
        <select name="setor" id="setor">
            <option value="producao">Produção</option>
            <option value="administrativo">Administrativo</option>
            <option value="logistica">Logística</option>
            <option value="financeiro">Financeiro</option>
            <option value="ti">TI</option>
        </select>

        <label>Equipamento afetado:</label>
        <select name="equipamento" id="equipamento">
            <option value="computador">Computador</option>
            <option value="impressora">Impressora</option>
            <option value="rede">Rede</option>
            <option value="sistema">Sistema</option>
            <option value="outro">Outro</option>
        </select>

        <label>Descrição do problema:</label>
        <textarea name="descricao"></textarea>

        <label>Prioridade:</label>
        <select name="prioridade" id="prioridade">
            <option value="baixa">Baixa</option>
            <option value="media">Média</option>
            <option value="alta">Alta</option>
        </select>

        <?= csrf_field() ?>
        <input type="hidden" name="acao" value="cadastrar">

        <button type="submit">Enviar</button>
        
        <a href="/?rota=portfolio" class="bt-voltar">Voltar ao início</a>

    </form>

    <h2>Lista Dos Chamados</h2>
    <table>
        <tbody>
            <?php foreach($chamados as $posicao => $chamado){ ?>
                <tr>
                    <td><?php echo $posicao; ?></td>
                    <td>Nome:<br> <?php echo $chamado['nome']; ?></td>
                    <td>Setor:<br> <?php echo $chamado['setor']; ?></td>
                    <td>Equipamento:<br> <?php echo $chamado['equipamento']; ?></td>
                    <td>Descrição:<br> <?php echo nl2br ($chamado['descricao']); ?></td>
                    <td>Prioridade:<br> <?php echo $chamado['prioridade']; ?></td>
                    
                    <td>
                        <form method="POST">
                            <?= csrf_field() ?>
                            <input type="hidden" name="acao" value="atualizar">
                            <input type="hidden" name="posicao" value="<?php echo $posicao; ?>">
                            
                            <select name="status">
                                <option value="Aberto" <?php if($chamado['status'] == 'Aberto') echo 'selected'; ?>>Aberto</option>
                                <option value="Em andamento" <?php if($chamado['status'] == 'Em andamento') echo 'selected'; ?>>Em andamento</option>
                                <option value="Resolvido" <?php if($chamado['status'] == 'Resolvido') echo 'selected'; ?>>Resolvido</option>
                            </select>
                            <button type="submit">OK</button>
                        </form>
                    </td>

                    <td>
                        <form method="POST">
                            <?= csrf_field() ?>
                            <input type="hidden" name="acao" value="excluir">
                            <input type="hidden" name="posicao" value="<?php echo $posicao; ?>">
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>  

    <div>
        <h3>Relatório de Atendimentos</h3>
        <p>Total de chamados: <?php echo $relatorio["total"]; ?></p>
        <p>Abertos: <?php echo $relatorio["abertos"]; ?></p>
        <p>Em andamento: <?php echo $relatorio["andamento"]; ?></p>
        <p>Resolvido: <?php echo $relatorio["resolvidos"]; ?></p>
    </div>


</body>
</html>


