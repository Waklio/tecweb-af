<?php include "../classes/Agendamento.php"?>
<!DOCTYPE html>
<html lang="en">
            <!-- php e html  -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agendar Consulta</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover mt-5">
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Nome do cliente</th>
                        <th width="25%">Email do cliente</th>
                        <th width="25%">Nome do Pet</th>
                        <th width="25%">Tipo de Pet</th>
                        <th width="25%">CPF do Cliente</th>
                        <th width="30%">Data e hora</th>
                    </tr>
                    <?php
                    $agendamentos = new Agendamento;
                    $agendamentos->selecionarAgendamentos();
                        // mostrar informações, verifica se tem agendamentos. monta e printa.
                    if ($agendamentos-> retornoBD != null):
                        while($agendamento = $agendamentos->retornoBD->fetch_object()):
                            $html = "";
                            $html .= "<tr>";
                            $html .= "<td>$agendamento->id</td>";
                            $html .= "<td>$agendamento->nome_cliente</td>";
                            $html .= "<td>$agendamento->email_cliente</td>";
                            $html .= "<td>$agendamento->nome_do_pet</td>";
                            $html .= "<td>$agendamento->tipo_do_pet</td>";
                            $html .= "<td>$agendamento->cpf_cliente</td>";
                            $html .= "<td>$agendamento->data_hora</td>";
                            $html .= "</tr>";
                            
                            echo $html;
                            
                        endwhile;
                    endif;
                    ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>