<?php

namespace App\Http\Controllers;

use DB;
use File;
use Illuminate\Http\Request;
use App\Brand;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index',['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
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
                $image_resize = Image::make($file->getRealPath());
                $small_image_resize = Image::make($file->getRealPath());
                $image_resize->resize(82, 82);
                $small_image_resize->resize(50, 50);
                $image_resize->save(public_path('/img/brands/'.$imgName));
                $small_image_resize->save(public_path('/img/brands/small_brands/'.$imgName));
            }
        }

        $brand = new Brand();
        $brand->name = $request->get('name');
        $brand->image = $imgName;
        $brand->save();

        return redirect()->route('brands.show', $brand);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.show',['brand' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('brands.edit',['brand' => $brand]);
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
        $brand = Brand::findOrFail($id);

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
                    $image_resize->resize(82, 82);
                    $small_image_resize->resize(50, 50);
                    $image_resize->save(public_path('/img/brands/'.$imgName));
                    $small_image_resize->save(public_path('/img/brands/small_brands/'.$imgName));



                    $image_path = public_path("img/brands/{$brand->image}");
                    $small_image_path = public_path("img/brands/small_brands/{$brand->image}");

                    if (File::exists($image_path)) {

                        if (File::exists($small_image_path)){

                            File::delete($image_path);
                            File::delete($small_image_path);
                        }

                    } else {
                        return redirect()->back()->withErrors('Update error');
                    }
                }
            }
        }

        $brand->image = $imgName;
        $brand->name = $request->get('name');
        $brand->update();

        return redirect()->route('brands.show', $brand);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        //delete brand images
        $image_path = public_path("img/brands/{$brand->image}");
        $small_image_path = public_path("img/brands/small_brands/{$brand->image}");

        if (File::exists($image_path)) {
            if (File::exists($small_image_path)){
                File::delete($image_path);
                File::delete($small_image_path);
            }
        } else {
            return redirect()->back()->withErrors('Delete error');
        }

        $brand->delete();

        return redirect()->route('brands.index')->withSuccess('Success Deleted');
    }


    public function itemList($id)
    {

        $brand = Brand::findOrFail($id);
        $items = DB::table('items')->where('brand_id', '=', $id)->get();
        return view('brands.itemList',compact('brand','items'));

    }
}
