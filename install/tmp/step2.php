<?php
$topic = strtoupper(md5(uniqid(time()).SYSTEM_HOST));
$wspBack = base64_encode('http://wx.aodianyun.com/openlogin/installBack.php');
$thisUrl = base64_encode(SYSTEM_HOST.'/install/index.php?r=install/step3');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> 奥点云——微视评安装 </title>
  <meta charset="utf-8">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include __BASE__.'/install/tmp/'.'common_css.html'; ?>
 </head>
 <body>
    <!-- content start -->
    <div class="container">
      <div class="block">
        <div class="navbar-inner block-header"><span>微视评安装</span></div>
        <!-- step start -->
        <div class="step-content">
          <div class="arrow-gary"></div>
          <div class="step-words">
            <p>Step1</p>
            <p>安装环境检测</p>
          </div>
          
          <div class="arrow-2"></div>
          
          <div class="arrow-blue"></div>
          <div class="step-words-current">
            <p>Step2</p>
            <p>微信号验证</p>
          </div>
          
          <div class="arrow-2"></div>
          
          <div class="arrow-gary"></div>
          <div class="step-words">
            <p>Step3</p>
            <p>安装成功</p>
          </div>
          <div class="cb"></div>
        </div>
        <!-- step end -->
        <!-- from start -->
        <div class="block-content">
        	<div style="width:400px; height:400px; margin:20px auto;" id="loginBox"></div>
        </div>
        <!-- from end -->
      </div>
    </div>
    <?php include __BASE__.'/install/tmp/'.'footer.html'; ?>
    <!-- content end -->
<script src="http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>
<script type="text/javascript">
var obj = new WxLogin({
  id:"loginBox", 
  appid: "wxc4de4a3ea13360bd", 
  scope: "snsapi_login", 
  redirect_uri: "http://www.aodianyun.com/wxConsole/login/installBridge.php?back=<?php echo $wspBack;?>",
  state: "<?php echo $thisUrl; ?>",
  style: "",
  href: ""
});
</script>
 </body>
</html>