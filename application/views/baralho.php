<?php $this->load->view('commons/header'); ?>

<style type="text/css" media="screen">
</style>

<div class="container">
    <?php if ($error): ?>
        <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <form action="<?php echo base_url('salvar-baralho') ?>" method="POST">
                <input type="hidden" name="id" id="id" value="<?php echo $baralho->id ?>">
                <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $baralho->usuario_id ?>">
                <h3><?php echo $title ?> Baralho</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome" class="col-sm-12 control-label">Nome:</label>
                            <div class="col-sm-12">
                                <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $baralho->nome ?>" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tema_id" class="col-sm-12 control-label">Tema:</label>
                            <div class="col-sm-12">
                                <select name="tema_id" id="tema_id" class="form-control chosen-select" required>
                                    <option value="">Selecione</option>
                                    <?php foreach ($temas as $tema): ?>
                                        <?php if ($tema->id == $baralho->tema_id): ?>
                                            <option value="<?php echo $tema->id ?>" selected><?php echo $tema->nome ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $tema->id ?>"><?php echo $tema->nome ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descricao" class="col-sm-12 control-label">Descrição:</label>
                            <div class="col-sm-12">
                                <textarea name="descricao" id="descricao" class="form-control" rows="3" required><?php echo $baralho->descricao ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="publico" class="col-sm-12 control-label">Baralho Publico?</label>
                            <div class="col-sm-12">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="publico" id="publico" value="1" <?php echo ($baralho->publico ? 'checked' : '') ?>>
                                        Sim
                                    </label>
                                    <label>
                                        <input type="radio" name="publico" id="publico" value="0" <?php echo (!$baralho->publico ? 'checked' : '') ?>>
                                        Não
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="revisao_facil" class="col-sm-12 control-label">Dias Revisão - Facil?</label>
                            <div class="col-sm-12">
                                <input type="number" name="revisao_facil" id="revisao_facil" class="form-control" value="<?php echo $baralho->revisao_facil ?>" min="1" max="365" step="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="revisao_bom" class="col-sm-12 control-label">Dias Revisão - Bom?</label>
                            <div class="col-sm-12">
                                <input type="number" name="revisao_bom" id="revisao_bom" class="form-control" value="<?php echo $baralho->revisao_bom ?>" min="1" max="365" step="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="revisao_dificil" class="col-sm-12 control-label">Dias Revisão - Dificil?</label>
                            <div class="col-sm-12">
                                <input type="number" name="revisao_dificil" id="revisao_dificil" class="form-control" value="<?php echo $baralho->revisao_dificil ?>" min="1" max="365" step="1" required>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url('meus-baralhos') ?>" class="btn btn-default right" style="margin-left: 10px;">Voltar</a>
                        <button type="submit" class="btn btn-primary right"><?php echo $title ?> Baralho</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>