<?php
include "./PHPMailer/class.phpmailer.php";    //包函邮件发送类

//邮件发送
function send_mail($frommail,$tomail,$subject,$body,$ccmail="",$bccmail="") {
    $mail = new PHPMailer();
    $mail->IsSMTP();                            // 经smtp发送
    $mail->Host     = "smtp.qq.com";           // SMTP 服务器
    $mail->SMTPAuth = true;                     // 打开SMTP 认证
    $mail->Username = "844827150@qq.com";    // 用户名
    $mail->Password = "******";          // 密码
    $mail->From     = $frommail;                  // 发信人
    $mail->FromName = "qq test";        // 发信人别名
    $mail->AddAddress($tomail);                 // 收信人
    if(!empty($ccmail)){
    $mail->AddCC($ccmail);                    // cc收信人
    }
    if(!empty($bccmail)){
    $mail->AddCC($bccmail);                   // bcc收信人
    }
    $mail->WordWrap = 50;
    $mail->IsHTML(true);                            // 以html方式发送
    $mail->Subject  = $subject;                 // 邮件标题
    $mail->Body     = $body;                    // 邮件内空
    $mail->AltBody  =  "请使用HTML方式查看邮件。";
    $mail->AddAttachment("PHPMailer/examples/images/phpmailer.gif");      // attachment
    $mail->AddStringAttachment(get_content(),"123.xls",'base64', 'application/vnd.ms-excel');      // attachment
    return $mail->Send();
}

$result= send_mail("844827150@qq.com","1401792631@qq.com","test","test");


function get_content(){
            $xls = <<<EOT
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
</head>
<body>
<table border="1" width="480">
<tr><td colspan="3" align="left">安居客客户明细</td></tr>
<tr><td colspan="3" align="left">楼盘名称：</td></tr>
<tr><td colspan="3" align="left">起始时间：</td></tr>
<tr><td colspan="3" align="left">下载时间：</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
</body>
</html>
EOT;
ob_clean();
$filename =  "客户明细-1.xls";
$filename = $filename;
/*
header("Content-type:   application/vnd.ms-excel");
header("Content-Transfer-Encoding: binary");
header("Accept-Ranges:   bytes");
header("Accept-Length:   ".strlen($xls));
header("Content-Disposition:   attachment;   filename=" . $filename);
*/
return $xls;
}
?>
