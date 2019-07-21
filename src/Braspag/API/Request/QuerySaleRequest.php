<?php
namespace BraspagPagador\API\Request;

use BraspagPagador\API\Request\AbstractSaleRequest;
use BraspagPagador\API\Environment;
use BraspagPagador\API\Merchant;
use BraspagPagador\API\Sale;

class QuerySaleRequest extends AbstractSaleRequest
{

    private $environment;

    public function __construct(Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);

        $this->environment = $environment;
    }

    public function execute($paymentId)
    {
        $url = $this->environment->getApiQueryURL() . 'v2/sales/' . $paymentId;

        return $this->sendRequest('GET', $url);
    }

    protected function unserialize($json)
    {
        return Sale::fromJson($json);
    }
}
