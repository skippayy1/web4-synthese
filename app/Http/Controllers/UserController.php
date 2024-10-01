<?php

namespace App\Http\Controllers;

use App\Charts\ViewsChart;
use App\Models\News;

use App\Models\Order;

use App\Models\Page;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function process_image($image, $folderImg) {
        $folder = $folderImg;
        $extensions = ["png", "avif", "jpg", "jpeg", "gif", "webp"];
        $image_url = null;

        // Upload s'est bien passé
        if ($image['error'] === UPLOAD_ERR_OK) {

            // Récupère l'extension de l'image
            $info_image = getimagesize($image['tmp_name']);
            $extension = explode("/", $info_image["mime"])[1];

            // Si l'extension est valide
            if (in_array($extension, $extensions)) {
                $nom_rnd = time() . "_" . rand(1000, 9999);
                $image_url = $folder . $nom_rnd . "." . $extension;
                move_uploaded_file($image['tmp_name'], $image_url);
            }
        }
        return $image_url;
    }
    function index()
    {
        return view('index');
    }

    public function admin_home()
    {
        $reviews = Review::all();
        $products = Product::all();
        $news = News::all();
        $orders = Order::all();
        $user = Auth::user();
        $viewsChart = new ViewsChart(); // creates a new chart for the views
        $error = '';

        // Query the pages table to get the top 5 pages with the most views
        $pages = Page::orderBy('views', 'desc')
            ->orderBy('title', 'asc')
            ->take(10)
            ->get();

        // If no pages are found, throw an exception
        if ($pages->isEmpty() || $pages->sum(('views')) == 0) {
            $error = 'No pages found';
        } else {

            // Create labels for the chart using the page names
            $labels = $pages->pluck('title')->toArray();

            // Create data points for the chart using the page views
            $data = $pages->pluck('views')->toArray();
            $viewsChart->dataset('Page Views', 'bar', $data);

            $viewsChart->labels($labels);
        }

        return view('admin_home', [
            'reviews' => $reviews,
            'products' => $products,
            'news' => $news,
            'orders' => $orders,
            'user' => $user,
            'pages' => $pages,
            'viewsChart' => $viewsChart,
        ])->with('error', $error);
    }

    public function review_delete_submit()
    {
        Review::destroy($_GET["id"]);
        return redirect("/cms/index");
    }

    //Manuel Lamy ----------------------------------------------------------------------------------------------
 
    function cms_login()
    {
        return view("admin_login"); // login.blade.php
    }

    function cms_login_submit(Request $request)
    {
        // Récupère les inputs name="courriel" et name="mot_de_passe"
        $name = $_POST["name"];
        $password = $_POST["password"];

        // Vérifie les informations de connexion
        $succes = Auth::attempt([
            "name" => $name,
            "password" => $password,
        ]);

        if ($succes) {
            // Si l'utilisateur est valide, on redirige
            $request->session()->regenerate();
            return redirect("/cms/index");
        } else {
            return redirect("/cms/login?error");
        }
    }

    function cms_logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    function admin_news()
    {
        $news = News::all();
        return view('admin_news', [
            'news' => $news,
        ]);
    }

    function add_news()
    {
        return view('admin_add_news');
    }

    function add_news_submit()
    {
    
        $image_url = $this->process_image($_FILES['image'], "img/news/");
 
        $news = new News();
        $news->title = $_POST["title"];
        $news->description = $_POST["description"];
        $news->date = $_POST["date"];
        $news->image_url = $image_url;
        $news->save();

        return redirect("/cms/news");
    }

    function modify_news()
    {
        $news = News::find($_GET["id"]);
        return view('admin_modify_news', [
            'news' => $news,
        ]);
    }

    function modify_news_submit()
    {
        $image_url = $this->process_image($_FILES['image'], "img/news/");
 
        $news = News::find($_POST["id"]);
        $news->title = $_POST["title"];
        $news->description = $_POST["description"];
        $news->date = $_POST["date"];
        if ($image_url != null) {
            $news->image_url = $image_url;
        }
        $news->save();

        return redirect("/cms/news");
    }

    function delete_news_submit()
    {
        News::destroy($_GET["id"]);
        return redirect("/cms/news");
    }

    // PRODUCTS SECTION
    function admin_products()
    {
        $products = Product::all();
        return view('admin_products', [
            'products' => $products,
        ]);
    }

    function modify_product()
    {
        $product = Product::find($_GET["id"]);
        return view('admin_modify_product', [
            'product' => $product,
        ]);
    }

    function modify_product_submit()
    {
        $product = Product::find($_POST["id"]);
        $product->title = $_POST["title"];
        $product->description = $_POST["description"];
        $product->features = $_POST["features"];
        $product->price = $_POST["price"];
        $product->quantity = $_POST["quantity"];
        $product->img_url1 = !empty($_FILES["image_url1"]['name']) ? $this->process_image($_FILES["image_url1"], "img/products/") : $_POST['old_img_url1'];
        $product->img_url2 = !empty($_FILES["image_url2"]) ? $this->process_image($_FILES["image_url2"], "img/products/") : $_POST['old_img_url2'];
        $product->img_url3 = !empty($_FILES["image_url3"]) ? $this->process_image($_FILES["image_url3"], "img/products/") :$_POST['old_img_url3'];
        $product->img_url4 = !empty($_FILES["image_url4"]) ? $this->process_image($_FILES["image_url4"], "img/products/") : $_POST['old_img_url4'];
        $product->save();

        return redirect("/cms/products");
    }

    function order_delete_submit()
    {
        Order::destroy($_GET["id"]);
        return redirect("/cms/index");
    }

    //PARTNERS
    function admin_partners()
    {
        $partners = Partner::all();
        return view('admin_partners', [
            'partners' => $partners,
        ]);
    }
 
    function add_partner()
    {
        return view('admin_add_partner');
    }
 
    function add_partner_submit()
    {

        $image_url = $this->process_image($_FILES['image'], "img/partners/");
        
 
        $partner = new Partner();
        $partner->name = $_POST["name"];
        $partner->link = $_POST["link"];
        $partner->logo = $image_url;
        $partner->save();
       
        return redirect("/cms/partners");
    }
 
    function modify_partner()
    {
        $partner = Partner::find($_GET["id"]);
        return view('admin_modify_partner', [
            'partner' => $partner,
        ]);
    }
 
    function modify_partner_submit()
    {
        
        $image_url = $this->process_image($_FILES['image'], "img/partners/");

        $partner = Partner::find($_POST["id"]);
        $partner->name = $_POST["name"];
        $partner->link = $_POST["link"];
        if ($image_url != null) {
            $partner->logo = $image_url;
        }
        $partner->save();
       
        return redirect("/cms/partners");
    }
 
    function delete_partner_submit()
    {
        Partner::destroy($_GET["id"]);
        return redirect("/cms/partners");
    }
    
}