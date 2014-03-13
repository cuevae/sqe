<?php
    $this->load->helper('html');
    echo form_open('login');
    echo form_label('Username: ') . br(2);

    $data = array(
        'name' => 'user_name',
        'id' => 'user_name',
        'value' => '',
        'style' => 'width:100%',
    );
    echo form_input($data) . br(2);
    echo form_error('user_name');


    echo form_label('Password') . br(2);
    $data = array(
        'name' => 'password',
        'id' => 'password',
        'value' => '',
        'style' => 'width:100%',
    );
    echo form_password($data) . br(2);
    echo form_error('password');

    $data = array(
        'name' => 'login',
        'id' => 'login',
        'value' => 'login',
        'style' => 'width:40%',
    );
    echo form_submit($data) . br(2);
    echo form_close();
