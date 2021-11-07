<?php
namespace Eventconelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Eventcon program details Contents section widget.
 *
 * @since 1.0
 */
class Eventcon_Program_Details extends Widget_Base {

	public function get_name() {
		return 'eventcon-program-details';
	}

	public function get_title() {
		return __( 'Program Details', 'eventcon-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'eventcon-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  program details contents  ------------------------------
		$this->start_controls_section(
			'program_details_content',
			[
				'label' => __( 'Program Details Contents', 'eventcon-companion' ),
			]
        );       
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'eventcon-companion' ),
                'description' => esc_html__( 'Best size is 1920x1975', 'eventcon-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Section Title', 'eventcon-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Program Details', 'eventcon-companion' )
            ]
        );
		$this->add_control(
            'programs', [
                'label' => __( 'Create New', 'eventcon-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ singer_name }}}',
                'fields' => [
                    [
                        'name' => 'event_time',
                        'label' => __( 'Event Time', 'eventcon-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '3.00-4.00pm', 'eventcon-companion' ),
                    ],
                    [
                        'name' => 'event_date',
                        'label' => __( 'Event Date', 'eventcon-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '12 Feb 2020', 'eventcon-companion' ),
                    ],
                    [
                        'name' => 'singer_img',
                        'label' => __( 'Event Image', 'eventcon-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'singer_name',
                        'label' => __( 'Singer Name', 'eventcon-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Mr. Zosoldos', 'eventcon-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'event_time'       => __( '3.00-4.00pm', 'eventcon-companion' ),
                        'event_date'       => __( '12 Feb 2023', 'eventcon-companion' ),
                        'singer_name'      => __( 'Mr. Zosoldos', 'eventcon-companion' ),
                    ],
                    [
                        'event_time'       => __( '5.00-6.00pm', 'eventcon-companion' ),
                        'event_date'       => __( '12 Feb 2023', 'eventcon-companion' ),
                        'singer_name'      => __( 'Mr. Hoblos', 'eventcon-companion' ),
                    ],
                    [
                        'event_time'       => __( '8.00-9.00pm', 'eventcon-companion' ),
                        'event_date'       => __( '12 Feb 2023', 'eventcon-companion' ),
                        'singer_name'      => __( 'Mr. Jackson', 'eventcon-companion' ),
                    ],
                    [
                        'event_time'       => __( '3.00-4.00pm', 'eventcon-companion' ),
                        'event_date'       => __( '14 Feb 2023', 'eventcon-companion' ),
                        'singer_name'      => __( 'Mr. John', 'eventcon-companion' ),
                    ]
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_team_member', [
                'label' => __( 'Style Member Section', 'eventcon-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'eventcon-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'eventcon-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        
        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'eventcon-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label' => __( 'Title Color', 'eventcon-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_color', [
                'label' => __( 'Text Color', 'eventcon-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings = $this->get_settings();
    $bg_img = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $programs = !empty( $settings['programs'] ) ? $settings['programs'] : '';
    ?>

    <div class="program_details_area overlay2" <?php echo eventcon_inline_bg_img( esc_url( $bg_img ) )?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if ( $sec_title ) {
                            echo '
                            <div class="section_title text-center mb-80  wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s"><h3>
                                '.esc_html( $sec_title ).'
                            </h3></div>
                            ';
                        }
                    ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="program_detail_wrap">
                        <?php
                        if( is_array( $programs ) && count( $programs ) > 0 ){
                            foreach ( $programs as $item ) {
                                $event_time = !empty( $item['event_time'] ) ? $item['event_time'] : '';
                                $event_date = !empty( $item['event_date'] ) ? $item['event_date'] : '';
                                $singer_img = !empty( $item['singer_img']['id'] ) ? wp_get_attachment_image( $item['singer_img']['id'], 'eventcon_program_img_264x280', '', array('alt' => eventcon_image_alt( $item['singer_img']['url'] ) ) ) : '';
                                $singer_name = !empty( $item['singer_name'] ) ? $item['singer_name'] : '';
                                ?>
                                <div class="single_propram">
                                    <div class="inner_wrap">
                                        <div class="circle_img"></div>
                                        <div class="porgram_top">
                                            <?php
                                                if ( $event_time ) {
                                                    echo '
                                                    <span class=" wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                                        '.esc_html( $event_time ).'
                                                    </span>
                                                    ';
                                                }
                                                if ( $event_date ) {
                                                    echo '<h4 class=" wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">'.esc_html( $event_date ).'</h4>';
                                                }
                                            ?>
                                        </div>
                                        <?php
                                            if ( $singer_img ) {
                                                echo '
                                                <div class="thumb wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                                                    '.wp_kses_post( $singer_img ).'
                                                </div>
                                                ';
                                            }
                                            if ( $singer_name ) {
                                                echo '<h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">'.esc_html( $singer_name ).'</h4>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}