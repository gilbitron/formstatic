<?php

namespace Formstatic\Processors;

use GuzzleHttp\Client;

class WebhookProcessor extends Processor
{
    /**
     * @return array
     */
    protected function validationRules()
    {
        return [
            'endpoint' => 'required|valid_url',
            'method'   => 'contains_list,GET;POST',
            'as_json'  => 'boolean',
        ];
    }

    /**
     * @param array $data
     * @param array $options
     * @return string|null
     */
    protected function process($data, $options)
    {
        $method = 'POST';
        if (!empty($options['method'])) {
            $method = strtoupper($options['method']);
        }

        $asJson = false;
        if (!empty($options['as_json'])) {
            $asJson = $options['as_json'];
        }

        $client = new Client([
            'timeout' => 5,
            'headers' => [
                'User-Agent' => appName(),
            ],
        ]);

        if ($asJson) {
            $payload = ['json' => $data];
        } else {
            $payload = ['form_params' => $data];
        }

        $client->request($method, $options['endpoint'], $payload);
    }
}
