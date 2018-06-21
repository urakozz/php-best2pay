<?php

namespace Kozz\Best2Pay;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;

/**
 *  A sample class
 *
 *  Use this section to define what this class is doing, the PHPDocumentator will use this
 *  to automatically generate an API documentation using this information.
 *
 * @author yourname
 */
class Best2Pay
{

    /**
     * @var Best2PayConfig
     */
    protected $options;

    /**
     * @var Client
     */
    protected $client;

    protected $host = "https://test.best2pay.net";

    /**
     * Best2Pay constructor.
     * @param array $options
     * @param ClientInterface|null $client
     */
    public function __construct($options = [], ClientInterface $client = null)
    {
        if (!($options instanceof Best2PayConfig)) {
            $options = new Best2PayConfig($options);
        }
        $this->options = clone $options;
        $this->client = $client ?: new Client();

    }

    /**
     * @param RequestCreatePayment $options
     * @return ResponseCreatePayment
     * @throws \DomainException
     */
    public function registerPayment(RequestCreatePayment $options)
    {
        $response = $this->client->post(
            $this->host . '/webapi/Register',
            [
                'form_params' => [
                    'amount' => $options->amount,
                    'reference' => $options->reference,
                    'recurring_period' => $options->recurring_period,
                    'start_date' => $options->start_date,
                    'description' => $options->description,
                    'url' => $options->url,
                    'failurl' => $options->failurl,
                    'sector' => $this->options->sector,
                    'currency' => $this->options->currency,
                    'signature' => base64_encode(md5($this->options->sector . $options->amount . $this->options->currency . $this->options->password)),
                ]
            ]
        );
        if ($response->getStatusCode() !== 200) {
            throw new \DomainException("invalid response code: " . $response->getStatusCode() . ", " . $response->getBody(true));
        }
        $bodyString = $response->getBody(true);
        $ob = simplexml_load_string($bodyString);
        $json = json_encode($ob);
        $body = json_decode($json, true);
        if (isset($body['code'])) {
            throw new \DomainException("error creating order: " . $body['code'] . ", " . $body['description']);
        }
        return new ResponseCreatePayment($body);
    }

    public function getPaymentRedirectUrl($id)
    {
        return $this->host . "/webapi/Purchase?" . http_build_query([
                "sector" => $this->options->sector,
                "id" => $id,
                "signature" => base64_encode(md5($this->options->sector . $id . $this->options->password))
            ]);
    }

    /**
     * @param RequestCancelPayment $options
     * @throws \DomainException
     */
    public function cancelPayment(RequestCancelPayment $options)
    {
        $response = $this->client->post(
            'https://test.best2pay.net/webapi/Cancel',
            [
                'form_params' => [
                    'id' => $options->id,
                    'sector' => $this->options->sector,
                    'signature' => base64_encode(md5($this->options->sector . $options->id . $this->options->password)),
                ]
            ]
        );
        if ($response->getStatusCode() !== 200) {
            throw new \DomainException("invalid response code: " . $response->getStatusCode() . ", " . $response->getBody(true));
        }
    }


}
