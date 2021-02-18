<?php

class User_model extends Controller {

    private $nama = "andi saputra";
    public function getUser(){
        return $this->nama;
    }
}