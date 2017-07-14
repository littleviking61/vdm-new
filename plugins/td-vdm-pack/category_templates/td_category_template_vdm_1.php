<?php
class td_category_template_vdm_1 extends td_category_template {

    function render() {
        ?>

        <!-- subcategory -->
        <div class="td-category-header td-container-wrap td-category-gradient-style1">
            <div class="td-container">
                <div class="td-category-crumb-filter">
                    <?php echo parent::get_breadcrumbs(); ?>
                    <?php echo parent::get_pull_down(); ?>
                </div>

                <div class="td-category-title-holder">
                    <h1 itemprop="name" class="entry-title td-page-title"><?php echo parent::get_title(); ?></h1>

                    <?php echo parent::get_sibling_categories(); ?>

                    <?php echo parent::get_description(); ?>
                </div>

            </div>
        </div>

        <?php
    }
}