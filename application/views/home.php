<?php $this->load->view('commons/header'); ?>

<div class="container">
    <div class="page-header">
        <h1>Escolha um Baralho</h1>
        <p>Estude, Jogue e Divirta-se.</p>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Baralhos</h3>
            <?php foreach ($baralhos as $baralho): ?>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $baralho->nome ?>
                        </div>
                        <div class="panel-body">
                            <a class="btn btn-info" href="<?php echo base_url('baralho/'.$baralho->id) ?>">
                                Estudar
                            </a>
                            <a class="btn btn-primary" href="<?php echo base_url('jogar/'.$baralho->id) ?>">
                                Jogar
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>