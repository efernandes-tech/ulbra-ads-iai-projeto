<?php $this->load->view('commons/header'); ?>

<style type="text/css" media="screen">
.div-revisao {
    margin-top: 15px;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo $baralho->nome ?></h3>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th colspan="6" class="text-center">Estatísticas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" width="20%">Total de Cartas</th>
                                <td class="text-center">1</td>
                                <th scope="row" width="20%">Cartas para Revisar</th>
                                <td class="text-center">1</td>
                                <th scope="row" width="20%">Cartas Novas</th>
                                <td class="text-center">1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <span id="contCartas">1</span> / <span id="totalCartas"><?php echo count($cartas) ?></span>
                </div>
            </div>
            <div class="row div-revisao">
                <div class="col-md-12">
                    <?php foreach ($cartas as $carta): ?>
                        <div class="carta" data-carta-id="<?php echo $carta->id ?>">
                            <div class="panel panel-default hide carta-frente">
                                <div class="panel-body">
                                    <?php echo $carta->frente ?>
                                </div>
                            </div>
                            <div class="panel panel-default hide carta-verso">
                                <div class="panel-body">
                                    <?php echo $carta->verso ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-default" id="btnMostrarVerso">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        Mostrar
                    </button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-default btnRevisao" data-tempo-rev="123">
                        Facil
                        <span class="badge">1 dia</span>
                    </button>
                    <button type="button" class="btn btn-default btnRevisao" data-tempo-rev="123">
                        Bom
                        <span class="badge">3 dias</span>
                    </button>
                    <button type="button" class="btn btn-default btnRevisao" data-tempo-rev="123">
                        Difícil
                        <span class="badge">7 dias</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function salvarResposta() {
    alert('Salvando...');
}
$(document).ready(function() {

    $('.carta-frente').first().removeClass('hide').parents('.carta').addClass('current');

    $('.btnRevisao').addClass('hide');

    $(document).on('click', '#btnMostrarVerso', function(event) {
        event.preventDefault();

        $(".current").find('.carta-verso').removeClass('hide');

        $("#btnMostrarVerso").addClass('hide');

        $('.btnRevisao').removeClass('hide');
    });

    $(document).on('click', '.btnRevisao', function(event) {
        event.preventDefault();

        let contCartas = parseInt($("#contCartas").html());
        let totalCartas = parseInt($("#totalCartas").html());

        salvarResposta();

        $('#contCartas').html(contCartas+1);

        $('.current').next().addClass('current');

        $('.current').first().removeClass('current').addClass('hide');

        $('.current').find('.carta-frente').removeClass('hide');

        $('.btnRevisao').addClass('hide');

        $('#btnMostrarVerso').removeClass('hide');

        if (contCartas == totalCartas) {
            alert('Fim...');
            window.location.href = $('base').attr('href') + '/meus-baralhos';
        }
    });

});
</script>

<?php $this->load->view('commons/footer'); ?>