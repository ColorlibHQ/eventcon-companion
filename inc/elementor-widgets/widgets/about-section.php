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
 * Eventcon elementor about section widget.
 *
 * @since 1.0
 */
class Eventcon_About extends Widget_Base {

	public function get_name() {
		return 'eventcon-about';
	}

	public function get_title() {
		return __( 'About Section', 'eventcon-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'eventcon-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About section content', 'eventcon-companion' ),
			]
        );

        $this->add_control(
            'big_title',
            [
                'label' => esc_html__( 'Big Title', 'eventcon-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'About Program', 'eventcon-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'eventcon-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'The event regularly attracts a diverse range of attendees from around the world, across different professions, and with different.', 'eventcon-companion' ),
            ]
        );
        $this->add_control(
            'hr',
            [
                'type'   => Controls_Manager::DIVIDER,
            ]
        );        
        $this->add_control(
            'left_img',
            [
                'label' => esc_html__( 'Left Image', 'eventcon-companion' ),
                'description' => esc_html__( 'Best size is 686x506', 'eventcon-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'right_title',
            [
                'label' => esc_html__( 'Right Title', 'eventcon-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'It’s time to book your seat', 'eventcon-companion' ),
            ]
        );
        $this->add_control(
            'right_text',
            [
                'label' => esc_html__( 'Text', 'eventcon-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'The event regularly attracts a diverse range of attendees from around the world, across different professions, and with different levels of experience transform your business.', 'eventcon-companion' ),
            ]
        );
        $this->add_control(
            'btn_title',
            [
                'label' => esc_html__( 'Button Title', 'eventcon-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Buy Tickets', 'eventcon-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'eventcon-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->end_controls_section(); // End Hero content


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
    $left_img = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'eventcon_performer_img_686x506', '', array('alt' => eventcon_image_alt( $settings['left_img']['url'] ) ) ) : '';
    $shape_3 = EVENTCON_DIR_ICON_IMG_URI . 'shape_3.svg';
    $big_title = !empty( $settings['big_title'] ) ? $settings['big_title'] : '';
    $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $right_title = !empty( $settings['right_title'] ) ? $settings['right_title'] : '';
    $right_text = !empty( $settings['right_text'] ) ? $settings['right_text'] : '';
    $btn_title = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>

    <!-- about_area_start  -->
    <div class="about_area black_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_title text-center mb-80">
                        <?php
                            if ( $big_title ) {
                                echo '<h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s" >
                                    '.esc_html( $big_title ).'
                                </h4>';
                            }
                            if ( $sub_title ) {
                                echo '<p class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s" >
                                    '.wp_kses_post( $sub_title ).'
                                </p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="about_thumb">
                        <div class="shap_3  wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                            <img src="<?php echo esc_url( $shape_3 )?>" alt="shape 3">
                        </div>
                        <div class="thumb_inner  wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <?php
                                if ( $left_img ) {
                                    echo $left_img;
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="about_info pl-68">
                        <?php
                            if ( $right_title ) {
                                echo '<h4 class=" wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">'.esc_html( $right_title ).'</h4>';
                            }
                            if ( $right_text ) {
                                echo '<p  class=" wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".6s">
                                '.wp_kses_post( $right_text ).'</p>';
                            }
                            if ( $btn_title ) {
                                echo '<a href="'.esc_url( $btn_url ).'" class="boxed-btn3  wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".7s">'.esc_html( $btn_title ).'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end  -->
    <?php
    } 
}