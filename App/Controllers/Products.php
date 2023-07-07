<?php

class Products extends Controller
{
    public function index()
    {
        echo "This is a products controller";
        $this->view('products');
    }
}
