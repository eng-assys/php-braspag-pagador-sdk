<?php
namespace BraspagPagador\API\Request;

use BraspagPagador\API\Request\AbstractSaleRequest;
use BraspagPagador\API\Environment;
use BraspagPagador\API\Merchant;
use BraspagPagador\API\Sale;

class CreateSaleRequest extends AbstractSaleRequest
{

    private $environment;

    public function __construct(Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);

        $this->environment = $environment;
    }

    public function execute($sale)
    {
        $url = $this->environment->getApiUrl() . 'v2/sales/';

        return $this->sendRequest('POST', $url, $sale);
    }

    protected function unserialize($json)
    {
        return Sale::fromJson($json);
    }
}
