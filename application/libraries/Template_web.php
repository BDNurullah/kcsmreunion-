<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Template_web
{
    protected $_ci;

    function __construct() {

        $this->_ci = &get_instance();
    }

    function display($data = null) {
        $data['pageTitle'] = ((isset($data['pageTitle']) == '') ? ' ' : $data['pageTitle']);
        $data['metaTitle'] = 'KCSM' . ((isset($data['pageTitle']) == '') ? ' ' : ' || ' . $data['pageTitle']);
        $data['breadcrumbs'] = ((isset($data['breadcrumbs']) == '') ? array() : $data['breadcrumbs']);
        $data['content'] = $this->_ci->load->view((isset($data['content_view_page']) == '') ? 'layouts/web/content' : $data['content_view_page'], $data, true);
        $this->_ci->load->view('templateWeb.php', $data);
    }

}