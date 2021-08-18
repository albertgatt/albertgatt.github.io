function drawPic(imgsrc, data, canvasWidth) {
	var oX = 25;
	var oY = 25;
	var imageWidth = data[1];
	var imageHeight = data[2];
	var canvasW = canvasWidth - oX * 2;

	// define Iscale, used to scale images to canvas size
	if (imageWidth >= imageHeight) {
		Iscale = canvasW / imageWidth;
	} else {
		Iscale = canvasW / imageHeight
	}

	var canvas = document.getElementById("myCanvas");
	var ctx = canvas.getContext("2d");

	//create image object, draw and scale
	var img = new Image();
	img.onload = function() {
		ctx.drawImage(img, oX, oY, imageWidth*Iscale, imageHeight*Iscale);
		ctx.stroke();
		//call the function to draw the bounding boxes
		drawBoxes(oX, oY, canvas, ctx, data); 
	}
	
	//finally, set image src
	img.src = imgsrc;
}

function drawBoxes(oX, oY, canvas, ctx, data) {
	// Define bounding box for object 1
	var x1 = data[4] * Iscale + oX;
	var y1 = data[5] * Iscale + oY;
	var x2 = data[6] * Iscale + oX;
	var y2 = data[7] * Iscale + oY;
	// Define bounding box for object 2
	var xx1 = data[9] * Iscale + oX;
	var yy1 = data[10] * Iscale + oY;
	var xx2 = data[11] * Iscale + oX;
	var yy2 = data[12] * Iscale + oY;

	// Draw bounding box for object 2
	ctx.beginPath();
	ctx.lineWidth = "3";
	ctx.strokeStyle = "yellow";
	ctx.rect(x1, y1, x2 - x1, y2 - y1);
	// ctx.rect(30,100, 50, 50);
	ctx.stroke();

	TR = 20;
	// Draw text box for object 1
	ctx.font = "20px Arial";
	var objLabel = data[3];
	var textWidth = ctx.measureText(objLabel).width;
	var xPos = x1;
	var yPos = y1 - 2;
	// Position of text box
	// if AinB(x1,y1,xx1,yy1,xx2,yy2,TR){
	// yPos=y2+2;
	// }
	// text box
	ctx.beginPath();
	ctx.fillStyle = "yellow";
	ctx.fillRect(xPos, yPos + 3, textWidth + 6, -22);
	ctx.stroke();
	// text
	ctx.beginPath();
	ctx.fillStyle = "black";
	// ctx.fillText(objLabel+":"+textWidth.toString(),50,50);
	ctx.fillText(objLabel, xPos, yPos - 3);
	ctx.stroke();

	// Draw bounding box for object 2
	ctx.beginPath();
	ctx.lineWidth = "3";
	ctx.strokeStyle = "red";
	ctx.rect(xx1, yy1, xx2 - xx1, yy2 - yy1);
	// ctx.rect(30,100, 50, 50);
	ctx.stroke();

	// Draw text box for object 2
	ctx.font = "20px Arial";
	var objLabel = data[8];
	var textWidth = ctx.measureText(objLabel).width;
	var xPos = xx1;
	var yPos = yy1 - 2;
	// text box
	ctx.beginPath();
	ctx.fillStyle = "red";
	ctx.fillRect(xPos, yPos + 3, textWidth + 6, -22);
	ctx.stroke();
	// text
	ctx.beginPath();
	ctx.fillStyle = "white";
	// ctx.fillText(objLabel+":"+textWidth.toString(),50,50);
	ctx.fillText(objLabel, xPos, yPos - 3);
	ctx.stroke();
};