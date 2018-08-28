var pointers = [
	"alias","all-scroll","auto","cell","context-menu","col-resize","copy","crosshair","default","e-resize","ew-resize",
	"help","move","n-resize","ne-resize","nw-resize","ns-resize","no-drop","none","not-allowed","pointer","progress",
	"row-resize","s-resize","se-resize","sw-resize","text","vertical-text","w-resize","wait","zoom-in","zoom-out"
],
htmlElems = [
	 "section","article","aside","header","nav","footer","hgroup","h1","h2","h3","h4","h5","h6","address",
	 "blockquote","div","dd","dl","dt","figcaption","figure","hr","li","main","ol","p","pre","ul",
	 "a","b","br","code","em","i","mark","s","samp","small","span","strong","time",
	 "button","datalist","fieldset","form","input","label","legend","meter",
	 "optgroup","option","output","progress","select","textarea",
	 "caption","col","colgroup","table","tbody","td","th","thead","tfoot","tr",
	 "area","audio","img","map","track","video",
	 "embed","object","param","source",
	 "canvas","noscript","script"
],
allowTypeEl = [
	"content_sections","text_content","inline_text","image_multimedia",
	"embedded_content","scripting","tabe_content","form"
];
/*htmlElems = {
	'content_sections':[
		"section","article","aside","header","nav","footer","hgroup","address"
	],
	'text_content':[
		"blockquote","div","dd","dl","dt","figcaption","figure","hr","li","main","ol","p","pre","ul"
	],
	'inline_text':[
		"a","b","br","code","em","i","mark","s","samp","small","span","strong","time"
	],
	'image_multimedia':[
		"area","audio","img","map","track","video",
	],
	'embedded_content':[
		"embed","object","param","source",
	],
	'scripting':[
		"canvas","noscript","script"
	],
	'tabe_content':[
		"caption","col","colgroup","table","tbody","td","th","thead","tfoot","tr",
	],
	'form':[
		"button","datalist","fieldset","form","input","label","legend","meter",
		"optgroup","option","output","progress","select","textarea",
	]

};*/
var navright = document.querySelectorAll('.navright .tools-set .cols span'),
	navCenter = document.querySelectorAll('section .tools-set'),
	lists = document.querySelectorAll('section .dropdown-menu code'),
	btn	= document.querySelector('section .cols BUTTON'),
	parent	= document.querySelector('section.main_sec'),
	elemArray = [], textArray = [], counter = 0, errors = {},cursor = null,
	uniqid,
	red,
	green,
	blue;
	parent.id = "parentId";
	parent.style.height = 70 + "%";
	parent.setAttribute("ondragover","allowDrop(event)");
	parent.setAttribute("ondrop","drop(event)");
var helper = {
	forLooper:function(elObj,idx,len,action,options){
		var el = elObj?true:false,
			idx = idx?idx:0,
			len = len?len:elObj.length,
			action = action?action:null,
			options = options?options:null;
			// console.log(elObj.length);
		if(el){
			for(;idx < len;idx++){
				action.act(elObj[idx]);
			}
		}
	},
	appendCh:function(pr,ch){
		pr.appendChild(ch);
		console.log("appended");
	}
};
function PageEditor(elem){
	//this.elemArray = [elem];
	/*this.width = elem.style.width;
	this.height = elem.style.height;
	this.posX = elem.posX;
	this.posy = elem.posy;*/
}
/*******WEB STORAGE*******/
function storageAvailable(type) {
    try {
        var storage = window[type],
            x = '__storage_test__';
        storage.setItem(x, x);
        storage.removeItem(x);
        return true;
    }
    catch(e) {
        return e instanceof DOMException && (
            // everything except Firefox
            e.code === 22 ||
            // Firefox
            e.code === 1014 ||
            // test name field too, because code might not be present
            // everything except Firefox
            e.name === 'QuotaExceededError' ||
            // Firefox
            e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
            // acknowledge QuotaExceededError only if there's something already stored
            storage.length !== 0;
    }
}

function extendLocStorage(){
	Storage.prototype.setObject = function(key, value) {
	    this.setItem(key, JSON.stringify(value));
	}
	Storage.prototype.getObject = function(key) {
		
	    return JSON.parse(this.getItem(key));
	}
}

function pauseEvent(e){
	// console.log(e);
    if(e.stopPropagation) e.stopPropagation();
    if(e.preventDefault) e.preventDefault();
    e.cancelBubble = true;
    e.returnValue = false;
    return false;
}


function drag(ev) {
	//ev.preventDefault();
	var evtTarget = ev.target;
    ev.dataTransfer.setData("text", ev.target.id);

	//textArray = localStorage.getObject(['textNode']);
}

function drop(ev) {
    pauseEvent(ev);

    var data = ev.dataTransfer.getData("text"),
    	elem = document.getElementById(data),
    	evtTarget = ev.target;
	if(evtTarget.id !== elem.id){
	    evtTarget.appendChild(elem);
	    locStorage({"target":evtTarget});
	}else{return false;}
    //console.log(evtTarget.parentNode.children.length);
}

function allowDrop(ev) {

    pauseEvent(ev);
    //console.log(textArray);

}
//console.log(Object.keys(localStorage));
var evtAttr = {
	attrArg: {
		draggEvent:{
			'draggable':"true",
			'ondragstart':'drag(event)',
			"ondrop":"drop(event)",
			"ondragover":"allowDrop(event)",
			"id": this.innerHTML+uniqid
		},
		stl:{
			
			"border": 5 + "px solid " + 'rgba(' + red + "," + green + "," + blue + "," + 1 +')',
			"width": Math.floor(Math.random() * (100 - 0) + 0) + "%",
			"height": Math.floor(Math.random() * (100  - 0) + 0) + "%"
		}
	},
	attrSeter: function(el,attributes,fnEvt){
				
		if(typeof attributes === "object"){
			for(attribute in attributes){
				if(attributes.hasOwnProperty("draggEvent") && attribute === "draggEvent"){
					var eventsAttr = attributes[attribute];
					for(var event in eventsAttr){
						el.setAttribute(event,eventsAttr[event]);
					}
				}
				if(attributes.hasOwnProperty("stl") && attribute === "stl"){
					var eventsAttr = attributes[attribute];
					for(var st in eventsAttr){
						el.style[st] = eventsAttr[st];
					}
				}
			}
			return this;
		}
		el.setAttribute(attributes,fnEvt);
		return this;
	},
	attrGeter: function(el,attributes){

		if(typeof attributes === "object"){
			
			var attrOject = {};

			var elAttr = [],all = attributes.all, each = attributes.each;
			if((each !== true) && (all !== true && each !== true || all === true && each === true)){
				attributes = el.attributes;
				all = true;
			}else if(each === true){
				attributes = attributes.allEach;
				all = false;
			}

			for(var ii = 0, len = attributes.length; ii< len;ii++){
				
				var attrName = attributes[ii].name? attributes[ii].name: attributes[ii];
				
				if(attrName){
					attrOject[attrName] = el.getAttribute(attrName);
				}
			}
			return attrOject;
		}
		return el.hasAttribute(attributes)? el.getAttribute(attributes):null;
	},
	attrRemove: function(el,attributes){
		if(typeof attributes === "object"){
			
			var elAttr = [],all = attributes.all, each = attributes.each, except = attributes.except, only = attributes.only;
			
			if((each !== true) || (all !== true && each !== true || all === true && each === true)){
				attributes = el.attributes;
				all = true;
			}else if(each === true){
				attributes = attributes.allEach;
				all = false;
			}else{
				all = false;
				attributes = null;
			}

			var attName = [];
			
			for(var ii = 0, len = attributes.length;ii< len;ii++){
				var itemName = attributes[ii].name? attributes[ii].name:attributes[ii];

				if(itemName && itemName !== "undefind"){

					if(except && except.indexOf(itemName) >= 0){
						continue;
					}else{
						attName.push(itemName);
					}
				}
			}
			if(only && attName.indexOf(only[0]) >= 0) attName = attName.filter(function(curr){ return only.indexOf(curr) >= 0;})
//			console.log(attName);
			this.remEachAttr(el,attName);
			return this;
		}
		if(el.hasAttribute(attributes)) el.removeAttribute(attributes);
		//el.removeEventListener("mousedown",resizeElem);
		return this;
	},
	remEachAttr: function(elem,arr){
		arr.forEach(function(els){
			elem.removeAttribute(els);
		});
	}

};
function clearStorag(){
	localStorage.clear();
	location.reload();
}

if(storageAvailable("localStorage")){
	
	extendLocStorage();

	function locStorage(item){

		if((item instanceof HTMLElement === false) && typeof item === "object" || item instanceof Element === false){
			var pt = item.target;
			
 			var elemObj = {};
 			function elemsCall(ptt){

 				if(ptt.nodeType == 3){
 					
 				}
 				var child = ptt.firstChild;
 				while(child){
 					var current = child.nodeType == 1?child.tagName:null;
 					var currentanother = child.nodeType == 1?child:null;
 					if(child && current && currentanother){

 						var pId = "parent"+Date.now(), cTag = child.tagName, cId = child.id, co = counter;

 						elemObj[ptt.tagName+":"+ptt.id] = ! elemObj[ptt.tagName+":"+ptt.id]? current +":"+ (cId):
 						(elemObj[ptt.tagName+":"+ptt.id] !== current +":"+ (cId))? elemObj[ptt.tagName+":"+ptt.id] += ":"+current +":"+ (cId): current +":"+ (cId);
 					}
 					elemsCall(child);
 					
 					var sibling = child.nextSibling;
 					child = sibling;
 				}
 			}
 			elemsCall(parent)
 			elemObj['textNode'] = elemArray.join(":");
 			//elemObjs += currObj;
 			console.log(elemObj);
 			localStorage.setObject('htmlObjects',elemObj);
			return;
		}
		var getAttr = evtAttr.attrGeter(item,{});
		var loopStl = item['style'],obStl = {};
		for(var stl in loopStl){
			if(loopStl.hasOwnProperty(stl)) obStl[stl] = loopStl[stl];
		}
		localStorage.setItem('htmlTag:' +item.id,item.tagName);
		localStorage.setObject('element_style:' +item.id,obStl);
		localStorage.setObject('element_attr:' +item.id,getAttr);
	}
} else{
	var msg = "storage unailable";
}

var createElement = function(){
	var elemObj = {};
	
	for(var idx = 0,length = lists.length;idx < length;idx++){
		lists[idx].addEventListener('click',function(e){
			var message = [],dataType = this.getAttribute('data-type'),
			uniqid = Date.now(),
			red	=  Math.floor(Math.random() * (255 - 0) + 0),
			green = Math.floor(Math.random() * (255 - 0) + 0),
			blue = Math.floor(Math.random() * (255 - 0) + 0);
			//console.log(this.parentNode.getAttribute('data-type'));
			if(htmlElems.indexOf(this.innerHTML) >= 0 && allowTypeEl.indexOf(dataType) >= 0){
				btn.innerHTML = this.innerHTML;
				var elem = document.createElement(this.innerHTML);
				
				//parent.style.className += "resize-container";
				//parent.style.display = "inline-block";
				elem.style.parent_node = [parent.tagName ,parent.className];
				elem.style.position = "relative"
				elem.className = "unselected";
				elem.style.right = 10 + "%";
				/*elem.style.resize = "both";
				elem.style.overflow = "auto";*/
				elem.id = uniqid;
				elem.textContent = /*"<h1 style='color:blue;text-align:center;font-size:32px;'>" + */this.innerHTML +" this is text node"  +uniqid /*"</h1>"*/;
				
				elemArray.push(elem.tagName);
				elemArray.push(elem.id);
				elemArray.push(elem.textContent);
				//textArray.push(elem.textContent);	
				//parent.style.height = parent.parentNode.clientHeight   + "px";
				elemObj[parent.tagName+":"+parent.id] = elemObj[parent.tagName+":"+parent.id]? elemObj[parent.tagName+":"+parent.id] += ":"+elem.tagName +":"+ elem.id:
				elem.tagName +":"+ elem.id;
				elemObj['textNode'] = elemArray.join(':');
				//localStorage.setObject('htmlObjects',elemObj);
				
				parent.appendChild(elem);
				
				if(dataType === "content_sections" || dataType === "text_content" ||
					dataType === 'tabe_content' || dataType === "form" || dataType === 'image_multimedia'){
					evtAttr.attrSeter(elem,{stl:{
							
						"border": 2 + "px solid " + 'rgba(' + red + "," + green + "," + blue + "," + 1 +')',
						"top": 5 + "px",
						"borderRadius": 5 + "px",
						"width": Math.floor((Math.random() * 80) + 25) + "%",
						"height": 100 + "px",
						"textAlign": "center",
						"fontSize":"18px"
					}})
					.attrSeter(elem,{
						"draggEvent":{
							'draggable':"true",
							'ondragstart':'drag(event)',
							"ondrop":"drop(event)",
							"ondragover":"allowDrop(event)",
						}
					});
				}

				locStorage({});
				locStorage(elem);
			}else{
				var msg = "The elements " + this.innerHTML.toUpperCase()  + " you Trying to create NOT PART of html specification";
				message.push(msg);
				errors.errorMessage = message;
			}
		});
	}
}
createElement();

function getId(theItem,theNidle){
	if(theNidle){
		return theItem.split(':')[theNidle];
	}
	return theItem.split(':');
}
function localStorageUpdate(){
	var elemObjs = localStorage.getObject('htmlObjects');
		
	console.log(elemObjs);
	if(elemObjs){
		var textNodes = elemObjs['textNode'],
			textArray = getId(textNodes),
			parentId = elemObjs['SECTION:parentId'],
			childrens = getId(parentId),
			ch ,cid,fl = false;
		childrens.forEach(function(current,idx){
		
			if(typeof current === "string" && ! isFinite(current)) ch = document.createElement(current);
			if(isFinite(current)) cid = current;
			if(ch && cid){
				if(textArray.indexOf(cid) >= 0){
					ch.innerHTML = (textArray[textArray.indexOf(cid)+1]);
					ch.id = cid;
				} 
				evtAttr.attrSeter(ch,{draggEvent:localStorage.getObject('element_attr:'+cid)});
				parent.appendChild(ch);
			} 	
		});

		for(var elemObj in elemObjs){
			
			if(elemObj !== 'SECTION:parentId' && elemObj !== 'textNode'){
				var theObj = elemObjs[elemObj],
					parentTag = getId(elemObj,0),parentId = getId(elemObj,1),
					parentElement = document.getElementById(parentId)?document.getElementById(parentId):document.createElement(parentTag),
					childrens = getId(theObj), ch ,cid;
				childrens.forEach(function(current,idx){
					
					if(typeof current === "string" && ! isFinite(current)) ch = document.createElement(current);
					if(isFinite(current)) cid = current;
					if(ch && cid){
						ch.id = cid;
						if(textArray.indexOf(cid) >= 0){
							ch.innerHTML = textArray[textArray.indexOf(cid)+1];
							ch.id = cid;
						} 
						evtAttr.attrSeter(ch,{draggEvent:localStorage.getObject('element_attr:'+cid)});
						parentElement.appendChild(ch);
					} 
				});
			}
		}
		elemArray = textArray;
	}
}
localStorageUpdate();

var cursor = null,clNod = false,elTar;
//initEvt
helper.forLooper(navright,0,navright.length,{
	act:function(elem){
		elem.addEventListener('click',function(e){
			var dataAtt = e.target.getAttribute("data-type"),
				hasPointer = pointers.indexOf(dataAtt) >= 1;
			if(dataAtt === "full-screen" && clNod === false){
				var elTar = document.createElement("DIV");
				evtAttr.attrSeter(elTar,{stl:{
						
					"position": "absolute",
					"top": 0 + "px",
					"bottom": 0 + "px",
					"width": 100 + "%",
					"background": "rgba(220,220,220,1)",
					"height": 100 + "%",
					"zIndex": 999
				}});
				var trcln = document.createElement("BUTTON");
				trcln.innerHTML = "חזור מצב עריכה";
				trcln.className = "btn btn-primary";
				elTar.appendChild(trcln);
				trcln.onclick = function(ev){
					//elTar = null;
					elTar.offsetParent.removeChild(elTar);
					//location.reload();
					console.log("removed");
					return;
				};
				helper.forLooper(parent.children,0,parent.children.length,{
					act:function(elemChilds){
						var cln = elemChilds.cloneNode(true);
						console.log(elemChilds.nodeType);
						if(elemChilds.nodeType === 1) elTar.appendChild(cln);
					}
				});
				document.body.appendChild(elTar);
				
				//console.log(this.offsetParent.offsetParent);
			}
			if(dataAtt === "edit"){
				
				//evtAttr.attrRemove(parent,{except:['id','ondragover','ondrop']});
				 initEvt();
			}
/*
			if(hasPointer){
				
				document.body.style.cursor = dataAtt;
				//document.body.addEventListener('mousemove',cursorFn);
				initEvt();
				document.body.addEventListener("mouseup",removeListenr);
				if(cursor) cursor = null;

			}else if(! cursor)	{

				cursor = document.createElement("i");
				cursor.className = e.target.className;
				cursor.style.position = "fixed";
				cursor.style.textShadow = ".5px .5px 6px rgba(180,180,180,1)";
				cursor.style.fontSize = 18 + "px";
				cursor.style.width = 18 + "px";
				cursor.style.height = 18 + "px";
				//cursor.style.background = "rgba(180,180,180,1)";
			    cursor.style.zIndex = 100;
			    document.body.appendChild(cursor);
				initEvt(cursor);
				document.body.addEventListener("mouseup",removeListenr);
			}else{

				cursor.className = e.target.className;
			}
			if(cursor){
				document.body.addEventListener('mousemove',resizeElement.cursorFn);
			}else if(! cursor){
				document.body.removeEventListener("mousemove",resizeElement.cursorFn);
			}
*/
		});
	}
});

var eventsCollector = [];
var truly = true;
var boolin = true;
var boxRight,boxTop,relBox,bodyRight,padRight;
var isMoving = false;
var bottomPos,isTrue = true,tester,lopp = false,checker = true,siblings,boxBottom,otherBoolin = false,bbb,otherTest,topes,other,thisElem = [],offSetTest;
var resizeElement = {
	cursorFn: function(e){
		
		var targetDiv = e.target.tagName === "DIV" && e.target.className === "row target"? true:false,
			divChildren = e.target.tagName === "DIV" && (e.target.className === "col-sm-12 target-div" || 
							e.target.className === "col-sm-12 cols")?true:false,
			pTarget = e.target.tagName === "P" && e.target.className === "p-target"?true:false,
			spTarget = e.target.tagName === "SPAN" && e.target.id === "span-target"?true:false;
		
		if(targetDiv || divChildren || pTarget || spTarget){
		
			spTarget || pTarget?document.body.style.cursor = 'pointer':document.body.style.cursor = 'default';
			
		}else{
			document.body.style.cursor = 'none';
			cursor.style.display = "block";
		}
		
		if(window.getComputedStyle && getComputedStyle(e.target,null).cursor !== "none") cursor.style.display = "none";
		cursor.style.left = (e.clientX - (cursor.clientWidth / 2)) +"px";
		cursor.style.top = (e.clientY - (cursor.clientHeight /2))+ "px";
		//document.body.style.cursor = 'default';
	},
	mouseMvLeftCorner: function(event){
		//console.log(document.body.someElem);
		var targetElem = document.body.someElem,
			theWidth = targetElem.offsetWidth + (targetElem.getBoundingClientRect().left - event.clientX);
		//console.log(theWidth);
		if(targetElem.className === "unselected"){

			targetElem.style.width = Math.round(theWidth) + "px";
		}
	},
	mouseMvRightCorner:function(event){

		var el = document.body.someElem;

		if(el.className === "unselected"){

			var box = el.getBoundingClientRect();
			if(isTrue && el.style.position === "absolute"){
				padRight = el.offsetParent.getBoundingClientRect().right - box.right;
			}else{
				padRight = el.offsetParent.getBoundingClientRect().right - box.right - parseInt(getComputedStyle(el.offsetParent,null).paddingRight);
			}
			
			var theWidth = el.offsetWidth + (event.clientX - el.getBoundingClientRect().right),
				theRight = (padRight + (el.getBoundingClientRect().right - event.clientX));
				//console.log(theRight);
			if(el.offsetWidth >= 2) el.style.width = theWidth + "px";
			if((box.left + 4) < event.clientX) el.style.right = theRight + "px";

		}
	},
	mouseMvTopCorner: function(event){
		var el = document.body.someElem;

		if(el.className === "unselected"){
				
			if(isTrue){
				var box = el.getBoundingClientRect();
					boxBottom = box.bottom;
					tester = !! (parseInt(el.style.top))? boxBottom - el.offsetHeight - (parseInt(el.style.top)):boxBottom - el.offsetHeight;
					siblings = el.offsetParent.children;
					otherTester = (boxBottom - el.offsetHeight);
					isTrue = false;
					bbb = (boxBottom - el.offsetHeight);
					offSetTest = el.offsetHeight;
			}
			other = Math.round(boxBottom - event.clientY);
			
			var topPos =  (event.clientY - tester);
			el.style.height = other + "px";
			el.style.top = topPos + "px";
			console.log(Math.round((Math.round(event.clientY - bbb) / offSetTest)*100));
			if(el.style.position === "relative" && siblings.length > 1){
				helper.forLooper(el.offsetParent.children,0,el.offsetParent.children.length,{
					act: function(elems){
						
						if(lopp || (el.id === elems.id)){
							
							if(! elems.beforeElem && (!! thisElem.indexOf(elems.id) && elems.id === thisElem[thisElem.indexOf(elems.id)])){
								elems.style.zIndex = 0;
								var siblingTop = thisElem[thisElem.indexOf(elems.id) + 1] + (event.clientY - bbb);
								//console.log(elems.tagName+ " :top "+ (parseInt(elems.style.top)) + " :elems.id "+ thisElem[thisElem.indexOf(elems.id)]+ " :len "+ thisElem.length);
								elems.style.top = siblingTop + "px";
							}
							lopp = true;
						}else{
							elems.beforeElem = true;
						}
					} 
				});
			}
		}
	},
	mouseMvBottomtCorner: function(event){
		var el = document.body.someElem;

		if(el.className === "unselected"){
			var box = el.getBoundingClientRect();

			if(isTrue){
					boxBottom = box.bottom;
					isTrue = false;
			}
			var height = el.offsetHeight + (event.clientY - el.getBoundingClientRect().bottom),
				nidle = event.clientY - boxBottom;
			el.style.height = Math.round(height) + "px";
			//console.log(Math.round(height));
			if(el.style.position === "relative" && el.offsetParent.children.length > 1){
				helper.forLooper(el.offsetParent.children,0,el.offsetParent.children.length,{
					act: function(elems){
						
						if(lopp || (el.id === elems.id)){
							
							if(! elems.beforeElem && (!! thisElem.indexOf(elems.id) && (el.id !== elems.id) && elems.id === thisElem[thisElem.indexOf(elems.id)])){
								elems.style.zIndex = 0;
								elems.style.top = thisElem[thisElem.indexOf(elems.id) + 1] - (nidle) + "px";
							}
							lopp = true;
						}else{
							elems.beforeElem = true;
						}
					} 
				});
			}
		}
	},
	mouseMv: function(event){
		var el = document.body.someElem;

		if(el.className === "unselected"){
			
			var box = el.getBoundingClientRect(),
				prBox = el.offsetParent.getBoundingClientRect();

			if(isTrue && el.style.position === "absolute"){
				boxRight = box.right - event.clientX;
				boxTop = event.clientY - box.top;
				isTrue = false;
			}else if(isTrue && el.style.position === "relative"){
				
				bodyRight = parseInt(getComputedStyle(el.offsetParent,null).paddingRight)+(box.right - event.clientX);
				relBox =  box.top +(event.clientY - box.top) - parseInt(el.style.top);
				isTrue = false;
			}
			
			var rightPos = (el.style.position === "relative")? (prBox.right - bodyRight - event.clientX):(prBox.right - boxRight - event.clientX),
				topPos = (el.style.position === "relative")? (event.clientY - relBox):(event.clientY - prBox.top - boxTop);
			//console.log(rightPos+ " : topPos "+ topPos);
			el.style.right = rightPos + "px";
			el.style.top = topPos + "px";
		}
	},
	atachMoveEvent: function(ee){
		var el = ee.target;

		if(isMoving === false){
			if((ee.clientY <= (el.getBoundingClientRect().top + 5) && ee.clientY >= el.getBoundingClientRect().top)){
				//console.log(el.cursor);
				el.style.zIndex = 50;
				document.body.style.cursor = "row-resize";
				document.body.someElem = el;
				document.body.someElemId = el.id;

				document.body.theFn = "mouseMvTopCorner";
				el.addEventListener("mousedown",resizeElement.addEvent);
			}else if((ee.clientY > (el.getBoundingClientRect().bottom - 5) && ee.clientY < el.getBoundingClientRect().bottom)){

				document.body.style.cursor = "row-resize";
				document.body.someElem = el;
				el.style.zIndex = 50;
				document.body.theFn = "mouseMvBottomtCorner";
				el.addEventListener("mousedown",resizeElement.addEvent);

			}else if((ee.clientX > (el.getBoundingClientRect().left) && ee.clientX < el.getBoundingClientRect().left + 5)){

				document.body.style.cursor = "e-resize";
				document.body.someElem = el;
				el.style.zIndex = 50;
				document.body.theFn = "mouseMvLeftCorner";
				el.addEventListener("mousedown",resizeElement.addEvent);

			}else if((ee.clientX < (el.getBoundingClientRect().right) && ee.clientX > el.getBoundingClientRect().right - 5)){
				
				document.body.style.cursor = "e-resize";
				el.style.zIndex = 50;
				document.body.theFn = "mouseMvRightCorner"; 
				document.body.someElem = el;
				el.theFn = resizeElement.addEvent;
				//rightPos = el.getBoundingClientRect().right;
				el.addEventListener("mousedown",resizeElement.addEvent);

			}else{
				document.body.style.cursor = "move";

				el.style.zIndex = 50;
				document.body.theFn = "mouseMv"; 
				document.body.someElem = el;
				el.theFn = resizeElement.addEvent;
				el.addEventListener("mousedown",resizeElement.addEvent);
				//console.log(this);
			}
			
			el.addEventListener("mouseleave",function(ee){
				document.body.style.cursor = "default";
				//console.log(this);
				//this.removeEventListener('mousemove', arguments.callee);
				this.removeEventListener('mouseleave', arguments.callee);
			});
			
		}
	},
	addEvent: function(){
		var theFn = document.body.theFn;
		console.log(this.tagName);

		if(theFn == "mouseMvLeftCorner") resizeElement.addOrRm(document.body,"add","mousemove",resizeElement.mouseMvLeftCorner);

		if(theFn == "mouseMvRightCorner") resizeElement.addOrRm(document.body,"add","mousemove",resizeElement.mouseMvRightCorner);
		if(theFn == "mouseMvTopCorner") resizeElement.addOrRm(document.body,"add","mousemove",resizeElement.mouseMvTopCorner);
		if(theFn == "mouseMvBottomtCorner") resizeElement.addOrRm(document.body,"add","mousemove",resizeElement.mouseMvBottomtCorner);
		if(theFn == "mouseMv") resizeElement.addOrRm(document.body,"add","mousemove",resizeElement.mouseMv);
		isMoving = true;
		theFn = null;
		boolin = true;
		//resizeElement.addOrRm(document.body.someElem,"rm","mousedown",resizeElement.addEvent);
	},
	addOrRm: function(el,evt,type,evtFn){
		//if(el.firstElementChild) evtAttr.attrRemove(el.firstElementChild,{except:['id','style','class']});
		//resizeElement.addOrRm(this,"rm",,;
		
		if(evt === "add") el.addEventListener(type,evtFn);
		if(evt === "rm") el.removeEventListener(type,evtFn);
		//pauseEvent(el);
	}
};
// if(boolin === true){
function removeListenr(){
	resizeElement.addOrRm(document.body,"rm","mousemove",resizeElement.mouseMvLeftCorner);
	resizeElement.addOrRm(document.body,"rm","mousemove",resizeElement.mouseMvRightCorner);
	resizeElement.addOrRm(document.body,"rm","mousemove",resizeElement.mouseMvTopCorner);
	resizeElement.addOrRm(document.body,"rm","mousemove",resizeElement.mouseMvBottomtCorner);
	resizeElement.addOrRm(document.body,"rm","mousemove",resizeElement.mouseMv);
	
	helper.forLooper(parent.children,0,parent.children.length,{
		act: function(elems){
			var elTop = parseInt(elems.style.top);
			if(thisElem.indexOf(elems.id) >= 0) thisElem.splice(thisElem.indexOf(elems.id),2);
			
			thisElem.push(elems.id);
			thisElem.push(parseInt(elems.style.top));
			elems.beforeElem = false;
		}
	});
	if(document.body.someElem) locStorage(document.body.someElem);
	console.log("/////////////");
	checker = true;
	isMoving = false;
	isTrue = true;
	lopp = false;
	
	document.body.someElem = null;

	return false;
}
document.body.addEventListener("mouseup",removeListenr);

function initEvt(cursor){
	var pointer = cursor?cursor:null;
	helper.forLooper(parent.children,0,parent.children.length,{
		act:function(el){

			var box = el.getBoundingClientRect();

			//el.cursor = pointer;
			!!pointer? pointer.addEventListener("click",function(){pointer.style.zIndex = -1;}):"";
			evtAttr.attrRemove(el,{except:['id','style','class']});
			el.style.position = "relative";

			var elTop = parseInt(el.style.top);
			if(thisElem.indexOf(el.id) >= 0) thisElem.splice(thisElem.indexOf(el.id),2);
				thisElem.push(el.id);
				thisElem.push(parseInt(el.style.top));

			if(isMoving === false){
				el.addEventListener("mousemove",resizeElement.atachMoveEvent);
				document.body.someElem = el;
				eventsCollector.push([el.id,"mousemove",resizeElement.atachMoveEvent]);
			}
		}
	});
	console.log(eventsCollector);
}
document.getElementById('normal-mod').onclick = function(){
	
	helper.forLooper(parent.children,0,parent.children.length,{
		act:function(el){
			el.removeEventListener("mousemove",resizeElement.atachMoveEvent);
			el.removeEventListener("mousedown",resizeElement.addEvent);
		}
	});
	document.body.removeEventListener("mouseup",removeListenr);
	document.body.cursor = "default";
};

/*parent.addEventListener("mousedown",function(event){
	//pauseEvent(this);
	evtAttr.attrRemove(parent.firstElementChild,{except:['id','style','class']});
	addOrRm(parent,"add","mousemove",mouseMvLeftCorner);
});*/
/*parent.addEventListener('mouseup',function(){
	//pauseEvent(this);
	addOrRm(parent,"rm","mousemove",mouseMvLeftCorner);
	console.log("mouseupssss " + parent.firstElementChild.tagName);
	//mouseMvLeftCorner = null;
	return false;

});*/