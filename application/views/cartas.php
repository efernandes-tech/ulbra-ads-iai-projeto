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
            <a href="<?php echo base_url('carta/'.$baralho_id) ?>" class="btn btn-primary">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Adicionar Carta
            </a>
        </div>
        <div class="col-md-12">
            <h3>Cartas do Baralho</h3>
            <?php if ($cartas) { ?>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Frente</th>
                            <th>Verso</th>
                            <th class="text-right" width="23%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartas as $carta): ?>
                            <tr>
                                <td><?php echo $carta->frente ?></td>
                                <td><?php echo $carta->verso ?></td>
                                <td class="text-right">
                                    <a href="<?php echo base_url('carta/'.$baralho_id.'/'.$carta->id) ?>" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <form action="<?php echo base_url('deletar/carta/'.$carta->id); ?>" method="POST" class="right">
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
                <p>Nenhuma carta encontrada.</p>
            <?php } ?>
        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>