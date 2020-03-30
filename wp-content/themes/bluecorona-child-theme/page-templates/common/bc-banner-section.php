<section class="sub-banner v1 bg-image dark-bg bg-box-none text-left" id="SubBannerV1" data-onvisible="show">
    <picture class="img-bg bg-position" role="presentation">
    <?php if (has_post_thumbnail() ) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id() ), 'single-post-thumbnail' ); ?>
        <img data-src="<?php echo $image[0]; ?>">
        <?php }else{ ?>
            <img data-src="<?php echo get_stylesheet_directory_uri();?>/assets/sub-banners/sub-banner-2.jpg">
        <?php }?>
    </picture>
    <div class="main">
        <div class="bg-box side-padding-medium vertical-padding info text-align center-800 box-flair" id="SubBannerV1Info">
            <div class="flair-border">
                <span class="flair-1"></span>
                <span class="flair-2"></span>
                <span class="title-font title-color-1">
                    <strong>
                        <?php $title = get_post_meta( $post->ID, 'title_overlay', true );
                        if(isset($title) && !empty($title)){
                            echo $title;
                        }?>
                    </strong>
                </span>
                <svg role="presentation" class="header-flair"><use href="<?php echo get_stylesheet_directory_uri();?>/includes/flair.svg#header"></use></svg>
            </div>  
        </div>  
    </div>
</section>