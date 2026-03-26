<?php

namespace App\Http\Controllers\BusinessApp;

// एरर न आए, इसलिए हमने सीधा BaseController इस्तेमाल किया है
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class BusinessHendlar extends BaseController
{
    /**
     * जानी, यह फंक्शन दुकानदार (Seller) के लिए डैशबोर्ड और अन्य पेज लोड करेगा।
     */
   public function index(Request $request, $sub_page = null)
{
    $viewFile = $sub_page ?: 'business_index';
    $fullPath = "business.$viewFile";

    if (view()->exists($fullPath)) {
        // डेटा के साथ व्यू को रेंडर करें 🌸
        $html = view($fullPath, [
            'page_title' => 'Green Shop Business - ' . ucfirst($viewFile),
            'request' => $request
        ])->render();

        // रेंडर किया हुआ HTML रिस्पांस की तरह भेजें ✨
        return response($html);
    }
    abort(404);
}
}