$(function(){
    $("h1").css("color", "red");
    $("#test").click(function(){
        $("#output").text("項目がタッチされました");
    });

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
    })
    $.ajax({
        type: "get", //HTTP通信の種類
        url:'/home', //通信したいURL
        dataType: 'json'
    })
    //通信が成功したとき
    .done((res)=>{
        console.log(res.message)
    })
    //通信が失敗したとき
    .fail((error)=>{
        console.log(error.statusText)
    })
      
});
  