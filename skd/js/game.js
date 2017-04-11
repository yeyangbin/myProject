var canvas = document.querySelector("#gamecanvas");
var page = document.querySelector("#page");
var gamebox = document.querySelector(".gamebox");
var gamemask = document.querySelector("#gamemask");
var gameclose = document.querySelector(".gameclose");
var body = document.querySelector("body");
canvas.width = body.offsetWidth;
canvas.height = body.offsetHeight;
var isDown = false;
var car = null;
var iscoll = 0;
var iscollsion = false;
var rect1 = null;
var rect2 = null;
var rect3= null;
var rect4 = null;
var ctx = canvas.getContext("2d");
var w = canvas.width;
var h = canvas.height;
var ani = null;
var score = 0;

var carImg = new Image();
carImg.src = "../img/gcar.png";			
//		carImg.onload = imgLoad;
window.onload = function(){
	car = new Car(carImg,0.42*w,0.4*h);
	rect1 = new Rectangle(0.075*w,0.36*h,0.1*w,0.276*h,rand(-2,3),rand(-3,1));
	rect2 = new Rectangle(0.578*w,0.22*h,0.18*w,0.088*h,rand(-3,1),rand(1,-3));
	rect3 = new Rectangle(0.763*w,0.415*h,0.19*w,0.158*h,rand(-2,2),rand(-3,3));
	rect4 = new Rectangle(0.28*w,0.614*h,0.47*w,0.14*h,rand(-3,2),rand(-2,3));			
	scoredraw(); 
	car.draw();
	rect1.draw();
	rect2.draw();
	rect3.draw();
	rect4.draw();
	moveCar();
}
//		function imgLoad(){			
//			ctx.drawImage(carImg,0,0,carImg.width,carImg.height,0.43*w,0.43*h,0.08125*w,0.082746*h);			
//		}			

gameclose.addEventListener("click",function(){
	gamemask.style.display = "none";
},false);



function moveCar(){
	canvas.addEventListener("touchmove",function(ev){
		var ev = ev || event;
		if (!isDown) {
			return;
		}
		car.move(ev,car);
		car.draw();
	},false);
	canvas.addEventListener("touchstart",function(ev){
		var ev = ev || event;
		var mytouch = ev.touches[0]; 
		var x = mytouch.clientX;
		var y = mytouch.clientY;	
		if(x > car.dx && x < car.dx + car.w && y > car.dy && y < car.dy + car.h){
			isDown = true;	
			if(iscoll == 0){
				animate();
				iscoll++;
			}			
		}
	},false);	
	canvas.addEventListener("touchend",function(ev){
		isDown = false;
	},false);
}	
var a = 0;
function animate(){
	ctx.clearRect(0,0,w,h);
	scoredraw(); 
	car.draw();
	rect1.draw();
	rect2.draw();
	rect3.draw();
	rect4.draw();
	rect1.collision(car);			
	rect2.collision(car);			
	rect3.collision(car);			
	rect4.collision(car);		
	a++;
	if(a%60 == 0){
		score += 1;
	}
	if(!iscollsion){
		ani = window.requestAnimationFrame(animate);	
	}	
}

function scoredraw(){
	ctx.beginPath();
	ctx.moveTo(0.38281*w,0.08187*h);
	ctx.lineTo(0.6671875*w,0.08187*h);
	ctx.lineWidth  = 60;
	ctx.lineCap = "round"; 
	ctx.strokeStyle = "#fadb09";
	ctx.stroke();
	
	ctx.beginPath();
	ctx.fillStyle = "#28860d";
	ctx.font = "2em Arial";
	ctx.fillText("分钟",0.50*w,0.096*h);
	ctx.fill();
	
	ctx.beginPath();
	ctx.fillStyle = "#f30000";
	ctx.font = "2.5em Arial";
	ctx.fillText(score,0.36*w,0.1*h);
	ctx.fill();			
}


function rand(min,max){
	var ran = Math.round(Math.random() * (max - min) + min);
	return (ran == 0?ran = 3:ran);
}
/*-------------------- 构造函数 --------------------*/		
/* 创建一个car的构造函数  */		
function Car(carImg,dx,dy){
	this.carImg = carImg;
	this.dx = dx;
	this.dy = dy;
	this.w = 0.15156*w;
	this.h = 0.1637325*h;
}
Car.prototype = {
	draw:function(){
		ctx.drawImage(this.carImg,0,0,this.carImg.width,this.carImg.height,this.dx,this.dy,this.w,this.h);
	},
	move:function(ev,car){
		var ev = ev || event;
		var mytouch = ev.touches[0]; 
		var x = mytouch.clientX;
		var y = mytouch.clientY;
		car.dx = x - this.carImg.width / 2;
		car.dy = y - this.carImg.height / 2;
		if (car.dx >= canvas.width - 0.15156*w) {
			car.dx = canvas.width - 0.15156*w;
		}else if (car.dx <= 0) {
			car.dx = 0;
		}
		if (car.dy >= canvas.height - 0.16725*h) {
			car.dy = canvas.height - 0.16725*h;
		}else if (car.dy <= 0) {
			car.dy = 0;
		}
	}
};	

function collide(obj1,obj2){
	var l1 = obj1.x,
		r1 = obj1.x + obj1.w,
		t1 = obj1.y,
		b1 = obj1.y + obj1.h,
		l2 = obj2.dx,
		r2 = obj2.dx + obj2.w,
		t2 = obj2.dy,
		b2 = obj2.dy + obj2.h;
	if(r1 > l2 && b1 > t2 && l1 < r2 && t1 < b2){
		return true;
	}else{
		return false;
	}
}

/* 创建一个生成矩形的构造函数 */
function Rectangle(x,y,w,h,speedX,speedY){
	this.x = x;
	this.y = y;
	this.w = w;
	this.h = h;
	this.speedX = speedX;
	this.speedY = speedY;
}
Rectangle.prototype = {
	draw:function(){
		ctx.beginPath();
		ctx.strokeStyle = "#4aa82e";							
		ctx.lineWidth = 5;
		ctx.fillStyle = "#bcdf44";
		ctx.strokeRect(this.x,this.y,this.w,this.h);
		ctx.fillRect(this.x,this.y,this.w,this.h);				
		ctx.stroke();
		if (this.x < 0 || this.x > canvas.width - this.w) {
			this.speedX *= -1;  
		}
		if (this.y < 0 || this.y > canvas.height - this.h) {
			this.speedY *= -1;
		}
		this.x += this.speedX;
		this.y += this.speedY;				
	},
	collision:function(car){
		console.log();
//		if (this.x + this.w > car.dx && this.x < car.dx + car.w && this.y + this.h > car.dy && this.y < car.dy + car.h) {
	if(collide(this,car)){
			$(".timescore").html(score);
			//$("").html();
			$.ajax({
				type:"get",
				url:"gameheadle.php",
				data:{
					score:score,
					openid:openid,
					nickname:nickname,
				},
				success:function(str){
					console.log(str);
					game.style.display = "none";
					over.style.display = "block";
				},
				async:true
			});
			console.log("碰到了");
			iscollsion = true;
			isDown = false;
		}	
	}
};