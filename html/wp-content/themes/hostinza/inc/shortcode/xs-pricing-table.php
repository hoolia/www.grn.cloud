<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class XS_Pricing_Table_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-pricing-table';
    }

    public function get_title() {
        return esc_html__( 'Hostinza Pricing Table Load More', 'hostinza' );
    }
    
    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return [ 'hostinza-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'pricing_plan',
            [
                'label' => esc_html__('Pricing Plans', 'hostinza'),
            ]
        );


        /*Pricing Table*/
        $this->add_control(
            'pricing_image',
            [
                'label' => esc_html__('Price Image', 'hostinza'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );


        //new repeater 

        $repeater = new Repeater();

        $repeater->add_control(
            'table_title', 
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Table Title', 'hostinza'),
                'default'   =>  esc_html__('Cloud Hosting','hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'table_sub_title', 
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => esc_html__('Table Sub Title', 'hostinza'),
                'default'   =>  esc_html__('The High performance cloud platform ever','hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'currency_symbol', 
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__('Currency', 'hostinza'),
                'options' => array_flip(hostinza_currency_symbols()),
                'label_block' => true,
            ]
        ); 

        $repeater->add_control(
            'table_price', 
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Price', 'hostinza'),
                'default'   => esc_html__('29', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'validity_period', 
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Period', 'hostinza'),
                'default'   => esc_html__('/month', 'hostinza'),
                'label_block' => true,
            ]
        );
        
        $repeater->add_control(
            'button_text', 
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Button Text', 'hostinza'),
                'default'   =>  esc_html__('Buy Now', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'button_url', 
            [
                'type'          => Controls_Manager::URL,
                'label'         => esc_html__('Button URL', 'hostinza'),
                'placeholder'   => esc_url('http://example.com'),
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'pricing_items',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'table_title' => esc_html__('Regular','hostinza'),
                        'table_sub_title' => esc_html__('The High performance cloud platform ever','hostinza'),
                    ]
                ],
                
                'title_field' => '{{{ table_title }}}',
            ]
        );

        
        //new repeater

        $repeater_rep = new Repeater();

        $repeater_rep->add_control(
            'feature_gap', 
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => esc_html__('Do you want use gap before it?', 'hostinza'),
                'label_block'       => true,
                'default' => 'label_off',
                'label_on' => esc_html__( 'Yes', 'hostinza' ),
                'label_off' => esc_html__( 'No', 'hostinza' ),
            ]
        );

        $repeater_rep->add_control(
            'feature_title', 
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Feature Title', 'hostinza'),
                'default'   =>  esc_html__('Visits per month','hostinza'),
                'label_block' => true,
            ]
        );

        $repeater_rep->add_control(
            'feature_1', 
            [
                'name' => 'feature_1',
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Regular Feature', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater_rep->add_control(
            'feature_2', 
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Standard Feature', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater_rep->add_control(
            'feature_3', 
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Plus Feature', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater_rep->add_control(
            'feature_4', 
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Optional Feature', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater_rep->add_control(
            'feature_5', 
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Optional Feature', 'hostinza'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'pricing_features',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater_rep->get_controls(),
                'default' => [
                    [
                        'feature_title' => esc_html__('Visits per month','hostinza'),
                    ]
                ],
                
                'title_field' => '{{{ feature_title }}}',
            ]
        );


        $this->add_control(
            'load_more_btn',
            [
                'label' => esc_html__('Load More Button', 'hostinza'),
                'type' => Controls_Manager::TEXT,
                'default' =>  esc_html__('Load More','hostinza'),
                'label_block' => true,
                
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_title_style',
            [
                'label' 	=> esc_html__( 'Styles', 'hostinza' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'table_title_color',
            [
                'label'		=> esc_html__( 'Table Title Color', 'hostinza' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-matrix-item .xs-title' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'table_sub_title_color',
            [
                'label'		=> esc_html__( 'Table Sub Title Color', 'hostinza' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-matrix-item .pricing-body > p' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'tab_price_color',
            [
                'label'		=> esc_html__( 'Price Color', 'hostinza' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-matrix-item .pricing-body .pricing-price h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_price_content_color',
            [
                'label'		=> esc_html__( 'Table Content Color', 'hostinza' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pricing-matrix-item .pricing-feature' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_price_btn_color',
            [
                'label'		=> esc_html__( 'Button Color', 'hostinza' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-primary' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_control(
            'tab_btn_hover_color',
            [
                'label'		=> esc_html__( 'Button Hover Color', 'hostinza' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-primary:hover' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'tab_price_btn_bg',
            [
                'label'		=> esc_html__( 'Button BG Color', 'hostinza' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-primary' => 'background-color: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'tab_btn_hover_bg',
            [
                'label'		=> esc_html__( 'Button Hover BG Color', 'hostinza' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-primary:hover::before ' => 'background-color: {{VALUE}} !important;;'
                ],
            ]
        );
        $this->add_control(
            'tab_btn_arrow_bg',
            [
                'label'		=> esc_html__( 'Button Arrow BG Color', 'hostinza' ),
                'type'		=> Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .content-collapse-wraper .expand-btn > i ' => 'background-color: {{VALUE}} !important;;'
                ],
            ]
        );

        $this->end_controls_section();
        
    }

    protected function render( ) {
        $settings = $this->get_settings();
        $pricing_image = $settings['pricing_image'];
        $pricing_items = $settings['pricing_items'];
        $pricing_features = $settings['pricing_features'];
        $load_more_btn = $settings['load_more_btn'];
        

        require HOSTINZA_SHORTCODE_DIR_STYLE .'/price-table/style3.php';
        

    }


    protected function content_template() { }
}