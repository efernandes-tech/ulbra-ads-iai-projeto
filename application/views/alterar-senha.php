<?php $this->load->view('commons/header'); ?>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <h2 class="col-md-12">Alterar Senha</h2>
        <form action="<?php echo base_url('alterar-senha'); ?>" method="POST">
            <label class="col-md-12">
                <?php echo $usuario->email; ?>
            </label>
            <label class="col-md-12">
                <input type="password" class="form-control" placeholder="Nova Senha" name="senha" required autofocus />
            </label>
            <label class="col-md-12"><input type="submit" class="btn btn-primary btn-block" value="Alterar"/></label>
        </form>
    </div>
    <div class="col-md-4 col-md-offset-4">
        <br>
        <?php if ($error): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>