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
                    <span>1</span> / <span><?php echo count($cartas) ?></span>
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
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    
    $('.carta-frente').first().removeClass('hide');

});
</script>

<?php $this->load->view('commons/footer'); ?>