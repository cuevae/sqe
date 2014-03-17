<div id="login_form" style="width:400px; margin:100px auto; border-radius: 5px;border:1px solid #909090; padding:20px">

    <?php
    if (!empty ($error_message)) {
        echo '<span style="color:red">' . $error_message . '</span>';

    }
    echo form_open('login');

    echo form_label('Username :') . br(2);
    $data = array(
        'name' => 'username',
        'id' => 'username',
        'value' => set_value('user_name'),
        'style' => 'width:100%',
    );
    echo form_input($data) . br(2);
    echo form_error('username');


    echo form_label('Password: ') . br(2);
    $data = array(
        'name' => 'password',
        'id' => 'Password',
        'value' => '',
        'style' => 'width:100%',

    );
    echo form_password($data) . br(2);
    echo form_error('password');
    $data = array(
        'name' => 'Login',
        'id' => 'login',
        'value' => 'Login',
        'style' => 'width:40%',

    );
    echo form_submit($data) . br(2);

    echo form_close();
    ?>
</div>

