	$(".select2-search__field").keyup(function(){
		alert("called");
		// var search_term = $(this).val();
		// var supplier_id = $("#supplier_id").val(); 
		// $(".select2-select2-customize-result-results-results__options").empty();
		// if(search_term.length > 2){
		// 	var token =  $('input[name="_csrfToken"]').val();
		// 	$.ajax({
		//        url : ROOT_DIREC+'/products/search',
		//        type : 'POST',
		//        data : {search : search_term, supplier : supplier_id},
		//        dataType : 'json',
		//        headers : {
	 //                'X-CSRF-Token': token 
	 //            },
		//        success : function(data, statut){
		//        	for (var i = 0; i < data.length; i++) {
		//        		append = '<li class="select2-results__option select2-results__option--highlighted" id="select2-select2-customize-result-result-bsu5-test" role="option" aria-selected="true" data-select2-id="select2-select2-customize-result-result-bsu5-test">'+data[i].barcode+" - "+data[i].name+'</li>'
		//        		$("#select2-select2-customize-result-results").append($append);
		//        	}

		//        },

		//        error : function(resultat, statut, erreur){
		//        	console.log(resultat); 
		//        	console.log(erreur);
		//        },	

		//        complete : function(resultat, statut){

		//        }
		//     });
		// }else{
		// 	$(".select2-select2-customize-result-results-results__options").empty();
		// }
	});