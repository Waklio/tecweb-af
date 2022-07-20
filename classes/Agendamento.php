<?php
include("../classes/Conexao.php");
include("../classes/Utilidades.php");
class Agendamento
{
        // atributos e o nome da tabela configurada 
    private $table = "agendamentos";

    private $nome;
    private $email;
    private $nomeDoPet;
    private $tipoDoPet;
    private $cpf;
    private $dataHora;

    private $id;
    private $utilidades;
    public $retornoBD;
    public $conexaoBD;



    public function __construct($nome = null, $email= null, $nomeDoPet = null, $tipoDoPet = null, $cpf = null,  $dataHora = null)
    {
        $objConexao = new Conexao();
        $this->conexaoBD = $objConexao->getConexao();
        $this->utilidades = new Utilidades();

        $this->nome = $nome;
        $this->email = $email;
        $this->nomeDoPet = $nomeDoPet;
        $this->tipoDoPet = $tipoDoPet;
        $this->cpf = $cpf;
        $this->dataHora = $dataHora;
    }
        // lidar com atributos 
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        return $this->nome = $nome;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function getNomeDoPet()
    {
        return $this->nomeDoPet;
    }

    public function setNomeDoPet($nomeDoPet)
    {
        return $this->nomeDoPet = $nomeDoPet;
    }

    public function getTipoDoPet()
    {
        return $this->tipoDoPet;
    }

    public function setTipoDoPet($tipoDoPet)
    {
        return $this->tipoDoPet = $tipoDoPet;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        return $this->cpf = $cpf;
    }

    public function getDataHora()
    {
        return $this->dataHora;
    }

    public function setDataHora($dataHora)
    {
        return $this->dataHora = $dataHora;
    }
        // fucnçoes crudo, usamos e selecionar agendamentos 
    public function cadastrar()
    {

        if ($this->getDataHora() != null) {
            $this->selecionarPorDataHora($this->getDataHora());
            if ($this->retornoBD->num_rows == 0){

                $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO $this->table (nome_cliente, email_cliente, nome_do_pet, tipo_do_pet, cpf_cliente, data_hora) 
                VALUES (?, ?, ?, ?, ?, ?)");
                $interacaoMySql->bind_param('ssssss', $this->nome, $this->email, $this->nomeDoPet, $this->tipoDoPet,$this->cpf, $this->dataHora);
                $retorno = $interacaoMySql->execute();
    
                $id = mysqli_insert_id($this->conexaoBD);
    
                return $this->utilidades->validaRedirecionar($retorno, $id, "visualizarAgendamentos.php?rota=visualizar_agendamentos", "O agendamento foi cadastrado com sucesso!");

            }else{

                return $this->utilidades->mesagemParaUsuario("Erro, Horário indisponível!");
        
            }

        } else {
            return $this->utilidades->mesagemParaUsuario("Erro, cadastro não realizado!Data e Hora não informado.");
        }
    }


    public function editar()
    {

        if ($this->getId() != null) {

            $interacaoMySql = $this->conexaoBD->prepare("UPDATE  $this->table set  nome_cliente=?, email_cliente=?, nome_do_pet=?, tipo_do_pet=?, data_hora=?
        where id=?");
            $interacaoMySql->bind_param('sssi',$this->getNome(), $this->getEmail(), $this->getNomeDoPet(), $this->getTipoDoPet(), $this->getDataHora(), $this->getId());
            $retorno = $interacaoMySql->execute();
            if ($retorno === false) {
                trigger_error($this->conexaoBD->error, E_USER_ERROR);
            }

            $id = mysqli_insert_id($this->conexaoBD);

            return $this->utilidades->validaRedirecionar($retorno, $this->getId(), "admin.php?rota=visualizar_agendamentos", "Os dados do agendamento foram alterados com sucesso!");
        } else {
            return $this->utilidades->mesagemParaUsuario("Erro! Não foi possível encontrar o agendamento.");
        }
    }

    public function selecionarPorId($id)
    {
        $sql = "select * from $this->table where id_cliente=$id";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }
                // retorna todos agendamentos cadastrado no istema 
    public function selecionarAgendamentos()
    {
        $sql = "select * from  $this->table order by data_hora DESC";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }

    public function deletar($id)
    {
        $sql = "DELETE from $this->table where id=$id";
        $this->retornoBD = $this->conexaoBD->query($sql);
        $this->utilidades->validaRedirecionaAcaoDeletar($this->retornoBD, 'admin.php?rota=visualizar_agendamnetos', 'O agendamento foi deletado com sucesso!');
    }

    public function selecionarPorDataHora($dataHora)
    {
        $sql = "select * from $this->table where data_hora='$dataHora'";
        $this->retornoBD = $this->conexaoBD->query($sql);
    }

}
