<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class TrayController extends Controller
{
    public function getAccessToken()
    {

        $response = Http::post(env('API_ADDRESS') . '/auth', [
            'consumer_key' => env('CONSUMER_KEY'),
            'consumer_secret' => env('CONSUMER_SECRET'),
            'code' => env('CODE')
        ]);
        
        if($response->status() == 200) {
            $response = $response->json();
            $access_token = $response["access_token"];

            return $access_token;
        }
    }   

    public function getProducts()
    {
        $access_token = $this->getAccessToken();

        $response = Http::get(env('API_ADDRESS') . 'products?access_token=' . $access_token);
        
        if($response->status() == 200) {

            $products = $response->json();

            return $products['Products'];
        }
    }  

    public function importProducts()
    {
        $products = $this->getProducts();
        
        foreach ($products as $product) {
    
            $activation_date = $product['Product']['activation_date'] !== '0000-00-00' ? $product['Product']['activation_date'] : null;
            $deactivation_date = $product['Product']['deactivation_date'] !== '0000-00-00' ? $product['Product']['deactivation_date'] : null;
            $start_promotion = $product['Product']['start_promotion'] !== '0000-00-00' ? $product['Product']['start_promotion'] : null;
            $end_promotion = $product['Product']['end_promotion'] !== '0000-00-00' ? $product['Product']['end_promotion'] : null;
    
            Product::create([
                'modified' => $product['Product']['modified'],
                'ean' => $product['Product']['ean'],
                'is_kit' => $product['Product']['is_kit'],
                'slug' => $product['Product']['slug'],
                'ncm' => $product['Product']['ncm'],
                'activation_date' => $activation_date,
                'deactivation_date' => $deactivation_date,
                'name' => $product['Product']['name'],
                'price' => $product['Product']['price'],
                'cost_price' => $product['Product']['cost_price'],
                'dollar_cost_price' => $product['Product']['dollar_cost_price'],
                'promotional_price' => $product['Product']['promotional_price'],
                'start_promotion' => $start_promotion,
                'end_promotion' => $end_promotion,
                'brand' => $product['Product']['brand'],
                'brand_id' => $product['Product']['brand_id'],
                'model' => $product['Product']['model'],
                'weight' => $product['Product']['weight'],
                'length' => $product['Product']['length'],
                'width' => $product['Product']['width'],
                'height' => $product['Product']['height'],
                'stock' => $product['Product']['stock'],
                'category_id' => $product['Product']['category_id'],
                'available' => $product['Product']['available'],
                'availability' => $product['Product']['availability'],
                'reference' => $product['Product']['reference'],
                'hot' => $product['Product']['hot'],
                'release' => $product['Product']['release'],
                'additional_button' => $product['Product']['additional_button'],
                'has_variation' => $product['Product']['has_variation'],
                'rating' => $product['Product']['rating'],
                'count_rating' => $product['Product']['count_rating'],
                'quantity_sold' => $product['Product']['quantity_sold'],
                'payment_option' => $product['Product']['payment_option'], 
                'payment_option_details' => $product['Product']['payment_option_details'], 
                'release_date' => $product['Product']['release_date'], 
                'shortcut' => $product['Product']['shortcut'], 
                'virtual_product' => $product['Product']['virtual_product'], 
                'minimum_stock' => $product['Product']['minimum_stock'], 
                'minimum_stock_alert' => $product['Product']['minimum_stock_alert'], 
                'free_shipping' => $product['Product']['free_shipping'], 
                'video' => $product['Product']['video'], 
                'metatag' => $product['Product']['metatag'], 
                'payment_option_html' => $product['Product']['payment_option_html'], 
                'upon_request' => $product['Product']['upon_request'], 
                'available_for_purchase' => $product['Product']['available_for_purchase'], 
                'all_categories' => $product['Product']['all_categories'], 
                'related_categories' => $product['Product']['related_categories'], 
                'ProductImage' => $product['Product']['ProductImage'], 
                'Variant' => $product['Product']['Variant'], 
                'AdditionalInfos' => $product['Product']['AdditionalInfos'], 
            ]);
        }
    
        return 'Produtos importados com sucesso.2';
    }

    public function getAndImportProducts()
    {
        $productsData = $this->getProducts();

        if ($productsData) {
            $this->importProducts($productsData);
            return 'Produtos importados com sucesso.1';
        } else {
            return 'Não foi possível obter dados para importação.';
        }
    }
}
