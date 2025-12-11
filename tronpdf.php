<?php

/**
 * Template Name: Hello World
 * Version: 0.1
 * Description: A basic "Hello World" PDF template showing custom PDF templates in action
 * Author: Jake Jackson
 * Author URI: https://gravitypdf.com
 * Group: Sol System
 * License: GPLv2
 * Required PDF Version: 4.0
 * Tags: space, solar system, getting started
 */

if ( ! class_exists( 'GFForms' ) ) {
    return;
}

$email       = $form_data['field'][2] ?? '';
$fname       = $form_data['field'][1]['first'] ?? '';
$lname       = $form_data['field'][1]['last'] ?? '';
$event_type  = $form_data['field'][43] ?? '';
$attendees   = $form_data['products'][36]['quantity'] ?? '';
$addons      = $form_data['field'][37] ?? [];
$addons_list = !empty($addons) ? implode(', ', $addons) : 'None';

?>

<style>
    @page {
        background: #000000;
    }
</style>

<link rel="stylesheet" href="<?php echo esc_attr( __DIR__ ); ?>/styles/event-ticket.css">

<?php
$template_url = $config->url;
$image_path   = 'images/logo.png';
$image_url    = $template_url . $image_path;
?>


<!-- HEADER -->
<table class="header-table">
    <tr>
        <td class="header-logo">
            <img src="<?php echo esc_attr( __DIR__ ); ?>/images/logo.png" width="100" alt="Logo" />
        </td>

        <td class="header-title">
            <span class="header-form-title">{form_title}</span>
        </td>

        <td class="header-date">
            <span>{date_dmy}</span>
        </td>
    </tr>
</table>

<!-- INFO TABLE SECTION -->
<h2 class="section-title">Registration Details</h2>

<table class="fancy-info-table">
    <thead>
    <tr>
        <th>Field</th>
        <th>Value</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td><strong>Email Address</strong></td>
        <td><?php echo esc_html($email); ?></td>
    </tr>

    <tr>
        <td><strong>Registrant Name</strong></td>
        <td><?php echo esc_html($fname . ' ' . $lname); ?></td>
    </tr>

    <tr>
        <td><strong>Event Name</strong></td>
        <td><?php echo esc_html($event_type); ?></td>
    </tr>

    <tr>
        <td><strong>Number of Attendees</strong></td>
        <td><?php echo esc_html($attendees); ?></td>
    </tr>

    <tr>
        <td><strong>Add-ons Selected</strong></td>
        <td><?php echo esc_html($addons_list); ?></td>
    </tr>
    </tbody>
</table>

<!-- QR CODE SECTION -->
<h2 class="section-title">Entry QR Code</h2>
<div class="barcode-container">
    <barcode code="Your message here" type="QR" size="1.8" error="M" disableborder="1" class="barcode" />
</div>

