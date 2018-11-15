$(function(){
    //    通过ajax请求来改变浏览量
//    1.获取页面显示的浏览量
    let count = $("span.counts").html();

    //    获取地址栏里面的gid,用来确定是哪一篇文章被浏览了
    let gid = location.search.split("=")[2];
    $.ajax({
        url: "counts.php",
        data: {
            count:count*1+1,
            gid:gid,
        },
        success:function(res){

        }
    });
});