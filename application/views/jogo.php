<?php $this->load->view('commons/header'); ?>

<style type="text/css" media="screen">
.div-icon-deck {
    text-align: center;
    margin-top: 2em;
    margin-bottom: 1em;
}
.div-btn-jogar {
    text-align: center;
    margin-top: 2em;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-12 div-icon-deck">
                    <img src="<?php echo base_url('assets/img/'.$baralho->tema_icon.'-64.png') ?>">
                </div>
                <div class="col-md-12 text-center">
                    <h3><?php echo $baralho->nome ?></h3>
                </div>
                <div class="col-md-12">
                    <label>Descrição:</label>
                    <p><?php echo $baralho->descricao ?></p>
                </div>
                <div class="col-md-12 div-btn-jogar">
                    <a class="btn btn-primary" href="<?php echo base_url('jogar/'.$baralho->id) ?>">
                        Iniciar o Jogo
                        &nbsp;
                        <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="col-md-12 text-center">
                    <br>
                    <br>
                    <a href="<?php echo base_url('meus-baralhos') ?>" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>