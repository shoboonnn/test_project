$(function(){
    $("h1").css("color", "red");
    $("#test").click(function(){
        $("#output").text("項目がタッチ");
    });

    $("#SortItem").click(function(){

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
            url:'/home', //通信したいURL
            data: data,
            dataType: 'json',

        })
        .done(function(data){
            //通信が成功したとき
            //$("#output").text("検索成功");
            //テーブルの中身を空にする
            

            //JSでHTMLを表示していく
        })
        .fail(function(){
            //通信が失敗したとき
            //$("#output").text("検索失敗");
        })
    
    });

      
});
  