<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php'; ?>
    <title>Nova Ordem de Serviço</title>
</head>

<body>
    <header>

    </header>
    <?php include_once '_parts/_header.php'; ?>
    <div class="container mt-3">
        <?php
        spl_autoload_register(function($class) {
        require_once "./Classes/{$class}.class.php";
        })

        ?>
     <form action=" <?php htmlspecialchars($_Server['php_self']) ?>" method="post">

      <div class="row">

        <div class="col-md-2">

          <label for="txtNumero" class = "form-label">Nº Ordem de serviço</label>
          <input type="text" name="txtNumero" id="txtNumero" readonly class="form-contol">

        </div>
        <div class="col-md-2">
            <label for="txtData" class = "form-label"> Data</label>
            <input type="date" name="txtData" id="txtData" value = "<?php  echo date('Y-m-d') ?> " class="form-contol">
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
            <label for="sltCliente" class = "form-label"></label>
            <select name="sltCliente" id="sltCliente" class="form-select">

            <?php
                        $cliente = new Cliente();
                        $rows = $cliente->listaOrdenada('nomeCliente');
                        while($row = $row->fetch_object()){
                            ?>
                            <option value="<?php echo $row->idCliente ?>"><?php echo $row->nomeCliente ?></option>
                            <?php
                        }
                      ?>  
                    
                    </select>
                </div>
            </div>
            <div class="row">
                <table>
                    <thead>
                        <th>#</th>
                        <th>Serviço</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    
    <?php include '_parts/_linkJS.php'; ?>
</body>
</html>