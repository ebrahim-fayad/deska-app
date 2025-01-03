<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Interface\Front\FrontRepositoryInterface;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $Front;
    public function __construct (FrontRepositoryInterface $Front){
        $this->Front = $Front;
    }
    public function index(){
        return $this->Front->index();
    }
    public function services(){
        return $this->Front->services();
    }
}
