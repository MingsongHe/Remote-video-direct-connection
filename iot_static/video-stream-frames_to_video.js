// A javascript function to take the image frames stored in our /images directory
// and display them in succession 

// The video produced by the script still has a lot of breaks but is 
// enough for our purposes

function show_image(frame_number) {

	// We put a timestamp with the image url to prevent browser caching 我们在图像 url 中放置时间戳以防止浏览器缓存
	// and displaying the same image                                    以防止浏览器缓存并显示相同的图片
	var d = new Date();
    var img = document.createElement("img");                                                 
    img.src = "https://bilingualplan.com/wp-content/themes/easyweb/iot_images/webcam_base64_"+frame_number.toString()+".jpeg?ver=" + d.getTime() ; //toString()函数用于将当前对象以字符串的形式返回, getTime() 方法返回一个时间的格林威治时间数值
    img.width = 640;                                                                         
    img.height = 480;
    img.style.top = "233px";
//    img.style.top = "40%";
    img.style.border = "2px solid #deb887";
    img.style.border.radius = "6px";
//    img.style.margin = "auto";
    // img.style.left = "420px";
    //The next two lines makes sure that the image is centered
    img.style.left = "50%";
    img.style.transform = "translateX(-50%)";
    img.style.position = "absolute";
//    img.alt = "webcam picture"+"iot_images/webcam_base64_"+frame_number.toString()+".jpeg";

    // This next line will just add it to the html
    document.body.appendChild(img);   // appendChild() 方法可向节点的子节点列表的末尾添加新的子节点
}

//j is the frame number which has to be displayed next. It has to be
// incremented each time

//number_of_frames is the total number of frames that we are producing out of the client side python script
// For now we keep it at 30
var j = -1;
var number_of_frames = 30;
setInterval(function(){
    show_image((++j)%number_of_frames)
}, 300);