<?php
/**
 * Navigation output with sensible fallbacks that mirror the current site map.
 *
 * @package activate-hardrock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default primary navigation structure.
 *
 * @return array
 */
function abh_default_menu() {
	return array(
		array(
			'label'    => 'Activities',
			'url'      => '#',
			'children' => array(
				array( 'label' => "Clip 'n Climb", 'url' => abh_link( '/clip-n-climb/' ) ),
				array( 'label' => 'Artificial Caving', 'url' => abh_link( '/artificial-caving/' ) ),
				array( 'label' => 'Coaching Programs', 'url' => abh_link( '/coaching-programs-for-kids/' ) ),
				array( 'label' => 'School Holiday Programs', 'url' => abh_link( '/school-holiday-drop-off-programs/' ) ),
			),
		),
		array(
			'label'    => 'Groups & Functions',
			'url'      => '#',
			'children' => array(
				array( 'label' => 'Birthday Parties', 'url' => abh_link( '/birthday-parties/' ) ),
				array( 'label' => 'School Excursions', 'url' => abh_link( '/school-excursions/' ) ),
				array( 'label' => 'Scout Groups', 'url' => abh_link( '/scout-groups/' ) ),
			),
		),
		array(
			'label'    => 'Info',
			'url'      => '#',
			'children' => array(
				array( 'label' => 'Gift Cards', 'url' => abh_link( '/gift-cards/' ) ),
				array( 'label' => 'Multi-Passes', 'url' => abh_link( '/multi-passes/' ) ),
				array( 'label' => 'News', 'url' => abh_link( '/category/news/' ) ),
				array( 'label' => 'Gallery', 'url' => abh_link( '/gallery/' ) ),
				array( 'label' => 'Contact Us', 'url' => abh_link( '/contact-us/' ) ),
			),
		),
		array( 'label' => 'Sign a Waiver', 'url' => abh_opt( 'waiver_url' ), 'external' => true ),
	);
}

/**
 * Render the fallback menu as nav-menu compatible markup.
 *
 * @param array  $items Items.
 * @param string $class UL class.
 */
function abh_render_menu_items( $items, $class ) {
	echo '<ul class="' . esc_attr( $class ) . '">';
	foreach ( $items as $item ) {
		$has_children = ! empty( $item['children'] );
		$li_class     = 'menu-item' . ( $has_children ? ' menu-item-has-children' : '' );
		$target       = ! empty( $item['external'] ) ? ' target="_blank" rel="noopener"' : '';
		echo '<li class="' . esc_attr( $li_class ) . '">';
		echo '<a href="' . esc_url( $item['url'] ) . '"' . $target . '>' . esc_html( $item['label'] ) . '</a>'; // phpcs:ignore WordPress.Security.EscapeOutput
		if ( $has_children ) {
			abh_render_menu_items( $item['children'], 'sub-menu' );
		}
		echo '</li>';
	}
	echo '</ul>';
}

/**
 * Primary menu.
 *
 * @param string $class UL class.
 */
function abh_primary_menu( $class = 'nav__list' ) {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => $class,
				'depth'          => 2,
			)
		);
		return;
	}
	abh_render_menu_items( abh_default_menu(), $class );
}

/**
 * Footer link columns (fallback).
 *
 * @return array
 */
function abh_footer_columns() {
	return array(
		'Activities' => array(
			"Clip 'n Climb"           => abh_link( '/clip-n-climb/' ),
			'Artificial Caving'       => abh_link( '/artificial-caving/' ),
			'Coaching Programs'       => abh_link( '/coaching-programs-for-kids/' ),
			'School Holiday Programs' => abh_link( '/school-holiday-drop-off-programs/' ),
			'Gift Cards'              => abh_link( '/gift-cards/' ),
			'Multi-Passes'            => abh_link( '/multi-passes/' ),
		),
		'Groups'     => array(
			'Birthday Parties'  => abh_link( '/birthday-parties/' ),
			'School Excursions' => abh_link( '/school-excursions/' ),
			'Scout Groups'      => abh_link( '/scout-groups/' ),
			'Recruitment'       => abh_link( '/recruitment/' ),
			'News'              => abh_link( '/category/news/' ),
			'Gallery'           => abh_link( '/gallery/' ),
		),
	);
}
