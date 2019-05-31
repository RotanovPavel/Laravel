<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::table('items')
            ->join('brands','brands.id','=','items.brand_id')
            ->select('items.id' , 'items.name', 'items.relevance', 'items.price', 'items.image', 'brands.name as brand_name')
            ->get();
        return view('items.index',compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // brands for 'select' sections
        $brands = Brand::all();
        return view('items.create',['brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imgName = $request->file('image')->getClientOriginalName(); //записываем название загружаемого файла
        $unique_name = md5($imgName. time()); //генерируем уникальное имя
        $imgName = $unique_name ."_". $imgName;
        if($request->isMethod('post')){

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move(public_path() . '/img/items',$imgName);
            }
        }

        $item = new Item();
        $item->name = $request->get('name');
        $item->price = $request->get('price');
        $item->relevance = $request->get('relevance');
        $item->brand_id = $request->get('brand_id');
        $item->image = $imgName;
        $item->save();

        return redirect()->route('items.show', $item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);

        return view('items.show',['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $brands = Brand::all();

        return view('items.edit',compact('item','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);


        if($request->has('image') ) {  // проверяем на наличие значения 'image' из запроса
            $imgName = $request->file('image')->getClientOriginalName(); //записываем название загружаемого файла
            $unique_name = md5($imgName . time()); //генерируем уникальное имя
            $imgName = $unique_name . "_" . $imgName;
            if ($request->isMethod('post')) {

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $file->move(public_path() . '/img/items', $imgName);

                    $this->validate($request, [
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $item->image = $imgName;
                }
            }
        }

        $item->name = $request->get('name');
        $item->price = $request->get('price');
        $item->relevance = $request->get('relevance');
        $item->brand_id = $request->get('brand_id');

        $item->update();

        return redirect()->route('items.show', $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        $item->delete();

        return redirect()->route('items.index');
    }

}
