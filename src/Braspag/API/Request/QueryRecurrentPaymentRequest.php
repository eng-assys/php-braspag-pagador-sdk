<?php
namespace BraspagPagador\API\Request;

use BraspagPagador\API\Request\AbstractSaleRequest;
use BraspagPagador\API\Environment;
use BraspagPagador\API\Merchant;
use BraspagPagador\API\RecurrentPayment;

class QueryRecurrentPaymentRequest extends AbstractSaleRequest
{

    private $environment;

    public function __construct(Merchant $merchant, Environment $environment)
    {
        parent::__construct($merchant);

        $this->environment = $environment;
    }

    public function execute($recurrentPaymentId)
    {
        $url = $this->environment->getApiQueryURL() . 'v2/RecurrentPayment/' . $recurrentPaymentId;

        return $this->sendRequest('GET', $url);
    }

    protected function unserialize($json)
    {
        return RecurrentPayment::fromJson($json);
    }
}
