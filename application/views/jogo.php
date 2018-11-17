<?php $this->load->view('commons/header'); ?>

<style type="text/css" media="screen">
.div-icon-deck {
    text-align: center;
    margin-top: 2em;
}
.icon-deck {
    font-size: 75px;
}
.div-btn-jogar {
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
                <div class="col-md-12 div-btn-jogar">
                    <a class="btn btn-primary" href="<?php echo base_url('jogar/'.$baralho->id) ?>">
                        Iniciar Jogo
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>