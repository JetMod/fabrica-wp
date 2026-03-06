<?php
/**
 * Начало HTML-документа для страниц
 * Используется в шаблонах страниц
 *
 * @package Fabrica
 */

if (!isset($t)) {
    $t = get_template_directory_uri();
}
$body_class = isset($body_class) ? $body_class : 'page';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#F5F3EF">
    <link rel="icon" href="<?php echo esc_url($t . '/img/logo.jpg'); ?>" type="image/jpeg">
    <link rel="apple-touch-icon" href="<?php echo esc_url($t . '/img/logo.jpg'); ?>">
    <?php wp_head(); ?>
</head>
<body class="<?php echo esc_attr($body_class); ?>">
