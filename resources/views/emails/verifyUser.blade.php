<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width"/>
    <title>Verify your email address</title>

    <style type="text/css">
        body, #bodyTable, #bodyCell{height:100% !important; margin:0; padding:0; width:100% !important;}
        table{border-collapse:collapse;}
        img, a img{border:0; outline:none; text-decoration:none;}
        h1, h2, h3, h4, h5, h6{margin:0; padding:0;}
        p{margin: 1em 0;}


        .ReadMsgBody{width:100%;} .ExternalClass{width:100%;}
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height:100%;}
        table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;}
        #outlook a{padding:0;}
        img{-ms-interpolation-mode: bicubic;}
        body, table, td, p, a, li, blockquote{-ms-text-size-adjust:100%; -webkit-text-size-adjust:100%;}


    </style>
    <!--[if mso 12]>
    <style type="text/css">
        .flexibleContainer{display:block !important; width:100% !important;}
    </style>
    <![endif]-->
    <!--[if mso 14]>
    <style type="text/css">
        .flexibleContainer{display:block !important; width:100% !important;}
    </style>
    <![endif]-->
</head>
<body>
<center>
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
            <td align="center" valign="top" id="bodyCell">
                <table class="wrapper" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; background-color: #f5f8fa ; margin: 0 ; padding: 0 ; width: 100%" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box" align="center">
                            <table class="content" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; margin: 0 ; padding: 0 ; width: 100%" width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; padding: 25px 0 ; text-align: center">
                                        <a href="{{ route('home') }}" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; color: #bbbfc3 ; font-size: 19px ; font-weight: bold ; text-decoration: none ; text-shadow: 0 1px 0 white" target="_other" rel="nofollow">
                                            alaminbijoy.me
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="body" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; background-color: #ffffff ; border-bottom: 1px solid #edeff2 ; border-top: 1px solid #edeff2 ; margin: 0 ; padding: 0 ; width: 100%" width="100%">
                                        <table class="inner-body" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; background-color: #ffffff ; margin: 0 auto ; padding: 0 ; width: 100%;max-width: 570px;" width="570" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="content-cell" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; padding: 35px">

                                                    <h1 style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; color: #2f3133 ; font-size: 19px ; font-weight: bold ; margin-top: 0 ; text-align: left">Hello {{$user['name']}},</h1>

                                                    <p style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; color: #74787e ; font-size: 16px ; line-height: 1.5em ; margin-top: 0 ; text-align: left">Your registered email id is {{$user['email']}}, Please click on the below link to verify your email account.</p>

                                                    <table class="action" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; margin: 30px auto ; padding: 0 ; text-align: center ; width: 100%" width="100%" cellspacing="0" cellpadding="0" align="center">
                                                        <tbody>
                                                        <tr>
                                                            <td style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box" align="center">
                                                                <table style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box" align="center">
                                                                            <table style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box" cellspacing="0" cellpadding="0" border="0">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box">
                                                                                        <a href="{{url('user/verify', $user->e_token)}}" class="button button-blue" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; border-radius: 3px ; box-shadow: 0 2px 3px rgba(0 , 0 , 0 , 0.16) ; color: #fff ; display: inline-block ; text-decoration: none ; background-color: #3097d1 ; border-top: 10px solid #3097d1 ; border-right: 18px solid #3097d1 ; border-bottom: 10px solid #3097d1 ; border-left: 18px solid #3097d1" target="_other" rel="nofollow">Verify Email</a>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                    <p style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; color: #74787e ; font-size: 16px ; line-height: 1.5em ; margin-top: 0 ; text-align: left">Regards,<br>Mohammad Al-amin</p>

                                                    <table class="subcopy" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; border-top: 1px solid #edeff2 ; margin-top: 25px ; padding-top: 25px" width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box;padding-top: 10px;">
                                                                <p style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; color: #74787e ; line-height: 1.5em ; margin-top: 0 ; text-align: left ; font-size: 12px">
                                                                    If you’re having trouble clicking the "Verify Email" button, copy and paste the URL below
                                                                    into your web browser: {{url('user/verify', $user->e_token)}}</p>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box">
                                        <table class="footer" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; margin: 0 auto ; padding: 0 ; text-align: center ; width: 100%;max-width: 570px;" width="570" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td class="content-cell" style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; padding: 35px" align="center">
                                                    <p style="font-family: &quot;avenir&quot; , &quot;helvetica&quot; , sans-serif ; box-sizing: border-box ; line-height: 1.5em ; margin-top: 0 ; color: #aeaeae ; font-size: 12px ; text-align: center">
                                                        Copyright © <a href="{{ route('home') }}">alaminbijoy.me</a> 2018. All rights reserved.</p>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</center>
</body>
</html>