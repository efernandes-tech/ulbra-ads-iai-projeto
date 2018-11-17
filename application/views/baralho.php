<?php $this->load->view('commons/header'); ?>

<style type="text/css" media="screen">
.div-icon-deck {
    text-align: center;
    margin-top: 2em;
}
.icon-deck {
    font-size: 75px;
}
.div-estatisticas {
    margin-top: 15px;
}
.div-btn-revisar {
    text-align: center;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-2 div-icon-deck">
                    <span class="glyphicon glyphicon-book icon-deck" aria-hidden="true"></span>
                </div>
                <div class="col-md-10">
                    <h3>
                        <?php echo $baralho->nome ?>
                    </h3>
                    <p>
                        <?php echo $baralho->descricao ?>
                    </p>
                </div>
                <div class="col-md-12 div-estatisticas">
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
                <div class="col-md-12 div-btn-revisar">
                    <a class="btn btn-primary" href="<?php echo base_url('revisar/'.$baralho->id) ?>">
                        Revisar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>