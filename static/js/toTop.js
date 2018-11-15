window.onload = function(){
    // 返回顶部
    let toTop=document.querySelector(".toTop");
    window.onscroll=function(){
        let bodyTop= document.body.scrollTop || document.documentElement.scrollTop;
        // 返回顶部
        if(bodyTop >30){
            toTop.style.right="10px";
            toTop.style.bottom="10px";
            toTop.onclick=function(){
                bodyTop=0;
                animate(document.body,{scrollTop:0});
                animate(document.documentElement,{scrollTop:0});
            }
        }else if(bodyTop <30){
            toTop.style.right="-60px";
            toTop.style.bottom="70px";
        }
    }
}

