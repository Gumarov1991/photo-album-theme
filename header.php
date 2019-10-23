<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
?>
<!DOCTYPE html>
<html <?php language_attributes();?>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name')?></title>
    <meta name="description" content="<?php bloginfo('description') ?>">
    <meta name="author" content="Albert Gumarov">
    <?php wp_head(); ?>
</head>