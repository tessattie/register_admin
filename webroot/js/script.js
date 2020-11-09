$(document).ready(function(){

	$('.zero-configuration').DataTable();

	$('.search-configuration').DataTable({
		"bPaginate": false,
	    "bLengthChange": false,
	    "bFilter": true,
	    "ordering": false,
	    "oLanguage": {
		    "sSearch": ""
		}
	});

	$('.field_edit').on('focusin', function(){
	    $(this).data('old_value', $(this).val());
	});

	$('.field_edit').change(function(){
		var previous = $(this).data('old_value');
		var value = $(this).val();
		var field = $(this).attr("name");
		var token =  $('input[name="_csrfToken"]').val();
		$.ajax({
	       url : ROOT_DIREC+'/configurations/update',
	       type : 'POST',
	       data : {old_value : previous, new_value : value, field_name : field},
	       dataType : 'text',
	       headers : {
                'X-CSRF-Token': token 
            },
	       success : function(data, statut){
	       	console.log(data);
	       },

	       error : function(resultat, statut, erreur){
	       	console.log(resultat)
	       },	

	       complete : function(resultat, statut){

	       }
	    });
	})


    $('#file').change(function(){
        $(this).parent().parent().find('label.label-file').html($(this).val());
    })

    $('#featured_image').change(function(){
        $(this).parent().parent().find('label.label-file').html($(this).val());
    })

    $('.inputFile').change(function(){
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $(this).parent().find(".thumbnailImg").attr('src',tmppath);
    });


    $(".name_search").change(function(){
    	var name = $(this).val();
    	if(name != ""){
    		$(".barcode_search").val("");
    	}
    })

    $(".barcode_search").change(function(){
    	var barcode = $(this).val();
    	if(barcode != ""){
    		$(".name_search").val("");
    	}
    });

    $(".show_search_modal").click(function(){
        $("#animation").modal("show");
        $("#focus_input").focus();
    })
})