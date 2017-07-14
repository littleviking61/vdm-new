<?php
class td_block_vdm_1 extends td_block {
    function render($atts, $content = null) {
        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        if (empty($td_column_number)) {
            $td_column_number = td_global::vc_get_column_number(); // get the column width of the block from the page builder API
        }

        $buffy = ''; //output buffer

        $buffy .= '<div class="' . $this->get_block_classes() . ' td-column-' . $td_column_number . ' td_block_padding" ' . $this->get_block_html_atts() . '>';


        // block title wrap
        $buffy .= '<div class="td-block-title-wrap">';
        $buffy .= $this->get_block_title(); //get the block title
        $buffy .= '</div>';

        $buffy .= '</div> <!-- ./block -->';
        return $buffy;
    }

}