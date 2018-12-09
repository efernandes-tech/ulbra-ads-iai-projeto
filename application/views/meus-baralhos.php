<?php $this->load->view('commons/header'); ?>

<style type="text/css">
form {
    margin-left: 2.5px;
}
</style>

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
                            <th class="text-right" width="23%">Ações</th>
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
                                    <a href="<?php echo base_url('jogo/'.$baralho->id) ?>" class="btn btn-info">
                                        <span class="glyphicon glyphicon-tower" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?php echo base_url('baralho/'.$baralho->id) ?>" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?php echo base_url('cartas/baralho/'.$baralho->id) ?>" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span>
                                    </a>
                                    <form action="<?php echo base_url('deletar/baralho/'.$baralho->id); ?>" method="POST" class="right">
                                        <button type="submit" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </form>
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