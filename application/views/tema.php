<?php $this->load->view('commons/header'); ?>

<div class="container">
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
        <?php if ($id): ?>
            <div class="col-md-12">
                <h3>Baralhos</h3>
                <?php if ($baralhos) { ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th class="text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($baralhos as $baralho): ?>
                                <tr>
                                    <td><?php echo $baralho->nome ?></td>
                                    <td><?php echo $baralho->descricao ?></td>
                                    <td class="text-right">
                                        <a href="<?php echo base_url('jogar/'.$baralho->id) ?>" class="btn btn-info">
                                            <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p>Nenhum baralho encontrado.</p>
                <?php } ?>
            </div>
        <?php endif ?>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>