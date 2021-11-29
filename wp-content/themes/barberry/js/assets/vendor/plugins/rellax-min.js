!function(e,t){"function"==typeof define&&define.amd?define([],t):"object"==typeof module&&module.exports?module.exports=t():e.Rellax=t()}("undefined"!=typeof window?window:global,(function(){var e=function(t,o){"use strict";function n(){if(3===r.options.breakpoints.length&&Array.isArray(r.options.breakpoints)){var e=!0,t=!0,o;if(r.options.breakpoints.forEach((function(n){"number"!=typeof n&&(t=!1),null!==o&&n<o&&(e=!1),o=n})),e&&t)return}r.options.breakpoints=[576,768,1201],console.warn("Rellax: You must pass an array of 3 numbers in ascending order to the breakpoints option. Defaults reverted")}var r=Object.create(e.prototype),i=0,a=0,l=0,s=0,p=[],d=!0,c=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.msRequestAnimationFrame||window.oRequestAnimationFrame||function(e){return setTimeout(e,1e3/60)},u=null,m=!1;try{var f=Object.defineProperty({},"passive",{get:function(){m=!0}});window.addEventListener("testPassive",null,f),window.removeEventListener("testPassive",null,f)}catch(e){}var w=window.cancelAnimationFrame||window.mozCancelAnimationFrame||clearTimeout,x=window.transformProp||function(){var e=document.createElement("div");if(null===e.style.transform){var t=["Webkit","Moz","ms"];for(var o in t)if(void 0!==e.style[t[o]+"Transform"])return t[o]+"Transform"}return"transform"}();r.options={speed:-2,verticalSpeed:null,horizontalSpeed:null,breakpoints:[576,768,1201],center:!1,wrapper:null,relativeToWrapper:!1,round:!0,vertical:!0,horizontal:!1,verticalScrollAxis:"y",horizontalScrollAxis:"x",callback:function(){}},o&&Object.keys(o).forEach((function(e){r.options[e]=o[e]})),o&&o.breakpoints&&n(),t||(t=".rellax");var v="string"==typeof t?document.querySelectorAll(t):[t];if(v.length>0){if(r.elems=v,r.options.wrapper&&!r.options.wrapper.nodeType){var h=document.querySelector(r.options.wrapper);if(!h)return void console.warn("Rellax: The wrapper you're trying to use doesn't exist.");r.options.wrapper=h}var b,g=function(e){var t=r.options.breakpoints;return e<t[0]?"xs":e>=t[0]&&e<t[1]?"sm":e>=t[1]&&e<t[2]?"md":"lg"},y=function(){for(var e=0;e<r.elems.length;e++){var t=z(r.elems[e]);p.push(t)}},A=function(){for(var e=0;e<p.length;e++)r.elems[e].style.cssText=p[e].style;p=[],a=window.innerHeight,s=window.innerWidth,b=g(s),T(),y(),Y(),d&&(window.addEventListener("resize",A),d=!1,S())},z=function(e){var t=e.getAttribute("data-rellax-percentage"),o=e.getAttribute("data-rellax-speed"),n=e.getAttribute("data-rellax-xs-speed"),i=e.getAttribute("data-rellax-mobile-speed"),l=e.getAttribute("data-rellax-tablet-speed"),p=e.getAttribute("data-rellax-desktop-speed"),d=e.getAttribute("data-rellax-vertical-speed"),c=e.getAttribute("data-rellax-horizontal-speed"),u=e.getAttribute("data-rellax-vertical-scroll-axis"),m=e.getAttribute("data-rellax-horizontal-scroll-axis"),f=e.getAttribute("data-rellax-zindex")||0,w=e.getAttribute("data-rellax-min"),x=e.getAttribute("data-rellax-max"),v=e.getAttribute("data-rellax-min-x"),h=e.getAttribute("data-rellax-max-x"),g=e.getAttribute("data-rellax-min-y"),y=e.getAttribute("data-rellax-max-y"),A,z=!0;n||i||l||p?A={xs:n,sm:i,md:l,lg:p}:z=!1;var T=r.options.wrapper?r.options.wrapper.scrollTop:window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop,L;r.options.relativeToWrapper&&(T=(window.pageYOffset||document.documentElement.scrollTop||document.body.scrollTop)-r.options.wrapper.offsetTop);var S=r.options.vertical&&(t||r.options.center)?T:0,Y=r.options.horizontal&&(t||r.options.center)?r.options.wrapper?r.options.wrapper.scrollLeft:window.pageXOffset||document.documentElement.scrollLeft||document.body.scrollLeft:0,k=S+e.getBoundingClientRect().top,O=e.clientHeight||e.offsetHeight||e.scrollHeight,X=Y+e.getBoundingClientRect().left,R=e.clientWidth||e.offsetWidth||e.scrollWidth,W=t||(S-k+a)/(O+a),q=t||(Y-X+s)/(R+s);r.options.center&&(q=.5,W=.5);var F=z&&null!==A[b]?Number(A[b]):o||r.options.speed,C=d||r.options.verticalSpeed,M=c||r.options.horizontalSpeed,j=u||r.options.verticalScrollAxis,H=m||r.options.horizontalScrollAxis,N=E(q,W,F,C,M),P=e.style.cssText,B="",D=/transform\s*:/i.exec(P);if(D){var G=D.index,I=P.slice(G),J=I.indexOf(";");B=J?" "+I.slice(11,J).replace(/\s/g,""):" "+I.slice(11).replace(/\s/g,"")}return{baseX:N.x,baseY:N.y,top:k,left:X,height:O,width:R,speed:F,verticalSpeed:C,horizontalSpeed:M,verticalScrollAxis:j,horizontalScrollAxis:H,style:P,transform:B,zindex:f,min:w,max:x,minX:v,maxX:h,minY:g,maxY:y}},T=function(){var e=i,t=l;if(i=r.options.wrapper?r.options.wrapper.scrollTop:(document.documentElement||document.body.parentNode||document.body).scrollTop||window.pageYOffset,l=r.options.wrapper?r.options.wrapper.scrollLeft:(document.documentElement||document.body.parentNode||document.body).scrollLeft||window.pageXOffset,r.options.relativeToWrapper){var o=(document.documentElement||document.body.parentNode||document.body).scrollTop||window.pageYOffset;i=o-r.options.wrapper.offsetTop}return!(e==i||!r.options.vertical)||!(t==l||!r.options.horizontal)},E=function(e,t,o,n,i){var a={},l=(i||o)*(100*(1-e)),s=(n||o)*(100*(1-t));return a.x=r.options.round?Math.round(l):Math.round(100*l)/100,a.y=r.options.round?Math.round(s):Math.round(100*s)/100,a},L=function(){window.removeEventListener("resize",L),window.removeEventListener("orientationchange",L),(r.options.wrapper?r.options.wrapper:window).removeEventListener("scroll",L),(r.options.wrapper?r.options.wrapper:document).removeEventListener("touchmove",L),u=c(S)},S=function(){T()&&!1===d?(Y(),u=c(S)):(u=null,window.addEventListener("resize",L),window.addEventListener("orientationchange",L),(r.options.wrapper?r.options.wrapper:window).addEventListener("scroll",L,!!m&&{passive:!0}),(r.options.wrapper?r.options.wrapper:document).addEventListener("touchmove",L,!!m&&{passive:!0}))},Y=function(){for(var e,t=0;t<r.elems.length;t++){var o=p[t].verticalScrollAxis.toLowerCase(),n=p[t].horizontalScrollAxis.toLowerCase(),d=-1!=o.indexOf("x")?i:0,c=-1!=o.indexOf("y")?i:0,u=-1!=n.indexOf("x")?l:0,m,f=(c+(-1!=n.indexOf("y")?l:0)-p[t].top+a)/(p[t].height+a),w=(d+u-p[t].left+s)/(p[t].width+s),v=(e=E(w,f,p[t].speed,p[t].verticalSpeed,p[t].horizontalSpeed)).y-p[t].baseY,h=e.x-p[t].baseX;null!==p[t].min&&(r.options.vertical&&!r.options.horizontal&&(v=v<=p[t].min?p[t].min:v),r.options.horizontal&&!r.options.vertical&&(h=h<=p[t].min?p[t].min:h)),null!=p[t].minY&&(v=v<=p[t].minY?p[t].minY:v),null!=p[t].minX&&(h=h<=p[t].minX?p[t].minX:h),null!==p[t].max&&(r.options.vertical&&!r.options.horizontal&&(v=v>=p[t].max?p[t].max:v),r.options.horizontal&&!r.options.vertical&&(h=h>=p[t].max?p[t].max:h)),null!=p[t].maxY&&(v=v>=p[t].maxY?p[t].maxY:v),null!=p[t].maxX&&(h=h>=p[t].maxX?p[t].maxX:h);var b=p[t].zindex,g="translate3d("+(r.options.horizontal?h:"0")+"px,"+(r.options.vertical?v:"0")+"px,"+b+"px) "+p[t].transform;r.elems[t].style[x]=g}r.options.callback(e)};return r.destroy=function(){for(var e=0;e<r.elems.length;e++)r.elems[e].style.cssText=p[e].style;d||(window.removeEventListener("resize",A),d=!0),w(u),u=null},A(),r.refresh=A,r}console.warn("Rellax: The elements you're trying to select don't exist.")};return e}));