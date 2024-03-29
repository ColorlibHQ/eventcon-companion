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
 * Eventcon clients section widget.
 *
 * @since 1.0
 */
class Eventcon_Clients extends Widget_Base {

	public function get_name() {
		return 'eventcon-clients';
	}

	public function get_title() {
		return __( 'Our Clients', 'eventcon-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'eventcon-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  clients contents  ------------------------------
		$this->start_controls_section(
			'clients_content',
			[
				'label' => __( 'Clients Contents', 'eventcon-companion' ),
			]
        );
		$this->add_control(
            'logos', [
                'label' => __( 'Create New', 'eventcon-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'logo',
                        'label' => __( 'Client Logo', 'eventcon-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Client Name', 'eventcon-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Dopkin', 'eventcon-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'item_title' => __( 'Dopkin', 'eventcon-companion' )
                    ],
                    [
                        'item_title' => __( 'Verticle', 'eventcon-companion' )
                    ],
                    [
                        'item_title' => __( 'Shallow', 'eventcon-companion' )
                    ],
                    [
                        'item_title' => __( 'Diggo', 'eventcon-companion' )
                    ],
                    [
                        'item_title' => __( 'Next', 'eventcon-companion' )
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
    // call load widget script
    $this->load_widget_script(); 
    $logos = !empty( $settings['logos'] ) ? $settings['logos'] : '';
    ?>

    <div class="brad_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="brad_active owl-carousel">
                        <?php
                        if( is_array( $logos ) && count( $logos ) > 0 ){
                            foreach ( $logos as $item ) {
                                $logo = !empty( $item['logo']['id'] ) ? wp_get_attachment_image( $item['logo']['id'], 'eventcon_client_logo_229x100', '', array('alt' => eventcon_image_alt( $item['logo']['url'] ) ) ) : '';
                                $item_title = !empty( $item['item_title'] ) ? $item['item_title'] : '';
                                ?>
                                <div class="single_brand wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                    <?php echo wp_kses_post($logo)?>
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

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            //brand-active
            var brand = $('.brad_active');
            if(brand.length){
                brand.owlCarousel({
                loop:true,
                autoplay:true,
                nav:false,
                dots:false,
                autoplayHoverPause: true,
                autoplaySpeed: 800,
                responsive:{
                    0:{
                        items:2,
                        nav:false
                    },
                    767:{
                        items:4
                    },
                    992:{
                        items:5
                    }
                }
                });
            }
        
        })(jQuery);
        </script>
        <?php 
        }
    }	
}