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
 * Eventcon projects Contents section widget.
 *
 * @since 1.0
 */
class Eventcon_Projects extends Widget_Base {

	public function get_name() {
		return 'eventcon-projects';
	}

	public function get_title() {
		return __( 'Projects', 'eventcon-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'eventcon-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  projects contents  ------------------------------
		$this->start_controls_section(
			'projects_content',
			[
				'label' => __( 'Projects Contents', 'eventcon-companion' ),
			]
        );
        
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Section Title', 'eventcon-companion' ),
                'type'          => Controls_Manager::TEXT,
				'label_block' => true,
                'default'         => __( 'Featured Works', 'eventcon-companion' )
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => __( 'Sub Title', 'eventcon-companion' ),
                'type'          => Controls_Manager::TEXTAREA,
				'label_block' => true,
                'default'         => __( 'Tour function information without cross action media value quickly maximize timely deliverables.', 'eventcon-companion' )
            ]
        );
        $this->add_control(
            'project_items',
            [
                'label'         => __( 'Items to show', 'eventcon-companion' ),
                'type'          => Controls_Manager::NUMBER,
                'label_block'   => true,
                'default'       => 5,
                'min'           => 2,
                'max'           => 9
            ]
        );
        $this->add_control(
            'project_order',
            [
                'label'         => __( 'Project Order', 'eventcon-companion' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on' => __( 'ASC', 'eventcon-companion' ),
				'label_off' => __( 'DESC', 'eventcon-companion' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $project_items  = !empty( $settings['project_items'] ) ? $settings['project_items'] : '';
    $project_order = !empty( $settings['project_order'] ) ? $settings['project_order'] : '';
    $project_order = $project_order == 'yes' ? 'DESC' : 'ASC';
    ?>

    <!-- portfolio_image_area  -->
    <div class="portfolio_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb-90">
                        <?php 
							if ($sec_title!='') {
								echo '
                                    <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                                    '.esc_html($sec_title).'
                                    </h3>
                                ';
							}
							if ($sub_title!='') {
								echo '
                                <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                    '.esc_html($sub_title).'
                                </p>
                                ';
							}
						?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php eventcon_get_projects( $project_order, $project_items );?>
            </div>
        </div>
    </div>
    <?php
    }
}
