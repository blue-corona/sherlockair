<!DOCTYPE html>
<html>
<head>
    <title>Print | Carlsbad Heating Service</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri()?>/css/d4e_u02vh21.1912021253503.css" data-require='["cms","cms-behave"]'/>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/xfe68wggbgd.2003121251140.js" defer data-require='["j/poly","j/modernizr","j/jquery.3.x","j/jquery.ui","j/ui.touch","j/ui.wheel","j/ui.draw","j/ui.mobile","j/timezone","static","j/jquery.cookie","extensions","uri","behaviors","c/scrollbar","c/loading","m/date","form","adapter","v/jwplayer","video","a/bootstrap","svg"]'></script>
</head>
<body>
<style type="text/css">
@media print{.no-print, .no-print *{display: none !important;}}
* { -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
color-adjust: exact !important;  /*Firefox*/ }
</style>
<script type="text/javascript">function printPreview(){window.print();}</script>
    <header id="HeaderZone"></header>
    <main id="MainZone">
    <?php 
    global $post;
    $promotion_type = get_post_meta(get_the_ID(), 'promotion_type', TRUE);
    if($promotion_type == 'Builder'){
        $date = get_post_meta( get_the_ID(), 'promotion_expiry_date1', true );
        if(strtotime($date) >= strtotime(current_time('m/d/Y'))){
            $title = get_post_meta( get_the_ID(), 'promotion_title1', true );
            $color = get_post_meta( get_the_ID(), 'promotion_color', true );
            $subheading = get_post_meta( get_the_ID(), 'promotion_subheading', true );
            $footer_heading = get_post_meta( get_the_ID(), 'promotion_footer_heading', true ); ?>
        <section class="coupons-print-page light-bg v1 no-padding transparent-bg ui-repeater" id="CouponsSystemPrintPageV1">
            <div class="type-2 coupon-style" data-item="i" data-key="4093">
                <div class="coupon-border pseudo-after info text-center vertical-padding-small side-padding-medium border-radius">
                    <img class="bottom-margin margin-auto" src="https://www.sherlockair.com/images/logos/Logo.png" alt="Sherlock Plumbing, Heating and Air">
                    <span class="title-font">
                        <strong>
                        <strong><?php echo $title; ?></strong><br>
                        <span><?php echo $subheading;?></span>
                        </strong>
                    </span>
                    <p class="top-margin-tiny"><?php echo $footer_heading;?></p>
                    <div class="valid-from top-margin-tiny"> 
                        <span>-  <?php echo $date;?></span>
                    </div>
                </div>  
            </div>
        </section>
        <?php }
            }?>
        <div class="no-print text-center">
            <button class="btn bc_color_secondary_bg p-3 mr-2 mb-2" onclick="printPreview()">
            <span class=""><i class="fa fa-print" style="font-size:1em" aria-hidden="true"></i>&nbsp;Print</span>
            </button>     
        </div>
    </main>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/bme915n9vgu.2001241829564.js" defer data-require='["sa"]'></script>
</body>
</html>