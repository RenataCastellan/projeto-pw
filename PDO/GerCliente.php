<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php'; ?>
    <title>Novo Cliente</title>
</head>

<body>
    <header>

    </header>
    <?php include_once '_parts/_header.php'; ?>

    <section class="p-5 text-center bg-light" style="margin-top: 58px;">
        <?php
        spl_autoload_register(function ($class) {
            require_once "./Classes/{$class}.class.php";
        });
        if (filter_has_var(INPUT_GET, 'id')) {
            $cliente = new Cliente();
            $id = filter_input(INPUT_GET, 'id');
            $clienteEdit = $cliente->buscar('idCliente', $id);
        }
        if (filter_has_var(INPUT_GET, 'idDel')) {
            $cliente = new Cliente();
            $id = filter_input(INPUT_GET, 'idDel');
            $cliente->deletar('idCliente', $id);
        ?>
            <script>
                window.location.href = 'clientes.php';
            </script>
        <?php

        }
        if (filter_has_var(INPUT_POST, 'btnGravar')) {
            $cliente = new Cliente();
            $id = filter_input(INPUT_POST, 'txtId');
            $cliente->setId($id);
            $cliente->setNome(filter_input(INPUT_POST, 'txtCliente'));
            $cliente->setEndereco(filter_input(INPUT_POST, 'txtEndereco'));
            $cliente->setTelefone(filter_input(INPUT_POST, 'txtTelefone'));
            $cliente->setNascimento(filter_input(INPUT_POST, 'txtNascimento'));
            
            if (empty($id)) {
                $cliente->inserir();
            } else {
                $cliente->atualizar('idCliente', $id);
            }
            
            ?>
            <script>
               window.location.href = 'clientes.php';
            </script>
            <?php

           }else{
           }
        

        ?>
        <div class="mt-3 col-4" style=" margin: 0 auto; width: 400px;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="txtId" value="<?php echo isset($clienteEdit->idCliente) ? $clienteEdit->idCliente : null ?>">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="txtCliente" name="txtCliente" placeholder="Nome do Cliente" value="<?php echo isset($clienteEdit->nomeCliente) ? $clienteEdit->nomeCliente : null ?>">
                    <label for="txtUsuario">Cliente</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" placeholder="Endereço" value="<?php echo isset($clienteEdit->enderecoCliente) ? $clienteEdit->enderecoCliente : null ?>">
                    <label for="txtEndereco">Endereço</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="Telefone" value="<?php echo isset($clienteEdit->telefoneCliente) ? $clienteEdit->telefoneCliente : null ?>">
                    <label for="txtTelefone">Telefone</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="txtNascimento" name="txtNascimento" placeholder="Data de Nascimento" value="<?php echo isset($clienteEdit->nascimentoCliente) ? $clienteEdit->nascimentoCliente : null ?>">
                    <label for="txtNascimento">Data de Nascimento</label>
                </div>

                <button type="submit" class="btn btn-primary" name="btnGravar">Salvar</button>
            </form>
        </div>
        <?php

        ?>
    </section>
    <?php include_once '_parts/_linkJS.php' ?>
</body>

</html>