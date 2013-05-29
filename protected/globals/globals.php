<?php 
/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
 
/**
 * This is the shortcut to Yii::app()
 */
function app()
{
    return Yii::app();
}
 
/**
 * This is the shortcut to Yii::app()->clientScript
 */
function cs()
{
    // You could also call the client script instance via Yii::app()->clientScript
    // But this is faster
    return Yii::app()->getClientScript();
}
 
/**
 * This is the shortcut to Yii::app()->user.
 */
function user() 
{
    return Yii::app()->getUser();
}
 
/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function createUrl($route,$params=array(),$ampersand='&')
{
    return Yii::app()->createUrl($route,$params,$ampersand);
}
 
/**
 * This is the shortcut to CHtml::encode
 */
function h($text)
{
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}
 
/**
 * This is the shortcut to CHtml::link()
 */
function l($text, $url = '#', $htmlOptions = array()) 
{
    return CHtml::link($text, $url, $htmlOptions);
}
 
/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($message, $category = 'stay', $params = array(), $source = null, $language = null) 
{
    return Yii::t($category, $message, $params, $source, $language);
}
 
/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function baseUrl($url=null) 
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}

/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function assetUrl($url=null) 
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}
 
/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function param($name) 
{
    return Yii::app()->params[$name];
}
/**
 * Dumps the target with syntax highlighting on by default:
 *
 */
function dump($target)
{
  return CVarDumper::dump($target, 10, true) ;
}
/*
 * Get ID of a field
 *
 */
function getId($model, $attribute)	{
	return CHtml::activeId($model, $attribute);	
}
/*
 * make money format
 *
 */
function money($value)	{
	return Yii::app()->numberFormatter->formatCurrency($value, "USD");
}
 
/*
 * Caching functions to consolidate logic
 *
 */
 
function cache($data, $name, $duration=NULL)	{
	if(!$duration)	{
		$duration=100000;
	}
	
	Yii::app()->session[$name]=$data;
	//Yii::app()->cache->set($data, $name, $duration);
}

function getCache($name)	{
	return Yii::app()->session[$name];
//	return Yii::app()->cache->get($name);
}

function session($name, $data)	{
	Yii::app()->session[$name] = $data;
}

function setFlash($status, $message)	{
	return Yii::app()->user->setFlash($status, $message);
}

function userId()	{
	return Yii::app()->user->id;
}

function controller()	{
	return Yii::app()->controller->id;
}

function action()	{
	return Yii::app()->controller->action->id;
}
function ugId()	{
	return Yii::app()->user->id;
}

?>