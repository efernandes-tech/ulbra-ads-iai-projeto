<?php $this->load->view('commons/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Temas</h3>
            <?php $t = null; ?>
            <?php foreach ($temas as $row): ?>
                <div class="col-md-2">
                    <a href="<?php echo base_url('tema/'.$row->id) ?>" class="no-link-decoration">
                        <div class="panel panel-default" style="background: <?php echo ($row->id == $tema->id ? $row->bg_color : '000000'); ?>">
                            <div class="panel-body text-center">
                                <img src="<?php echo base_url('assets/img/'.$row->icon.'-24.png') ?>">
                                &nbsp;
                                <?php echo $row->nome ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
        <?php if ($tema->id): ?>
            <div class="col-md-12">
                <h3>Baralhos Públicos <?php echo ($tema ? ' de '.$tema->nome : '') ?></h3>
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
                                            Jogo da Memória
                                            &nbsp;
                                            <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
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