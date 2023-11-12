<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\Animal;
use App\Models\AnimalFile;
use App\Models\Categories;
use App\Models\PickupPoint;
use App\Models\ProductFile;
use App\Models\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AnimalController extends Controller
{
    public function index()
    {
        $data['data'] = Animal::orderby('created_at', 'desc')->get();
        return view('admin.animal.list', $data);
    }


    public function create()
    {
        $data['categories']      = Categories::get();
        $data['subcategory']     = SubCategory::get();
        $data['pickup_points']   = PickupPoint::get();


        return view('admin.animal.create', $data);
    }

    //manage

    public function manage($id = null)
    {

        if ($data['animal'] = Animal::find($id)) {

       

            $data['category'] = Categories::get();
            $data['subcategory'] = SubCategory::get();
            $data['pickuppoint'] = PickupPoint::get();
            // return $datas;
            return view('admin.animal.manage', $data);
        }
        return RedirectHelper::routeWarningWithParams('animal.list', '<strong>Sorry!!!</strong> Animal not found');
    }


    public function store(Request $request)
    {
            //    dd($request->all());
        $message = '<strong>Congratulations!!!</strong> Animal successfully';
        $rules = [

            'category_id'           => 'nullable|string',
            'subcategory_id'        => 'nullable|string',
            'name'                  => 'nullable|string',
            'purchase_price'        => 'nullable|string',
            'selling_price'         => 'nullable|string',
            'discount_price'        => 'nullable|string',
            'pet_tag'               => 'nullable|string',
            'pet_behaviour'         => 'nullable|string',
            'pet_habbit'            => 'nullable|string',
            'stock_quantity'        => 'nullable|string',
            'description'           => 'nullable|string',
            'images'                => 'nullable|string',
            'featured'              => ['required', Rule::in(\App\Models\Animal::$featuredArrays)],
            'today_deal'            => 'nullable|string',
            'status'                => ['required', Rule::in(\App\Models\Animal::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\Animal::$statusArrays)],
        ];

        if ($request->has('id')) {
            // return $request;
            $animal = Animal::find($request->id);
            $message = $message . ' updated';
        } else {
            $animal = new Animal();
            $message = $message . ' created';
            // return $request;
        }
        $request->validate($rules);

        try {
            $animal->category_id            = $request->category_id;
            $animal->subcategory_id         = $request->subcategory_id;
            $animal->name                   = $request->name;
            $animal->purchase_price         = $request->purchase_price;
            $animal->selling_price          = $request->selling_price;
            $animal->discount_price         = $request->discount_price;
            $animal->pet_tag                = $request->pet_tag;
            $animal->pet_behaviour          = $request->pet_behaviour;
            $animal->pet_habbit             = $request->pet_habbit;
            $animal->stock_quantity         = $request->stock_quantity;
            $animal->description            = $request->description;
            $animal->featured               = $request->featured;
            $animal->today_deal             = $request->today_deal;
            $animal->status                 = $request->status;


            $oldImage               = $animal->image;
            $oldImageHealth         = $animal->health_info;
            $oldImageCertification  = $animal->certification_info;
            //            return $animal;
            if ($request->hasFile('image')) {
                $logo1 = CustomHelper::storeImage($request->file('image'), '/animal/');
                if ($logo1 != false) {
                    $animal->image = $logo1;
                }
            }
            if ($request->hasFile('health_info')) {
                $logo2 = CustomHelper::storeImage($request->file('health_info'), '/animal/health/');
                if ($logo2 != false) {
                    $animal->health_info = $logo2;
                }
            }
            if ($request->hasFile('certification_info')) {
                $logo3 = CustomHelper::storeImage($request->file('certification_info'), '/animal/certificate/');
                if ($logo3 != false) {
                    $animal->certification_info = $logo3;
                }
            }
            if ($animal->save()) {
                if ($oldImage !== null && isset($logo1)) {
                    CustomHelper::deleteFile($oldImage);
                }
                if ($oldImageHealth !== null && isset($logo2)) {
                    CustomHelper::deleteFile($oldImageHealth);
                }
                if ($oldImageCertification !== null && isset($logo3)) {
                    CustomHelper::deleteFile($oldImageCertification);
                }
                if ($request->hasFile('image_upload')) {
                    foreach ($request->file('image_upload') as $k => $file) {
                      $file = CustomHelper::storeImage($file, '/Product/' . $animal->id . '/');
                      if ($file) {
                        $fileUpload = new AnimalFile();
                        $fileUpload->description = $request->image_filename[$k];
                        $fileUpload->type = $request->image_type[$k];
                        $fileUpload->size = $request->image_size[$k];
                        $fileUpload->file = $file;
                        $fileUpload->animal_id = $animal->id;
                        $fileUpload->save();
                      }
                    }
                  }
                  DB::commit();

                return RedirectHelper::routeSuccessWithParams('animal.list', $message);
            }
            return RedirectHelper::backWithInput();
        } catch (QueryException $e) {
            // return $e;
            return RedirectHelper::backWithInputFromException();
        }
    }


    public function destroy(Request $request)
    {
        $id = $request->post('id');
        try {
            $user = Animal::find($id);
            $oldImage = $user->image;
            if ($user->delete()) {
                if ($oldImage !== null) {
                    CustomHelper::deleteFile($oldImage);
                }
                return 'success';
            }
        } catch (\Exception $e) {
        }
    }



    

    /**
     * @param Request $request
     * @return string|void
     */
    public function ajaxUpdateFeatured(Request $request)
    {
        if ($request->isMethod("POST")) {
            $id = $request->post('id');
            $postStatus = $request->post('featured');
            $featured = strtolower($postStatus);
            $user = Animal::find($id);
            if ($user->update(['featured' => $featured])) {
                return "success";
            }
        }
    }


     /**
     * @param Request $request
     * @return string|void
     */
    public function ajaxUpdatedeal(Request $request)
    {
        if ($request->isMethod("POST")) {
            $id = $request->post('id');
            $postStatus = $request->post('today_deal');
            $today_deal = strtolower($postStatus);
            $user = Animal::find($id);
            if ($user->update(['today_deal' => $today_deal])) {
                return "success";
            }
        }
    }







    /**
     * @param Request $request
     * @return string|void
     */
    public function ajaxUpdateStatus(Request $request)
    {
        if ($request->isMethod("POST")) {
            $id = $request->post('id');
            $postStatus = $request->post('status');
            $status = strtolower($postStatus);
            $user = Animal::find($id);
            if ($user->update(['status' => $status])) {
                return "success";
            }
        }
    }



}
