<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>验证码测试</title>
</head>
<body>
	<form method="post" action="./ValidateAction.php">
		<p>
			验证码: <img id="captcha_img" border='1' src='./Captcha.php'
				style="width: 100px; height: 30px;cursor:pointer;" title="点击刷新" 
				onClick="this.src='./Captcha.php?r='+Math.random()" />
		</p>
		<P>
			请输入验证码:<input type="text" name="ValidCode" value='' />
		</p>
		<p>
			<input type='submit' value='提交' style='padding: 6px 5px;' />
		</p>
	</form>
</body>
</html>