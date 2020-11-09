$(document).ready(function(){
	$(".edit_product").change(function(){
   		update_costs();
	})

	$(".remove_product").click(function(){
		$(this).parent().remove();
		update_costs();
	})

	$('form input').keydown(function (e) {
	    if (e.keyCode == 13) {
	        e.preventDefault();
	        return false;
	    }
	});

	var elements = parseInt($('#product_append tr').length);
	if(elements > 0){
		$(".fill_before").each(function(){
			$(this).attr("readonly", true);
		})
	}else{
		$(".fill_before").each(function(){
			$(this).attr("readonly", false);
		})
	}

	update_costs();
	function update_costs(){
		var grand_total  = 0;
		$("#product_append").find("tr").each(function(){
			var cost = parseFloat($(this).find(".product_cost input").val());
			var quantity = parseFloat($(this).find(".product_real_quantity input").val());
			var total = cost*quantity;
			grand_total = grand_total + total;
			$(this).find(".product_total span").text(total.toFixed(2));
		});
		$("#grand_total").text(grand_total.toFixed(2)); 
		var elements = parseInt($('#product_append tr').length);
		if(elements > 0){
			$(".fill_before").each(function(){
				$(this).attr("readonly", true);
			})
		}else{
			$(".fill_before").each(function(){
				$(this).attr("readonly", false);
			})
		}
	}

	$(".focus_modal_search").click(function(){
		$('#suppliers').modal('show');
		$('div#DataTables_Table_0_filter input').focus();
	});

	$("#code").focus();
	$("#code").select();

	$('#product_search').on('select2:select', function (e) {
		var data = e.params.data;
		var rate_id = $("#rate-id").val();
		var daily_rate = $("#purchase-rate").val();
		var token =  $('input[name="_csrfToken"]').val();
		$.ajax({
	       url : ROOT_DIREC+'/products/get',
	       type : 'POST',
	       data : {search : data.id, rate : rate_id, purchase_rate : daily_rate},
	       dataType : 'json',
	       headers : {
                'X-CSRF-Token': token 
            },
	       success : function(data, statut){
	       	console.log(data);
	       	var elements = parseInt($('#product_append tr').length) + 1;
	       	var id = 'prd_'+elements;
	       	if(rate_id != data.rate_id){
	       		if(rate_id == 1){
	       			var cost = parseFloat(data.cost)*parseFloat(daily_rate);
	       		}else{
	       			var cost = parseFloat(data.cost)/parseFloat(daily_rate);
	       		}
	       	}else{
	       		var cost = data.cost;
	       	}
	       	var append = '<tr class="product_element" id="'+data.id+'"><td class="remove_product text-center"><input name="id[]" type="hidden" value=""><input name="product_id[]" type="hidden" value="'+data.id+'"><i class="feather icon-trash"></i></td><td class="product_name">' + data.barcode + ' - ' + data.name + '</td><td class="product_quantity"><input name="quantity[]" value="1" class="form-control edit_product"></td> <td class="product_cost"><input name="cost[]" value="'+cost+'" class="form-control edit_product"></td><td class="text-right product_total"><span class="total">'+cost+'</span></td></tr>';
	       	var exists = $("#"+data.id); 
	       	if(exists.attr('class') == 'product_element'){
	       		// augment quantity
	       		var quantity = parseFloat(exists.find(".product_real_quantity input").val()) + 1;
	       		exists.find(".product_real_quantity input").val(quantity);
	       		update_costs();

	       	}else{
	       		$("#product_append").append(append);
	       		update_costs();
	       	}
	       	// $("#"+data.id).find(".product_quantity input").focus();
	       	// $("#"+data.id).find(".product_quantity input").select();
	       	$(".edit_product").change(function(){
	       		update_costs();
			})

			$(".remove_product").click(function(){
				$(this).parent().remove();
				update_costs();
			})

			$('form input').keydown(function (e) {
			    if (e.keyCode == 13) {
			        e.preventDefault();
			        return false;
			    }
			});

	       },
	       error : function(resultat, statut, erreur){
	       	console.log(resultat); 
	       	console.log(erreur);
	       },	
	       complete : function(resultat, statut){

	       }
	    });

	});

	$("#rate-id").change(function(){
		var rate_id = $(this).val();
		var daily_rate = parseFloat($("#purchase-rate").val());
		var grand_total = 0;
		$(".rate").text($(this).find("option:selected").text());
		$("#product_append").find("tr").each(function(){
			var cost = parseFloat($(this).find(".product_cost input").val());
			if(rate_id == 1){
				cost = cost*daily_rate;
			}else{
				cost = cost/daily_rate;
			}
			
			var quantity = parseFloat($(this).find(".product_quantity input").val());
			var total = cost*quantity;
			grand_total = grand_total + total;
			grand_total = parseFloat(grand_total);
			$(this).find(".product_total span").text(total.toFixed(2));
			$(this).find(".product_cost input").val(cost);
		});
		$("#grand_total").text(grand_total.toFixed(2));
	})

	$('form input').keydown(function (e) {
	    if (e.keyCode == 13) {
	        e.preventDefault();
	        return false;
	    }
	});

})

$(document).scannerDetection({
    timeBeforeScanTest: 200, // wait for the next character for upto 200ms
    startChar: [120], // Prefix character for the cabled scanner (OPL6845R)
    endChar: [13], // be sure the scan is complete if key 13 (enter) is detected
    avgTimeByChar: 40, // it's not a barcode if a character takes longer than 40ms
    onComplete: function(barcode, qty){ 
    	var rate_id = $("#rate-id").val();
		var daily_rate = $("#purchase-rate").val();
    	var token =  $('input[name="_csrfToken"]').val();
    	$.ajax({
	       url : ROOT_DIREC+'/products/barcode',
	       type : 'POST',
	       data : {search : barcode},
	       dataType : 'json',
	       headers : {
                'X-CSRF-Token': token 
            },
	       success : function(data, statut){
	       	console.log(data.id);
	       	var elements = parseInt($('#product_append tr').length) + 1;
	       	if(rate_id != data.rate_id){
	       		if(rate_id == 1){
	       			var cost = parseFloat(data.cost)*parseFloat(daily_rate);
	       		}else{
	       			var cost = parseFloat(data.cost)/parseFloat(daily_rate);
	       		}
	       	}else{
	       		var cost = parseFloat(data.cost);
	       	}
	       	var append = '<tr class="product_element" id="'+data.id+'"><td class="remove_product text-center"><input name="id[]" type="hidden" value=""><input name="product_id[]" type="hidden" value="'+data.id+'"><i class="feather icon-trash"></i></td><td class="product_name">' + data.barcode + ' - ' + data.name + '</td><td class="product_quantity"><input name="quantity[]" value="0" class="form-control edit_product"></td><td class="product_real_quantity"><input name="real_quantity[]" value="1" class="form-control edit_product"></td> <td class="product_cost"><input name="cost[]" value="'+cost+'" class="form-control edit_product"></td><td class="text-right product_total"><span class="total">'+cost+'</span></td></tr>';
	       	var exists = $("#"+data.id); 
	       	if(exists.attr('class') == 'product_element'){
	       		// augment quantity
	       		var quantity = parseFloat(exists.find(".product_real_quantity input").val()) + 1;
	       		exists.find(".product_real_quantity input").val(quantity);
	       		update_costs();
	       	}else{
	       		$("#product_append").append(append);
	       		update_costs();
	       	}
	       	
	       	$(".edit_product").change(function(){
	       		update_costs();
			})

			$(".remove_product").click(function(){
				$(this).parent().remove();
				update_costs();
			})

			$('form input').keydown(function (e) {
			    if (e.keyCode == 13) {
			        e.preventDefault();
			        return false;
			    }
			});

			function update_costs(){
				var grand_total  = 0;
				$("#product_append").find("tr").each(function(){
					var cost = parseFloat($(this).find(".product_cost input").val());
					var quantity = parseFloat($(this).find(".product_real_quantity input").val());
					var total = cost*quantity;
					grand_total = grand_total + total;
					$(this).find(".product_total span").text(total.toFixed(2));
				});
				$("#grand_total").text(grand_total.toFixed(2));
				var elements = parseInt($('#product_append tr').length);
				if(elements > 0){
					$(".fill_before").each(function(){
						$(this).attr("readonly", true);
					})
				}else{
					$(".fill_before").each(function(){
						$(this).attr("readonly", false);
					})
				}
			}

	       },
	       error : function(resultat, statut, erreur){
	       	console.log(resultat); 
	       	console.log(erreur);
	       },	
	       complete : function(resultat, statut){

	       }
	    });
    }
});