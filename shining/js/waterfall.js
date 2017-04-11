var box = document.querySelector(".box");
//创建数组，保存四列总高度，用于插入的时候找最短数列
var colH = [0,0,0,0];
for (var i = 0; i < 40; i++) {
	createDiv();
}

// box.style.top = "50% - " + box.offsetHeight / 2 + "px";
// box.style.left = "50% - " + box.offsetWidth  / 2 + "px";
// console.log(box.offsetWidth);

function randomH(min,max){ 
	return Math.round(Math.random()*(max - min) + min);
}
function createDiv(){
	//创建div
	var div = document.createElement("div");
	var divH = randomH(120,300);
	//给一个随机数组
	div.style.height = divH + "px";
	//找一个最短列插入div
	var minIndex = 0;
	for (var j = 0; j < colH.length; j++) {
		if (colH[minIndex] > colH[j]) {
			minIndex = j;
		}
	}
	div.style.left = 225 * minIndex + "px";
	div.style.top = colH[minIndex] + "px";
	colH[minIndex] += divH + 10;

	maxH(colH);
	box.appendChild(div);
}
//窗口发生比变化的时候，执行函数
window.onresize = function(){
	// 让40个div的位置发生变化
	// 获取40个div
	var divs = box.children;
	
	box.style.width = window.innerWidth + "px";
	var cols = parseInt(document.body.offsetWidth / 225);
	box.style.width = 225 * cols - 15 + "px"; 

	var colH = new Array(cols);
	for (var i = 0; i < cols; i++) {
		colH[i] = 0;
	}
	var div = divs[i];

	for (var i = 0; i < 40; i++) {		
		var minIndex = 0;
		for (var j = 0; j < cols; j++) {
			if (colH[minIndex] > colH[j]) {
				minIndex = j;
			}
		}
		div.style.left = minIndex * 225 + "px";
		div.style.top = colH[minIndex] + "px";
		colH[minIndex] += div.offsetHeight + 10;
	}
	// maxH(colH);
}
function mixH(colH){

}
function maxH(colH){
	var maxIndex = 0;
	for (var j = 0; j < colH.length; j++) {
		if (colH[maxIndex] < colH[j]) {
			maxIndex = j;
		}
	}
	box.style.height = colH[maxIndex] - 10 + "px";
}








