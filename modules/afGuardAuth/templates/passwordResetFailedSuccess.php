<?php
$layout=new afExtjsSfGuardLayout();

/**
 * EXTJS REQUEST PASSWORD FORM
 */


$form=new afExtjsForm(array('action'=>url_for('@af_guard_password_reset2'), 'labelWidth'=>'120'));

$form->addHelp('If you copied and pasted the URL from
	your confirmation email, please make sure you did so correctly and
	completely.');

new afExtjsLinkButton($form,array('url'=>url_for('@af_guard_signin'),'label'=>'Go to Login','load'=>'page'));

$field=new afExtjsFieldHidden($form,array('name'=>'field')); // this field is added

$form->end();

$layout->addItem('center',$form);

$tools=new afExtjsTools();

$layout->addCenterComponent($tools,array('title'=>'That confirmation code is invalid.'));


$layout->end();

?>
