<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class XS_Dedicated_Server_Pricing_Widget extends Widget_Base {

    public function get_name() {
        return 'xs-dedicated-perver-pricing';
    }

    public function get_title() {
        return esc_html__( 'Hostinza Dedicated server pricing', 'hostinza' );
    }

    public function get_icon() {
        return 'eicon-price-list';
    }

    public function get_categories() {
        return [ 'hostinza-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'dedicated_server_pricing',
            [
                'label' => esc_html__('Dedicated server pricing', 'hostinza'),
            ]
        );


        //add repeater 
        
        $repeater = new Repeater();

        $repeater->add_control(
            'processor',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Processor', 'hostinza'),
                'default'   =>  esc_html__('Intel Xeon Processor(s)','hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'memory',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Memory', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'storage',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Storage', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'transfer',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Transfer', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'price_old',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Old Price', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'price',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('New Price', 'hostinza'),
                'label_block' => true,
            ]     
        );

        $repeater->add_control(
            'deploy',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Deploy', 'hostinza'),
                'label_block' => true,
            ]  
        );

        $repeater->add_control(
            'availability',
            [
                'label' => esc_html__('Availability', 'hostinza'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('yes', 'hostinza'),
                'label_off' => esc_html__('no', 'hostinza'),
                'default' => 'yes',
            ] 
        ); 

        $repeater->add_control(
            'availability_label',
            [
                'name' => 'availability_label',
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Availability Label', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'sale',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Sale', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'new',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('New', 'hostinza'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'url',
            [
                'type'          => Controls_Manager::URL,
                'label'         => esc_html__('urlLink', 'hostinza'),
                'placeholder'   => esc_url('http://whmcs.finesttheme.com/cart.php?a=add&pid=3'),
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'items',
            [   
                'label' => esc_html__('Dedicated server pricing', 'hostinza'),
                'type' =>  Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'separator' => 'before',
                'default' => [
                    [
                        'processor' => esc_html__('Intel Xeon Processor(s)', 'hostinza'),
                        'memory' => esc_html__('MEMORY', 'hostinza'),
                        'storage' => esc_html__('STORAGE', 'hostinza'),
                        'transfer' => esc_html__('TRANSFER', 'hostinza'),
                        'price_old' => esc_html__('150.00', 'hostinza'),
                        'price' => esc_html__('MONTHLY', 'hostinza'),
                        'deploy' => esc_html__('DEPLOY', 'hostinza'),
                        'availability_label' => esc_html__('AVAILABILITY', 'hostinza'),
                    ],
                    [
                        'processor' => esc_html__('E3-1230 v3 3.3GHz Haswell (4 cores + HT)', 'hostinza'),
                        'memory' => esc_html__('16GB', 'hostinza'),
                        'storage' => esc_html__('240GB SSD', 'hostinza'),
                        'transfer' => esc_html__('20TB', 'hostinza'),
                        'price_old' => esc_html__('$150.00', 'hostinza'),
                        'price' => esc_html__('$135.00', 'hostinza'),
                        'deploy' => esc_html__('INSTANT', 'hostinza'),
                        'availability' => 'yes',
                        'availability_label' => esc_html__('CONFIGURE', 'hostinza'),
                        'sale' => esc_html__('SALE', 'hostinza'),
                        'new' => esc_html__('NEW', 'hostinza'),
                        'url' => esc_url('http://whmcs.finesttheme.com/cart.php?a=add&pid=3'),
                    ]
                ],
                'title_field' => '{{{ processor }}}',
            ]
        );

        $this->end_controls_section();

    }

    protected function render( ) {
        $settings = $this->get_settings();
        $items = $settings['items'];
        
        require HOSTINZA_SHORTCODE_DIR_STYLE .'/price-table/style5.php';
    }


    protected function content_template() { }
}