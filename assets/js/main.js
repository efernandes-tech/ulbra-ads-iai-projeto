$(document).ready(function() {
	console.log('Página carregada.');

    $(".chosen-select").chosen({
        disable_search_threshold: 10,
        no_results_text: "Nada foi encontrado!",
    });
});