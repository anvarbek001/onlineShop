<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function addStore()
    {
        return view('storeForm');
    }

    public function storeSave(Request $request)
    {

        $request->validate([
            'storeName' => 'required',
            'storeDescr' => 'required',
            'storeAddress' => 'required',
            'storePhoto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        if ($request->hasFile('storePhoto')) {
            $name = time() . '_' . $request->file('storePhoto')->getClientOriginalName();
            $path = $request->file('storePhoto')->storeAs('photo-store', $name, 'public');
        }

        $store = Store::create([
            'user_id' => auth()->user()->id,
            'title' => $request->storeName,
            'description' => $request->storeDescr,
            'address' => $request->storeAddress,
            'photo' => $path ?? null,
        ]);

        // dd($store);
        return redirect()->route('account');
    }

    public function storeProducts($id)
    {
        $store = Store::find($id);
        $posts = Post::where('store_id', $id)->get();
        return view('storeProducts')->with('posts', $posts)->with('store', $store);
    }

    public function storeDelete($id)
    {
        $store = Store::find($id);

        if ($store) {
            if (!empty($store->photo)) {
                Storage::delete('public/' . $store->photo);
            }
        }
        $store->delete();
        return redirect()->route('stores')->with('success', "Do'kon muvaffaqiyatli o'chirildi!");
    }

    public function email()
    {
        return view('email');
    }

    public function sendEmail(Request $request)
    {


        try {
            $messageContent = $request->input('message'); // Foydalanuvchining habar matni

            Mail::raw($messageContent, function ($message) use ($request) {
                $message->to($request->input('email')) // Foydalanuvchidan kelgan email manzil
                    ->subject('Test Email'); // Mavzu
            });

            return redirect()->route('account')->with(['success' => 'Email muvaffaqiyatli jo\'natildi!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
