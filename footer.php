<?php
/**
 * Footer Files
 * 
 * @package Hammersportmarketing
 */
?>

        <Footer>
            <h3>Footer</h3>
            <?php 
            if(is_active_sidebar( 'sidebar-2')){
                ?>
                <aside>
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </aside>
                <?php
            }
            ?>
        </Footer>
        <?php wp_footer(); ?>
    </div>
</div>
</body>
</html>