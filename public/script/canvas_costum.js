if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    var xhttp =new XMLHttpRequest();
} else {
    // code for IE6, IE5
    var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
   	
   	responses = JSON.parse(this.responseText);
   	//response.push(responses);
   	new ojj.Create(['bezier','arc','quadratic'],responses);
 //   	responses.reduce(function(total,num){
	// 	return [total + ',' + num];
	// })
  }
};
xhttp.open("GET", "http://nggawt:8080/test", true);
xhttp.send();

//console.log(response);

// window.onload = function(){
	//var can = new ojj.CanvasObj;//(elem);
	//var can1 = ojj;
	
function mainFn(response){

	//response = response?response:[];
	//console.log(response);

	//var create = new ojj.Create(['bezier','arc','quadratic'],response);
}
/*{
		style:{
			fillStyle:'rgba(0,60,120,1)',
			strokeStyle: "green",
			font:"14px Ariel",
			width:1111,
			height:1455,
			posx:200,
			posy:400
		},
		radius:10,
		startDrawing:0,
		stopDrawing:Math.PI * 2,
		clockwise:false,
		beginClosePath:false,
		coords:{
				arc:response.coords.arc,
			bazier:{
				xData:[0,2,3,4,5,6],
				yData:[0,2,3,4,5,6]
			},//6
			ellipse:{
				xData:[0,2,3,4,5,6,7,8],
				yData:[0,2,3,4,5,6,7,8]
			},//8
			quadratic:{
				xData:[0,2,3,4],
				yData:[0,2,3,4]
			},
			rect:{
				xData:[0,2,3,4],
				yData:[0,2,3,4]
			},//quadraticCurveTo  4
			line:{
				xData:[0,2,3,4],
				yData:[0,2,3,4]
			}
		},
		clearRect:false,
		lineTo:function(thiz){
			console.log(thiz);
		}
	};
	console.log(new ojj.Create());
	console.log(ojj);

	can.create();
	console.log();
	Mycanvas(elem);
}
}*/