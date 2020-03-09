<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {

    protected $_CI;

    function __construct() {
        $this->_CI = &get_instance();
    }

    function display($template, $data = null) {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('themes/Header', $data, true);
        $data['_topbar'] = $this->_CI->load->view('themes/TopBar', $data, true);
        $data['_sidebar'] = $this->_CI->load->view('themes/SideBar', $data, true);
        $data['_footer'] = $this->_CI->load->view('themes/Footer', $data, true);
        $this->_CI->load->view('themes/Master', $data);
    }

    // function view_pdf($template, $data = null) {
    //     $data['_konten'] = $this->_CI->load->view("exports/".$template, $data, true);
    //     $this->_CI->load->view('exports/templatePdf', $data);
    // }

}
