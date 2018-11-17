<?php $this->load->view('commons/header'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Meus Baralhos</h3>
            <?php if ($baralhos) { ?>
                <table class="table">
                    <?php foreach ($baralhos as $baralho): ?>
                        <tr>
                            <td><?php echo $baralho->nome ?></td>
                            <td>
                                <a href="<?php echo base_url('baralho/'.$baralho->id) ?>" target="_blank">
                                    Link
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php } else { ?>
                <p>Nenhum baralho encontrado.</p>
            <?php } ?>
        </div>
    </div>
</div>

<?php $this->load->view('commons/footer'); ?>