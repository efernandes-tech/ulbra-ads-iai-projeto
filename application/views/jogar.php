<?php $this->load->view('commons/header'); ?>

<style type="text/css" media="screen">
.carta {
    width: 100px;
    height: 100px;
    border: 1px solid black;
    box-sizing: border-box;
}

.container-flex {
    width: 100%;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
    align-content: stretch;
}

/* O container geral define a perspectiva. */
.flip-container {
    perspective: 1000;
}
/* Vira os containers frente e verso quando o mouse passa em cima. */
/*.flip-container:hover .flipper, .flip-container.hover .flipper {*/
    /*transform: rotateY(180deg);*/
/*}*/
.front, .back {
    width: 100px;
    height: 100px;
}
/* Define a velocidade da transição. */
.flipper {
    transition: 0.6s;
    transform-style: preserve-3d;
    position: relative;
}
/* Esconde o verso durante a animação. */
.front, .back {
    backface-visibility: hidden;
    position: absolute;
    top: 0;
    left: 0;
}
/* Frente posicionada sobre o verso. */
.front {
    z-index: 2;
}
/* Verso inicialmente escondido. */
.back {
    transform: rotateY(180deg);
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th colspan="6" class="text-center">Estatísticas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" width="15%">Tempo</th>
                        <td class="text-center" width="18.3%">10:00:00</td>
                        <th scope="row" width="15%">Combinações</th>
                        <td class="text-center" width="18.3%">
                            <span id="contComb">1</span> / <span id="totalComb">5</span>
                        </td>
                        <th scope="row" width="15%">Pontos</th>
                        <td class="text-center" width="18.3%">1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-flex flip-container">
    <?php foreach ($cartas as $carta): ?>
        <div class="carta flipper virada" data-carta_id="<?php echo $carta->id ?>">
            <div class="front">
                ...
            </div>
            <div class="back">
                <?php echo $carta->frente ?>
            </div>
        </div>
        <div class="carta flipper virada" data-carta_id="<?php echo $carta->id ?>">
            <div class="front">
                ...
            </div>
            <div class="back">
                <?php echo $carta->verso ?>
            </div>
        </div>
    <?php endforeach ?>
</div>

<script type="text/javascript">
function confereCartas() {
    let cartas = $('.desvirada');

    if (cartas.length == 2) {
        alert('Conferindo cartas...')
        let cartaA = $(cartas[0]);
        let cartaB = $(cartas[1]);
        // alert(cartaA.attr('data-carta_id'))
        // alert(cartaB.attr('data-carta_id'))
        if (cartaA.attr('data-carta_id') != cartaB.attr('data-carta_id')) {
            $('.desvirada').css({
                transform: ''
            });
            $('.desvirada').addClass('virada');
            $('.desvirada').removeClass('desvirada');
        } else {
            cartaA.removeClass('desvirada');
            cartaA.addClass('block');
            cartaB.removeClass('desvirada');
            cartaB.addClass('block');

            let contComb = parseInt($("#contComb").html());
            let totalComb = parseInt($("#totalComb").html());

            $('#contComb').html(contComb+1);

            if (contComb == totalComb) {
                alert('Fim...');
                window.location.reload();
            }
        }
    }
}

$(document).ready(function() {

    $(document).on('click', '.carta', function(event) {
        event.preventDefault();
        if ($(this).hasClass('virada')) {
            $(this).css({
                transform: 'rotateY(180deg)'
            });
            $(this).addClass('desvirada');
            $(this).removeClass('virada');
        // } else {
        //     $(this).css({
        //         transform: ''
        //     });
        //     $(this).removeClass('desvirada');
        //     $(this).addClass('virada');
        }
        setTimeout(function() { confereCartas() }, 600);
    });

});
</script>

<?php $this->load->view('commons/footer'); ?>