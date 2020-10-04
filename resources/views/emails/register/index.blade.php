@component('mail::message')
 <?php
 
 //echo '<pre>';print_r($user['fullname']);die;
 
 ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <div>
        <p align="center" style="text-align: center;"><b><span style="font-size: 20pt; line-height: 106%;"></span></b></p>
        <p align="center" style="text-align: center;"><b><span style="font-size: 19pt; line-height: 106%;">Upskill Educator: Signup</span></b></p>
        <p align="center" style="text-align: center;"><b> </b></p>
        <div align="center">
        <table border="1" cellspacing="0" cellpadding="0" width="640" style="width: 480pt; background: white; border: 1pt solid rgb(234, 234, 234);">
            <tbody>
                <tr>
                    <td style="border: none; padding: 6pt;">
                    <p><span style="font-family: Cambria, serif;"><img width="108" height="47" src="http://upskilleducator.com/assets/images/site-logo.png" alt="Description: C:\Users\Gunjan\Desktop\site-logo.png" v:shapes="Picture_x0020_2"></span> </p>
                    <div align="center" style=" text-align: center;"><span style="font-family: Cambria, serif;"> <hr size="1" width="100%" align="center">
                    </span></div>
                    <h2 style="line-height: 106%;"><span style="font-family: Cambria, serif;">Welcome {{$user['fullname']}}!</span></h2>
                    <p style="line-height: 106%;"><span style="font-family: Cambria, serif;">Welcome to <strong><span style="font-family: Cambria, serif;">Upskilleducator.com</span></strong>. To log in when visiting our site just click </span><span><a href="https://www.elieducation.com/login"><span style="font-family: Cambria, serif;">Login</span></a></span><span style="font-family: Cambria, serif;"> at the top of every page, and then enter your e-mail address and password.</span></p>
                    <p style="line-height: 106%;"><strong><span style="font-family: Cambria, serif;">Use the following values when prompted to log in:</span></strong> </p>
                    <p style="line-height: 106%;"><strong><span style="font-family: Cambria, serif;">E-mail:</span></strong> <span><a href="mailto:mohitv@upskilleducator.com"><span style="font-family: Cambria, serif;">{{$user['email']}}</span></a></span><span style="font-family: Cambria, serif;"><br>
                    <strong><span style="font-family: Cambria, serif;">Password:</span></strong>
                    @if($user['password'])
                        {{$user['password']}}
                    @else
                        
                    {{$user['plain_pass']}}
                    @endif
                    </span></p>
                    <p style="line-height: 106%;"><strong><span style="font-family: Cambria, serif;">When you log in to your account, you will be able to do the following:</span></strong> </p>
                    <ul type="disc">
                        <li><span style="font-family: Cambria, serif;">Proceed through checkout faster when making a purchase </span></li>
                        <li><span style="font-family: Cambria, serif;">Download Transcript/Receipt/Certificate/Conference Reminder (Live/On-demand) </span></li>
                        <li><span style="font-family: Cambria, serif;">Check the status of orders </span></li>
                        <li><span style="font-family: Cambria, serif;">View past orders </span></li>
                        <li><span style="font-family: Cambria, serif;">Make changes to your account information </span></li>
                        <li><span style="font-family: Cambria, serif;">Change your password </span></li>
                    </ul>
                    <p style="line-height: 106%;"><span style="font-family: Cambria, serif;">Thank You, The Upskill Educator Team</span></p>
                    <div align="center" style=" text-align: center;"><span style="font-family: Cambria, serif;"> <hr size="1" width="100%" align="center">
                    </span></div>
                    <p style="line-height: 106%;"><span style="font-family: Cambria, serif;">Upskill Educator, 1414, 154th Ave NE APT 4404 Bellevue, WA 98007-4582,&nbsp;USA<br>
                    Toll Free: 1 888-407-9644 | E-mail: </span><span><a href="mailto:support@upskilleducator.com"><span style="font-family: Cambria, serif;">support@upskilleducator.com</span></a></span> </p>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <br>
        <div align="center">
        </div>
        <br>
        <!-- <table width="750" align="center" border="1" cellpadding="10" cellspacing="5">
            <tbody>
                <tr>
                    <td><font style="font-size:13pt">
                    <br>
                    </font></td>
                </tr>
            </tbody>
        </table> -->
        </div>
    </body>
</html>
 
@component('mail::button', ['url' => url('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent  
