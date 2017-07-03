var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
   	
   	responses = JSON.parse(this.responseText);
   	//response.push(responses);
   	mainFn(responses);
 //   	responses.reduce(function(total,num){
	// 	return [total + ',' + num];
	// })
  }
};
xhttp.open("GET", "https://nggawt/test", true);
xhttp.send();

//console.log(response);

// window.onload = function(){
	//var can = new ojj.CanvasObj;//(elem);
	//var can1 = ojj;
	
function mainFn(response){

	response = response?response:[];
	//console.log(response);

	var create = new ojj.Create('arc',response/*{
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
	}*/);
	//console.log(new ojj.Create());
	// console.log(ojj);

	//can.create();
	// console.log();
	//Mycanvas(elem);
}
// }