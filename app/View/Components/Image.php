<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Image extends Component
{
   

    public $id;
    public $name;
    public $image;
    public $profileImage;
    public $username;
    public function __construct($id , $name,$image,$username ,$profileImage)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->username = $username;
        $this->profileImage = $profileImage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image');
    }
}
