<div class="grid-3-small-2">
    <div class="flex-container flex-item-center">
        <div class="flex-item-center pam ">
            <?php
                get_template_part('template-parts/adresse');
            ?>
        </div>
    </div>
    <div class="flex-container newsletter">
        <div class="flex-item-center w100 pal ptm pbs">
            <h3>Newsletter</h3>
        <?php
            $form_widget = new \MailPoet\Form\Widget();
            echo $form_widget->widget(array('form' => 1, 'form_type' => 'php'));
            ?>
            <div class="ptm">
            <?php
                get_template_part('template-parts/bloc-addthis');
            ?>
            </div>
        </div>
    </div>
    <div class="flex-container">
        <div class="flex-item-center pam pt0 small-pa0">
            <?php
             if ( has_nav_menu( 'footer-menu' ) ) { ?>
            <div id="footer-menu">
                <nav>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu' ) ); ?>
                </nav>
            </div>
            <?php }; ?>
        </div>
    </div>
</div>
