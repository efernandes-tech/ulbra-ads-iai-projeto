<?php $this->load->view('commons/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Temas</h3>
            <?php $t = null; ?>
            <?php foreach ($temas as $tema): ?>
                <?php $t = ($tema->id == $id ? $tema : $t); ?>
                <div class="col-md-2">
                    <a href="<?php echo base_url('tema/'.$tema->id) ?>" class="no-link-decoration">
                        <div class="panel panel-default" style="background: <?php echo ($tema->id == $id ? $tema->bg_color : '000000'); ?>">
                            <div class="panel-body text-center">
                                <img src="<?php echo base_url('assets/img/'.$tema->icon.'-24.png') ?>">
                                &nbsp;
                                <?php echo $tema->nome ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
        <?php if ($id): ?>
            <div class="col-md-12">
                <h3>Baralhos<?php echo ($t ? ' de '.$t->nome : '') ?></h3>
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
                                        <a href="<?php echo base_url('jogo/'.$baralho->id) ?>" class="btn btn-info">
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