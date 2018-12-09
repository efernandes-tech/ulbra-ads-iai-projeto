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
                <div class="col-md-12 text-center">
                    <br>
                    <a href="<?php echo base_url('meus-baralhos') ?>" class="btn btn-default">Voltar</a>
                </div>
                <div class="col-md-12">
                    <h3><?php echo $baralho->nome ?></h3>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="6" class="text-center">Estatísticas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" width="25%">Total de Cartas do Baralho</th>
                                <td class="text-center"><?php echo count($cartasBaralho) ?></td>
                                <th scope="row" width="25%">Cartas para Revisar</th>
                                <td class="text-center"><?php echo count($cartasRevisar) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <span id="contCartas">1</span> / <span id="totalCartas"><?php echo count($cartasRevisar) ?></span>
                </div>
            </div>
            <div class="row div-revisao">
                <div class="col-md-12">
                    <?php foreach ($cartasRevisar as $carta): ?>
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
                    <button type="button" class="btn btn-default btnRevisao" data-tempo-rev="<?php echo $baralho->revisao_facil ?>">
                        Facil
                        <span class="badge"><?php echo $baralho->revisao_facil > 1 ? $baralho->revisao_facil.' dias' : $baralho->revisao_facil.' dia' ?></span>
                    </button>
                    <button type="button" class="btn btn-default btnRevisao" data-tempo-rev="<?php echo $baralho->revisao_bom ?>">
                        Bom
                        <span class="badge"><?php echo $baralho->revisao_bom > 1 ? $baralho->revisao_bom.' dias' : $baralho->revisao_bom.' dia' ?></span>
                    </button>
                    <button type="button" class="btn btn-default btnRevisao" data-tempo-rev="<?php echo $baralho->revisao_dificil ?>">
                        Difícil
                        <span class="badge"><?php echo $baralho->revisao_dificil > 1 ? $baralho->revisao_dificil.' dias' : $baralho->revisao_dificil.' dia' ?></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function salvarResposta(carta, revisao) {
    $.ajax({
        url: 'salvar-revisao',
        type: 'POST',
        dataType: 'json',
        data: {
            carta_id: carta.attr('data-carta-id'),
            revisao: revisao.attr('data-tempo-rev')
        },
    })
    .done(function(data) {
        console.log("success");
        console.log(data);
        if (data)
            bootbox.alert("Revisão salva com sucesso!");
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
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

        salvarResposta($('.current'), $(this));

        $('#contCartas').html(contCartas+1);

        $('.current').next().addClass('current');

        $('.current').first().removeClass('current').addClass('hide');

        $('.current').find('.carta-frente').removeClass('hide');

        $('.btnRevisao').addClass('hide');

        $('#btnMostrarVerso').removeClass('hide');

        if (contCartas == totalCartas) {
            bootbox.alert({
                message: "Cartas revisadas.",
                callback: function() {
                    window.location.href = $('base').attr('href') + 'meus-baralhos';
                }
            });
        }
    });

});
</script>

<?php $this->load->view('commons/footer'); ?>