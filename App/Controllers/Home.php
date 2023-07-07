<?php


class Home extends Controller
{
    // use Model;
    public function index($a = '', $b = '')
    {
        $user = new User;
        $arr['id'] = 19;
        // $arr['name'] = "Dipak Poudel";

        $user->where($arr);

        // $user->findAll();

        $this->view('home');
    }
}