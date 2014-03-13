<?= $this->form_builder->open_form(array('action' => '')); ?>
<?php

$item = new StdClass();
$item->id = 1;
$item->description = 'This is a test';

$exp_month_options = array(1,2,3,4,5,6);
$exp_year_options = array(7,8,9,10);

$input_span = 'Test span';

$defaults_object_or_array_from_db = array('Uno', 'Dos');

echo $this->form_builder->build_form_horizontal(
                        array(
                             array(
                                 'id' => 'id',
                                 'type' => 'hidden',
                                 'value' => $item->id
                             ),
                             array(/* INPUT */
                                 'id' => 'color',
                                 'placeholder' => 'Item Color',
                                 'input_addons' => array(
                                     'pre' => 'color: #',
                                     'post' => ';'
                                 ),
                                 'help' => 'this is a help block'
                             ),
                             array(/* DROP DOWN */
                                 'id' => 'published',
                                 'type' => 'dropdown',
                                 'options' => array(
                                     '1' => 'Published',
                                     '2' => 'Disabled'
                                 )
                             ),
                             array(/* TEXTAREA */
                                 'id' => 'description',
                                 'type' => 'textarea',
                                 'class' => 'wysihtml5',
                                 'placeholder' => 'Item Description (HTML or rich text)',
                                 'value' => html_entity_decode($item->description)
                             ),
                             array(
                                 'id' => 'experation_date',
                                 'type' => 'combine', /* use `combine` to put several input inside the same block */
                                 'elements' => array(
                                     array(
                                         'id' => 'cc_exp_month',
                                         'label' => 'Expiration Date',
                                         'autocomplete' => 'cc-exp-month',
                                         'type' => 'dropdown',
                                         'options' => $exp_month_options,
                                         'class' => $input_span . 'required input-small',
                                         'required' => '',
                                         'data-items' => '4',
                                         'pattern' => '\d{1,2}',
                                         'style' => 'width: auto;',
                                         'value' => (isset($cc_exp_month) ? $cc_exp_month : '')
                                     ),
                                     array(
                                         'id' => 'cc_exp_year',
                                         'label' => 'Expiration Date',
                                         'autocomplete' => 'cc-exp-year',
                                         'type' => 'dropdown',
                                         'options' => $exp_year_options,
                                         'class' => $input_span . 'required input-small',
                                         'required' => '',
                                         'data-items' => '4',
                                         'pattern' => '\d{4}',
                                         'style' => 'width: auto; margin-left: 5px;',
                                         'value' => (isset($cc_exp_year) ? $cc_exp_year : '')
                                     )
                                 )
                             ),
                             array(
                                 'id' => 'submit',
                                 'type' => 'submit'
                             )
                        ), $defaults_object_or_array_from_db);
?>
<?= $this->form_builder->close_form(); ?>