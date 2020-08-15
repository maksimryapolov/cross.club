<?php

namespace App;

use App\Http\classes\Images;
use Illuminate\Database\Eloquent\Model;
use App\Offers;

class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'price', 'image'];
    /**
     * @var
     */
    protected $file;

    /**
     * @param $data
     */
    public function add($data)
    {
        $path = '';
        if (isset($data['image']) && !empty($data['image'])) {
            $path = Images::saveInFolder($data['image']);
        }

        $data['image'] = $path;

        $this->create($data);
    }

    /**
     * @param $data
     */
    public function changeItem($data)
    {
        if(isset($data['image']) && !empty($data['image'])) {
            $data['image'] = Images::changeCurrentFile($data['image'], $this->image);             
        }

        $this->update($data);
    }

    /**
     * @throws \Exception
     */
    public function remove()
    {
        if(!empty($this->image)) {
           Images::removeRecord($this->image);
        }

        $this->delete();
    }

    public function Offers()
    {
        return $this->hasMany(Offers::class);
    }

    static public function getJsData() 
    {
        return Product::all()->map(function($item) {
            $item->push($item->offers);
            $item->showModal = false;
            $item->basePrice = $item->price;
            $item->currentSize = null;
            return $item;
        });
    }

}
