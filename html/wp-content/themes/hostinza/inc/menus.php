<?php

if ( !defined( 'ABSPATH' ) )
    die( 'Direct access forbidden.' );
 
/**
 * Register theme menus
 */

class wp_main_mobile_navwalker extends Walker_Nav_Menu {

    private $current_Item;

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        if( $args->has_children ){
            $output .= "\n$indent<ul role=\"menu\" class=\"collapse collapse-".$this->current_Item->ID." \">\n";
        }

    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $this->current_Item = $item;

        if (strcasecmp($item->attr_title, 'divider') == 0 && $depth === 1) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if (strcasecmp($item->attr_title, 'dropdown-header') == 0 && $depth === 1) {
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
        } else if (strcasecmp($item->attr_title, 'disabled') == 0) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
        } else {

            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

            if($args->has_children  && $depth>0 ) $class_names .= ' dropdown ';

            if(in_array('current-menu-parent', $classes)) { $class_names .= ' active'; }
            if(in_array('current_page_parent', $classes)) { $class_names .= ' active'; }
            if(in_array('current-menu-item', $classes)) { $class_names .= ' active'; }

            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names .'>';

            $atts = array();
            $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
            $atts['target'] = ! empty( $item->target )  ? $item->target : '';
            $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';
            $atts['href']   = ! empty( $item->url )     ? $item->url    : '';

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

            if(! empty( $item->attr_title )){
                $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
            } else {
                $item_output .= '<a'. $attributes .'>';
            }

            $caret = ($depth === 0) ? 'down' : 'right';

            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .=  '</a>';
            $item_output .= $args->after;

            if($args->has_children) {

                $item_output .= '
                <span class="menu-toggler collapsed" data-toggle="collapse" data-target=".collapse-'.$item->ID.'">
                <i class="fa fa-angle-right"></i>
                </span>';
            }


            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

    function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( !$element ) {
            return;
        }
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

class hostinza_main_nav_walker extends Walker_Nav_Menu {

    private $current_Item;

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        if( $args->has_children ){
            $output .= "\n$indent<ul role=\"menu\" class=\"nav-dropdown xs-icon-menu nav-submenu \">\n";
        }
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $this->current_Item = $item;
        $menu_icon_class = get_post_meta($item->ID, '_menu_item_icon', true);
        if (strcasecmp($item->attr_title, 'divider') == 0 && $depth === 1) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if (strcasecmp($item->attr_title, 'dropdown-header') == 0 && $depth === 1) {
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
        } else if (strcasecmp($item->attr_title, 'disabled') == 0) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
        } else {

            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            $classes[] = 'single-menu-item';

            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

            if($args->has_children  && $depth>0 ) $class_names .= ' dropdown ';

            if(in_array('current-menu-parent', $classes)) { $class_names .= ' active'; }
            if(in_array('current_page_parent', $classes)) { $class_names .= ' active'; }
            if(in_array('current-menu-item', $classes)) { $class_names .= ' active'; }

            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li' . $id . $value . $class_names .'>';


            $atts = array();
            $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
            $atts['target'] = ! empty( $item->target )  ? $item->target : '';
            $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';
            $atts['href']   = ! empty( $item->url )     ? $item->url    : '';

            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            if($menu_icon_class !=""){
                $menu_icon_html = '<i class="'.esc_attr($menu_icon_class).'"></i>';
            }else{
                $menu_icon_html = '';
            }
            $item_output = $args->before;
            if($item->object == 'mega_menu' && $depth ==1){

                $content = '';
                if ( class_exists( 'Elementor\Plugin' ) ) {
                    $elementor = Elementor\Plugin::instance();
                    $content   = $elementor->frontend->get_builder_content_for_display( $item->object_id );
                }

                $item_output .= '<div class="megamenu-content">'.$content.'</div>';
                // $item_output .= '<div class="megamenu-content">'.hostinza_get_post_content($item->object_id).'</div>';
            }else{

                $item_output .= '<a'. $attributes .'>';
                $item_output .= $menu_icon_html;


                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

                $item_output .=  '</a>';
            }


            $item_output .= $args->after;


            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

    function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( !$element ) {
            return;
        }
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id ) {
					$fb_output .= ' id="' . $container_id . '"';
				}
				if ( $container_class ) {
					$fb_output .= ' class="menu-fallback ' . $container_class . '"';
				}
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id ) {
				$fb_output .= ' id="' . $menu_id . '"';
			}
			if ( $menu_class ) {
				$fb_output .= ' class="' . $menu_class . '"';
			}
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">'. __('Add a menu', 'hostinza') .'</a></li>';
			$fb_output .= '</ul>';
			if ( $container ) {
				$fb_output .= '</' . $container . '>';
			}
			echo hostinza_return( $fb_output );
		}
	}
}
