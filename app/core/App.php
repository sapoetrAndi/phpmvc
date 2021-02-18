<?php

class App{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    public function __construct(){

        $url= $this->parseUrl();
        //cek dahulu apakah ada file yg namanya sesuai dengan url
        if(file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0]; 
            //menghilang kan elemen dari array
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //cek apakah ada method yang dikirim lewat url
        if(isset($url[1])){
            //cek apakah methodnya ada
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //mengelola parameter
        if(!empty($url)){
            $this->params = array_values($url);
        }

        //jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
        // var_dump($url);
    }

    //function yg bertugas untuk mengambil url dan memecah sesuai dengan keinginan kita 
    public function parseUrl(){
        if(isset($_GET["url"])){
            $url = rtrim($_GET["url"], '/');//rtrim berfungsi menghapus karakter di akhir string
            $url = filter_var($url, FILTER_SANITIZE_URL);//membersihkan url dari karakter karakter aneh
            //MEMECAH URL MENJADI ELEMEN ARRAY
            $url = explode('/', $url);
            return ($url);
        }   
    }

}
