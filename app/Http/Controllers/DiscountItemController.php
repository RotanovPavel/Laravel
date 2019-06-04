<?php

namespace App\Http\Controllers;

use App\DiscountItem;
use File;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class DiscountItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $discount_items = DiscountItem::all();
        return view('discount_items.index',['discount_items' => $discount_items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $discount_items = DiscountItem::all();
        return view('discount_items.create',['discount_items' => $discount_items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imgName = $request->file('image')->getClientOriginalName(); //записываем название загружаемого файла
        $unique_name = md5($imgName. time()); //генерируем уникальное имя
        $imgName = $unique_name ."_". $imgName;
        if($request->isMethod('post')){

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $image_resize = Image::make($file->getRealPath());
                $middle_image_resize = Image::make($file->getRealPath());
                $small_image_resize = Image::make($file->getRealPath());
                $image_resize->resize(940, 355);
                $small_image_resize->resize(132, 50);
                $middle_image_resize->resize(238, 90);
                $image_resize->save(public_path('/img/discount_items/'.$imgName));
                $small_image_resize->save(public_path('/img/discount_items/small_discount_items/'.$imgName));
                $middle_image_resize->save(public_path('/img/discount_items/middle_discount_items/'.$imgName));
            }
        }

        $discount_item = new DiscountItem();
        $discount_item->name = $request->get('name');
        $discount_item->price = $request->get('price');
        $discount_item->image = $imgName;
        $discount_item->save();

        return redirect()->route('discount_items.show', $discount_item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $discount_item = DiscountItem::findOrFail($id);
        return view('discount_items.show',['discount_item' => $discount_item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $discount_item = DiscountItem::findOrFail($id);
        return view('discount_items.edit',['discount_item' => $discount_item]);
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
        //
        $discount_item = DiscountItem::findOrFail($id);

        if($request->has('image') ) { // проверяем на наличие значения 'image' из запроса

            $imgName = $request->file('image')->getClientOriginalName(); //записываем название загружаемого файла
            $unique_name = md5($imgName . time()); //генерируем уникальное имя
            $imgName = $unique_name . "_" . $imgName;
            if ($request->isMethod('patch')) {

                if ($request->hasFile('image')) {

                    $this->validate($request, [
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);

                    $file = $request->file('image');
                    $image_resize = Image::make($file->getRealPath());
                    $small_image_resize = Image::make($file->getRealPath());
                    $middle_image_resize = Image::make($file->getRealPath());
                    $image_resize->resize(940, 355);
                    $small_image_resize->resize(132, 50);
                    $middle_image_resize->resize(238, 90);
                    $image_resize->save(public_path('/img/discount_items/'.$imgName));
                    $small_image_resize->save(public_path('/img/discount_items/small_discount_items/'.$imgName));
                    $middle_image_resize->save(public_path('/img/discount_items/middle_discount_items/'.$imgName));



                    $image_path = public_path("img/discount_items/{$discount_item->image}");
                    $small_image_path = public_path("img/discount_items/small_discount_items/{$discount_item->image}");
                    $middle_image_path = public_path("img/discount_items/middle_discount_items/{$discount_item->image}");

                    if (File::exists($image_path)) {

                        if (File::exists($small_image_path)){

                            File::delete($image_path);
                            File::delete($small_image_path);
                            File::delete($middle_image_path);
                        }

                    } else {
                        return redirect()->back()->withErrors('Update error');
                    }
                }
                $discount_item->image = $imgName;
            }
        }


        $discount_item->name = $request->get('name');
        $discount_item->price = $request->get('price');
        $discount_item->update();

        return redirect()->route('discount_items.show', $discount_item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $discount_item = DiscountItem::findOrFail($id);

        //delete discount_item images
        $image_path = public_path("img/discount_items/{$discount_item->image}");
        $small_image_path = public_path("img/discount_items/small_discount_items/{$discount_item->image}");
        $middle_image_path = public_path("img/discount_items/middle_discount_items/{$discount_item->image}");

        if (File::exists($image_path)) {
            if (File::exists($small_image_path)){
                File::delete($image_path);
                File::delete($small_image_path);
                File::delete($middle_image_path);
            }
        } else {
            return redirect()->back()->withErrors('Delete error');
        }

        $discount_item->delete();

        return redirect()->route('discount_items.index')->withSuccess('Success Deleted');
    }
}
