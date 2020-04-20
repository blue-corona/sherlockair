if(window.registerLoading){registerLoading("m/scrolling-list")}(function(factory){if(typeof rrequire==="function"){rrequire(["j/jquery","j/jquery.ui","static","j/ui.draw","j/ui.mobile"],factory)}else{factory(jQuery,window)}}(function($,scope){$.widget("cms.scrollingList",{options:{direction:'horizontal',scroll:'panel',autoAdvance:false,delay:8000,infinite:false,continuous:false,wrap:false,activate:'item',firstActive:false,property:'transform'},_create:function(){Object.extend(this.options,this.element.data());this.state={index:0,rtimer:0,ptimer:0,paused:false,continuous:false,begin:0,end:0,prop:'transform',axis:'transformX{0}',from:0,to:0,amount:0,wn:window.innerWidth,tabbing:false};var start=this.element[0];if(start.getAttribute('data-role')!=='scroller'){start=start.closest("[data-role='scroller']")||this.element[0]}this.els={scroller:start,items:[]};var roles=start.querySelectorAll("[data-role]");roles.forEach(function(el){var role=el.getAttribute('data-role');switch(role){case'scroller':case'items':break;case'item':this.els.items.push(el);break;case'list':case'container':this.els[role]=el;break;default:if(!this.els[role]){this.els[role]=[el]}else{this.els[role].push(el)}break}}.bind(this));this._getTiming();if(this.options.infinite){this.els.list.style.transition='none'}for(i=0;i<this.els.items.length;i++){var el=this.els.items[i];if(!el.querySelector('a')){el.setAttribute('tabindex',0)}}this.evt={click:function(e){var data=e.target.linkData();switch(data.action){case'Next':this.next();break;case'Prev':this.prev();break}}.bind(this),focusin:function(e){var index,item=e.target.closest("[data-role='item']"),cont=this.els.container,items=this.els.items;if(item&&cont&&items&&(index=items.indexOf(item))>=0){cont.scrollTop=0;cont.scrollLeft=0;this.pause();this.moveTo(index)}this.els.scroller.classList.add('focused')}.bind(this),focusout:function(e){this.els.scroller.classList.remove('focused')}.bind(this),resize:function(e){clearTimeout(this.state.rtimer);this.state.rtimer=setTimeout(this.evt.reset,100)}.bind(this),mouseenter:function(){this.pause()}.bind(this),mouseleave:function(){this.play()}.bind(this),next:function(){if(!this.state.paused){this.play(true)}}.bind(this),reset:function(){var wn=window.innerWidth;if(wn!==this.state.wn){this.state.wn=wn;this.reset()}}.bind(this),transition:function(e){var time,transform;if(e.target!==this.els.list){return}this.state.index=0;this.state.begin=0;this.state.start=0;this.els.list.style.transition='none';this.els.list.style[this.state.prop]=this.state.axis.replace('{0}','0%');this._adjust();void this.els.list.offsetWidth;this.state.time=time=(this.state.duration*this.state.length);this.els.list.style.transition='transform '+time+'ms linear';transform=this.state.axis.replace('{0}',(this.state.to*-100)+'%');this.els.list.style[this.state.prop]=transform;cancelAnimationFrame(this.state.frame);this.state.frame=requestAnimationFrame(this.state.calc)}.bind(this),swipe:function(e){var vert=this.options.direction==='vertical';switch(e.type){case'swipeleft':if(!vert){this.next()}break;case'swiperight':if(!vert){this.prev()}break}}.bind(this),trigger:function(){this.evt.scroll();if(this.state.duration){setTimeout(this.evt.scroll,this.state.duration/2);setTimeout(this.evt.scroll,this.state.duration)}}.bind(this),keydown:function(e){if(!this.els.scroller.classList.contains('tabbing')&&e.keyCode===9){this.els.scroller.classList.add('tabbing');this.state.tabbing=true}}.bind(this)};if(window.trigger&&typeof CustomEvent==='function'){this.evt.scroll=function(){window.trigger('scroll')}}else{this.evt.scroll=function(){$(window).trigger('scroll')}}for(var itm in this.els.items){if(getComputedStyle(this.els.items[itm]).display==='none'){return false}}this.els.scroller.addEventListener('click',this.evt.click);this.els.scroller.addEventListener('dblclick',this.evt.dblclick);this.els.scroller.addEventListener('keydown',this.evt.keydown);this.els.scroller.addEventListener('focusin',this.evt.focusin);this.els.scroller.addEventListener('focusout',this.evt.focusout);this.els.scroller.addEventListener('mouseenter',this.evt.mouseenter);this.els.scroller.addEventListener('mouseleave',this.evt.mouseleave);window.addEventListener('resize',this.evt.resize);if(Modernizr.touch){$(this.els.scroller).on('swipeleft swiperight',this.evt.swipe)}this.measure();this.refresh();this.play();this.els.scroller.classList.add('active')},_getTiming:function(){var fn,style,prop,dur,timing,list=this.els.list;if(!list){return}fn=function(s,p){var value=s.getPropertyValue(p);var split=(value||"").split(/, */g);return split};style=window.getComputedStyle(list);prop=fn(style,'transition-property');dur=fn(style,'transition-duration');timing=fn(style,'transition-timing-function');for(var i=0;i<prop.length;i++){if(prop[i]==='transform'||prop[i]==='all'){if(/\dms/.test(dur[i])){this.state.duration=parseFloat(dur[i])}else if(/\ds/.test(dur[i])){this.state.duration=parseFloat(dur[i])*1000}else{this.state.duration=0}this.state.timing=$.draw.CubicBezier.get(timing[i])}}if(this.options.continuous){this.state.calc=function(){var dur,index,now=performance.now();if(!this.state.begin){this.state.begin=now-this.state.start}else{dur=now-this.state.begin;index=Math.floor(dur/this.state.duration);if(index!==this.state.index){this.state.index=index;this._adjust()}}cancelAnimationFrame(this.state.frame);this.state.frame=requestAnimationFrame(this.state.calc)}.bind(this)}},reset:function(){var cont=this.els.container,list=this.els.list,items=this.els.items;if(!cont||!list||!items){return}if(this.options.direction==='vertical'){cont.style.removeProperty('height');for(var i=0;i<items;i++){items[i].style.removeProperty('height')}}list.style.transition='none';list.style.animation='none';list.style.transform='none';switch(this.options.property){case'margin':case'margin-left':case'margin-top':case'marginLeft':case'marginTop':list.style.removeProperty('marginLeft');list.style.removeProperty('marginTop');break;case'left':case'top':list.style.removeProperty('left');list.style.removeProperty('top');break}this.state.index=0;if(this.options.infinite||this.options.continuous){this._adjust()}this.measure();void list.offsetWidth;list.style.removeProperty('transition');list.style.removeProperty('animation');list.style.removeProperty('transform');this.refresh()},measure:function(){var start,end,size,force,cont,list,first,dim,item,height,adjust,extra,items=this.els.items;if(!this.els.container||!this.els.list||!items||!items.length){return}if(this.options.direction==='vertical'){start='top';end='bottom';size='height';if(this.options.property==='transform'){this.state.prop='transform';this.state.axis='translateY({0})'}else{switch(this.options.property){case'margin':case'margin-left':case'margin-top':case'marginLeft':case'marginTop':this.state.prop='marginTop';break;case'left':case'top':this.state.prop='top';break;default:console.log("Invalid animation property");break}this.state.axis='{0}'}}else{start='left';end='right';size='width';if(this.options.property==='transform'){this.state.prop='transform';this.state.axis='translateX({0})'}else{switch(this.options.property){case'margin':case'margin-left':case'margin-top':case'marginLeft':case'marginTop':this.state.prop='marginLeft';break;case'left':case'top':this.state.prop='left';break;default:console.log("Invalid animation property");break}this.state.axis='{0}'}}this.state.length=items.length;force=false;while(true){this.state.single=0;this.state.panel=0;this.state.visible=0;this.state.pages=0;this.state.size=0;cont=this.els.container.getBoundingClientRect();list=this.els.list.getBoundingClientRect();first=items[0].getBoundingClientRect();dim={left:first.left,top:first.top,right:cont.right,bottom:cont.bottom};if(this.options.property==='transform'){dim.width=list.width;dim.height=list.height}else{dim.width=cont.width;dim.height=cont.height}height=first.height;adjust=false;for(var i=1;i<items.length;i++){item=items[i].getBoundingClientRect();if(Math.abs(height-item.height)>1){adjust=true;if(item.height>height){height=item.height}}if(i===1){this.state.single=(item[start]-dim[start])/dim[size]}if(!this.state.pages&&item[end]>dim[end]){this.state.panel=(item[start]-dim[start])/dim[size];this.state.visible=i;this.state.pages=Math.ceil(items.length/i)}if(i===items.length-1){this.state.size=item[end]-dim[start]}}if(!adjust||force){break}else if(this.options.direction==='vertical'){if(height>dim.height){this.els.container.style.height=height+'px'}else{for(var i=1;i<items.length;i++){items[i].style.height=height+'px'}force=true}}else{break}}if(!this.state.visible){this.state.visible=this.state.length;this.state.pages=1}else if(extra=(this.state.length%this.state.visible)){this.state.max=((this.state.pages-2)*this.state.panel)+(extra*this.state.single)}},next:function(){var panel;if(this.options.scroll==='panel'){if(this.options.infinite){this.moveTo(this.state.index+this.state.visible)}else{panel=Math.floor(this.state.index/this.state.visible);panel++;this.moveTo(panel*this.state.visible)}}else{this.moveTo(this.state.index+1)}},prev:function(){var panel;if(this.options.scroll==='panel'){panel=Math.floor(this.state.index/this.state.visible);panel--;this.moveTo(panel*this.state.visible)}else{this.moveTo(this.state.index-1)}},play:function(next){var delay;this.state.paused=false;clearTimeout(this.state.ptimer);if(this.options.continuous){this._continous();return}if(this.options.autoAdvance){delay=(this.options.delay||100);if(next){this.next();delay+=this.state.duration}this.state.ptimer=setTimeout(this.evt.next,delay)}},pause:function(){var list,cont,amount,transform;this.state.paused=true;clearTimeout(this.state.ptimer);if(this.state.continuous){list=this.els.list.getBoundingClientRect();cancelAnimationFrame(this.state.frame);this.els.list.removeEventListener('transitionend',this.evt.transition);this.els.list.style.transition='none';cont=this.els.container.getBoundingClientRect();if(this.options.direction==='vertical'){start='top';size='height'}else{start='left';size='width'}amount=(cont[start]-list[start])/cont[size];transform=this.state.axis.replace('{0}',(amount*-100)+'%');this.els.list.style[this.state.prop]=transform;this.state.continuous=false}},moveTo:function(index){var wrap;if(!this.state.panel){return}wrap=this.options.wrap||this.options.autoAdvance;if(index<0){index=wrap?this.state.length-1:0}else if(this.options.infinite){}else if(index>=this.state.length){index=wrap?0:this.state.length-1}if(index===this.state.index){return}if(this.state.visible===this.state.length){}else if(this.options.infinite||this.options.continuous){this._infinite(index)}else{this._animate(index)}},_animate:function(index){var to,transform,list=this.els.list;if(!list){return}to=this._position(index);if(this.state.max&&to>this.state.max){to=this.state.max}transform=this.state.axis.replace('{0}',(to*-100)+'%');list.style[this.state.prop]=transform;this.state.index=index;this.refresh();this.evt.trigger()},_infinite:function(index){var t,m,from,to,fn,list=this.els.list;if(!list){return}if(this.state.frame){cancelAnimationFrame(this.state.frame)}this.state.begin=0;this.state.from=this._current();this.state.to=this._position(index);this.state.amount=this.state.to-this.state.from;this.state.index=Math.floor((this.state.from/this.state.single)+0.001);fn=function(){var percent,progress,amount,transform,pos,now=performance.now();if(!this.state.begin){this.state.begin=now;this.state.end=now+this.state.duration;this.state.frame=requestAnimationFrame(fn);return}else if(now>=this.state.end){percent=1}else{progress=(now-this.state.begin)/this.state.duration;percent=this.state.timing.get(progress)}amount=(this.state.amount*percent)+this.state.from;transform=this.state.axis.replace('{0}',(amount*-100)+'%');pos=Math.floor((amount/this.state.single)+0.001);if(pos!==this.state.index){this.state.index=pos;this._adjust()}this.els.list.style[this.state.prop]=transform;if(percent<1){this.state.frame=requestAnimationFrame(fn)}else{this._cleanup()}}.bind(this);this._adjust();this.state.frame=requestAnimationFrame(fn)},_current:function(){var t,m,from;t=this.els.list.style.getPropertyValue('transform');m=t&&/translate(?:X|Y)\(([\-\.\d]+)%\)/.exec(t);from=(m&&parseFloat(m[1])/-100)||0;return from},_adjust:function(){var item,left,pos=this.state.index%this.state.length,factor=(this.state.index-pos)/this.state.length;for(var i=0;i<this.els.items.length;i++){item=this.els.items[i];if(i<pos){left=this.state.single*this.state.length*100*(factor+1);item.style.position='relative';item.style.left=left+'%'}else if(factor>0){left=this.state.single*this.state.length*100*(factor);item.style.position='relative';item.style.left=left+'%'}else{item.style.removeProperty('position');item.style.removeProperty('left')}}this.evt.trigger()},_cleanup:function(){var transform;while(this.state.index>=this.state.length){this.state.index-=this.state.length}this._adjust();transform=this.state.axis.replace('{0}',(this.state.index*this.state.single*-100)+'%');this.els.list.style[this.state.prop]=transform;this.refresh()},_continous:function(){var time,prorate,transform;if(this.state.continuous){return}else{this.state.continuous=true}this.state.begin=0;this.state.start=0;this.state.from=this._current();this.state.to=this._position(this.state.length);this.state.time=time=(this.state.duration*this.state.length);if(this.state.from>0){prorate=Math.round(time*(this.state.to-this.state.from)/this.state.to);this.state.start=time-prorate;time=prorate}this.els.list.style.transition='transform '+time+'ms linear';this.els.list.addEventListener('transitionend',this.evt.transition);transform=this.state.axis.replace('{0}',(this.state.to*-100)+'%');this.els.list.style[this.state.prop]=transform;cancelAnimationFrame(this.state.frame);this.state.frame=requestAnimationFrame(this.state.calc)},_position:function(index){if(this.options.infinite||this.options.continuous||this.options.scroll!=='panel'){to=index*this.state.single}else{to=Math.floor(index/this.state.visible)*this.state.panel}return to},_activate:function(item){var tab,name,tabs;item.classList.add('active');tab=item.closest(".ui-tab[data-tab]");name=tab&&tab.getAttribute('data-tab');tabs=tab&&tab.closest(".ui-tabs");if(tabs&&name){Behaviors.Tabs.Set(tabs,true,name)}else{tab=item.closest(".el-tab[aria-controls]");tabs=tab&&tab.closest('.el-tab-box');tabbable=tabs&&$(tabs).data('cmsTabbable');if(tab&&tabs&&tabbable){$(tabs).data('cmsTabbable').tab(tab.getAttribute('index'))}}},_deactivate:function(item){if(!item||!item.classList.contains('active')){return}item.classList.remove('active');item.querySelectorAll(".cms-jwplayer").forEach(function(el){var player=$(el).data('player');if(player){player.stop()}});item.querySelectorAll("video").forEach(function(el){if(!el.classList.contains("jw-video")){el.stop()}})},refresh:function(){var start,end,middle,from,to,item,active,total,items=this.els.items;if(this.options.scroll==='panel'){start=this.state.index<this.state.visible;end=Math.floor(this.state.index/this.state.visible)===this.state.pages-1}else{start=this.state.index===0;end=this.state.index===this.state.length-1}this.els.scroller.classList[start?'add':'remove']('start');this.els.scroller.classList[end?'add':'remove']('end');if(items){if(this.options.activate==='panel'){from=Math.floor(this.state.index/this.state.visible)*this.state.visible;to=from+this.state.visible-1}else{if((this.state.visible%2)===1&&this.options.firstActive===false&&this.state.tabbing===false){middle=(this.state.index>=(this.els.items.length-Math.floor(this.state.visible/2)))?this.state.index-this.els.items.length+Math.floor(this.state.visible/2):this.state.index+Math.floor(this.state.visible/2);from=middle;to=middle}else{from=this.state.index;to=this.state.index}}for(var i=0;i<items.length;i++){item=items[i];if(i>=from&&i<=to){this._activate(item)}else{this._deactivate(item)}}}if(this.options.scroll==='panel'){active=Math.floor(this.state.index/this.state.visible)+1;total=this.state.pages}else{active=this.state.index+1;total=this.state.length}if(this.els['page-active']){this.els['page-active'].forEach(function(el){el.textContent=active})}if(this.els['page-total']){this.els['page-total'].forEach(function(el){el.textContent=total})}}});if(window.register){window.register("m/scrolling-list")}}));