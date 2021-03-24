<?php

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class Icons extends Widget {
    // Register widget function
    function __construct() {
        $this->setup( 'cybershop_icons', __('Cybershop Icons', 'cybershop'), __('Display Icons', 'cybershop'), [
            // Title Field
            Field::make( 'text', 'title', __( 'Title', 'cybershop' ) ),

            // Text-Align Field
            Field::make('select', 'align', __('Select Align', 'cybershop'))
            ->set_options([
                'right' => __('Right', 'cybershop'),
                'centered' => __('Center', 'cybershop'),
                'justified-last' => __('Justified', 'cybershop'),
                'left' => __('Left', 'cybershop'),
            ]),

            // Icon Fileds
            Field::make('complex', 'icons')
            ->add_fields(array(

                // Icon Field
                Field::make( 'icon', 'icon', __( 'Icon', 'cybershop' ) )
                ->set_help_text(__('Pick an Icon','cybershop')),

                // Color Field
                Field::make('color', 'color', __('Color', 'cybershop')),

                // Size Field
                Field::make('select', 'size', __('Choose Size', 'cybershop'))
                ->set_options([
                    1 => __('7x', 'cybershop'),
                    2 => __('6x', 'cybershop'),
                    3 => __('5x', 'cybershop'),
                    4 => __('4x', 'cybershop'),
                    5 => __('3x', 'cybershop'),
                    6 => __('2x', 'cybershop'),
                    7 => __('1x', 'cybershop'),
                ]),

                // Url Field
                Field::make( 'text', 'url', __( 'Url', 'cybershop' ) )
            ))
        ]);
    }

    // Rendering the widget in the front-end
    function front_end( $args, $instance ) {
        ?>
        <section class="">
            <?php if(!empty($instance['title'])): ?>
                <h3 class="blog-single-widget-heading"><span class="pb-2 blog-single-widget-title"><?= $instance['title'] ?></span></h3>
            <?php endif; ?>
            <div class="<?= !empty($instance['align']) ? 'has-text-'.$instance['align'] : '' ?>">
            <?php foreach($instance['icons'] as &$icon): ?>
                <a 
                    href="<?= $icon['url'] ?>" 
                    class="cybershop-social-media-icon is-size-<?= (int)$icon['size'] ?>" 
                    title="<?= $icon['icon']['name'] ?>"
                    <?= !empty($icon['color']) ? 'style="color:'.$icon['color'].'"' : '' ?>
                    >

                    <i class="<?= $icon['icon']['class'] ?>"></i>
                </a>
            <?php endforeach; ?>
            </div>
    </section> 
    <?php
}
}
