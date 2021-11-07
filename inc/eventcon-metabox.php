<?php
function eventcon_page_metabox( $meta_boxes ) {

	$eventcon_prefix = '_eventcon_';
	$meta_boxes[] = array(
		'id'        => 'eventcon_metaboxes',
		'title'     => esc_html__( 'Project Options', 'eventcon-companion' ),
		'post_types'=> array( 'project' ),
		'priority'  => 'high',
		'context'  => 'side',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'name'    => esc_html__( 'Gird Image Size', 'eventcon-companion' ),
				'desc'    => esc_html__( 'Image size should be 730x350 or 350x350', 'eventcon-companion' ),
				'id'      => $eventcon_prefix . 'eventcon-grid',
				'type'    => 'select',
				'options' => array(
					'0' => 'Select Size',
					'1' => 'Gird Size [730x350]',
					'2' => 'Grid Size [350x350]',
				),
				'inline' => true,
			),			
			array(
				'id'    => $eventcon_prefix . 'client_name',
				'type'  => 'text',
				'name'  => esc_html__( 'Client Name', 'eventcon-companion' ),
				'placeholder' => esc_html__( 'Client Name', 'eventcon-companion' ),
			),			
			array(
				'id'    => $eventcon_prefix . 'project_category',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Category', 'eventcon-companion' ),
				'placeholder' => esc_html__( 'Project Category', 'eventcon-companion' ),
			),			
			array(
				'id'    => $eventcon_prefix . 'project_date',
				'type'  => 'date',
				'js_options' => [
					'dateFormat' => 'M dd, yy'
				],
				'name'  => esc_html__( 'Project Date', 'eventcon-companion' ),
				'placeholder' => esc_html__( 'Project Date', 'eventcon-companion' ),
			),			
			array(
				'id'    => $eventcon_prefix . 'project_url',
				'type'  => 'text',
				'name'  => esc_html__( 'Project URL', 'eventcon-companion' ),
				'placeholder' => esc_html__( 'Project URL', 'eventcon-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'eventcon_page_metabox' );
