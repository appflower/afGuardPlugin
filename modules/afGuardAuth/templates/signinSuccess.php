<?php
$layout=new afExtjsSfGuardLayout();

/**
 * EXTJS SIGN IN FORM
 */

$form=new afExtjsForm(array('action'=>url_for('@af_guard_signin'),"columnWidth"=>".88"/*,'fileUpload'=>true*/));

$fieldset=$form->startFieldset(array('legend'=>'Login','collapsible'=>'false'));
$columns = $fieldset->startColumns(array("columnWidth"=>1));
$col = $columns->startColumn(array("columnWidth"=>1));

$username=new afExtjsFieldInput($col,array('name'=>'signin[username]','label'=>'Username','value'=>'','help'=>"Enter the username",'width'=>'150'));

$password=new afExtjsFieldPassword($col,array('name'=>'signin[password]','label'=>'Password','value'=>'','help'=>"Enter the password",'width'=>'150'));

$captchaEnabled = in_array( 'sfCaptchaPlugin', sfProjectConfiguration::getActive()->getPlugins());
if($captchaEnabled && afRateLimit::isCaptchaNeeded(sfContext::getInstance()->getRequest())){
	$captcha=new afExtjsFieldCaptcha($col,array('name'=>'signin[captcha]','label'=>'Verify','width'=>'150','src'=>'/sfCaptcha/index','imgStyle'=>''));
}

$remember=new afExtjsFieldCheckbox($col,array('name'=>'signin[remember]','label'=>'Remember','checked'=>true));

$columns->endColumn($col);
$fieldset->endColumns($columns);
$form->endFieldset($fieldset);

new afExtjsSubmitButton($form,array('action'=>url_for('@af_guard_signin')));
new afExtjsLinkButton($form,array('url'=>url_for('@af_guard_password'),'load'=>'page','label'=>'Forgot your password?','icon'=>'/images/famfamfam/email_go.png'));

$form->end();

$layout->addItem('center',
	array(
		"columnWidth"=>".12",
		"frame"=>false,
		"height"=>167,
		"html"=>"<a href='http://www.appflower.com'><img src='/appFlowerPlugin/images/vertical_logo.png'></a>"
	)
);
$layout->addItem('center',$form);
//$layout->addItem('west',array('title'=>'xxxxx','width'=>'51'));

$tools=new afExtjsTools();
//$tools->addItem(array('id'=>'gear','handler'=>array('source'=>"Ext.Msg.alert('Message', 'The Settings tool was clicked.');")));
//$tools->addItem(array('id'=>'close','handler'=>array('parameters'=>'e,target,panel','source'=>"panel.ownerCt.remove(panel, true);")));

$layout->addCenterComponent($tools,array('title'=>'LOG IN'));

$layout->end();

?>
