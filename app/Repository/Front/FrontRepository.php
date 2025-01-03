<?php
namespace App\Repository\Front;

use App\Interface\Front\FrontRepositoryInterface;
use App\Models\Feature;
use App\Models\Service;




class FrontRepository implements FrontRepositoryInterface
{

    public function index() {
        $services=Service::take(6)->get();
        $features=Feature::take(6)->get();
        return view('Front.index',get_defined_vars());
    }
    /**
     * @inheritDoc
     */
    public function about() {
    }
    public function services() {
        return view('Front.services');
    }

    /**
     * @inheritDoc
     */
    public function contactUs() {
    }
    /**
     * @inheritDoc
     */
    public function features() {
    }
}
