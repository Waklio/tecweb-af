<?php
include "../classes/Agendamento.php";

/**
 * receber os dados de formulário
 */

if (isset($_POST["formAgendar"])) {
    $nome = isset($_POST["nome"]) ? $_POST["nome"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $nomeDoPet = isset($_POST["nome_do_pet"]) ? $_POST["nome_do_pet"] : '';
    $tipoDoPet = isset($_POST["tipo_do_pet"]) ? $_POST["tipo_do_pet"] : '';
    $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : '';
    $dataHora = isset($_POST["data_hora"]) ? $_POST["data_hora"] : '';
    // verifica se todas informações foram recebidas.... 
    if ($nome && $email && $nomeDoPet && $tipoDoPet && $cpf && $dataHora) {
        $agendamento = new Agendamento($nome, $email, $nomeDoPet, $tipoDoPet, $cpf,  $dataHora);
        // realiza cadastro
        $agendamento->cadastrar();
        // redireciona para visualizar agendamentos 
        $link = "visualizarAgendamentos.php";
        echo " <script>document.location.href='$link'</script>";
    } else {
        // manda para de agendar caso as informações n tenha sido recebidas 
        $link = "agendar.php";
        echo " <script>document.location.href='$link'</script>";
    }
} else {
    // caso n tenha sido recebido o formulario
    $link = "agendar.php";
    echo " <script>document.location.href='$link'</script>";
}
