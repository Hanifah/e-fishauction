<?php
class Error extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library("Ion_auth");
        $this->id = $this->ion_auth->get_user_id();
        $this->isAdmin = $this->ion_auth->is_admin($this->id);
        $this->login = false;
        if ($this->ion_auth->logged_in()){
            $this->login = true;
        }
    }

    public function not_authorized()
    {
        $menu['isAdmin'] = $this->isAdmin;
        $menu['login'] = $this->login;
        $view = array(
                'content' => $this->load->view('errors/html/error_not_authorized', '', TRUE),
                'menu' => $this->load->view('menu', $menu, TRUE)
                );
        $this->load->view('master',$view);
    }
}
?>