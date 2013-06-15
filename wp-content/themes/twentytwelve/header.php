<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6" id="pba"><![endif]--> 
<!--[if IE 7 ]><html lang="en" class="ie7" id="pba"><![endif]--> 
<!--[if IE 8 ]><html lang="en" class="ie8" id="pba"><![endif]--> 
<!--[if IE 9 ]><html lang="en" class="ie9" id="pba"><![endif]--> 
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" id="pba"><!--<![endif]--> 

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" id="pba-style-css" href="/wp-content/themes/twentytwelve/css/style.css" type="text/css" media="all">

<script src="/wp-content/themes/twentytwelve/js/jquery-1.7.2.min.js"></script>
<script src="/wp-content/themes/twentytwelve/js/modernizr.custom.39930.js"></script>

<!-- <link href='http://fonts.googleapis.com/css?family=Tangerine|Niconne|Satisfy|Norican' rel='stylesheet' type='text/css'> -->
<link href='http://fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Duru+Sans' rel='stylesheet' type='text/css'>

<!--[if lte IE 8 ]><script src="/wp-content/themes/twentytwelve/js/respond.js"></script><![endif]--> 
<script src="/wp-content/themes/twentytwelve/js/script.js"></script>

<script>$('html').addClass('js');</script>
</head>

