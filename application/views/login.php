<?php $this->load->view('commons/header'); ?>

<div class="container">
    <?php if ($error): ?>
        <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>
    <div class="col-md-4 col-md-offset-1">
        <h2 class="col-md-12">Login</h2>
        <form action="<?php echo base_url('login'); ?>" method="POST">
            <label class="col-md-12">
                <input type="text" class="hide" name="email"/>
                <input type="text" class="form-control" placeholder="Email" name="email" required autofocus/>
            </label>
            <label class="col-md-12">
                <input type="password" class="form-control" placeholder="Senha" name="senha" required/>
            </label>
            <label class="col-md-12"><input type="submit" class="btn btn-success" value="Entrar"/></label>
        </form>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <h2 class="col-md-12">Cadastre-se</h2>
        <form action="<?php echo base_url('novo-usuario'); ?>" method="POST">
            <label class="col-md-12">
                <input type="text" class="form-control" placeholder="Nome" name="nome" required/>
            </label>
            <label class="col-md-12">
                <input type="text" class="hide" name="email"/>
                <input type="text" class="form-control" placeholder="Email" name="email" required/>
            </label>
            <label class="col-md-12">
                <input type="password" class="form-control" placeholder="Senha" name="senha" required/>
            </label>
            <label class="col-md-12"><input type="submit" class="btn btn-success" value="Cadastrar"/></label>
        </form>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>