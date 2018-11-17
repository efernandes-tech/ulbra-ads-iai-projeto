<?php $this->load->view('commons/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <br>
            <a href="<?php echo base_url('baralho') ?>" class="btn btn-primary">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Adicionar Baralho
            </a>
        </div>
        <div class="col-md-12">
            <h3>Meus Baralhos</h3>
            <?php if ($baralhos) { ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tema</th>
                            <th>Descrição</th>
                            <th class="text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($baralhos as $baralho): ?>
                            <tr>
                                <td><?php echo $baralho->nome ?></td>
                                <td><?php echo $baralho->tema ?></td>
                                <td><?php echo $baralho->descricao ?></td>
                                <td class="text-right">
                                    <a href="<?php echo base_url('revisar/'.$baralho->id) ?>" class="btn btn-info">
                                        <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?php echo base_url('jogar/'.$baralho->id) ?>" class="btn btn-info">
                                        <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?php echo base_url('baralho/'.$baralho->id) ?>" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?php echo base_url('meus-baralhos') ?>" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>