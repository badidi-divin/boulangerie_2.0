aData={}
$("#mot1").autocomplete({
    source:function(request,response){
        $.ajax({
            url:'http://localhost/vanilla/Sociale_Pharma/Vendor/auto-completion/server.php',
            type:'GET',
            dataType:'json',
            success:function(data){
                aData=$.map(data, function(value,key){
                    return {
                        id:value.id,
                        label:value.designation,
                    };
                });
                var results=$.ui.autocomplete.filter(aData,request.term);
                response(results);
            }
        })
    },

});