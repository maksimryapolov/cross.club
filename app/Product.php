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
    protected $fillable = ['name', 'price', 'image', 'popular'];
    /**
     * @var
     */
    protected $file;

    const MIN_FOR_SLIDE = 4;

    const PATH_NO_IMAGE = 'images/no-image.jpg';

    /**
     * @param $data
     */
    public function add($data)
    {
        $path = '';
        if (isset($data['image']) && !empty($data['image'])) {
            $path = Images::saveInFolder($data['image']);
        }

        if(isset($data['popular'])) {
            $data['popular'] = intval($data['popular'] == 'on');
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

        if(isset($data['popular'])) {
            $data['popular'] = intval($data['popular'] == 'on');
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

    public static function getPopular()
    {
        $popular = Product::where([['popular', '=', 1], ['image', '!=', ""]])->get();
        if($popular->count() < self::MIN_FOR_SLIDE) {
            return false;
        }

        return $popular;

    }

    public function Offers()
    {
        return $this->hasMany(Offers::class);
    }

    static public function getJsData() 
    {
         $products = Product::all()->map(function($item) {
            $item->push($item->offers);
            $item->showModal = false;
            $item->basePrice = $item->price;
            $item->currentSize = null;
            return $item;
        });

        return self::setImage($products);
    }

    private static function setImage($items)
    {
        foreach($items as &$item) {
            if(empty($item->image)) {
                $item->image = self::PATH_NO_IMAGE;
            }
        }

        return $items;
    }

    public static function getListProduct()
    {
        $products = self::all();
        
        // dd(self::setImage($products));
        return self::setImage($products);
    }

}
