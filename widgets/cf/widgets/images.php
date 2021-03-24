<?php

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class Images extends Widget {
    // Register widget function
    function __construct() {
        $this->setup( 'cybershop_images', __('Cybershop Images', 'cybershop'), __('Display Images', 'cybershop'), [
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

            // Image Fileds
            Field::make('complex', 'images')
            ->add_fields(array(

                // Image Field
                Field::make( 'image', 'image', __( 'Image', 'cybershop' ) )
                ->set_help_text(__('Pick an Image','cybershop'))
                ->set_value_type( 'url' ),

                Field::make( 'text', 'description', __( 'Short Description', 'cybershop' ) ),
                Field::make( 'checkbox', 'show_description', __( 'Dispaly Description Under Image', 'cybershop' ) ),

                // Url Field
                Field::make( 'text', 'url', __( 'Url', 'cybershop' ) )
            ))
        ]);
        $this->print_wrappers = false; // Avoid Printing Default Wrappers
    }

    // Rendering the widget in the front-end
    function front_end( $args, $instance ) {
    ?>
        <section 
            class=" cybershop-images <?= !empty($instance['align']) ? 'has-text-'.$instance['align'] : '' ?>"
            >
            <?php if(!empty($instance['title'])): ?>
                <h3><span class="pb-2 blog-single-widget-title"><?= $instance['title'] ?></span></h3>
            <?php endif; ?>

            <?php foreach($instance['images'] as &$image): ?>
            <a 
                href="<?= !empty($image['url']) ? $image['url'] : '#' ?>" 
                class="cybershop-image is-inline-block" 
                title="<?= !empty($image['description']) ? $image['description'] : '' ?>"
                >
                <img class="vertical-align-middle" alt="<?= !empty($image['description']) ? $image['description'] : '' ?>" src="<?= !empty($image['image']) ? $image['image'] : '' ?>">
                <?php if($image['show_description'] && !empty($image['description'])): ?>
                <span class="is-block has-text-grey-dark pt-3">
                    <?= $image['description'] ?>
                </span>
                <?php endif; ?>
            </a>
            <?php endforeach; ?>
        </section> 
    <?php
    }
}
