!function(e){"use strict";function o(e){for(var t=document.querySelectorAll(".tmc-alpha-tab-content"),n=document.querySelectorAll(".tmc-tab-item"),o=0;o<t.length;o++)o===e?n[o].classList.add("active"):n[o].classList.remove("active")}var t=function(e,t){var n=e.find(".tmc-event-dots").data("item");e.find(".tmc-event-dots").slick({vertical:!0,focusOnSelect:!0,asNavFor:".tmc-event-content",slidesToShow:""!=n?parseInt(n):4,slidesToScroll:1,verticalSwiping:!0,infinite:!1,centerMode:!0,centerPadding:"0px",speed:1e3,arrows:!1,responsive:[{breakpoint:768,settings:{verticalSwiping:!1,slidesToShow:1,centerMode:!0,centerPadding:"50px",arrows:!0,vertical:!1,prevArrow:'<div class="event-arrows-back fas fa-chevron-left"></div>',nextArrow:'<div class="event-arrows-next fas fa-chevron-right"></div>'}}]}),e.find(".tmc-event-content").slick({dots:!1,asNavFor:".tmc-event-dots",speed:1e3,fade:!0,arrows:!1,slidesToShow:1,slidesToScroll:1});var s=e.find(".tmc-event-dots .slick-slide");s.removeClass("slick-active"),s.eq(0).addClass("slick-active"),e.find(".tmc-event-content").on("beforeChange",function(e,t,n,o){var a=o;s.removeClass("slick-active"),s.eq(a).addClass("slick-active")})},n=function(e,t){e.find(".tmc-press-content").slick({rows:2,dots:!0,slidesToShow:2,slidesToScroll:2,speed:1e3,arrows:!1,customPaging:function(e,t){return'<span class="dot"></span>'},responsive:[{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1}}]})},a=function(e,t){e.find(".tmc-build-slider").slick({slidesToShow:3,slidesToScroll:3,speed:1e3,arrows:!0,prevArrow:'<i class="fas fa-angle-left"></i>',nextArrow:'<i class="fas fa-angle-right"></i>',responsive:[{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1}}]})},s=function(e,a){var s=new ScrollMagic.Controller,t=document.querySelectorAll(".tmc-alpha-tab-content"),n=new TimelineMax,r=(window.innerHeight,window.innerWidth);document.querySelectorAll(".tmc-tab-item")[0].classList.add("active");t.length;n.to("#tab-1",1,{x:"-80%",onComplete:o,onCompleteParams:[1],onReverseComplete:o,onReverseCompleteParams:[0]}),n.to("#tab-2",1,{x:"-80%",onComplete:o,onCompleteParams:[2],onReverseComplete:o,onReverseCompleteParams:[1]}),n.to("#tab-3",1,{x:"-80%",onComplete:o,onCompleteParams:[3],onReverseComplete:o,onReverseCompleteParams:[2]}),n.to("#tab-4",.5,{x:"0%",onComplete:o,onCompleteParams:[3],onReverseComplete:o,onReverseCompleteParams:[2]}),new ScrollMagic.Scene({triggerElement:"#pinContainer",triggerHook:"onLeave",duration:r*(t.length-1)}).setPin("#pinContainer").setTween(n).addTo(s),a(".tmc-alpha-tab-content").each(function(e){var t=a(this).find(".tmc-tab-left"),n=a(this).find(".tmc-tab-right"),o=new TimelineMax;o.staggerFrom(t,.3,{ease:"bounce.inOut"}),o.staggerFrom(n,.3,{ease:"bounce.inOut"}),new ScrollMagic.Scene({triggerElement:"#pinContainer",triggerHook:0,offset:e*r}).setTween(o).addTo(s)})},r=function(e,t){new Swiper(".tmc-slider-widget",{loop:!0,effect:"fade",speed:1e3,fadeEffect:{crossFade:!0},autoplay:{delay:3e3},pagination:{el:".swiper-pagination",type:"bullets",clickable:!0,renderBullet:function(e,t){var n=document.getElementById("tab-"+(e+1));return'<span class="'+t+'" style="color: '+n.getAttribute("data-color")+';"><span class="swiper-pagination-bg" style="background: '+n.getAttribute("data-color")+'"></span><span class="swiper-pagination-letter">'+n.getAttribute("data-letter")+"</span></span>"}}});for(var n=document.querySelectorAll(".swiper-pagination-bullet"),o=0;o<n.length;o++)n[o].addEventListener("click",function(){this.classList.add("swiper-pagination-bullet-active-click")})};e(window).on("elementor/frontend/init",function(){elementorFrontend.hooks.addAction("frontend/element_ready/tmc-event.default",t),elementorFrontend.hooks.addAction("frontend/element_ready/tmc-press.default",n),elementorFrontend.hooks.addAction("frontend/element_ready/tmc-build.default",a),elementorFrontend.hooks.addAction("frontend/element_ready/tmc-slider.default",r),elementorFrontend.hooks.addAction("frontend/element_ready/tmc_alpha_tabs.default",s)})}(jQuery);
//# sourceMappingURL=tmc-addon-min.js.map