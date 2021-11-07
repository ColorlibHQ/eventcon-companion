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
 * Eventcon performer Contents section widget.
 *
 * @since 1.0
 */
class Eventcon_Performer extends Widget_Base {

	public function get_name() {
		return 'eventcon-performers';
	}

	public function get_title() {
		return __( 'Performer', 'eventcon-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'eventcon-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  performers contents  ------------------------------
		$this->start_controls_section(
			'performers_content',
			[
				'label' => __( 'Performer Contents', 'eventcon-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Section Title', 'eventcon-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Performer', 'eventcon-companion' )
            ]
        );
		$this->add_control(
            'performers', [
                'label' => __( 'Create New', 'eventcon-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ singer_name }}}',
                'fields' => [
                    [
                        'name' => 'singer_img',
                        'label' => __( 'Upload Image', 'eventcon-companion' ),
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
                    [
                        'name' => 'designation',
                        'label' => __( 'Designation', 'eventcon-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Acoustic drum', 'eventcon-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'singer_name'       => __( 'Mr. Zosoldos', 'eventcon-companion' ),
                        'designation'       => __( 'Acoustic drum', 'eventcon-companion' ),
                    ],
                    [
                        'singer_name'       => __( 'Protik Hasan', 'eventcon-companion' ),
                        'designation'       => __( 'Vocal', 'eventcon-companion' ),
                    ],
                    [
                        'singer_name'       => __( 'Salmon Vicky', 'eventcon-companion' ),
                        'designation'       => __( 'Piano', 'eventcon-companion' ),
                    ],
                    [
                        'singer_name'       => __( 'Filaris Habol', 'eventcon-companion' ),
                        'designation'       => __( 'Guiter', 'eventcon-companion' ),
                    ],
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
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $performers = !empty( $settings['performers'] ) ? $settings['performers'] : '';
    ?>

    <!-- performar_area_start  -->
    <div class="performar_area black_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-80">
                        <?php
                            if ( $sec_title ) {
                                echo '
                                <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                                    '.esc_html( $sec_title ).'
                                </h3>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <?php
                        if( is_array( $performers ) && count( $performers ) > 0 ){
                            foreach ( $performers as $item ) {
                                $singer_img = !empty( $item['singer_img']['id'] ) ? wp_get_attachment_image( $item['singer_img']['id'], 'eventcon_performer_img_362x450', '', array('alt' => eventcon_image_alt( $item['singer_img']['url'] ) ) ) : '';
                                $singer_name = !empty( $item['singer_name'] ) ? $item['singer_name'] : '';
                                $designation = !empty( $item['designation'] ) ? $item['designation'] : '';
                                ?>
                                <div class="col-lg-6 col-md-6">
                                    <div  class="single_performer wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                        <?php
                                            if ( $singer_img ) {
                                                echo '
                                                <div class="thumb">
                                                    '.wp_kses_post( $singer_img ).'
                                                </div>
                                                ';
                                            }

                                            echo '<div class="performer_heading">';
                                                if ( $singer_name ) {
                                                    echo '<h4>'.esc_html( $singer_name ).'</h4>';
                                                }
                                                if ( $designation ) {
                                                    echo '<span>'.esc_html( $designation ).'</span>';
                                                }
                                            echo '</div>';
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