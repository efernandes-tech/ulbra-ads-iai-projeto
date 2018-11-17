<?php $this->load->view('commons/header'); ?>

<style type="text/css" media="screen">
.btnMais {
    margin-left: 10px;
}
</style>

<div class="container">
    <div class="page-header">
        <h1>Escolha um Baralho</h1>
        <p>Estude, Jogue e Divirta-se.</p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Top Baralhos</h3>
            <?php foreach ($baralhos as $baralho): ?>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $baralho->nome ?>
                            <span class="badge right"><?php echo $baralho->tema ?></span>
                        </div>
                        <div class="panel-body">
                            <p>
                                <?php echo $baralho->descricao ?>
                            </p>
                            <div class="right">
                                <a class="btn btn-primary" href="<?php echo base_url('jogo/'.$baralho->id) ?>">
                                    Jogar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Temas</h3>
            <?php foreach ($temas as $tema): ?>
                <div class="col-md-2">
                    <a href="<?php echo base_url('tema/'.$tema->id) ?>">
                        <div class="panel panel-default" style="background: <?php echo $tema->bg_color; ?>">
                            <div class="panel-body text-center">
                                <?php echo $tema->nome ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>