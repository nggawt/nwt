//js
//var Mycanvas = document.getElementById('myCan');
var ojj = (function(mycanvas){
	var canvas = document.getElementById('myCan'),
		parent = document.getElementById('parent');

	canvas.setAttribute('width',parent.clientWidth);
	canvas.setAttribute('height',450);//parent.clientHeight

	var defaultProp = {
		radius:5,
		startDrawing:0,
		stopDrawing:Math.PI * 2,
		clockwise:false,
		beginClosePath:false,
		clearRect:false,
		style:{
			fillStyle:"rgba(50,150,200,.3)",
			strokeStyle: "rgba(50,150,200,1)",
			font :'13px Ariel',
			width:400,
			height:400,
			posx:200,
			posy:200
		},
		
		coords:{
			arc:{
				x:null,
				y:null
			},
			bezier:{
				x:null,
				y:null
			},
			ellipse:[],
			quadratic:[]
		},
		message:{
			arc:[],
			bezier:[],
			ellipse:[],
			quadratic:[]
		}
	};//end defaultProp

	var helpers = {
		
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
					itsTrue = this.isNum(arrayParams[ii]);
				}else{ return false; }
			}
			return itsTrue;
		},
		ii:-1,
		getElemArrayOneByOne:function (item){

			if(item.length > this.ii){
				
				this.ii++;
				console.log(this.ii);
				//if(this.ii === 1){return item[0];}
			}else{
				this.ii = -1;
			}
			// console.log(item[this.ii]);
			return item[this.ii];
		}
	};//end helpers

	var CanvasObj = function(){
		if(canvas.getContext){
			this.ctx = canvas.getContext('2d');
			this.width = canvas.width;
			this.height = canvas.height;
			this.date = new Date();
		}
	};
	CanvasObj.prototype.skeleton = function(text,gap,target){
		var thiz = this.ctx,xGap,yGap;
		thiz.beginPath();
		thiz.fillStyle = defaultProp.style.fillStyle;
		thiz.font = defaultProp.style.font;
		if(target === 'vGap'){
			if(text * gap <= this.width){
				xGap = text * gap;
				thiz.fillText(text || '1',xGap,this.height -5);
			}
		}
		if(target === 'hGap'){
			if(text <= 15 && text !== 0){
				var lastDayOfMonth = this.height / gap;//34
				
				yGap =(this.height / lastDayOfMonth) * (lastDayOfMonth - text)+(gap * (-text));
				yGap = Math.round(yGap);
				// console.log(yGap);
				thiz.fillText(text + '00',30,(yGap - 5));
				thiz.strokeStyle= "rgba(0,0,0,.2";
				thiz.beginPath();
				thiz.moveTo(0,yGap);
				thiz.lineTo(this.width,yGap);
				thiz.stroke();
				//thiz.fill();
			}
		}
		thiz.closePath();
	};
	
	CanvasObj.prototype.CreateSkeleton = function(){
		var xData = [],yData = [];
		var date = new Date();
		var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
		//console.log(date.getDate());
		var vGap = this.width / date.getDate();
		var hGap = this.height / date.getDate();
		var id2 = vGap / 100;

		var id = vGap / date.getDate();
		var yid = 100 / date.getDate();

		for (var ii = 0; ii <= date.getDate(); ii++) {
			var xGap = ((id*ii) / vGap)*this.width;
			var yGap = ((yid*ii) / 100)*this.height;
			xData.push(xGap);
			yData.push(yGap);
			this.skeleton(ii,vGap,'vGap');
			this.skeleton(ii,hGap,'hGap');
		}
	};

	CanvasObj.prototype.createArc = function(){

		var xData = defaultProp.coords.arc.x,yData = defaultProp.coords.arc.y;
		var thiz = this.ctx;

		thiz.strokeStyle = defaultProp.style.strokeStyle;
		thiz.fillStyle = defaultProp.style.fillStyle;
		thiz.beginPath();
		// console.log(yData);
		//yData = yData.reverse();
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

		thiz.strokeStyle= defaultProp.style.strokeStyle;
		thiz.fillStyle = defaultProp.style.fillStyle;
		
			thiz.beginPath();
		
		defaultProp.coords.arc.x.forEach(function(item,index,arr){
			// thiz.beginPath();

			if(index === 0) thiz.moveTo(0,this.height);//thiz.arc(0 ,this.height, 0, Math.PI * 2, true);
			thiz.arc(item ,defaultProp.coords.arc.y[index],defaultProp.radius, 0, Math.PI * 2, true);
			// thiz.save();
			// thiz.closePath();
		});
		
		//thiz.fill();
		thiz.stroke();
		//thiz.save();
		thiz.closePath();
	};
	
	CanvasObj.prototype.bezier = function(){

		var thiz = this.ctx, xArr = defaultProp.coords.bezier.x;

		thiz.strokeStyle= "red";
		thiz.fillStyle = defaultProp.style.fillStyle;
		thiz.beginPath();
		
		xArr.forEach(function(item,index,arr){
			
			var a = arr[index].keys();
			var data = arr[index];

			thiz.bezierCurveTo(data[a.next().value] ,data[a.next().value] ,data[a.next().value] ,
								data[a.next().value] ,data[a.next().value],data[a.next().value]);

			//if array.prototype.values() dont supported code below works well
			
			/*item.forEach(function(elem,idx,arra){
				
				//console.log(testMe(data));
				thiz.bezierCurveTo(testMe(item) ,testMe(item) ,testMe(item) , testMe(item) ,testMe(item),testMe(item));
			});*/

		});
		// thiz.fill();
		thiz.stroke();
		thiz.closePath();
	};

	CanvasObj.prototype.quadratic = function(){

		var thiz = this.ctx, xArr = defaultProp.coords.quadratic;

		thiz.strokeStyle= "yellow";
		thiz.fillStyle = defaultProp.style.fillStyle;
		thiz.beginPath();
		 thiz.moveTo(0,this.height);

		thiz.quadraticCurveTo(helpers.getElemArrayOneByOne(xArr) ,helpers.getElemArrayOneByOne(xArr)
			,helpers.getElemArrayOneByOne(xArr) ,helpers.getElemArrayOneByOne(xArr));

		// xArr.forEach(function(item,index,arr){
		// 	// thiz.beginPath();
		// 	var a = arr[index].keys();
		// 	var data = arr[index];
		// 	if(index === 0) thiz.moveTo(0,this.height);//thiz.arc(0 ,this.height, 0, Math.PI * 2, true);
			

		// 	thiz.quadraticCurveTo(data[a.next().value] ,data[a.next().value] ,data[a.next().value] ,data[a.next().value] );
		// 	// thiz.save();
		// 	// thiz.closePath();
		// });
		console.log(xArr);
		// thiz.fill();
		thiz.stroke();
		//thiz.save();
		thiz.closePath();
	};

	CanvasObj.prototype.render = function(items){

		var thiz = this.ctx;

			switch(items){
				case 'line':
				this.lineTo(thiz)
				break;
				case 'arc':
				this.createArc();
				this.arc()
				break;
				case 'bezier':
				this.bezier(thiz)
				break;
				case 'ellipse':
				defaultProp.ellipse(thiz)
				break;
				case 'quadratic':
				this.quadratic()
				break;
				case 'rect':
				defaultProp.rect(thiz)
				break;
				default:
				defaultProp.message.errors = 'please suplay wich object to create';
		}
	};

	var attachOpt = function(options){
		var objCoords = defaultProp.coords,stl = defaultProp.style;
		for(var ii in options){
			
			if (ii === 'style' && options.hasOwnProperty('style')) {
				var requestStl = options[ii];

				for(var xx in requestStl){
					
					if(xx === 'fillStyle'){stl.fillStyle = (helpers.isStr(requestStl[xx]))?requestStl[xx]:stl.fillStyle;}
					if(xx === 'strokeStyle'){stl.strokeStyle = (helpers.isStr(requestStl[xx]))?requestStl[xx]:stl.strokeStyle;}
					if(xx === 'font'){stl.font = (helpers.isStr(requestStl[xx]))?requestStl[xx]:stl.font;}
					if(xx === 'width'){stl.width = (helpers.isNum(requestStl[xx]))?requestStl[xx]:stl.width;}
					if(xx === 'height'){stl.height = (helpers.isNum(requestStl[xx]))?requestStl[xx]:stl.height;}
					if(xx === 'posx'){stl.posx = (helpers.isNum(requestStl[xx]))?requestStl[xx]:stl.posx;}
					if(xx === 'posy'){stl.posy = (helpers.isNum(requestStl[xx]))?requestStl[xx]:stl.posy;}
				}
			}
			
			if (ii === 'coords' && options.hasOwnProperty('coords')) {

				var coords = options[ii]; 
				for (var idIn in coords) {
					if(idIn === 'arc' && defaultProp.message.arc.length === 0){

						if(helpers.isArr(coords[idIn].x) && helpers.isArr(coords[idIn].y) && coords[idIn].x.length === coords[idIn].y.length){
							objCoords.arc.x = coords[idIn].x;
							objCoords.arc.y = coords[idIn].y;
						}else{
							defaultProp.message.arc = 'The Arc object must containe x and y obj with 6 items inside array that repesents cordinates and radius';
						}
					}
					if(idIn === 'bezier' && defaultProp.message.bezier.length === 0){
						
						if (Array.isArray(coords[idIn].x)) objCoords.bezier.x = coords[idIn].x;
						else defaultProp.message.bezier.push('The Arc object must containe x and y obj with 6 items inside array that repesents cordinates and radius');
						
					}

					if(idIn === 'ellipse' && defaultProp.message.ellipse.length === 0){

						if(Array.isArray(coords[idIn]) && coords[idIn].length === 8) objCoords.ellipse = coords[idIn];
						else defaultProp.message.ellipse.push('The ellipse object array must containe 8 items of params');					

					}
					if(idIn === 'quadratic' &&  defaultProp.message.quadratic.length === 0){

						if(Array.isArray(coords[idIn]) && coords[idIn].length >= 4) objCoords.quadratic = coords[idIn];
						else defaultProp.message.quadratic.push('The quadratic object array must containe 4 items at list');
						//console.log(objCoords.quadratic);
					}
				}
			}
		}
		return defaultProp.message;
	}

	mycanvas.Create = function(item,options){
		CanvasObj.call(this);
		var thiz = this.ctx,thisObj = this;
		options = helpers.isObj(options) || Array.isArray(options)?options:null;

		var attachProp = options?attachOpt(options):null;
		this.CreateSkeleton();
				
		if(Array.isArray(item)) item.forEach(function(theItems){ if(attachProp[theItems].length === 0) thisObj.render(theItems);console.log(theItems);});
		else (attachProp[item].length === 0)? this.render(item):'';
			
		// console.log(attachProp);
	};
	mycanvas.Create.prototype = Object.create(CanvasObj.prototype);

	return mycanvas;
	
}(window.mycanvas ||  {}));

