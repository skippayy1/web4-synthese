<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = new Product();
        $product->title = "1.0";
        $product->description = "Description of Product 1";
        $product->included = "Chirurgie par un neurochirurgien réputé et un suivi médical complet pendant tout l'espérance de vie du produit.";
        $product->feature1 = "Envoie des idées";
        $product->feature2 = null;
        $product->feature3 = null;
        $product->feature4 = null;
        $product->feature5 = null;
        $product->feature6 = null;
        $product->price = 6000;
        $product->quantity = 25;
        $product->img_url1 = asset('img/products/IDimplant.png');
        $product->save();
        
        $product = new Product();
        $product->title = "1.5";
        $product->description = "Description of Product 2";
        $product->included = "Chirurgie par un neurochirurgien réputé et un suivi médical complet pendant tout l'espérance de vie du produit.";
        $product->feature1 = "Envoie des idées";
        $product->feature2 = "Permet de stocker les idées";
        $product->feature3 = "Programmation d'une alarme d'envoie de pensées";
        $product->feature4 = "Capacité à faire oublier des pensées/idées";
        $product->feature5 = null;
        $product->feature6 = null;
        $product->price = 8000;
        $product->quantity = 3;
        $product->img_url1 = asset('img/products/IDimplant.png');
        $product->save();
        
        $product = new Product();
        $product->title = "2.0";
        $product->description = "Description of Product 3";
        $product->included = "Chirurgie par un neurochirurgien réputé et un suivi médical complet pendant tout l'espérance de vie du produit.";
        $product->feature1 = "Envoie des idées";
        $product->feature2 = "Permet de stocker les idées";
        $product->feature3 = "Programmation d'une alarme d'envoie de pensées";
        $product->feature4 = "Capacité à faire oublier des pensées/idées";
        $product->feature5 = "Permet de partager des idées ou souvenirs avec d'autres personnes";
        $product->feature6 = "Permet de synchroniser des esprits";
        $product->price = 10000;
        $product->quantity = 17;
        $product->img_url1 = asset('img/products/IDimplant.png');
        $product->save();
 

    }
}
