<?php

namespace BeepPHP;

use BeepPHP\Crypt\Signature;
use BeepPHP\Model\Transaction;

class Transactions
{
    const ENDPOINT = 'transactions';

    /**
     * @var Client
     */
    private $client;

    /**
     * Payments constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $json
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(array $json)
    {
        $transaction = (new Transaction())->fromArray($json);
        $json['signature'] = (new Signature($transaction, $this->client->getApiKey()))->sign();
        return $this->client->post(self::ENDPOINT, $json);
    }
}
