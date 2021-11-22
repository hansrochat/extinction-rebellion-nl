<?php
/**
 * The template part for displaying single posts
 */
?>
<div class="row mb-4 shop-banner">
    <div class="col-md-12">
        <div class="month">
            <?php $product_obj = get_page_by_path( 'hete-klimaat-kalender', OBJECT, 'product' ); ?>
            <?php $product = wc_get_product( $product_obj->ID ); ?>
            <?php
                $post_id = get_the_ID();
                $url = get_the_post_thumbnail_url( $post_id, 'full' );
            ?>
            <img src="<?php echo($url) ?>" alt="Klimaatkalender, de maand januari">
            <div class="price-tag">
                <span class="price-tag__price">
                    <div class="starburst">
                        <span class="starburst__plane">
                            <span class="starburst__plane">
                                <span class="starburst__plane">
                                    <span class="starburst__plane">
                                        <span class="starburst__plane">
                                            <span class="starburst__plane">
                                                <span class="starburst__plane">
                                                    <?php echo($product->get_price_html()); ?>
                                                </span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </div>
                </span>
            </div>
        </div>
        <div  class="d-flex justify-content-end align-items-end mt-2">
            <a href="/?add-to-cart=<?php echo($product_obj->ID); ?>" class="in-mand">
                <?php _e('Add to cart', 'theme-xrnl'); ?>
            </a>
        </div>
    </div>
</div>
