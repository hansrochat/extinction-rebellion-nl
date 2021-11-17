<?php
/**
 * The template part for displaying single posts
 */
?>
<div class="row mb-4 shop-banner">
    <div class="col-md-12">
        <div class="month">
            <?php
                $post_id = get_the_ID();
                $url = get_the_post_thumbnail_url( $post_id, 'thumbnail' );
            ?>
            <img src="<?php echo($url) ?>" alt="">
            <div class="price-tag">
                <span class="price-tag__price">
                    <div class="starburst">
                        <span>
                            <span>
                                <span>
                                    <span>
                                        <span>
                                            <span>
                                                <span>
                                                    €20,25
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
        <?php $product_obj = get_page_by_path( 'hete-klimaat-kalender', OBJECT, 'product' ); ?>
        <div  class="d-flex justify-content-end align-items-end mt-2">
            <a href="/?add-to-cart=<?php echo($product_obj->ID); ?>" class="in-mand">
                IN <strong>MAND</strong>
            </a>
        </div>
    </div>
</div>
<style>
        @media only screen and (min-width: 600px) {
            .entry-title{
                font-size: 4rem;
            }
        }
</style>