<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body style="Margin:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;min-width:100%;background-color:#f3f2f0;">
<center class="wrapper" style="width:100%;table-layout:fixed;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#f3f2f0;">
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f3f2f0;" bgcolor="#f3f2f0;">
    <tr>
      <td width="100%"><div class="webkit" style="max-width:600px;Margin:0 auto;"> 
        <table class="outer" align="center" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0;Margin:0 auto;width:100%;max-width:600px;">
          <tr>
            <td height="30">&nbsp;</td>
          </tr>
          <tr>
            <td class="two-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:center;font-size:0;">
              </td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
          </tr>
          <tr>
            <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;">
              <table class="one-column" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0; border-left:1px solid #e8e7e5; border-right:1px solid #e8e7e5; border-bottom:1px solid #e8e7e5; border-top:1px solid #e8e7e5" bgcolor="#FFFFFF">
                <tr>
                  <td align="left" style="padding:50px 50px 50px 50px">
                    <strong>Dear {{ $user->name }}</strong>,</p>
                    <p style="color:#00000000000; font-size:16px; text-align:left; font-family: Verdana, Geneva, sans-serif; line-height:22px ">
                      Thanks for registering with P-HUB.<br />
                    </p>
                    <p style="color:#000000; font-size:16px; text-align:left; font-family: Verdana, Geneva, sans-serif; line-height:22px ">
                        <a href="{{route('sendEmailDone', ['email' => $user->email, 'verify_token' => $user->verify_token])}}">Click Here</a> to verify your email.
                    </p>
                    <p style="color:#000000; font-size:16px; text-align:left; font-family: Verdana, Geneva, sans-serif; line-height:22px ">
                      <br />
                      Best Regards, <br />
                      P-HUB & Team
                    </p>
                  </td>
                </tr>
              </table>
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                  <td height="30">&nbsp;</td>
                </tr>
                <tr>
                  <td class="two-column" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;text-align:center;font-size:0;">
                    </td>
                </tr>
                <tr>
                  <td height="30">&nbsp;</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</center>
</body>
</html>