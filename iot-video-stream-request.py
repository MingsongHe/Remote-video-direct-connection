# This is a python script that takes frames from the webcam and relays this to a
# php script on our web server.

# We convert each image to a string using base64 encoding. 30 such strings (frames) 
# are concatenated and sent to the website at once. The frames are stored and our 
# website displays it like a video.

import cv2          # CV2指的是OpenCV2，OpenCV是一个基于BSD许可（开源）发行的跨平台计算机视觉库 有时，要pip3 install opencv-python 安装一下
import numpy as np  # numpy是Python中科学计算的基础包, 利用命令“import numpy as np”将numpy库取别名为“np”
import requests     # Python 内置了requests 模块，该模块主要用来发送HTTP 请求
import time
#import Image        # Image模块是PIL(第三方图像处理库)中最重要的模块，它有一个类叫做image，与模块名称相同。Image类有很多函数、方法及属性 安装：pip3 install Image
import base64       # Base64是一种任意二进制到文本字符串的编码方法
from PIL import Image

cap = cv2.VideoCapture(0)
#
# im_str is the base64 encoded string
im_str = ""

# url to send the request
#url = "https://bilingualplan.com/wp-content/themes/easyweb/iot_webcam_stream_read.php"
url = "https://ems156.com/wp-content/themes/easyweb/iot_webcam_stream_read.php"
# Initialize variables that we require
start_time = time.time()
TIME_TO_READ = 60
FRAMES_TO_READ = 30
im_str = ""                       # im_str is the base64 encoded string， im_str是编码字符串
im_str_sub = ""
frame_count = 0
count = 0

# Now we continuously read the frames from the webcam for some time
while cap.isOpened():

	# frame_count keeps tab on the number of frames. If it is 30, we pack it
	# into a single string and send this as a http post request
	frame_count+=1             # 帧数


	_, frame = cap.read()      #_ 会指向你最后一次执行的表达式。

	# frame stores the picture taken from the webcam               frame 存储从网络摄像头拍摄的照片
	# opencv works with BGR while Image works with RGB             opencv 使用 BGR 而 Image 使用 RGB
	# To combine both pipelines, we convert the BGR to RGB         为了结合这两个管道，我们将 BGR 转换为 RGB
	frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)

	im = Image.fromarray(frame)

	# We reduce the quality a bit to get more upload speed  稍微降低质量以获得更快的上传速度
	im.save("webcam_base64.jpeg", quality = 20)

	with open("webcam_base64.jpeg", "rb") as imgFile:
		# base64 encoding
		im_str_sub = base64.b64encode(imgFile.read())   #or is base64.b64encode(img_File.read())

	if frame_count == FRAMES_TO_READ:         #存到30帧，传递一次

		# We display the time it takes for the 30 concatenated strings to be
		# sent and stored in our server space
		ss = time.time()
		im_base64 = {'image':im_str}      #图像操作
		req = requests.post(url, data = im_base64)
	#	req = requests.post(url, data = im_base64)     #在局域网，这样的request传递就可以，速度快，0.3秒，欧儿一两秒。但是在广域网，必须用下面的命令
                                                               #是比较慢，平均三秒。
		req = requests.request("POST",url, data = im_base64, headers={
        "User-Agent":"Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Mobile Safari/537.36"
    })
		print ("---------------------------------------------------------")
		print (time.time() - ss)
		frame_count = 0
		print (req)
	#	print (im_str)
		print ("set done")
		im_str = ""

	else:
		im_str = im_str+str(im_str_sub, 'utf-8')+'*'  #原先是 im_str = im_str+im_str_sub+'*'

	# We count the number of frames
	count+=1                                        # 总帧数

	# print req.text
	# Read images for the time specified             在指定的时间内读取图像
	if time.time() - start_time >= TIME_TO_READ:    #时间到达60秒，一分钟
		break

	if cv2.waitKey(1) & 0xFF == ord('q'):
		break

print ("done")
print (count)

cap.release()
cv2.destroyAllWindows()
