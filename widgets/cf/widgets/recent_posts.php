<?php

use Carbon_Fields\Widget;
use Carbon_Fields\Field;

class RecentPosts extends Widget {
    // Register widget function
    function __construct() {
        $this->setup( 'cybershop_recent_posts', __('Cybershop Recent Posts', 'cybershop'), __('نمایش آخرین پست ها با عکس  و امکانات بیشتز.', 'cybershop'), [
            // Title Field
            Field::make( 'text', 'title', __( 'عنوان', 'cybershop' ) ),
            Field::make( 'number', 'limit', __( 'محدودیت پست ها', 'cybershop' ) ),
            Field::make( 'checkbox', 'human_diff_time', __( 'نمایش زمان در حالت خوانا' ) ),
            Field::make( 'checkbox', 'show_thumbnail', __( 'نمایش عکس' ) ),
            Field::make( 'checkbox', 'show_details', __( 'نمایش توضیحات' ) ),
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
            // Define our WP Query Parameters
            $the_query = new WP_Query( 'posts_per_page='.$instance['limit'] ); 
            // Start our WP Query
            while ($the_query -> have_posts()) : $the_query -> the_post(); 
            // Display the Post Title with Hyperlink
                ?>
                <li>
                    <article class="media">
                        <?php if($instance['show_thumbnail']): ?>
                        <figure class="media-left ml-3 mb-3">
                            <p class="image is-64x64">
                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                            </p>
                        </figure>
                        <?php endif; ?>
                        <div class="media-content">
                            <div class="content">
                                <a class="is-block" href="<?php the_permalink() ?>">
                                    <strong class="has-text-weight-bold is-block pb-1 cybershop-recent-posts-title">
                                        <?php echo get_the_title(); ?>
                                    </strong>
                                    <?php if($instance['show_details']): ?>
                                    <small class="has-text-weight-light ml-2">
                                        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished">
                                            <i class="fa fa-calendar ml-1"></i>
                                            <?php 
                                            if($instance['human_diff_time']){
                                                printf(
                                                    esc_html__('%s پیش', 'cybershop'),
                                                    human_time_diff(get_the_modified_time('U'), current_time('U') )
                                                ); 
                                            } else {
                                                echo get_the_date();
                                            }
                                            ?>
                                        </time>
                                    </small>
                                    <small class="has-text-weight-light ml-2">
                                        <i class="fa fa-comments ml-1"></i>
                                        <?php echo get_comments_number(); ?>
                                        <?php echo __('نظر', 'cybershop') ?>
                                    </small>
                                    <?php endif ?>
                                </a>
                            </div>
                        </div>
                    </article>
                </li>
                <?php 
            // Repeat the process and reset once it hits the limit
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>        
        <?php
    }
}
