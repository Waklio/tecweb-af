<!DOCTYPE html>
<html lang="en">

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

    <!--Agendar-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="px-3">
                    <h1 id="agenda" class="text-center  mt-5 mb-3" name="agenda">Agendar consulta</h1>

                    <form action="agendar-horario.php" method="POST">

                        <!--Nome-->

                        <div class="nome my-3">
                            <label for="nome" class="col-12"><strong>Nome</strong></label>
                            <input type="text" class="col-12" name="nome" id="nome" required>
                        </div>

                        <!--Email-->

                        <div class="email my-3">
                            <label for="email" class="col-12"><strong>E-mail</strong></label>
                            <input type="text" class="col-12" name="email" id="email" required>
                        </div>

                        <!--nome do pet-->

                        <div class="nome_do_pet my-3">
                            <label for="nome_do_pet" class="col-12"><strong>Nome do PET</strong></label>
                            <input type="text" class="col-12" name="nome_do_pet" id="nome_do_pet" required>
                        </div>

                        <!--tipo do pet-->

                        <div class="tipo_do_pet my-3">
                            <label for="tipo_do_pet" class="col-12"><strong>Tipo do Pet</strong></label>
                            <select id="tipo_do_pet" class="col-12" name="tipo_do_pet" required>
                                <option selected disabled value="">Selecione</option>
                                <option value="cachorro">Cachorro</option>
                                <option value="Gato">Gato</option>
                                <option value="Unicornio">Unicornio</option>
                                <option value="Cobra">Cobra</option>
                                <option value="passáro">Passáro</option>
                                <option value="Dragão">Dragão</option>
                            </select>
                        </div>

                        <!--cpf -->
                        <div class="cpf my-3">
                            <label for="cpf" class="col-12"><strong>CPF</strong></label>
                            <input type="text" class="col-12" name="cpf" id="cpf" required>
                        </div>

                        <!--data e hora -->

                        <div class="data_hora my-3">
                            <label for="data_hora" class="col-12">Data e Hora</label>
                            <input id="data_hora" class="col-12" type="datetime-local" name="data_hora">

                        </div>

                        <input type="hidden" name="formAgendar">

                        <!--botao-->

                        <div class="text-center my-5">
                            <button class="btn btn-primary px-5" class="col-6" type="submit" name="botao" id="botao">Enviar
                            </button>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>


</body>

</html>