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

    public function storeSaleer(array $data): Seller 
    {

        return $this->sellerRepository->storeSaleer($data);

    }

    public function listSaleers() 
    {

        return $this->sellerRepository->listSaleers();

    }

}