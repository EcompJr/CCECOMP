<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CCECOMP UEFS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Favicon -->
    <link rel="icon" type="images/png" sizes="32x32" href="images/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php require_once("header.php") ?>

<body>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Procedimentos e Formulários
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Procedimentos e Formulários</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-lg-12">
                <!-- Button trigger modal -->
                <h4> Matrícula WEB</h4>
                <button class="btn btn-info"type="button" data-toggle="modal" data-target="#myModal1">
                    Instruções para matrícula web
                </button>
                </br>
                </br>
                <h4> Segunda chamada</h4>
                <button class="btn btn-info"type="button" data-toggle="modal" data-target="#myModal2">
                    Procedimento de segunda chamada
                </button>
                </br>
                </br>
                <h4> Trancamento de Disciplinas e Matrícula Institucional</h4>
                <button class="btn btn-info"type="button" data-toggle="modal" data-target="#myModal3">
                    Normas para trancamento e matrícula institucional
                </button>
                </br>
                </br>
                <h4>Atividades complementares</h4>

                <p>
                    IMPORTANTE: O pedido de contagem de horas de Atividades Complementares só pode ser realizado por alunos que faltam não mais
                    que 2 semestres para conclusão do curso.
                </p>

                <a href="data/TabelaReformuladaAtividadesComplementares.pdf" class="button">Tabela reformulada</a>
                <a href="data/FormularioAtividadesComplementares.xls" class="button">Formulário para solicitação</a>

                <!-- Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Instruções para matrícula WEB</h4>
                            </div>

                            <div class="modal-body text-justify">
                                Você deve fazer sua solicitação de matrícula por meio do Portal do Aluno, observando que esta será efetivada EXCLUSIVAMENTE
                                pela WEB.</br></br>
                                <h4> <b>FASE 1 - Matrícula - (Exclusivamente via WEB) </b></h4>

                                Nesta fase você indicará a sua proposta de matrícula, ou seja, as disciplinas que você quer cursar no próximo semestre. Essa
                                proposta poderá ser posteriormente confirmada ou não a depender da disponibilidade de vagas
                                e dos critérios de matrícula estabelecidos pelo Colegiado do Curso. </br>

                                Faça sua proposta, escolhendo exatamente aquilo que deseja cursar, pois na FASE 02 e 03 NÃO será permitida a exclusão das
                                disciplinas solicitadas e confirmadas pelo sistema.</br>

                                Para registrar sua proposta de matrícula, você deve clicar em Finalizar na tela de matrícula, caso contrário sua proposta
                                de matrícula não será considerada.</br>

                                Durante o período de matrícula, você pode reabrir sua proposta de matrícula e incluir/excluir disciplinas, mas lembre de
                                finalizar novamente. Lembre de escolher somente disciplinas que irá efetivamente cursar,
                                porque após o período de matrícula não será possível excluir disciplinas.</br>

                                É importante que não deixem para fazer sua proposta de matrícula nos últimos dias para antecipar eventuais problemas.</br>

                                Após esta etapa, haverá a confirmação de vagas, e só então você saberáefetivamente quais vagas conseguiu obter.</br>

                                Se encontrarem problemas para efetuar a matrícula, nos avisem imediatamente para buscarmos resolver.</br>
                                </br>
                                <h4><b>FASE 02 – Ajuste de Matrícula - (Exclusivamente via WEB)</b></h4>

                                Nesta fase o sistema gerou a sua guia de matrícula, e caso você esteja de acordo, poderá imprimi-la nesse momento, aceitando
                                a proposta disponibilizada pelo sistema. Caso queira inserir alguma outra disciplina, então
                                fará uma nova proposta, para inclusão.</br>

                                Lembramos mais uma vez que NÃO será possível excluir as disciplinas já confirmadas na sua guia disponível na WEB.</br>
                                </br>
                                <h4><b>FASE 03 - Presencial</b></h4>

                                Nesta fase, caso ainda seja necessária a inserção de disciplinas com turmas de outros colegiados, você poderá pedir a inclusão,
                                caso tenha restado vagas.</br>
                                <br>
                                <h4><span class="label label-warning"> ATENÇÃO: </span> </h4>

                                <li> Se por qualquer motivo você não participar da FASE 01, poderá participar das FASES seguintes,
                                    contudo, não haverá mais nenhuma prioridade de vaga sobre as vagas já distribuídas, mesmo
                                    no caso dos alunos semestralizados ou formandos. </li>

                                <li> Se por qualquer motivo você não participar da FASE 01 e FASE 02, você será considerado como
                                    aluno com pendência: ALUNO NÃO MATRICULADO.</li>

                                <li> Após a confirmação da proposta para emissão da guia, não será permitida qualquer alteração
                                    da matrícula, exceto trancamento de disciplina ou de matrícula, no período fixado pelo
                                    calendário.
                                </li>

                                <li> Em qualquer uma das fases o aluno poderá acessar o sistema de matrícula a qualquer momento.
                                    A ocupação das vagas será realizada pelo sistema de matrícula ao final de cada fase,
                                    automaticamente, seguindo os critérios de prioridade para ocupação das mesmas. O momento
                                    que o sistema foi acessado não interfere na distribuição das vagas.</li>
                                </br>
                                <h4> <b>PRIORIDADE PARA OCUPAÇÃO DAS VAGAS </b> </h4>

                                Os alunos terão direito as vagas de acordo com os critérios estabelecidos pelo colegiado do curso.</br>
                                </br>
                                <h4><b>DÉBITO COM A BIBLIOTECA OU DE DOCUMENTAÇÃO</b> </h4>

                                Caso você tenha débito com a Biblioteca ou de documentos, você deverá entrar em contato com a DAA para quitar seu débito
                                de documento ou com a Biblioteca, para depois ter acesso à matrícula WEB. </br>

                                O Colegiado lembra que o sistema da biblioteca ainda não está integrado ao sistema de matrícula. Por isso, após resolver
                                seu débito com a biblioteca lembre-se de levar o comprovante fornecido pela biblioteca à
                                Divisão de Assuntos Acadêmicos para que essa quitação de débito seja lançada no sistema de
                                matrícula.
                                </br>
                                </br>
                                <h4><b>CRITÉRIOS UTILIZADOS NA MATRÍCULA WEB PELO CURSO DE ENGENHARIA DE COMPUTAÇÃO</b></h4>

                                <li> Participação do processo de demanda (independente das disciplinas escolhidas, se o aluno
                                    tem proposta enviada durante a demanda ele atende a este critério); </li>
                                <li> Formando; </li>
                                <li> Aluno Semestralizado por disciplinas obrigatórias [1]; </li>
                                <li> Escore [2]; </li>
                                <li> Ano de Ingresso; </li>
                                <li> Número de matrícula. </li>
                                </br>
                                [1] Semestralizado: considerando o maior período (semestre) da grade curricular no qual o aluno se matriculou em algum componente
                                obrigatório (módulos integrados, módulos obrigatórios, disciplinas obrigatórias, projetos
                                empreendedores, trab. de conc. de curso), o aluno estará semestralizado caso não tenha componente
                                obrigatório não cumprido em período anterior a este maior período.
                                </br>
                                [2] Cálculo do escore de Engenharia de Computação: média ponderada pela carga horária de todos os semestres, desconsiderando
                                disciplinas com trancamento militar, desconsiderando disciplinas dispensadas, considerando
                                trancamento por disciplina isolada como nota 0, considerando reprovação por falta como nota
                                0.

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Procedimento de Segunda Chamada</h4>
                            </div>
                            <div class="modal-body text-justify">
                                <div class="modal-body text-justify">

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Normas para trancamento e matrícula institucional</h4>
                        </div>
                        <div class="modal-body text-justify">
                            <div class="modal-body text-justify">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
    </script>

    <?php require_once("footer.php") ?>

</body>

</html>
