$(function(){
    $("h1").css("color", "red");

    //絞り込み
    $("#SearchItem").click(function(){

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        })
        
        var data = {
        //絞り込み情報得る
        product_name : $("#txtProductName").val(),
        company_id : $("#drpCompanyId").val(),
        //商品絞り込み
        price_low : $("#numPriceLow").val(),
        price_high : $("#numPriceHigh").val(),
        //在庫絞り込み
        stock_low : $("#numStockLow").val(),
        stock_high : $("#numStockHigh").val()
        };

        $.ajax({
            type: "GET", //HTTP通信の種類
            url: "http://localhost:8888/test_project/public/home", //通信したいURL
            data:{ 'data' :data},
            dataType: "json",
        })
        .done(function(res){
            //通信が成功したとき
            $("#output").text("成功" + res.id + res.company_id);
            /*
            //テーブルの中身を空にする
            $("td").remove();
            //JSでHTMLを表示していく
            $('.table_return').append(`<td>.${res.id}.</td>`);
            */
        })
        .fail(function(res){
            //通信が失敗したとき
            $("#output").text("失敗" + data.product_name + data.company_id);
            //テーブルの中身を空にする
            $("td").remove();
            //JSでHTMLを表示していく
            /*
            $.each(res, function(index, value){
                var id = value.id;
                var product_name = value.id;
                var id = value.id;
                var id = value.id;
            })*/
        })
    
    });
    
    /*
    //並び替え    
    $("#test th").click(function(){
        var name = $(this).text();
        $("#output").text(name);
    });
    */      
  
    //削除
    $(".btnDelId").click(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        })
        if(confirm("本当に削除しますか？")){
            var delId = $(this).parent().parent().parent().find('.DelItem').text();
            String(delId);
            $(this).parent().parent().parent().remove();
            $.ajax({
                type: 'POST',
                url: 'http://localhost:8888/test_project/public/home',
                dataType: 'json',
                data:{ 'delID' : delId},
            })
            .done(function(){
                //通信が成功したとき
                $("#output").text("削除成功");
            })
            .fail(function(){
                //通信が失敗したとき
                //$("#output").text("失敗");
            })
        }else{
            return;
        }
    });
});
  