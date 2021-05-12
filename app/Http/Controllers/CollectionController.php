<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CollectionController extends Controller
{
    public function index()
    {
        $collection = collect(['renato', 'lisa', 'leidy', 'alexandre', 'renato', 'lisa', 'leidy', 'renato']);
        $collection = $collection->duplicates();
        echo($collection);
    }   

    public function teste3()
    {
        $collection = collect([
            ["id"=>1, "name"=>"Renato", "role"=>"Admin"],
            ["id"=>2, "name"=>"Leidy", "role"=>"Admin"],
            ["id"=>3, "name"=>"Alexandre", "role"=>"User"]

        ]);
        $collection = $collection->duplicates('role');
        echo($collection);

    }

    public function teste4()
    {
        $collection = collect([
            ["id"=>1, "name"=>"Renato", "city"=>"Uberlandia", "country"=>'Brasil'],
            ["id"=>2, "name"=>"Leidy", "city"=>"Goiania", "country"=>'Brasil'],
            ["id"=>3, "name"=>"Alexandre", "city"=>"Uberlandia", "country"=>'Brasil'],
            ["id"=>4, "name"=>"Hardik", "city"=>"Mumbai", "country"=>'India'],
            ["id"=>5, "name"=>"Jhon", "city"=>"New York", "country"=>'US'],
        ]);

        $grouped = $collection->groupBy('country')->map(function($row){
            //return response()->json($row->count(), 200);
            //echo $row->count();
            return $row->count();
        });
        echo($grouped);

    }

    public function teste2()
    {
        $collection = collect([
            [
                'name' => 'aa',
                'value' => 22
            ],
            [
                'name' => 'bb',
                'value' => 22
            ],
            [
                'name' => 'cc',
                'value' => 11
            ],
            [
                'name' => 'bb',
                'value' => 33
            ],
            [
                'name' => 'bb',
                'value' => 33
            ],
            [
                'name' => 'bb',
                'value' => 33
            ],
        ]);

        $groupedByValue = $collection->groupBy('value');
        $dupes = $groupedByValue->filter(function(Collection $groups){
            //echo ($groups->count() > 1);
            return response()->json($groups->count() > 1, 200);
            //return $groups->count() > 1;
        });
        echo($dupes);
    }   

    public function loop()
    {
       /* $item = [
            'renato' => 30,
            'leidy' => 23,
            'alexandre' => 12
        ];*/
        
        $collection = collect(['renato'  => 30, 'lisa'  => 31, 'leidy'  => 23, 'alexandre'  => 3, 'renato'  => 30, 'lisa'  => 31, 'leidy'  => 23, 'renato'  => 30]);
        //$collection = $collection->duplicates();
        $collection->each(function($item, $key) {
            print_r($key);    
        });
        
    }

    //Debugging a collection
    public function debugging()
    {
        $collection = collect(['Renato', 'Leidiany', 'Alexandre']);
        $collection->dump();
    }

    //Has
    public function has()
    {
        $collection = collect([
            'title' => 'Harry Potter',
            'author' => 'J.K. Rowling',
            'price' => 200
        ]);
        $value1 = $collection->has('author'); // true
        $value2 = $collection->has(['title', 'price']); // true
        $value3 = $collection->has(['price', 'rating']); // false
        dump($value1);
        dump($value2);
        dump($value3);
    }
}
