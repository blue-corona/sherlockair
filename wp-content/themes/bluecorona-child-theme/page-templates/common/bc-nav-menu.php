<div class="container-fluid bc_nav_container">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark d-table w-100 px-0">
            <div id="navbarSupportedContent" class="navbar-collapse collapse" style="">
                <div class="float-right py-3 show-when-small">
                    <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler border-0 show-when-small" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                        <em class="fa fa-times"></em>
                    </button>
                </div>
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="d-none navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon navbar-dark"></span>
                </button>
                <?php 
                    $args = [
                    'menu' => 'main-menu',
                    'depth' => 3,
                    'theme_location' => 'primary',
                    'container' => false,
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'navbarSupportedContent',
                    'menu_class' => 'navbar-nav',
                    'fallback_cb'     => 'Bluecorona_WP_Bootstrap_Navwalker::fallback',
                    'walker' => new Bluecorona_WP_Bootstrap_Navwalker(),
                    ];
                    wp_nav_menu( $args )
                ?>
            </div>
        </nav>
    </div>
</div>
