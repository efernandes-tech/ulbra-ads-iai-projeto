<?php $this->load->view('commons/header'); ?>

<div class="container">
    <div class="page-header">
        <h1>Escolha um Baralho</h1>
        <p>Estude, Avalie e Jogue.</p>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php foreach ($baralhos as $baralho): ?>
                <a href="<?php echo base_url('baralho/'.$baralho->id) ?>">
                    <?php echo $baralho->nome ?>
                </a>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>