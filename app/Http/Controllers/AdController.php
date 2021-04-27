<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdRequest;
use App\Http\Requests\UpdateAdRequest;
use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\Promise\all;

class AdController extends Controller
{
    public function form(){
        return view('pages/formAd',['category'=>Category::all()]);
    }

    public function create(CreateAdRequest $request){
        // ensure the request has a file before we attempt anything else.

        if ($request->hasFile('image')) {


            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->image->store('ad', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $ad = new Ad([
                "title" => $request->get('title'),
                "description" => $request->get('description'),
                "price" => $request->get('price'),
                "picture" => $request->image->hashName(),
                "user_id"=>Auth::user()->id,
                "category_id"=>$request->get('category_id')
            ]);
            $ad->save(); // Finally, save the record.
        }

        return redirect('/');
    }

    public function index(){
        $ads=Ad::query()->paginate(15);

        return view('pages/ad',['category'=>Category::all(),'ads'=>$ads]);
    }

    public function show($id){
        return view('pages/ad-detail',['ad'=>Ad::query()->find($id)]);
    }

    public function delete(Request $request){
        $data = Ad::query()->find($request->input()['id']);
        $data->delete();
        return redirect('/');
    }
    public function updateForm($id){
        $data = Ad::query()->find($id);
        return view('pages/formAdUpdate',['ad'=>$data]);
    }

    public function test(){
        return view('pages/test');
    }

    public function update(UpdateAdRequest $request)
    {
        $data = Ad::query()->find($request->input()['id']);
        if (strval($request->input()['id_user'])== Auth::id()) {
            date_default_timezone_set('Europe/Paris');

                if ($request->hasFile('image')) {
                    $request->image->store('ad', 'public');
                }

            $data->title = $request->input()['title'];
            $data->description = $request->input()['description'];
            if (isset($request->image)) {
                $data->picture = $request->image->hashName();
            }
            $data->updated_at = (new \DateTime())->format('Y-m-d H:i:s');
            $data->save();
            return redirect('/ad/update/' . $data->id);
        } else {
            return redirect('/');
        }
    }
}
