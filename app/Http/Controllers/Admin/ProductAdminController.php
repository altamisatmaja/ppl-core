<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index(){
        
        $product = Product::with('typelivestocks', 'gender_livestocks', 'partner', 'categoryproduct')->get();
        return view('admin.pages.product.index', compact('product'));
    }

    public function show($slug_product){
        $id_products = Product::where('slug_product', $slug_product)->first()->id;
        $reviews = Review::where('id_product', $id_products)->get();
        $total_rating = 0;
        foreach ($reviews as $review) {
            $total_rating += $review->rating;
        }

        $total_reviews = count($reviews);
        $hasil_reviews = $total_rating / $total_reviews;
        $banyak_reviewers = count($reviews);

        $product = Product::with('typelivestocks', 'gender_livestocks', 'partner', 'categoryproduct', 'categorylivestocks')->where('slug_product', $slug_product)->first();
        
        return view('admin.pages.product.show', compact('product', 'reviews', 'hasil_reviews', 'banyak_reviewers'));
    }
}
