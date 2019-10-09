var eventUtil={
    //添加事件
    addEvent:function (element,type,fn) {
        if(element.addEventListener){
            element.addEventListener(type,fn,false);
        }else if(element.attachEvent) {
            element.attachEvent('on'+type,fn);
        }else
            element['on'+type]=fn;
    },
    //删除事件
    removeEvent:function (element,type,fn) {
        if(element.addEventListener){
            element.removeEventListener(type,fn,false);
        }else if(element.attachEvent) {
            element.detachEvent('on'+type,fn);
        }else
            element['on'+type]=null;
    },
    //获取事件对象
    getEvent:function(ev){
        return ev||event;
    },
    //获取事件类型
    getType:function () {
      return this.getEvent().type;
    },
    //获取事件目标
    getTarget:function () {
        return this.getEvent().target||this.getEvent().srcElement;
    },
    //阻止事件冒泡
    stopBubble:function () {
        if(this.getEvent().stopPropagation){
            this.getEvent().stopPropagation();
        }else {
            this.getEvent().cancelBubble=true;
        }
    },
    //组止默认行为
    preventDefault:function () {
        if(this.getEvent().preventDefault){
            this.getEvent().preventDefault()
        }else{
            this.getEvent().returnValue=false;
        }
    },
    //事件代理
    agent:function (parent,targetName,type,fun) {
        this.addEvent(parent,type,function(ev) {
            var e=ev||event;
            var target=e.target||e.srcElement;
            while(target.nodeName!==targetName.toUpperCase()&&target!==parent){
                target=target.parentNode;
            }
            if(target.nodeName===targetName.toUpperCase())
                fun.call(target);//改变this的指向
        })
    },
    agents:function (parent,targetArr,type,fun) {
        var _this=this;
        targetArr.forEach(function (targetName) {
            _this.addEvent(parent,type,function(ev) {
                var e=ev||event;
                var target=e.target||e.srcElement;
                while(target.nodeName!==targetName.toUpperCase()&&target!==parent){
                    target=target.parentNode;
                }
                if(target.nodeName===targetName.toUpperCase())
                    fun.call(target);//改变this的指向
            })
        })
    },
    //jquery型获取标签
    $:function (exp) {
        if(/^#\w+$/){
            return document.querySelector(exp);
        }else{
            return document.querySelectorAll(exp);
        }
    },
    //获取滚动条的top和left
    getScroll:function(el){
        var top=0;
        var left=0;
        if(el===document){
            top=el.body.scrollTop||el.documentElement.scrollTop;
            left=el.body.scrollLeft||el.documentElement.scrollLeft;
        }else{
            top=el.scrollTop;
            left=el.scrollLeft;
        }
        return {top:top,left:left}
    },
    //拖拽框架
    stop:function (ev) {
        var e=ev||event;
        e.preventDefault();
        e.returnValue=false;
        return e;
    },
    pullMove:function (childArr,offsetParent,parentArr) {
        var _this=this;
        if(parentArr){
            childArr.forEach(function (obj,i) {
                obj.onmousedown=function (ev) {
                    var e1=_this.stop(ev);
                    var disX=e1.pageX-parentArr[i].offsetLeft;
                    var disY=e1.pageY-parentArr[i].offsetTop;
                    document.onmousemove=function (ev) {
                        var e2=_this.stop(ev);
                        var left=e2.pageX-disX;
                        var top=e2.pageY-disY;
                        if(offsetParent===window){
                            var maxW=window.innerWidth-parentArr[i].offsetWidth;
                            var maxH=window.innerHeight-parentArr[i].offsetHeight;
                            left=Math.min(Math.max(left,0),maxW);
                            top=Math.min(Math.max(top,0),maxH);
                        }else {
                            var maxW=offsetParent.offsetWidth-parentArr[i].offsetWidth;
                            var maxH=offsetParent.offsetHeight-parentArr[i].offsetHeight;
                            left=Math.min(Math.max(left,offsetParent.offsetLeft),maxW+offsetParent.offsetLeft);
                            top=Math.min(Math.max(top,offsetParent.offsetTop),maxH+offsetParent.offsetTop);
                        }
                        parentArr[i].style.left=left+"px";
                        parentArr[i].style.top=top+"px";
                    };
                    document.onmouseup=function () {
                        document.onmousemove=null;
                        document.onmouseup=null;

                    }
                }
            })
        }
        else{
            childArr.forEach(function (obj) {
                obj.onmousedown=function (ev) {
                    var e1=_this.stop(ev);
                    var disX=e1.pageX-obj.offsetLeft;
                    var disY=e1.pageY-obj.offsetTop;
                    document.onmousemove=function (ev) {
                        var e2=_this.stop(ev);
                        var left=e2.pageX-disX;
                        var top=e2.pageY-disY;
                        if(offsetParent===window){
                            var maxW=window.innerWidth-obj.offsetWidth;
                            var maxH=window.innerHeight-obj.offsetHeight;
                            left=Math.min(Math.max(left,0),maxW);
                            top=Math.min(Math.max(top,0),maxH);
                        }else {
                            var maxW=offsetParent.offsetWidth-obj.offsetWidth;
                            var maxH=offsetParent.offsetHeight-obj.offsetHeight;
                            left=Math.min(Math.max(left,offsetParent.offsetLeft),maxW+offsetParent.offsetLeft);
                            top=Math.min(Math.max(top,offsetParent.offsetTop),maxH+offsetParent.offsetTop);
                        }
                        obj.style.left=left+"px";
                        obj.style.top=top+"px";
                    };
                    document.onmouseup=function () {
                        document.onmousemove=null;
                        document.onmouseup=null;
                    }
                }
            })
        }
    },
    //清除class
    /*clearClass:function (cArr,cls) {
        cArr.forEach(function (el) {
            el.classList.remove('cls');
        })
    }*/
    clearClass:function (cArr,cls) {
       for(var i=0;i<cArr.length;i++){
           if (cArr[i].classList.contains(cls)){
               cArr[i].classList.remove(cls);
               break;
           }
       }
    }
}