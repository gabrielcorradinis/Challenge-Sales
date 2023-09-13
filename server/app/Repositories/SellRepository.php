<?

namespace App\Repositories;
use App\Models\Sell;
use App\Models\Seller;

class SellRepository
{

    public function storeSell(array $data): Sell {

        return Sell::create($data);

    }

    public function listSell(int $sellerId) {

        // $seller = Seller::find($sellerId);

        // return Sell::where('seller_id', $seller->id)->get();

        return Sell::join('sellers', 'sales.seller_id', '=', 'sellers.id')
                    ->where('sellers.id', $sellerId)
                    ->select('sellers.name', 'sellers.email', 'sales.*')
                    ->get();
    }

}