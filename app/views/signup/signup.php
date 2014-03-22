<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register User</title>
</head>

<body>
<div class="center_box_content">
    <table width="600" align="center">
        <tbody>
        <tr>
            <td align="left"><h4 class="center_box_sub_heading"><span>Register new user</span></h4></td>
            <td align="right">Already have an account? <a href="login/login">Login here</a></td>
        </tr>
        </tbody>
    </table>
    <?php echo form_open("signup");?>
    <table cellspacing="1" cellpadding="2" width="600" align="center">
        <tbody>


        <tr>
            <td width="38%" align="right">First Name</td>
            <td><CSS class="mandatory_star">*</CSS></td>
            <td nowrap="nowrap"><?php echo form_input($forename1);?></td>
        </tr>
        <tr>
            <td align="right">Surname</td>
            <td><CSS class="mandatory_star">*</CSS></td>
            <td nowrap="nowrap"><?php echo form_input($surname);?></td>
        </tr>

        <tr>
            <td align="right">Username</td>
            <td class="mandatory_star">*</td>
            <td nowrap="nowrap"><?php echo form_input($username);?></td>
        </tr>
        <tr>
            <td align="right">Password</td>
            <td><CSS class="mandatory_star">*</CSS></td>
            <td nowrap="nowrap"><?php echo form_input($password);?></td>
        </tr>
        <tr>
            <td align="right">Make me admin</td>
            <td nowrap="nowrap"><?php echo form_checkbox($admin);?></td>
        </tr>


        <tr valign="top">
            <td style="padding-left:10px"><!--<input type="text" name="captcha_code" size="10" maxlength="6" />
						  <a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>--></td>
        </tr>
        <tr>
            <td colspan="3" nowrap="" height="7px"></td>
        </tr>

        <tr>
            <td colspan="3" align="center"><?php echo form_submit('submit', 'Submit');?> <?php echo form_close();?></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>