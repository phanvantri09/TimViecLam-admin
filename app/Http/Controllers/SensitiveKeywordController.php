<?php

namespace App\Http\Controllers;

use App\Models\KeywordSensitive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SensitiveKeywordController extends Controller
{
   public function GetKeywordSensitive()
   {
      $keyWords = DB::table('keyword_sensitive')->pluck('name')->toArray();
      return view('admin.keywordSensitive', compact(['keyWords']));
   }
   public function ListKeywordSensitive()
   {
      $key = DB::table('keyword_sensitive')->get();
      return view('admin.listKeywordSensitive', compact(['key']));
   }

   public function AddKeywordSensitive(Request $request)
   {
      $keyword = $request->input('name');
      // Kiểm tra từ khóa đã tồn tại trong DB hay chưa
      $existingKeyword = DB::table('keyword_sensitive')->where('name', $keyword)->first();
      if ($existingKeyword) {
         // Nếu từ khóa đã tồn tại, thông báo lỗi và không lưu vào DB
         return redirect()->back()->with('error', 'Từ khóa này đã tồn tại.');
      } else {
         // Nếu từ khóa chưa tồn tại, lưu vào DB
         $newKeyword = new KeywordSensitive;
         $newKeyword->name = $keyword;
         $newKeyword->save();

         return redirect()->back()->with('success', 'Thêm từ khóa bị cấm thành công.');
      }
   }
   public function DeleteKeywordSensitive($id)
   {
      $keyword = KeywordSensitive::find($id);
      $keyword->delete();
      return back()->with('success', 'Xóa từ cấm thành công');

   }

}