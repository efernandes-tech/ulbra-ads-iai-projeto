<?php $this->load->view('commons/header'); ?>

<style type="text/css" media="screen">
</style>

<div class="container">
    <?php if ($error): ?>
        <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <form action="<?php echo base_url('salvar-carta') ?>" method="POST">
                <input type="hidden" name="id" id="id" value="<?php echo $carta->id ?>">
                <input type="hidden" name="baralho_id" id="baralho_id" value="<?php echo $carta->baralho_id ?>">
                <h3><?php echo $title ?> Baralho</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="frente" class="col-sm-12 control-label">Frente:</label>
                            <div class="col-sm-12">
                                <textarea name="frente" id="frente" class="form-control" rows="3" required><?php echo $carta->frente ?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="verso" class="col-sm-12 control-label">Verso:</label>
                            <div class="col-sm-12">
                                <textarea name="verso" id="verso" class="form-control" rows="3" required><?php echo $carta->verso ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary right"><?php echo $title ?> Carta</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>