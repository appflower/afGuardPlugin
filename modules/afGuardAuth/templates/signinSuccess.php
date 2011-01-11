<?php
$layout=new ImmExtjsSfGuardLayout();

/**
 * EXTJS SIGN IN FORM
 */

$form=new ImmExtjsForm(array('action'=>'/login',"columnWidth"=>".88"/*,'fileUpload'=>true*/));

$fieldset=$form->startFieldset(array('legend'=>'Login','collapsible'=>'false'));
$columns = $fieldset->startColumns(array("columnWidth"=>1));
$col = $columns->startColumn(array("columnWidth"=>1));

$username=new ImmExtjsFieldInput($col,array('name'=>'signin[username]','label'=>'Username','value'=>'','help'=>"Enter the username",'comment'=>'write your username','width'=>'150'));

$password=new ImmExtjsFieldPassword($col,array('name'=>'signin[password]','label'=>'Password','value'=>'','help'=>"Enter the password",'comment'=>'write your password','width'=>'150'));

$captchaEnabled = in_array( 'sfCaptchaPlugin', sfProjectConfiguration::getActive()->getPlugins());
if($captchaEnabled && afRateLimit::isCaptchaNeeded(sfContext::getInstance()->getRequest())){
	$captcha=new ImmExtjsFieldCaptcha($col,array('name'=>'signin[captcha]','label'=>'Verify','width'=>'150','src'=>'/sfCaptcha/index','imgStyle'=>''));
}

$remember=new ImmExtjsFieldCheckbox($col,array('name'=>'signin[remember]','label'=>'Remember','checked'=>true));

$columns->endColumn($col);
$fieldset->endColumns($columns);
$form->endFieldset($fieldset);

new ImmExtjsSubmitButton($form,array('action'=>'/login'));
new ImmExtjsLinkButton($form,array('url'=>url_for('@af_guard_password'),'load'=>'page','label'=>'Forgot your password?','icon'=>'/images/famfamfam/email_go.png'));

$form->end();

$layout->addItem('center',
	array(
		"columnWidth"=>".12",
		"frame"=>false,
		"height"=>167,
		"html"=>"<img src='appFlowerStudioPlugin/images/vertical_logo.png' />"
	)
);
$layout->addItem('center',$form);
//$layout->addItem('west',array('title'=>'xxxxx','width'=>'51'));

$tools=new ImmExtjsTools();
//$tools->addItem(array('id'=>'gear','handler'=>array('source'=>"Ext.Msg.alert('Message', 'The Settings tool was clicked.');")));
//$tools->addItem(array('id'=>'close','handler'=>array('parameters'=>'e,target,panel','source'=>"panel.ownerCt.remove(panel, true);")));

$layout->addCenterComponent($tools,array('title'=>'LOG IN'));

$layout->end();

?>
