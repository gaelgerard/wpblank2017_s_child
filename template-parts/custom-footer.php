<div class="grid-3 has-guter">
    <div class="flex-container">
        <div class="flex-item-center tiny-w100 pam">
            <?php
                get_template_part('template-parts/adresse');
            ?>
        </div>
    </div>
    <div class="flex-container">
        <div class="flex-item-center w100 pam">
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
        <div class="flex-item-center tiny-w100 pam small-pa0">
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
