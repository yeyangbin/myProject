var page = document.querySelector("#page");
var cont = document.querySelector("#cont");
var btn = document.querySelector("#btn");
var game = document.querySelector("#game");
var over = document.querySelector("#over");
var winning = document.querySelector("#winning");
var not_winning = document.querySelector("#not_winning");
var startgame = document.querySelector(".startgame");
var share = document.querySelector(".share");
var again = document.querySelector(".again");
var sharemask = document.querySelector(".sharemask");
var focus = document.querySelector(".focus");
var focusmask = document.querySelector(".focusmask");

startgame.addEventListener("touchstart",function(){	
	page.style.display = "none";
	game.style.display = "block";		
},false);

share.addEventListener("touchstart",function(){
	 sharemask.style.display = "block";
},false);

sharemask.addEventListener("touchstart",function(){
	sharemask.style.display = "none";
},false);

focus.addEventListener("touchstart",function(){
	 focusmask.style.display = "block";
},false);

focusmask.addEventListener("touchstart",function(){
	focusmask.style.display = "none";
},false);

again.addEventListener("touchstart",function(){
	over.style.display = "none";
	game.style.display = "block";	
	gamemask.style.display = "block";	
	iscollsion = false;
	
	score = 0;
	iscoll = 0;
	ctx.clearRect(0,0,w,h);
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
},false);

