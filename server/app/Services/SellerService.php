<?

namespace App\Services;

use App\Repositories\SellerRepository;
use App\Models\Seller;

class SellerService
{
    protected $sellerRepository;

    public function __construct(SellerRepository $sellerRepository)
    {

        $this->sellerRepository = $sellerRepository;
        
    }

    public function storeSeller(array $data): Seller 
    {

        return $this->sellerRepository->storeSeller($data);

    }

    public function listSellers() 
    {

        return $this->sellerRepository->listSellers();

    }

}