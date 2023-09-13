<?

namespace App\Repositories;

use App\Models\Seller;

class SellerRepository
{

    public function storeSeller(array $data): Seller 
    {

        return Seller::create($data);

    }

    public function listSellers() 
    {

        return Seller::withSum('sales', 'commission')->get();

    }

}