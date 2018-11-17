<?php $this->load->view('commons/header'); ?>

<style type="text/css" media="screen">
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <form action="<?php echo base_url('salvar-baralho') ?>" method="POST">
                <h3><?php echo $title ?> Baralho</h3>
                <div class="row">
                    <div class="col-md-3">
                        <label for="nome">Nome</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $baralho->nome ?>" required autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary right"><?php echo $title ?> Baralho</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>