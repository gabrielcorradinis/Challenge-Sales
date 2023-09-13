<?

namespace App\Services;

use App\Repositories\SellRepository;
use App\Models\Sell;

class SellService
{
    protected $sellRepository;

    public function __construct(SellRepository $sellRepository)
    {
        $this->sellRepository = $sellRepository;
    }

    public function storeSell(array $data): Sell {

        $data['commission'] = $this->getCommissionValue($data['amount']);

        return $this->sellRepository->storeSell($data);

    }

    public function getCommissionValue(float $salesValue): float {

        return $salesValue * 0.085;

    }

    public function listSell(int $sellerId) {

        return $this->sellRepository->listSell($sellerId);

    }

}
