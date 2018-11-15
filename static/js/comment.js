$(function(){
    let submit = $("input[type='submit']");
    let span = document.querySelector(".num");
    let textarea = document.querySelector("textarea");
    textarea.oninput = function(){
        span.innerHTML = this.value.length;
    }
    // 将数据库中的数据显示到页面中
    // 更多相当于是一个分页器，确定一共有几页，一页显示几个数据
    let loading = $(".more");
    // pagenum第几页
    let pagenum = 0;
    // list是为了点击更多时内容累加
    let list = [];
    // 当一个在请求的时候另一个不可以请求
    let flag = true;
    loading.on('click',function(e){
        e.preventDefault();
        pagenum ++;
        if(!flag){
            return;
        }
        flag = false;
        $(".icon-jiazai").removeClass("hidden").css({animationPlayState:'running'});
            $.ajax({
                url: "page.php",
                data: {pagenum: pagenum},
                dataType: 'json',
                success:function(res){
                    if(res.length){
                        $(".icon-jiazai").addClass("hidden").css({animationPlayState:'paused'});
                        flag = true;
                        render(res);
                    }else {
                        $(".icon-jiazai").addClass("hidden").css({animationPlayState:'paused'});
                        alert("没有更多数据了哟");
                    }
                }
            });
    });
    loading.trigger('click');
    function render(data){
        list = list.concat(data);
        let html;
        // list遍历得到每一个获取的数据
        list.forEach(ele=>{
            html = `
					<div class="left">
						<img src="../static/img/gonganbeian.png">
						<!-- <i class="iconfont icon-user-circle"></i> -->
					</div>
					<div class="right">
						<h4>${ele.name}
							<small>${ele.times}</small>
						</h4>
						<p>${ele.suggest}</p>
					</div>
				`;
            // 模板字符串不能用apprend等方法
            $("<li>").html(html).prependTo("ul.list");
        })
    }
    // 插入留言
    submit.on('click',function(e){
        e.preventDefault();
        // 获取表单中的数据（字符串）
       let data = $("#myform").serialize();
        // 获取表单中的数据（数组）
       let arr = $("#myform").serializeArray();
       // 提交数据
       $.ajax({
           url: 'comment.php',
           data: data,
            success:function(res){
               if(res == 'success'){
                   alert("留言成功");
                   fn(arr);
               }else if(res == 'fail'){
                   alert("留言失败");
               }
            }
       });
        function fn(arr){
            // 清空表单中的数据reset()方法
            $("#myform")[0].reset();
            let html = `
					<div class="left">
						<img src="../static/img/gonganbeian.png">
						<!-- <i class="iconfont icon-user-circle"></i> -->
					</div>
					<div class="right">
						<h4>${arr[0].value}
							<small>${formDate()}</small>
						</h4>
						<p>${arr[2].value}</p>
					</div>`;
            $("<li>").html(html).prependTo("ul.list");
        }
    });
    // 自定义一个时间函数
    function formDate(){
        let date = new Date();
        let y = date.getFullYear(),
            m = date.getMonth()+1;
            d = date.getDate(),
            h = date.getHours(),
            i = date.getMinutes(),
            s = date.getSeconds();
        return y +"-"+ m + "-" + d + " "+ h + ":" + i + ":"+ s;
    }

});