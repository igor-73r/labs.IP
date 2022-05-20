var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");


var backgroundSprite = new Image();
var duckSprite = new Image();
var duckSpriteL = new Image();
var aim = new Image();


backgroundSprite.src = "images/game/bg.png";
duckSprite.src = "images/game/duckRightUp.png";
duckSpriteL.src = "images/game/duckLeftUp.png";
aim.src = "images/game/aim.png"


var duckCount = 10;
var maxVelocity = 10;
var mPosX, mPosY;
var mcPosX, mcPosY;


class Duck
{
	
	setPos(x, y) {
		this.x = x;
		this.y = y;
	}

	setVelocity(vx, vy) {
		this.vx = vx;
		this.vy = vy;
	}

	draw(context) {
		context.drawImage(this.vx >= 0 ? duckSprite : duckSpriteL, this.x, this.y);
	}

	move() {
		this.x += this.vx;
		this.y += this.vy;

		if (this.x < 0 || this.x + duckSprite.width >= canvas.width)
		{
			this.vx = -this.vx;
		}

		if (this.y < 0 || this.y + duckSprite.height >= canvas.height)
		{
			this.vy = -this.vy;
		}
	}

	getPosDuck(){
		var duckPos = []
		duckPos.push(this.x)
		duckPos.push(this.y)
		return duckPos;
	}
}


function draw() {
	context.drawImage(backgroundSprite, 0, 0);
	getPos()
	context.drawImage(aim, mPosX - aim.width / 2, mPosY - aim.height / 2);
	for (var i = 0; i < duckCount; i++)
	{
		ducksArray[i].move();
		ducksArray[i].draw(context);
	}

	requestAnimationFrame(draw);
}
aim.onload = draw;


addEventListener("click", function(event) {
	getPosClick()
	killduck()
});
function killduck(){
	for (var i = 0; i < duckCount; i++) {
		temp = ducksArray[i].getPosDuck();
		console.log(temp, mcPosX, mcPosY)
		if (temp[0] <= mcPosX && temp[0] + 50 >= mcPosX) {
			if (temp[1] <= mcPosY && temp[1] + 50 >= mcPosY) {
				ducksArray.splice(i, 1);
				duckCount--;
			}
		}
	}
}


function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}


var ducksArray = [];
for (var i = 0; i < duckCount; i++) {
	tmp = new Duck();
	x = getRandomInt(canvas.width - duckSprite.width - 50);
	y = getRandomInt(canvas.height - duckSprite.height - 50);
	tmp.setPos(x, y);

	vx = getRandomInt(maxVelocity) - maxVelocity / 2;
	vy = getRandomInt(maxVelocity) - maxVelocity / 2;
	if (vx !== 0 && vy !== 0) {
		tmp.setVelocity(vx, vy);
	}else{
		vx += 5;
		vy += 5;
		tmp.setVelocity(vx, vy);
	}

	ducksArray.push(tmp);
}


function getPos() {
	$('#canvas').mousemove(function(e){
		var target = this.getBoundingClientRect();
		mPosX = (e.clientX - target.left);
		mPosY = (e.clientY - target.top);
	});
}


function getPosClick() {
	$('#canvas').click(function(e){
		var target = this.getBoundingClientRect();
		mcPosX = (e.clientX - target.left);
		mcPosY = (e.clientY - target.top);
	});
}