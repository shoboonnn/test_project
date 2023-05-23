$(function(){
    $("h1").css("color", "red");

    //絞り込み
    $("#SearchItem").click(function(){

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
        })
        
        var data = {
        //絞り込み情報得る
        'product_name' : $("#txtProductName").val(),
        'company_id' : $("#drpCompanyId").val(),
        //商品絞り込み
        'price_low' : $("#numPriceLow").val(),
        'price_high' : $("#numPriceHigh").val(),
        //在庫絞り込み
        'stock_low' : $("#numStockLow").val(),
        'stock_high' : $("#numStockHigh").val()
        }

        $.ajax({
            type: "GET", //HTTP通信の種類
            url: "http://localhost:8888/test_project/public/home/sort", //通信したいURL
            data: data,
            dataType: "json",
        })
        .done(function(res){
            //通信が成功したとき
            $("#output").text("絞り込み成功");
            //テーブルの中身を空にする
            $("td").remove();
            //JSでHTMLを表示していく
            $.each(res,function(index,value){
                
                var id = value.id;
                var img_path = value.img_path;
                var product_name = value.product_name;
                var price = value.price;
                var stock = value.stock;
                var company_id = value.company_id;
                

               var html = `
               <tr>
                   <td width="40px" class="DelItem">${id}</td> 
                   <td width="86px"><img src="${img_path}"height="50px"width="50px"></td>
                   <td width="127px">${product_name}</td>
                   <td width="52px">${price}</td>
                   <td width="65px">${stock}</td>
                   <td width="106px">${company_id}</td>
                   <td>
                   <form action="http://localhost:8888/test_project/public/search"> 
                     <input name="btnSearchId" value="${id}" type="hidden">
                     <input type="submit" value="詳細">
                    </form>
                   </td>
                   <td>
                    <div>
                     <input class="btnDelId" type="submit" value="削除">
                    </div>
                   </td>
                </tr>
                `;

                $('#table_return').append(html);
                return ;
        })
        .fail(function(){
            //通信が失敗したとき
            $("#output").text("失敗");
            })
        })
    });

 
    //削除
    $(document).on('click',".btnDelId",function(){
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
            .done(function(data){
                //通信が成功したとき
                $("#output").text(data);
            })
            .fail(function(){
                //通信が失敗したとき
                $("#output").text("失敗");
            })
        }else{
            return;
        }
    });
});
  