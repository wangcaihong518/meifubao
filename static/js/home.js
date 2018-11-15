// window.onload = function(){
//     var swiper = new Swiper('.swiper-container', {
//         slidesPerView: 3,
//         autoplay: true,
//         loop: true,
//         pagination: {
//             el: '.swiper-pagination',
//             clickable: true,
//         },
//         navigation: {
//             nextEl: '.swiper-button-next',
//             prevEl: '.swiper-button-prev',
//         },
//     });
// // 鼠标移入时停止轮播
//     swiper.el.onmouseover = function(){
//         swiper.autoplay.stop();
//     }
// // banner图开始
// // 获取元素
//     let banner_imgs = document.querySelectorAll(".banner > li > a > img");
//     let banner = document.querySelector("ul.banner");
//     let banner_width = parseInt(getComputedStyle(banner,null).width);
//     let lBtn = document.querySelector(".icon-icon__left");
//     let rBtn = document.querySelector(".icon-right");
//     let dots = document.querySelectorAll(".banner .btns li a");
//     let des = document.querySelectorAll(".banner p.des");
// // 调用函数
//     change(banner_imgs,banner_width,lBtn,rBtn,dots);
// // 轮播函数
//     function change(banner_imgs,banner_width,lBtn,rBt,dots){
//         let now = 0;
//         let next = 0;
//         let flag = true;
//         let t = setInterval(move,2000);
//         dots[0].classList.add("btns_hot");
//         for(let i = 0;i<dots.length;i++){
//             dots[i].onclick = function(){
//                 for(let j = 0;j<dots.length;j++){
//                     dots[j].classList.remove("btns_hot");
//                     des[j].style = "position:absolute;bottom:0;z-index:-999;";
//                 }
//                 dots[i].classList.add("btns_hot");
//                 des[i].style = "position: absolute;bottom:60px;left: 0;right: 0;margin-left: auto;margin-right: auto;text-align:center;color: #bda5ed;ont-weight:300;font-size:36px;z-index: 999;transition:all .8s";
//                 now = i;
//                 next = i;
//             }
//         }
//         function move(){
//             next++;
//             if(next == banner_imgs.length){
//                 next = 0;
//             }
//             banner_imgs[now].style.left = 0;
//             banner_imgs[next].style.left = banner_width+"px";
//             animate(banner_imgs[now],{left:-banner_width},function(){
//                 dots[now].classList.add("btns_hot");
//                 des[now].style = "position: absolute;bottom:60px;left: 0;right: 0;margin-left: auto;margin-right: auto;text-align:center;color: #bda5ed;ont-weight:300;font-size:36px;z-index: 999;transition:all .8s";
//                 flat = true;
//             });
//             animate(banner_imgs[next],{left:0},function(){
//                 for(let j = 0;j<dots.length;j++){
//                     dots[j].classList.remove("btns_hot");
//                     des[j].style = "position:absolute;bottom:0;z-index:-999;";
//                 }
//                 dots[next].classList.add("btns_hot");
//                 des[next].style = "position: absolute;bottom:60px;left: 0;right: 0;margin-left: auto;margin-right: auto;text-align:center;color: #bda5ed;ont-weight:300;font-size:36px;z-index: 999;transition:all .8s";
//                 flag = true;
//             });
//             now = next;
//         }
//         lBtn.onclick = function(){
//             if(!flag){
//                 return;
//             }
//             flag = false;
//             next--;
//             if(next == -1){
//                 next = banner_imgs.length-1;
//             }
//             banner_imgs[now].style.left = 0;
//             banner_imgs[next].style.left = -banner_width+"px";
//             animate(banner_imgs[now],{left:banner_width},function(){
//                 dots[now].classList.add("btns_hot");
//                 des[now].style = "position: absolute;bottom:60px;left: 0;right: 0;margin-left: auto;margin-right: auto;text-align:center;color: #bda5ed;ont-weight:300;font-size:36px;z-index: 999;transition:all .8s";
//                 flat = true;
//             });
//             animate(banner_imgs[next],{left:0},function(){
//                 for(let j = 0;j<dots.length;j++){
//                     dots[j].classList.remove("btns_hot");
//                     des[j].style = "position:absolute;bottom:0;z-index:-999;";
//                 }
//                 dots[next].classList.add("btns_hot");
//                 des[next].style = "position: absolute;bottom:60px;left: 0;right: 0;margin-left: auto;margin-right: auto;text-align:center;color: #bda5ed;ont-weight:300;font-size:36px;z-index: 999;transition:all .8s";
//                 flag = true;
//             });
//             now = next;
//         }
//         rBtn.onclick = function(){
//             if(!flag){
//                 return;
//             }
//             flag = false;
//             move();
//         }
//         banner.onmouseover = function(){
//             clearInterval(t);
//         }
//         banner.onmouseout = function(){
//             t = setInterval(move,2000);
//         }
//         window.onblur = function(){
//             clearInterval(t);
//         }
//         window.onfocus = function(){
//             t = setInterval(move,2000);
//         }
//     }
// // 素馨花艺
//     var swiper1 = new Swiper('.swiper1', {
//         slidesPerView: 3,
//         autoplay: true,
//         loop: true,
//         pagination: {
//             el: '.swiper-pagination',
//             clickable: true,
//         },
//
//         navigation: {
//             nextEl: '.swiper-button-next',
//             prevEl: '.swiper-button-prev',
//         },
//     });
// // js写的
//     let left_list = document.querySelectorAll(".main_t_inner .t_list li:nth-child(2n)");
//     let right_list = document.querySelectorAll(".main_t_inner .t_list li:nth-child(2n+1)");
//     let img = document.querySelectorAll("img");
//     let arr=[];
//     img.forEach(function(val,index){
//         arr.push(val.offsetTop);
//         console.log(val,index);
//     });
//     window.onscroll=function(){
//         let bodyTop= document.body.scrollTop || document.documentElement.scrollTop;
//         for(let i=0;i<right_list.length;i++) {
//             if (bodyTop >= 1000) {
//                 right_list[i].style.left = "585px";
//                 left_list[i].style.left = 0;
//             }
//         }
//         arr.forEach(function(vals,indexs){
//             if(bodyTop>=vals){
//                 img[indexs].style.opacity=1;
//             }
//         });
//     }
// }
