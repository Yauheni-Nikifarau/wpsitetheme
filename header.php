<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
	<?php wp_head(); ?>

</head>
<body class="is-preload homepage">
<div id="page-wrapper">

    <!-- Header -->
    <div id="header-wrapper">
        <header id="header" class="container">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="/">News</a></h1>
                <span>by HTML5 UP</span>
            </div>

			<?php
			    $args = [
                    'theme_location' => 'Header',
                    'menu' => 'Main',
                    'container' => 'nav',
                    'container_class' => 'nav',
                    'container_id' => 'nav',
                    'items_wrap' => '<ul>%3$s</ul>'
			    ];
			    wp_nav_menu( $args );
			?>
        </header>
    </div>

    <!-- Features -->
    <div id="features-wrapper">
