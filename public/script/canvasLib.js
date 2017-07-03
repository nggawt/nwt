//js
//var Mycanvas = document.getElementById('myCan');
var ojj = (function(mycanvas){
	var canvas = document.getElementById('myCan'),
		parent = document.getElementById('parent');

	canvas.setAttribute('width',parent.clientWidth);
	canvas.setAttribute('height',450);//parent.clientHeight
	var obj = {
		style:{
			fillStyle:"rgba(50,150,200,.3)",
			strokeStyle: "rgba(50,150,200,1)",
			colorDefault:"blue",
			font :'13px Ariel',
			width:null,
			height:null,
			posx:null,
			posy:null
		},
		radius:5,
		startDrawing:0,
		stopDrawing:Math.PI * 2,
		clockwise:false,
		beginClosePath:false,
		coords:{
			arc:{
				x:null,
				y:null
			},
			bezier:{
				x:null,
				y:null
			},
			ellipse:{
				x:null,
				y:null
			},
			quadratic:{
				x:null,
				y:null
			}
		},
		clearRect:false,
		isObj:function(item){

			return typeof item === 'object';
		},
		isNum:function(item){
			return typeof item === 'number';
		},
		isStr:function(item){
			return typeof item === 'string';
		},
		isFunc:function(item){
			return typeof item === 'function';
		},
		isArr:function(arrayParams,second){
			var itsTrue = true;
			for(var ii = 0;ii < arrayParams.length;ii++){
				if(itsTrue){
					itsTrue = obj.isNum(arrayParams[ii]);
				}else{ return false; }
			}
			return itsTrue;
		},
		checkParams:function(items,len){
			var itsTrue = true,ii = 0,lent = 0;
			
			for(;ii < items.length;ii++){
				var inItems = items[ii];
				if(inItems.length === len || inItems.length === 6){
					for(;lent < inItems.length;lent++){
						if(itsTrue){
							if(inItems[lent] === true && typeof inItems[inItems.length -1] === "boolean"){
								itsTrue = true;
							}else{
								itsTrue = this.isNum(inItems[lent])?true:false;
							}
						}else{
							return false;
						}
					}
				}else{ return false;}
			}
			
			return itsTrue;
		},
		message:[]
		
	};
	var CanvasObj = function(){
		if(canvas.getContext){
			this.ctx = canvas.getContext('2d');
			this.width = canvas.width;
			this.height = canvas.height;
		}
	};
	CanvasObj.prototype.skeleton = function(text,gap,target){
		var thiz = this.ctx,xGap,yGap;
		thiz.beginPath();
		thiz.fillStyle = obj.style.fillStyle;
		thiz.font = obj.style.font;
		if(target === 'vGap'){
			if(text * gap <= this.width){
				xGap = text * gap;
				thiz.fillText(text || '1',xGap,this.height -5);
			}
		}
		if(target === 'hGap'){
			if(text <= 15 && text !== 0){
				var lastMonth = this.height / gap;//30
				yGap =(this.height / lastMonth) * (lastMonth -text)+(gap * (-text));
				thiz.fillText(text + '00' || '1',30,(yGap));
				thiz.strokeStyle= "rgba(0,0,0,.2";
				thiz.beginPath();
				thiz.moveTo(0,Math.round(yGap));
				thiz.lineTo(this.width,Math.round(yGap));
				thiz.stroke();
				thiz.fill();
			}
		}
		thiz.closePath();
	};

	CanvasObj.prototype.createArc = function(xData,yData){

		thiz = this.ctx;

		thiz.strokeStyle= obj.style.colorDefault;
		thiz.fillStyle = obj.style.fillStyle;
		thiz.beginPath();
		yData = yData.reverse();
		xData.forEach(function(item,index,arr){
			
			var xx = Math.round(item);
			var yy = Math.round(yData[index]);
			if(index == 0){
				thiz.moveTo(0,this.height);
			}else{
				index > 3 && yy > 13 ?
				thiz.arc(xx ,yy + Math.random()* (50 - 0) + 20, 2, 0, Math.PI * 2, false):
				thiz.arc(xx ,yy, 2, 0, Math.PI * 2, false);
			}
		});

		//thiz.fill();
		thiz.stroke();
		//thiz.save();
		thiz.closePath();
	};

	CanvasObj.prototype.arc = function(){

		var thiz = this.ctx,items = [];
		// thiz.clearRect(0,0,this.width,this.height);

		thiz.strokeStyle= obj.style.strokeStyle;
		thiz.fillStyle = obj.style.fillStyle;
		thiz.beginPath();
		
		obj.coords.arc.x.forEach(function(item,index,arr){
			
			if(index === 0) thiz.moveTo(0,this.height);//thiz.arc(0 ,this.height, 0, Math.PI * 2, true);
			thiz.arc(item ,obj.coords.arc.y[index],obj.radius, 0, Math.PI * 2, true);
			// thiz.save();
		});
		
		//thiz.fill();
		thiz.stroke();
		//thiz.save();
		// thiz.closePath();
	};
	CanvasObj.prototype.bezier = function(){

		var thiz = this.ctx,items = [];
		// thiz.clearRect(0,0,this.width,this.height);

		thiz.strokeStyle= "red";
		thiz.fillStyle = obj.style.fillStyle;
		thiz.beginPath();
		
		
		obj.coords.bezier.x.forEach(function(item,index,arr){
			var a = obj.coords.bezier.x[index].keys();
			var data = obj.coords.bezier.x[index];
			
			thiz.bezierCurveTo(data[a.next().value] ,data[a.next().value] ,data[a.next().value] ,
								data[a.next().value] ,data[a.next().value],data[a.next().value]);
			
		});
		
		// thiz.fill();
		thiz.stroke();
		thiz.closePath();
	};

	var attachOpt = function(options){
		var objCoords = obj.coords,stl = obj.style;
		for(var ii in options){
			
			if (ii === 'style' && options.hasOwnProperty('style')) {
				var requestStl = options[ii];

				for(var xx in requestStl){
					console.log(requestStl.hasOwnProperty(xx));
					if(xx === 'fillStyle'){stl.fillStyle = (obj.isStr(requestStl[xx]))?requestStl[xx]:stl.fillStyle;}
					if(xx === 'strokeStyle'){stl.strokeStyle = (obj.isStr(requestStl[xx]))?requestStl[xx]:stl.strokeStyle;}
					if(xx === 'font'){stl.font = (obj.isStr(requestStl[xx]))?requestStl[xx]:stl.font;}
					if(xx === 'width'){stl.width = (obj.isNum(requestStl[xx]))?requestStl[xx]:stl.width;}
					if(xx === 'height'){stl.height = (obj.isNum(requestStl[xx]))?requestStl[xx]:stl.height;}
					if(xx === 'posx'){stl.posx = (obj.isNum(requestStl[xx]))?requestStl[xx]:stl.posx;}
					if(xx === 'posy'){stl.posy = (obj.isNum(requestStl[xx]))?requestStl[xx]:stl.posy;}
					//console.log(xx);
				}
				//console.log(obj.style.strokeStyle);
			}
			
			options.hasOwnProperty('stopDrawing') && ii === 'stopDrawing'?console.log(options["stopDrawing"]):"";
			if (ii === 'coords' && options.hasOwnProperty('coords')) {

				var coords = options[ii]; 
				for (var idIn in coords) {
					if(idIn === 'arc' && coords.hasOwnProperty(idIn)){// && coords[idIn].length >= 1 && coords[idIn].constructor === Array){
						// console.log(coords[idIn]);
						//console.log(obj.isArr(coords[idIn].x));
						if(obj.isArr(coords[idIn].x) && obj.isArr(coords[idIn].y) && coords[idIn].x.length === coords[idIn].y.length){
							objCoords.arc.x = coords[idIn].x;
							objCoords.arc.y = coords[idIn].y;
						}else{
							obj.message.push('The Arc object must containe array width 6 items of numbers repesents cordinates and radius');
						}
						//(obj.isArr(coords[idIn].x))?objCoords.arc = coords[idIn]:
						//obj.message.push('The Arc object must containe array width 6 items of numbers repesents cordinates and radius');
					}
					if(idIn === 'bezier'){
						
						var a = coords[idIn]["x"].keys();
						console.log(coords[idIn]["x"]);
						objCoords.bezier.x = Array.isArray(coords[idIn].x)?coords[idIn].x:objCoords.bezier.x;
					}

					if(idIn === 'bazier' && coords.hasOwnProerty(idIn) && coords[idIn].length >= 1 && coords[idIn].constructor === Array){
						(obj.checkParams(coords[idIn],6)) && idIn === 'bazier'?objCoords.bazier = coords[idIn]:
						obj.message.push('The bazier object array must containe 6 items of numbers');
					}

					if(idIn === 'ellipse' && coords.hasOwnProperty(idIn) && coords[idIn].length >= 1 && coords[idIn].constructor === Array){
						obj.checkParams(coords[idIn],8)?objCoords.ellipse = coords[idIn]:
						obj.message.push('The ellipse object array must containe 8 items of numbers');
					}

					if(idIn === 'quadratic' && coords.hasOwnProperty(idIn) && coords[idIn].length === 1 && coords[idIn].constructor === Array){
						obj.checkParams(coords[idIn],4)?objCoords.quadratic = coords[idIn]:
						obj.message.push('The quadratic object array must containe 8 items of numbers');
					}
					//console.log(idIn);
				}
				// console.log(objCoords.arc);
				//console.log(objCoords.ellipse);
			}
			
		}
		// console.log(obj.message);
		return ! obj.message.length > 0;
	}
	obj
	mycanvas.Create = function(item,options){
		CanvasObj.call(this);
		var thiz = this.ctx,xData = [],yData = [];
		options = obj.isObj(options)?options = options:options = {};
		var attacProp = attachOpt(options);

		if(attacProp) this.arc();this.bezier();
		
		//obj.lineTo(thiz);
		console.log(attacProp);

		if(attacProp){
			var date = new Date();
			var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

			//console.log(date.getDate());
			var vGap = this.width / lastDay.getDate();
			var hGap = this.height / lastDay.getDate();
			var id2 = vGap / 100;

			var id = vGap / lastDay.getDate();
			var yid = 100 / lastDay.getDate();

			for (var ii = 0; ii <= lastDay.getDate(); ii++) {
				var xGap = ((id*ii) / vGap)*this.width;
				var yGap = ((yid*ii) / 100)*this.height;
				xData.push(xGap);
				yData.push(yGap);
				this.skeleton(ii,vGap,'vGap');
				this.skeleton(ii,hGap,'hGap');
			}
			console.log((1 / 100)*1400);
			//console.log(yData);

			switch(item){
				case 'line':
				obj.lineTo(thiz)
				break;
				case 'arc':
				this.createArc(xData,yData)
				break;
				case 'bazier':
				obj.bazier(thiz)
				break;
				case 'ellipse':
				obj.ellipse(thiz)
				break;
				case 'quadratic':
				obj.quadratic(thiz)
				break;
				case 'rect':
				obj.rect(thiz)
				break;
				default:
				obj.message.push('please suplay wich object to create');
			}
		}
	};
	mycanvas.Create.prototype = Object.create(CanvasObj.prototype);
	//mycanvas.Create.prototype.constructor = mycanvas.Create;
	//new mycanvas.Create();
/*
	mycanvas.CanvasObj.prototype.createCurves = function(xData,yData,posx3,posy1,posy2,posy3,index){

		thiz = this.ctx;
		// thiz.clearRect(0,0,this.width,this.height);

		thiz.strokeStyle= "rgba(50,150,200,1)";
		thiz.fillStyle = "rgba(50,150,200,.3)";


		thiz.beginPath();
		yData = yData.reverse();
		xData.forEach(function(item,index,arr){
			var xx = Math.round(item);
			var yy = Math.round(yData[index]);
			if(index == 0){
				thiz.moveTo(0,this.height);
			}else{
				index > 3 && yy > 13 ?
				thiz.arc(xx ,yy + Math.random()* (50 - 0) + 20, 2, 0, Math.PI * 2, false):
				thiz.arc(xx ,yy, 2, 0, Math.PI * 2, false);
			}
			if(yy == 0){ thiz.lineTo(xx - 50,this.height - 50);}
			console.log(xx + " :x-y: "+ yy);
		});

		thiz.fill();
		thiz.stroke();
		//thiz.save();
		//thiz.closePath();
	}
	mycanvas.CanvasObj.prototype.createLine = function(item,options){
		var thiz = this.ctx,xData = [],yData = [];
		
		var date = new Date();
		var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

		console.log(date.getDate());
		var vGap = this.width / lastDay.getDate();
		var hGap = this.height / lastDay.getDate();
		var id2 = vGap / 100;

		var id = vGap / lastDay.getDate();
		var yid = 100 / lastDay.getDate();

		for (var ii = 0; ii <= lastDay.getDate(); ii++) {
			var xGap = ((id*ii) / vGap)*this.width;
			var yGap = ((yid*ii) / 100)*this.height;
			xData.push(xGap);
			yData.push(yGap);
			this.createText(ii,vGap,'vGap');
			this.createText(ii,hGap,'hGap');
		}
		this.createCurves(xData,yData);
	}
	mycanvas.CanvasObj.prototype.createText = function(text,gap,target){

		var thiz = this.ctx,xGap,yGap;
		thiz.fillStyle = 'rgba(0,0,0,1)';
		thiz.font = '13px Ariel';
		if(target === 'vGap'){
			if(text * gap <= this.width){
				//console.log(gap * text);
				xGap = text * gap;
				thiz.fillText(text || '1',xGap,this.height -5);
			}
		}
		if(target === 'hGap'){
			if(text <= 15 && text !== 0){
				var lastMonth = this.height / gap;//30
				
				yGap =(this.height / lastMonth) * (lastMonth -text)+(gap * (-text));
				

				thiz.fillText(text + '00' || '1',30,(yGap));
				thiz.strokeStyle= "rgba(0,0,0,.5";
				
				thiz.beginPath();
				thiz.moveTo(0,Math.round(yGap));
				thiz.lineTo(this.width,Math.round(yGap));
				thiz.stroke();
			}
		}
	}

	mycanvas.CanvasObj.prototype.mytest = function(){
		var path = new Path2D('M 0,0 h -50 v 50 h 100 v -110 h');
		//path.rect(5,5,90,90);
		this.ctx.stroke(path);
		return path;
		return ([
				this.ctx,
				this.name
				]);
	}
	// mycanvas.CanvasObj.prototype = Object.create(mytest.prototype);
	//console.log(test());
	*/
	return mycanvas;
	
}(window.mycanvas ||  {}));

