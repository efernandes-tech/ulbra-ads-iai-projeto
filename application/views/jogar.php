<?php $this->load->view('commons/header'); ?>

<input type="hidden" id="baralho_id" value="<?php echo $baralho->id ?>">

<style type="text/css" media="screen">
.carta {
    width: 200px;
    height: 200px;
    border: 0.5px solid black;
    margin: 10px;
    box-sizing: border-box;
    background-image: url(<?php echo base_url('assets/img/quadro-200.png') ?>);
    background-size: cover;
    text-align: center;
}
.texto {
    font-family: sans-serif;
    color: white;
    font-size: 20px;
    width: 180px;
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
.front, .back {
    width: 200px;
    height: 200px;
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
                        <td class="text-center" width="18.3%">
                            <span id="cronometro">00:05:00</span>
                        </td>
                        <th scope="row" width="15%">Pontos</th>
                        <td class="text-center" width="18.3%">
                            <span id="pontos">0</span>
                        </td>
                        <th scope="row" width="15%">Combinações</th>
                        <td class="text-center" width="18.3%">
                            <span id="contComb">0</span> / <span id="totalComb"><?php echo $totalComb ?></span>
                        </td>
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
                &nbsp;
            </div>
            <div class="back container-flex">
                <span class="texto"><?php echo $carta->conteudo ?></span>
            </div>
        </div>
    <?php endforeach ?>
</div>

<div class="row">
    <div class="col-md-12 text-center">
        <hr>
        <a href="<?php echo base_url('jogo/'.$baralho->id) ?>" class="btn btn-warning">
            Sair do Jogo
            &nbsp;
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </a>
        <hr>
    </div>
</div>

<script type="text/javascript">
var cronometro = null;

function confereCartas() {
    let cartas = $('.desvirada');

    if (cartas.length == 2) {
        let cartaA = $(cartas[0]);
        let cartaB = $(cartas[1]);

        if (cartaA.attr('data-carta_id') != cartaB.attr('data-carta_id')) {
            $('.desvirada').css({
                transform: ''
            });
            $('.desvirada').addClass('virada');
            $('.desvirada').removeClass('desvirada');
        } else {
            let tempo = $('#cronometro').html();
            tempo = tempo.split(':');
            let h = parseInt(tempo[0]);
            let m = parseInt(tempo[1]);
            let s = parseInt(tempo[2]);
            let seg = (h * 60 * 60) + (m * 60) + (s);

            let pts = parseInt($("#pontos").html());
            pts += seg;
            $("#pontos").html(pts);

            cartaA.removeClass('desvirada');
            cartaA.addClass('block');
            cartaB.removeClass('desvirada');
            cartaB.addClass('block');

            let contComb = parseInt($("#contComb").html());
            let totalComb = parseInt($("#totalComb").html());

            $('#contComb').html(++contComb);

            if (contComb == totalComb) {
                alert('Parabéns, você fez ' + pts + ' pontos!');
                clearInterval(cronometro);
                window.location.href = $('base').attr('href') + 'jogo/' + $("#baralho_id").val();
            }
        }
    }
}

function iniciarCronometro() {
    let tempo = $('#cronometro').html();
    tempo = tempo.split(':');
    let h = parseInt(tempo[0]);
    let m = parseInt(tempo[1]);
    let s = parseInt(tempo[2]);
    s--;
    if (s < 0) {
        m--;
        s = 59;
    }
    if (m < 0) {
        h--;
        m = 59;
    }
    if (h < 0) {
        alert('Game Over!');
        clearInterval(cronometro);
        window.location.href = $('base').attr('href') + 'jogo/' + $("#baralho_id").val();
    } else {
        h = ('00' + h).slice(-2);
        m = ('00' + m).slice(-2);
        s = ('00' + s).slice(-2);
        console.log(h + ':' + m + ':' + s)
        $('#cronometro').html(h + ':' + m + ':' + s);
    }
}

$(document).ready(function() {

    $(document).on('click', '.carta', function(event) {
        event.preventDefault();
        let cartas = $('.desvirada');
        if (cartas.length == 2) {
            return false;
        }
        if ($(this).hasClass('virada')) {
            $(this).css({
                transform: 'rotateY(180deg)'
            });
            $(this).addClass('desvirada');
            $(this).removeClass('virada');
        }
        setTimeout(function() { confereCartas() }, 1000 * 3);
    });

    cronometro = setInterval(iniciarCronometro, 1000);

});
</script>

<?php $this->load->view('commons/footer'); ?>