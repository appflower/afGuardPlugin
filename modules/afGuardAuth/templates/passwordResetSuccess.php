<?php
$layout=new afExtjsSfGuardLayout();

/**
 * EXTJS REQUEST PASSWORD FORM
 */

$form=new afExtjsForm(array('action'=>url_for('@af_guard_password_reset2')/*,'fileUpload'=>true*/, 'labelWidth'=>'120'));

$fieldset=$form->startFieldset(array('legend'=>'Change your password'));
$columns = $fieldset->startColumns(array("columnWidth"=>1));
$col = $columns->startColumn(array("columnWidth"=>1));

$layout->addHelp('Thanks for confirming your email address. You may now change your password using the form below.');	
$username=new afExtjsFieldHidden($col,array('name'=>'uid','value'=>$sf_params->get('uid')));
$validate=new afExtjsFieldHidden($col,array('name'=>'validate','value'=>$sf_params->get('validate')));
$password=new afExtjsFieldInput($col,array('name'=>'password','label'=>'Password','value'=>'','help'=>"Enter the password",'emptyText'=>'write your password','width'=>'150','PasswordFocus'=>'true'));
$password=new afExtjsFieldInput($col,array('name'=>'confirm_password','label'=>'Confirm Password','value'=>'','help'=>"The re-typed password, to ensure that it has been entered correctly.",'emptyText'=>'re-type your password','width'=>'150','PasswordFocus'=>'true'));

$columns->endColumn($col);
$fieldset->endColumns($columns);
$form->endFieldset($fieldset);

new afExtjsSubmitButton($form,array('action'=>url_for('@af_guard_password_reset2')));
new afExtjsLinkButton($form,array('url'=>url_for('@af_guard_signin'),'label'=>'Go to Login','load'=>'page'));

$form->end();

$layout->addItem('center',$form);

$tools=new afExtjsTools();

$layout->addCenterComponent($tools,array('title'=>'Confirmation Successful'));


$layout->end();

?>
