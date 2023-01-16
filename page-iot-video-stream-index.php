<?php
get_header();

global $wpdb;
$wpdb -> show_errors();
$login_name = $wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2" , 1);
$datacollectionstate = $wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2" , 4);
if ($datacollectionstate == "OFF"){
  $displaybtnon = "block";
  $displaybtnoff = "none";
}
if ($datacollectionstate == "ON"){
  $displaybtnon = "none";
  $displaybtnoff = "block";
}

$no1_position_x = $_POST['no1_position_x'];
$no1_position_y = $_POST['no1_position_y'];
$no2_position_x = $_POST['no2_position_x'];
$no2_position_y = $_POST['no2_position_y'];
$working_lighter = $_POST['working_lighter'];
$screen = $_POST['screen'];
$fan_on_off = $_POST['fan_on_off'];
$motor_on_off = $_POST['motor_on_off'];
$meeting_room_video_on_off = $_POST['meeting_room_video_on_off'];
$office_video_on_off = $_POST['office_video_on_off'];
$work_route = $_POST['work_route'];
$Leave_message = $_POST['Leave_message'];
if($no1_position_x!=""){
    $wpdb -> update('ufq_iotdata', array('no1_position_x' => "$no1_position_x"), array('id' => 2));
    $wpdb -> update('ufq_iotdata', array('no1_position_y' => "$no1_position_y"), array('id' => 2));
    $wpdb -> update('ufq_iotdata', array('no2_position_x' => "$no2_position_x"), array('id' => 2));
    $wpdb -> update('ufq_iotdata', array('no2_position_y' => "$no2_position_y"), array('id' => 2));
    if($working_lighter == "checked"){
                $wpdb -> update('ufq_iotdata', array('working_lighter' => "$working_lighter"), array('id' => 2));
    }
    else{
                $wpdb -> update('ufq_iotdata', array('working_lighter' => "xxxxxxx"), array('id' => 2));
    }
    if($screen == "checked"){
        $wpdb -> update('ufq_iotdata', array('screen' => "$screen"), array('id' => 2));
    }
    else{
        $wpdb -> update('ufq_iotdata', array('screen' => "xxxxxxx"), array('id' => 2));
    }
    if($meeting_room_video_on_off == "checked"){
        $wpdb -> update('ufq_iotdata', array('meeting_room_video' => "$meeting_room_video_on_off"), array('id' => 2));
    }
    else{
        $wpdb -> update('ufq_iotdata', array('meeting_room_video' => "xxxxxxx"), array('id' => 2));
    }
    if($office_video_on_off == "checked"){
        $wpdb -> update('ufq_iotdata', array('office_video' => "$office_video_on_off"), array('id' => 2));
    }
    else{
        $wpdb -> update('ufq_iotdata', array('office_video' => "xxxxxxx"), array('id' => 2));
    }
  if($fan_on_off == "checked"){
      $wpdb -> update('ufq_iotdata', array('fan_on_off' => "$fan_on_off"), array('id' => 2));
  }
  else{
      $wpdb -> update('ufq_iotdata', array('fan_on_off' => "xxxxxxx"), array('id' => 2));
  }
  if($motor_on_off == "checked"){
      $wpdb -> update('ufq_iotdata', array('motor_on_off' => "$motor_on_off"), array('id' => 2));
  }
  else{
      $wpdb -> update('ufq_iotdata', array('motor_on_off' => "xxxxxxx"), array('id' => 2));
  }
    if($work_route == "check_a"){
        $wpdb -> update('ufq_iotdata', array('A_line' => "checked"), array('id' => 2));
        $wpdb -> update('ufq_iotdata', array('B_line' => "xxxxxxx"), array('id' => 2));
    }
    if($work_route == "check_b"){
        $wpdb -> update('ufq_iotdata', array('A_line' => "xxxxxxx"), array('id' => 2));
        $wpdb -> update('ufq_iotdata', array('B_line' => "checked"), array('id' => 2));
    }
    $wpdb -> update('ufq_iotdata', array('message' => "$Leave_message"), array('id' => 2));
}

// -> Start Define variables

// theme options variables
$easyweb_webnus_options	= easyweb_webnus_options();

// page options variables
$show_titlebar	= rwmb_meta( 'easyweb_page_title_bar_meta' );
$titlebar_fg	= rwmb_meta( 'easyweb_page_title_text_color_meta' );
$titlebar_bg	= rwmb_meta( 'easyweb_page_title_bg_color_meta' );
$titlebar_fs	= rwmb_meta( 'easyweb_page_title_font_size_meta' );
$sidebar_pos	= rwmb_meta( 'easyweb_sidebar_position_meta' );

// others variables
$have_sidebar	= $sidebar_pos ? true : false;

// -> End Define variables

// headline and breadcrubs
if ( $show_titlebar ) : ?>
	<section id="headline" style="<?php if ( ! empty( $titlebar_bg ) ) echo 'background-color: ' . $titlebar_bg . ';'; ?>">
		<div class="container">
			<h1 style="<?php if ( ! empty( $titlebar_fg ) ) echo 'color: ' . $titlebar_fg . ';'; if ( ! empty( $titlebar_fs ) ) echo ' font-size: ' . $titlebar_fs . ';'; ?>"><?php the_title(); ?></h1>
		</div>
	</section>
<?php endif; ?>

<!-- Start Page Content -->
<section id="main-content" class="container">

<!DOCTYPE html>
<html lang = "en-US">

<head>
	<title>SURVEILLANCE</title>
<!--	<link rel = "stylesheet" type = "text/css" href = "http://127.0.0.1/bilingualplan/wp-content/themes/easyweb/iot_static/red_header.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- 提高电脑，手机 移动装置显示位置兼容性 -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script> <!--没有这个文件，JavaScript 功能可能失效-->

	<style>
.img-video{  
  padding:-10px;
  line-height:1.42857143;
  background-color:#fff;
  border:2px solid #ddd;
  border-radius:6px;
  max-width:95%;
  height:500px;
  margin:auto;
}
div.text{
	margin-top: 10px;
	text-align: center;
	font-family: "Courier New", Times, serif;
	font-weight: bold;
	font: size 18px;
}
#video_images_border{
	width:680px;
	height:520px;
	margin:auto;
}
.imgfilename{
	display:block; 
	width:400px; 
	height:18px; 
	margin-left:auto; 
	margin-right:auto;
}
#leftDiv {
    width: 14%;
}
#middleDiv {
  width: 85%;
/*    width: calc(100% - 600px);  /*设置middleDiv宽度 calc()的作用为动态计算长度值，允许各种单位混合运算，运算符前后需有空格。*/
}
#leftDiv,#middleDiv {
    float: left;  /*向左浮动*/
    height: 120px;  
}
#setting-01 {
  width: 20%;
}
#setting-02 {
  width: 15%;
}
#setting-03 {
  width: 10%;
}
#setting-04 {
  width: 40%;
}
#setting-05 {
  width: 40%;
}
#setting-01,#setting-02,#setting-03,#setting-04,#setting-05{
    float: left;  /*向左浮动*/
    height: 110px;
}
#setting-04,#setting-05{
    float: left;  /*向左浮动*/
    height: 60px;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 5px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.submitbtn{
  width:140px;
  height:36px;
  line-height:18px;
  font-size:18px;
/*  background:url("bg26.jpg") no-repeat left top; */
/*  background-color: #ffffff; */
  color:#FFF;
  padding-bottom:4px
}

.submitbtn:hover {
  background-color: #4CAF50;
  color: white;
}
</style>	
</head>

<body>

	<div id = "IOT_logo" style="display:none">
		<img src = "http://127.0.0.1/bilingualplan/wp-content/themes/easyweb/iot_images/webcam_base64_9.jpeg" alt = "logo" width = "100" height = "100">
	</div>

	<div class = "text" style="display:none">
		<p>VIDEO STREAM</p>
	</div>

  <div id='img-video' class="img-video" style="position:relative;top:1px;text-align: center;">
	   <div id = "video_images_border"></div>     <!--显示在这个节点-->
	</div>
	
 <div id= "iot-container" class="iot-container" style="position:relative;top:-1px;">
	<div style="text-align: center; position:relative;top:10px">
          <div class="btn-group">
            <button id = "meeting_room" type="button" class="btn btn-default" onclick="meeting_room_Function()">#1 相机</button>
            <button id = "office" type="button" class="btn btn-default" onclick="office_Function()">#2 相机</button>
          </div>
 <!--         <div class="btn-group">
            <button id = "next_pic" type="button" class="btn btn-default" onclick="meeting_room_Function()"><</button>
            <button id = "previous_pic" type="button" class="btn btn-default" onclick="office_Function()">></button>
          </div>  -->
          <div class="btn-group">
            <button id = "language_english" type="button" class="btn btn-default">ENGLISH</button>
            <button id = "language_chinese" type="button" class="btn btn-default">中文</button>
          </div>
        </div>
 </div>
    <div style="display:none">
        <div id = "Dada_collection_on_btn" style="text-align: center;">
           <button id = "Dada_collection_on" class = "btn btn-block btn-md btn-primary" style = "color: rgb(255,66,66);width:80px;font-weight: 700;" onclick="Dada_collection_off_Function()">现场：开</button>
	         <p id = "mesgarea"></p>
        </div>
	      <div id = "Dada_collection_off_btn" style="text-align: center;">
           <button id = "Data_collection_off" class = "btn btn-block btn-md btn-primary" style = "color: rgb(164,164,164);width:80px;font-weight: 700;" onclick="Dada_collection_on_Function()">现场：关</button>
           <p id = "mesgarea"></p>
        </div>
    </div>   
      <div class="stat-item " data-width-tablet="180" data-width-desktop="210" style="text-align: center;display:none">
      <p id = "Data_collection_state" class="number"><?php echo ($datacollectionstate); ?></p>
      </div>

        <div style="background:#f0f3f9; position:relative; top:-2px; height: 110px; text-align: center; margin-left:-30px; margin-right:-20px; ">
          <!--            form 要注意的问题，标签<lable>的 for 属性中的值应当与相关控件的 id 属性值一定要相同。
                                            radio 如何分组? 通过name属性来分组，name值相同的单选按钮被归为一组。例如
          -->
    <form action="" method="post" >
                    <div id="setting-01" style="position:relative;top:10px; left:10px">
                    <label for="no1_position_x"id = "no1_camera" style="float:left;">#1 相机 H/V </label>
                    <input class="position" id="no1_position_x" type="range" min="10" style="width:90%"
                                 value="<?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",5)); ?>"
                                 max="80" step="1" name="no1_position_x" onchange="document.getElementById('show_no1_x').innerHTML=value*2-90"><span id = "show_no1_x"><?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",5)*2-90); ?></span><span>&deg;</span>
                    <input class="position" id="no1_position_y" type="range" min="10" style="width:90%; position:relative;top:1px"
                                 value="<?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",6)); ?>" 
                                 max="80" step="1" name="no1_position_y" onchange="document.getElementById('show_no1_y').innerHTML=value*2-90"><span id = "show_no1_y"><?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",6)*2-90); ?></span><span>&deg;</span>   
                    </div>
                    <div id="setting-01" style="position:relative; top:10px">
                    <label for="no2_camera" id = "no2_camera" style="float:left;">#2 相机 H/V </label>  
                    <input class="position" id="no2_position_x" type="range" min="10" style="width:90%"
                                 value="<?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",7)); ?>"
                                 max="80" step="1" name="no2_position_x" onchange="document.getElementById('show_no2_x').innerHTML=value*2-90"><span id = "show_no2_x"><?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",7)*2-90); ?></span><span>&deg;</span>
                    <input class="position" id="no2_position_y" type="range" min="10" style="width:90%; position:relative;top:1px"
                                 value="<?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",8)); ?>" 
                                 max="80" step="1" name="no2_position_y" onchange="document.getElementById('show_no2_y').innerHTML=value*2-90"><span id = "show_no2_y"><?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",8)*2-90); ?></span><span>&deg;</span>
                    </div>
                    <div id="setting-02" style="position:relative;top:10px;">
                    <label for="video_on_off" id = "video_on_off" >相机控制: </label> <br>
                    <input type="checkbox" id = "meeting_room_video_on_off" name="meeting_room_video_on_off" value="checked" <?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",11)); ?>>
                    <label for="meeting_room_video_on_off" id = "meeting_room_video" style = "font-weight: 400;">&nbsp;#1 相机</label><br>
                    <input type="checkbox" id = "office_video_on_off" name="office_video_on_off" value="checked" <?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",12)); ?>>
                    <label for="office_video_on_off" id = "office_video" style = "font-weight: 400;">&nbsp;#2 相机</label>
                    </div>
                    <div id="setting-02" style="position:relative;top:10px;">
                    <label for="seetting_contral" id = "seetting_contral">现场控制: </label> <br>
                    <input type="checkbox" id = "working_lighter_contral" name="working_lighter" value="checked" <?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",9)); ?>>
                    <label for="working_lighter_contral" id = "working_lighter" style = "font-weight: 400;">&nbsp;工作灯</label><br>
                    <input type="checkbox" id = "screen_contral" name="screen" value="checked" <?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",10)); ?>>
                    <label for="creen_contral" id = "screen" style = "font-weight: 400;">&nbsp;提示屏</label>
                    </div>
                    <div id="setting-02" style="position:relative;top:10px;">
                    <label for="on_off" id = "video_on_off" ></label>&nbsp;<br>
                    <input type="checkbox" id = "fan_on_off" name="fan_on_off" value="checked" <?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",13)); ?>>
                    <label for="fan_on_off" id = "fan_on_off" style = "font-weight: 400;">&nbsp;风机</label><br>
                    <input type="checkbox" id = "motor_on_off" name="motor_on_off" value="checked" <?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",14)); ?>>
                    <label for="motor_on_off" id = "motor_on_off" style = "font-weight: 400;">&nbsp;电机</label>
                    </div>
                    <div id="setting-03" style="position:relative;top:10px;">
                    <label for="select_product_line" id = "select_product_line">工作线: </label> <br> 
                    <input type="radio" id="a_line" name="work_route" value="check_a" <?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",15)); ?>>
                    <label for="a_line" id = "a_product_line" style = "font-weight: 400;">&nbsp;A 线</label><br>
                    <input type="radio" id="b_line" name="work_route" value="check_b" <?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",16)); ?>>
                    <label for="b_line" id = "b_product_line" style = "font-weight: 400;">&nbsp;B 线</label>
                    </div>
          </div>
          <div style="background:#f0f3f9; position:relative; top:-2px; height: 60px; text-align: center; margin-left:-30px; margin-right:-20px; ">
                    <div id="setting-04" style="position:relative; margin-left:10px;">
                    <label for="leave_message" id = "leave_message" style="float:left;position:relative;left:10px;">留言: </label><br>
                    <input type = textarea id="leave_message_text" name="Leave_message" rows="2" cols="3" style="width:95%" value="<?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",18)); ?>"></textarea>
                    </div>
                    <div id="setting-05" style="position:relative;top:10px;">
 <!--                  <button type="button" id = "Save_Settings" class = "btn btn-block btn-md btn-primary" style = "position:relative;top:50px;color: white; rgb(255,66,66);width:100px;font-weight: 700;" onclick="Save_setting_Function()">保存设置</button> -->
                    <input type="submit" id = "Save_Settings" value="设 置" class = "submitbtn"/>
 <!--                  <input type="reset" value="重置" class = "btn btn-block btn-md btn-primary" style = "color: white; rgb(255,66,66);width:60px; height:20;font-weight: 700;"/> -->
                    </div>          
     </form>
          </div>
<!-- 
       <div align="center" style="position:relative;top:10px;">
         <a id = "exit_page_1" href="/"><font color="#0000ff">Exit the page safely</font></a>
       </div>  --> 
       <div style="text-align: center;">
        <a id = "login_name">dmin</a>
        <a id = "login_link_text">, 您上一次登录的时间是:  </a>
        <a id = "login_time">01-01-2022</a>
       </div>
      <div align="center" style="display:none">
  <!--    <div style="text-align: center;"> -->
      <p id = "order_word" class="order_word"><?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",1)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",5)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",6)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",7)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",8)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",9)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",10)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",11)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",12)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",13)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",14));
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",15)); 
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",16));
                           echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",18));?>
          </p>
          <p id = "demo"></p>                   <!-- 调程序使用  -->
      </div>
      <br>
	
	<script src = "https://bilingualplan.com/wp-content/themes/easyweb/iot_static/video-stream-frames_to_video.js"></script>

</body>
<script>
//   global $wpdb;  这个类的对象已经在文件开始的地方加载，并且已经取到 $login_name 的值
     var mesg = "Waiting for...    稍等... ";
     var login_name = '<?php echo ($login_name); ?>';
     document.getElementById("login_name").innerHTML=login_name;
     var login_time = '<?php echo ($wpdb -> get_var("SELECT * FROM `ufq_iotdata` WHERE `id` = 2",3)); ?>';
     document.getElementById("login_time").innerHTML=login_time;

     var x = document.getElementById("Dada_collection_off_btn");
          {
            x.style.display = "<?php echo "$displaybtnon"; ?>";
          }
     var x = document.getElementById("Dada_collection_on_btn");
          {
            x.style.display = "<?php echo "$displaybtnoff"; ?>";
          }  

      function Dada_collection_on_Function()
       {  
        $.post("https://bilingualplan.com/?datacollection=ON",this.id,function(data,status){});
        document.getElementById("mesgarea").innerHTML=mesg;
        location.reload(); 
       }
       
     function Dada_collection_off_Function()
       {  
        $.post("https://bilingualplan.com/?datacollection=OFF",this.id,function(data,status){});
        document.getElementById("mesgarea").innerHTML=mesg;
        location.reload();
       }
    function Save_setting_Function()
       {  
        var object = document.getElementById("working_lighter_contral");
        var volume = object.checked;
        alert(volume);
        var no1_position_x = document.getElementById("no1_position_x").value;
        var no1_position_y = document.getElementById("no1_position_y").value;
        var no2_position_x = document.getElementById("no1_position_x").value;
        var no2_position_y = document.getElementById("no1_position_y").value;
        var working_lighter_contral = document.getElementById("working_lighter_contral").checked;
        var screen_contral = document.getElementById("screen_contral").checked;
        var meeting_room_video = document.getElementById("meeting_room_video_on_off").checked;
        var office_video = document.getElementById("office_video_on_off").checked;
        var a_line = document.getElementById("a_line").checked;
        var b_line = document.getElementById("b_line").checked;
        var leave_message = document.getElementById("leave_message_text").value;
        alert(a_line);
        alert(leave_message);
       }
      
     document.getElementById("language_chinese").onclick = function() 
     {
     document.getElementById("meeting_room").innerText ="#1 相机";
     document.getElementById("office").innerText ="#2 相机";
     document.getElementById("seetting_contral").innerText ="现场控制:";
     document.getElementById("working_lighter").innerText ="工作灯";
     document.getElementById("screen").innerText =" 提示屏"; 
     document.getElementById("video_on_off").innerText ="相机控制:"; 
     document.getElementById("meeting_room_video").innerText ="#1 相机"; 
     document.getElementById("office_video").innerText ="#2 相机";
     document.getElementById("select_product_line").innerText ="生产线:"; 
     document.getElementById("a_product_line").innerText ="A 线"; 
     document.getElementById("b_product_line").innerText ="B 线";
     document.getElementById("leave_message").innerText ="留言:"; 
     document.getElementById("no1_camera").innerText ="#1相机 H/V"; 
     document.getElementById("no2_camera").innerText ="#2相机 H/V";
     document.getElementById("Save_Settings").value ="设置";
     document.getElementById("fan_on_off").innerText ="风机"; 
     document.getElementById("motor_on_off").innerText ="电机";
     }
     
     document.getElementById("language_english").onclick = function()
     {
     document.getElementById("meeting_room").innerText ="#1 CAMERA";
     document.getElementById("office").innerText ="#2 CAMERA";
     document.getElementById("seetting_contral").innerText ="CONTRAL:";
     document.getElementById("working_lighter").innerText ="LIGHTER";
     document.getElementById("screen").innerText ="SCREEN"; 
     document.getElementById("video_on_off").innerText ="C.CONT:"; 
     document.getElementById("meeting_room_video").innerText ="#1 C."; 
     document.getElementById("office_video").innerText ="#2 C.";
     document.getElementById("select_product_line").innerText ="P.LINE:"; 
     document.getElementById("a_product_line").innerText ="A LINE";
     document.getElementById("b_product_line").innerText ="B LINE";
     document.getElementById("leave_message").innerText ="LEAVEL MESSAGE:"; 
     document.getElementById("no1_camera").innerText ="#1 CAMERA H/V"; 
     document.getElementById("no2_camera").innerText ="#2 CAMERA H/V";
     document.getElementById("Save_Settings").value ="SAVE";
     document.getElementById("fan_on_off").innerText ="FAN"; 
     document.getElementById("motor_on_off").innerText ="MOTOR";
     }
</script>  
</html>
</section>
<?php
get_footer();