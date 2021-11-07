<?php
namespace Eventconelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Eventcon elementor hero section widget.
 *
 * @since 1.0
 */
class Eventcon_Hero extends Widget_Base {

	public function get_name() {
		return 'eventcon-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'eventcon-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'eventcon-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero section content', 'eventcon-companion' ),
			]
        );

        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'Bg Image', 'eventcon-companion' ),
                'description' => esc_html__( 'Best size is 1920x900', 'eventcon-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        // $this->add_control(
        //     'hr',
        //     [
        //         'type' => Controls_Manager::DIVIDER
        //     ]
        // );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'eventcon-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '12 Feb, 2020', 'eventcon-companion' ),
            ]
        );
        $this->add_control(
            'big_text',
            [
                'label' => esc_html__( 'Big Text', 'eventcon-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Concert  2020', 'eventcon-companion' ),
            ]
        );
        $this->add_control(
            'after_title',
            [
                'label' => esc_html__( 'After Big Title', 'eventcon-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Green Avenue, New York', 'eventcon-companion' ),
            ]
        );
        $this->end_controls_section();

    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'eventcon-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_col', [
				'label' => __( 'First Line Color', 'eventcon-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Second Line Color', 'eventcon-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text span' => 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
            'button_col_separator',
            [
                'label'     => __( 'Button Styles', 'eventcon-companion' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
		$this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button BG Color', 'eventcon-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text a.boxed-btn3-line' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_txt_col', [
				'label' => __( 'Button Text Color', 'eventcon-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text a.boxed-btn3-line' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_col', [
				'label' => __( 'Button Hover BG Color', 'eventcon-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text a.boxed-btn3-line:hover' => 'background: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'btn_hover_txt_col', [
				'label' => __( 'Button Hover Text Color', 'eventcon-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text a.boxed-btn3-line:hover' => 'color: {{VALUE}} !important; border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}
    
	protected function render() {
    $settings  = $this->get_settings();
    $bg_img = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $left_shape = EVENTCON_DIR_ICON_IMG_URI . 'shape_1.svg';
    $right_shape = EVENTCON_DIR_ICON_IMG_URI . 'shape_2.svg';
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $big_text = !empty( $settings['big_text'] ) ? $settings['big_text'] : '';
    $after_title = !empty( $settings['after_title'] ) ? $settings['after_title'] : '';
    ?>

    <div class="slider_area">
        <div class="single_slider d-flex align-items-center overlay" <?php echo eventcon_inline_bg_img(esc_url($bg_img))?>>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-12">
                        <div class="slider_text text-center">
                            <div class="shape_1 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                <img src="<?php echo esc_url( $left_shape )?>" alt="left shape">
                            </div>
                            <div class="shape_2 wow fadeInDown" data-wow-duration="1s" data-wow-delay=".2s">
                                <img src="<?php echo esc_url( $right_shape )?>" alt="right shape">
                            </div>
                            <?php 
                                if ( $sub_title ) { 
                                    echo '
                                    <span class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                        '.esc_html( $sub_title ).'
                                    </span>
                                    ';                                    
                                }
                                if ( $big_text ) { 
                                    echo '
                                    <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                                        '.esc_html( $big_text ).'
                                    </h3>
                                    ';                                    
                                }
                                if ( $after_title ) { 
                                    echo '
                                    <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                        '.esc_html( $after_title ).'
                                    </p>
                                    ';                                    
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php
    } 
}