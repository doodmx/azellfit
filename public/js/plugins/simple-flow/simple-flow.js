!function(e){var t={};function i(r){if(t[r])return t[r].exports;var n=t[r]={i:r,l:!1,exports:{}};return e[r].call(n.exports,n,n.exports,i),n.l=!0,n.exports}i.m=e,i.c=t,i.d=function(e,t,r){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(i.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)i.d(r,n,function(t){return e[t]}.bind(null,n));return r},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="/",i(i.s=27)}({27:function(e,t,i){e.exports=i("Ot49")},Ot49:function(e,t){!function(e,t,i,r){"use strict";var n={lineWidth:2,lineSpacerWidth:15,lineColour:"#91acb3",canvasElm:".canvas"};function o(t,i){this.element=t,this.settings=e.extend({},n,i),this._defaults=n,this._name="SimpleFlow",this.init()}e.extend(o.prototype,{init:function(){this.drawLines();var i=this;e(t).resize((function(){i.drawLines()}))},drawLines:function(){e("svg.simple-flow-line").remove();for(var t=e(this.element),i=0;i<t.length;i++){var r=t.eq(i),n=t.eq(i+1);this.drawLine(r,n)}},drawLine:function(t,i){var r=t.parent(),n=i.parent();if(void 0!==i.position()){var o=t.outerHeight(!0)/2,s=i.outerHeight(!0)/2,l=o+r.position().top+40,a=s+n.position().top+40,u=(r.outerWidth(!0)-r.width())/2,d=(n.outerWidth(!0)-n.width())/2,f=r.position().left+t.outerWidth(!0)+u,c=n.position().left+d,p=c-this.settings.lineSpacerWidth,h=f+this.settings.lineSpacerWidth,m=(l+a)/2-30;if(l==a)var v=f+","+l+" "+c+","+a;else v=f+","+l+" "+h+","+l+" "+h+","+m+" "+p+","+m+" "+p+","+a+" "+c+","+a;var g='<svg class="simple-flow-line"><defs><marker id="markerCircle" markerWidth="8" markerHeight="8" refX="5" refY="5"><circle cx="5" cy="5" r="3" style="stroke: none; fill:'+this.settings.lineColour+';"/></marker> <marker id="arrowhead" viewBox="0 0 10 10" refX="8" refY="5"markerUnits="strokeWidth" markerWidth="8" markerHeight="6" orient="auto"><path d="M 0 0 L 10 5 L 0 10 z" stroke="none" fill="'+this.settings.lineColour+'"/></marker></defs><path d="M'+v+'"style="fill:none;stroke:'+this.settings.lineColour+";stroke-width:"+this.settings.lineWidth+';marker-end:url(#markerCircle);" /></svg>';e(this.settings.canvasElm).append(g)}}}),e.fn.SimpleFlow=function(t){e.data(this,"plugin_SimpleFlow")||e.data(this,"plugin_SimpleFlow",new o(this,t))}}(jQuery,window,document)}});