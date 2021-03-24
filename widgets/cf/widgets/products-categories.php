<?php

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class ProductsCategories extends Widget {

    // Register widget function
    function __construct() {
        $this->setup( 'cybershop_products_categories', __('Cybershop Products Categories', 'cybershop'), __('Display Categories In Advanced Mode', 'cybershop'), [
            // Title Field
            Field::make( 'text', 'title', __( 'Title', 'cybershop' ) ),
            Field::make( 'checkbox', 'show_posts_count', __( 'Dispaly Posts Count', 'cybershop' ) ),
            Field::make( 'checkbox', 'show_specific_category', __( 'Dispaly Only Specific Category', 'cybershop' ) ),

            Field::make( 'number', 'category_id', __( 'Set Category ID', 'cybershop' ) )
            ->set_conditional_logic([
                [
                    'field' => 'show_specific_category',
                    'value' => true,
                ]
            ])
        ]);
    }

    // Rendering the widget in the front-end
    function front_end( $args, $instance ) {
        ?>

        <?php if(!empty($instance['title'])): ?>
            <h3 class="blog-single-widget-heading"><span class="pb-2 blog-single-widget-title"><?= $instance['title'] ?></span></h3>
        <?php endif; ?>

        <ul class="cybershop-recent-posts">
            <?php 
                $category_id = $instance['show_specific_category'] === true ? $instance['category_id'] : 0;
                $categories = get_categories('hide_empty=false&orderby=name&order=ASC&parent=' . $category_id);
                foreach($categories as &$category):
            ?>
                <li class="cybershop-category-item">
                    <a href="<?= get_category_link( $category->term_id ); ?>" title="<?= $category->description ?>">
                        <span class="cybershop-category-item-name">
                            <?= $category->name ?>
                        </span>

                        <?php if($instance['show_posts_count']): ?>
                        <span class="cybershop-category-item-count is-pulled-left tag is-light is-normal">
                            <?= $category->count ?>
                        </span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php
                endforeach; 
            ?>
        </ul>        
        <?php
    }
}
