!function(t){t.fn.visible=function(e,i,o,f){if(!(this.length<1)){var n=this.length>1?this.eq(0):this,r=null!=f,l=t(r?f:window),h=r?l.position():0,u=n.get(0),g=l.outerWidth(),p=l.outerHeight(),o=o||"both",s=!0!==i||u.offsetWidth*u.offsetHeight;if("function"==typeof u.getBoundingClientRect){var b=u.getBoundingClientRect(),c=r?b.top-h.top>=0&&b.top<p+h.top:b.top>=0&&b.top<p,a=r?b.bottom-h.top>0&&b.bottom<=p+h.top:b.bottom>0&&b.bottom<=p,d=r?b.left-h.left>=0&&b.left<g+h.left:b.left>=0&&b.left<g,v=r?b.right-h.left>0&&b.right<g+h.left:b.right>0&&b.right<=g,m=e?c||a:c&&a,w=e?d||v:d&&v;if("both"===o)return s&&m&&w;if("vertical"===o)return s&&m;if("horizontal"===o)return s&&w}else{var y=r?0:h,z=y+p,B=l.scrollLeft(),C=B+g,H=n.position(),R=H.top,W=R+n.height(),j=H.left,q=j+n.width(),L=!0===e?W:R,Q=!0===e?R:W,k=!0===e?q:j,x=!0===e?j:q;if("both"===o)return!!s&&Q<=z&&L>=y&&x<=C&&k>=B;if("vertical"===o)return!!s&&Q<=z&&L>=y;if("horizontal"===o)return!!s&&x<=C&&k>=B}}}}(jQuery);