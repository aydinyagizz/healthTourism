<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFaq;
use App\Models\UserPricing;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserFaqController extends Controller
{
    public function faqList()
    {
        $data = [
            'user' => User::where('id', Session::get('userId'))->first(),
            'faq' => DB::table('user_faqs')->where('user_id', Session::get('userId'))->get(),
        ];

        return view('user.pages.userFaq', $data);
    }

    public function faqAdd(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'faq_content' => 'required',
            'status' => 'required',
        ], [
            'title.required' => 'Title is required',
            'faq_content.required' => 'Content is required',
            'status.required' => 'Status is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.faq.list');
        }

        $pricing = new UserFaq();
        $pricing->user_id = Session::get('userId');
        $pricing->title = $request->title;
        $pricing->content = $request->faq_content;
        $pricing->status = $request->status;
        $pricing->save();
        $flasher->addSuccess('Faq Added Success');

        return Redirect::route('user.faq.list');
    }

    public function faqUpdate(Request $request, FlasherInterface $flasher)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'faq_content' => 'required',
            'status' => 'required',
        ], [
            'title.required' => 'Title is required',
            'faq_content.required' => 'Content is required',
            'status.required' => 'Status is required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $flasher->addError($error);
            }
            // Hata oluştuğunda yapılması gereken diğer işlemler...
            return Redirect::route('user.faq.list');
        }

        $id = $request->id;

        $faq = UserFaq::findOrFail($id);
        $faq->title = $request->title;
        $faq->content = $request->faq_content;
        $faq->status = $request->status;
        $faq->save();
        $flasher->addSuccess('Faq Updated Success');
        return Redirect::route('user.faq.list');
    }

    public function faqDelete(Request $request)
    {
        if ($request->input('IDs')){
            $IDs = $request->input('IDs');
            UserFaq::whereIn('id', $IDs)->delete();
        }
        if ($request->input('faqId')){
            $faqId = $request->input('faqId');
            UserFaq::find($faqId)->delete();
        }

        return response()->json(['success'=>'Selected pricing have been deleted.']);
    }
}
