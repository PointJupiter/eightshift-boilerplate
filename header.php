<?php

/**
 * Main header file
 *
 * @package EightshiftBoilerplate
 */

use EightshiftBoilerplateVendor\EightshiftLibs\Helpers\Components;
use EightshiftBoilerplate\Manifest\Manifest;

?>
<!DOCTYPE html>
<html <?php \language_attributes(); ?>>
<head>
	<?php
	// Head Component.
	echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'head',
		[
			'icon' => \apply_filters(Manifest::MANIFEST_ITEM, 'logo.svg'),
		]
	);

	\wp_head();
	?>
</head>
<body <?php \body_class(); ?>>

<?php
// Header Component.
echo Components::render( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'header',
	[
		'headerLogo' => Components::render(
			'logo',
			[
				'parentClass' => 'header',
				'logoSrc' => \apply_filters(Manifest::MANIFEST_ITEM, 'logo.svg'),
				'logoAlt' => \get_bloginfo('name'),
				'logoTitle' => \get_bloginfo('name'),
				'logoHref' => \get_bloginfo('url'),
			]
		),
		'headerMenu' => Components::render(
			'menu',
			[
				'variation' => 'horizontal',
				'parentClass' => 'header',
			]
		),
		'headerHamburger' => Components::render('hamburger'),
		'headerMobileMenu' => Components::render(
			'drawer',
			[
				'blockClass' => 'header',
				'selectorClass' => 'drawer',
				'drawerTrigger' => 'js-hamburger',
				'drawerOverlay' => 'js-page-overlay',
				'drawerPosition' => 'left',
				'drawerMenu' => Components::render(
					'menu',
					[
						'variation' => 'vertical',
						'parentClass' => 'drawer',
						'jsClass' => 'menu-vertical'
					]
				),
			]
		),
		'headerMobilePageOverlay' => Components::render('page-overlay', ['blockClass' => 'header']),
		'headerUseSearch' => true,
		'headerSearch' => Components::render('search'),
	]
);

?>

<main class="main-content">
