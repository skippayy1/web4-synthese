<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Order;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Progress;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function get_products()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function get_reviews($product_id)
    {
        $product = Product::find($product_id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product->reviews);
    }

    public function receive_reviews()
    {

        $data = request()->all();
        $product = Product::find($data['product_id']);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $review = new Review();
            $review->title = $data['title'];
            $review->review = $data['review'];
            $review->rating = $data['rating'];
            $review->product_id = $data['product_id'];
            $review->user_id = $data['user_id']; // Assuming you have user_id in your request
            $review->img_url = $data['img_url'];// Assuming you have img_url in your request
            $review->uploaded_at = now(); 
            try {
                $review->save();
            } catch (\Exception $e) {
                return response()->json(['message' => 'Error saving review'], 500);
            }
        return response()->json(['message' => 'Review received']);
    }

    //Manuel Lamy ---------------------------------------------------------------------------------------------------
    public function api_login()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $name_token = "site_v1"; // nom arbitraire
    
        $user = User::where('email', $email)->first();
    
        // Si le user n'existe pas ou que le mdp est incorrect
        if (!$user || !Hash::check($password, $user->password)) {
            $result = [
                "error" => "Informations d'authentification invalides",
            ];
            return $result;
        }
    
        // Si le user est ok, on crée un token pour le frontend
        $result = [
            "token" => $user->createToken($name_token)->plainTextToken,
        ];
        return $result;
    }
    
    function api_orders(){
        return auth()->user()->name;
    }
    
    function api_news()
    {
        try {
            $news = News::where("date", "<=", date('Y/m/d H:i:s'))->get();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error getting news'], 500);
        }
        return response()->json($news, 200, [], JSON_PRETTY_PRINT);
    }

    function add_order_submit()
    {
        $order = new Order();
        $order->user_id = $_POST["user_id"];
        $order->quantity_product1 = $_POST["quantity1"];
        $order->quantity_product2 = $_POST["quantity2"];
        $order->quantity_product3 = $_POST["quantity3"];
        $order->date = $_POST["date"];
        $order->address = $_POST["address"];
        $success = $order->save();

        $products = Product::all();

        $price = 0;
        foreach ($products as $key => $product)
        {
            $i = $key + 1;
            $qty = $_POST["quantity" . $i];
            $product->quantity = $product->quantity - $qty;
            try {
                $product->save();
            } catch (\Exception $e) {
                return response()->json(['message' => 'Error saving product'], 500);
            }
            $price += $product->price * $qty;
        }

        $this->update_progress($price);
        return["success" => $success];
    }

        function add_user_submit() {
            $user = new User();
            $user->name = request("name");
            $user->email = request("email");
            $user->password = Hash::make(request("password"));
            $user->is_admin = false;
        try {
                $user->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error saving user'], 500);
        }
        
            return $this->api_login();
        }

    function modify_user_submit()
    {
        $user = User::find($_POST["id"]);
        $user->name = $_POST["name"];
        $user->email = $_POST["email"];
        $user->password = $_POST["password"];
        try {
            $user->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error saving user'], 500);
        }
    }

    function api_user_orders()
    {
        try {
            $orders = Order::where("user_id", "=", $_GET["user_id"])->get();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error getting orders'], 500);
        }
        return response()->json($orders, 200, [], JSON_PRETTY_PRINT);
    }
    function api_user_reviews()
    {
        try {
            $reviews = Review::where("user_id", "=", $_GET["user_id"])->get();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error getting reviews'], 500);
        }
        return response()->json($reviews, 200, [], JSON_PRETTY_PRINT);
    }

    function api_user_info()
    {
        $user = User::where("id", "=", $_GET["user_id"])->get();
        try{
            $user = User::where("id", "=", $_GET["user_id"])->get();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error getting user'], 500);
        }
        return response()->json($user, 200, [], JSON_PRETTY_PRINT);
    }

    function page_view_submit()
    {

        if (Page::where('url', $_POST["url"])->count() > 0) {
              $page = Page::where('url', '=', $_POST["url"])->first();
              $page->views ++;
              $page->save();
         }
         else {
              $page = new Page();
              $page->title = $_POST["title"];
              $page->url = $_POST["url"];
              $page->views = 1;
              $page->save();
         }
    }

    function update_progress($price)
    {
        try {
            $progress = Progress::find(1);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error getting progress'], 500);
        }
        $progress->current += $price;
        $progress->save();
    }

    function api_progress()
    {
        try {
            $progress = Progress::find(1);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error getting progress'], 500);
        }
        return response()->json($progress, 200, [], JSON_PRETTY_PRINT);
    }
    function api_partners()
    {
        $partners = Partner::all();
        return response()->json($partners, 200, [], JSON_PRETTY_PRINT);
    }

    function api_user_id()
    {
        $user_id = auth()->user()->id;
        return response()->json($user_id, 200, [], JSON_PRETTY_PRINT);
    }
}


