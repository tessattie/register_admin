$(document).ready(function(){

    $("#barcode").focus();

    $("#price").change(function(){
    	// alert("here");
        if($(this).val() < 0){
            $(this).val(0);
            alert("Le prix retail ne peut pas être inférieur à 0");
            return true;
        }
    	var price = parseFloat($(this).val());
    	// alert(price);
    	var rate = parseFloat($(".taux_du_jour").text());
    	if($("#rate-id").val() == 1){
            var total = price/rate;
        }else{
            var total = price*rate;
        }
    	$(".prix_retail").text(total.toFixed(2));
        var retail = calculate_markup(price, parseFloat($("#cost").val()));
        var wholesale = calculate_markup(parseFloat($("#wholesale").val()), parseFloat($("#cost").val()));
        // $(".prix_wholesale").text(total.toFixed(2));
        $(".markup_retail").text(retail.toFixed(2));
        $(".markup_wholesale").text(wholesale.toFixed(2));
    })

    $("#wholesale").change(function(){
        if($(this).val() < 0){
            $(this).val(0);
            alert("Le prix wholesale ne peut pas être inférieur à 0");
            return true;
        }
    	var price = parseFloat($(this).val());
    	var rate = parseFloat($(".taux_du_jour").text());
        if($("#rate-id").val() == 1){
            var total = price/rate;
        }else{
            var total = price*rate;
        }
        var wholesale = calculate_markup(price, parseFloat($("#cost").val()));
        var retail = calculate_markup(parseFloat($("#price").val()), parseFloat($("#cost").val()));
    	$(".prix_wholesale").text(total.toFixed(2));
        $(".markup_retail").text(retail.toFixed(2));
        $(".markup_wholesale").text(wholesale.toFixed(2));
    })

    $("#cost").change(function(){
        if($(this).val() < 0){
            $(this).val(0);
            alert("Le coût ne peut pas être inférieur à 0");
            return true;
        }
        var cost = parseFloat($(this).val());
        if($(".appliquer_categorie").is(":checked")){
            retail_markup = parseFloat($(".category_id:checked").parent().parent().find(".td_retail").text());
            wholesale_markup = parseFloat($(".category_id:checked").parent().parent().find(".td_wholesale").text());

            var retail_price = cost + cost*retail_markup/100;
            var wholesale_price = cost + cost*wholesale_markup/100;

            var rate = parseFloat($(".taux_achat").text());
            if($("#rate-id").val() == 1){
                var total = cost/rate;
            }else{
                var total = cost*rate;
            }

            $("#price").val(retail_price);
            $("#wholesale").val(wholesale_price);
            $("#price").trigger("change");
            $("#wholesale").trigger("change");
            $(".prix_cost").text(total.toFixed(2));
        }else{
            var rate = parseFloat($(".taux_achat").text());
            if($("#rate-id").val() == 1){
                var total = cost/rate;
            }else{
                var total = cost*rate;
            }
            
            var retail = calculate_markup(parseFloat($("#price").val()), cost);
            var wholesale = calculate_markup(parseFloat($("#wholesale").val()), cost);
            $(".prix_cost").text(total.toFixed(2));
            $(".markup_retail").text(retail.toFixed(2));
            $(".markup_wholesale").text(wholesale.toFixed(2));
        }
        
    })

    function calculate_markup(price,cost){
        return 100*(price-cost)/cost;
    }

    $(".appliquer_categorie").change(function(){
        var cost = parseFloat($("#cost").val());
        var category = $(".category_id:checked").val();

        if($(this).is(':checked')){
            $("#price").attr('readonly', true);
            $("#wholesale").attr('readonly', true);
        }else{
            $("#price").attr('readonly', false);
            $("#wholesale").attr('readonly', false);
        }

        if(typeof category != 'undefined' && cost != 0 && $(this).is(':checked')){
            retail = parseFloat($(".category_id:checked").parent().parent().find(".td_retail").text());
            wholesale = parseFloat($(".category_id:checked").parent().parent().find(".td_wholesale").text());

            var retail_price = cost + cost*retail/100;
            var wholesale_price = cost + cost*wholesale/100;

            $("#price").val(retail_price);
            $("#wholesale").val(wholesale_price);

            

            $("#price").trigger("change");
            $("#wholesale").trigger("change");

        }
    })

    $("#rate-id").change(function(){
        if($(this).val() == 1){
            $('.product_rate').each(function(){
                $(this).text('HTG')
            })
            $('.converted_rate').each(function(){
                $(this).text('USD')
            })
        }else{
            $('.product_rate').each(function(){
                $(this).text('USD')
            })
            $('.converted_rate').each(function(){
                $(this).text('HTG')
            })
        }
        $("#cost").trigger("change");
        $("#price").trigger("change");
        $("#wholesale").trigger("change");

    })
})