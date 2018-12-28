<?php

namespace SevenLab\RemoteLogging;

use GuzzleHttp\Client;

class RemoteLogging
{
    protected $enabled;
    protected $client;

    public function __construct($config)
    {
        $this->enabled = $config['enabled'];
        $this->client =  new Client([
            'base_uri' => $config['url'],
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $config['token'],
            ]
        ]);
    }

    /**
     * Log an exception to the server defined in remote-logging config
     *
     * @param \Throwable|\Exception $exception The Throwable/Exception object.
     * @param array                 $data      Additional attributes to pass with this event.
     * @return string|null
     */
    public function captureException($exception, $data = null, $logger = null, $vars = null)
    {
        if ($data === null) {
            $data = array();
        }

        $message = $exception->getMessage();
        if (empty($message)) {
            $message = 'Not applicable';
        }

        if (method_exists($exception, 'getStatusCode')) {
            $code = $exception->getStatusCode();
        } else {
            $code = $exception->getCode();
            if ($code === 0) {
                $code = 500;
            }
        }

        $data['type'] = 'Laravel';
        $data['status_code'] = $code;
        $data['error'] = $message;
        $data['file'] = $exception->getFile();
        $data['line'] = $exception->getLine();
        $data['env'] = app()->environment();
        $data['url'] = request()->fullUrl();
        $data['stacktrace'] = $exception->getTraceAsString();


        return $this->sendTo('logs', $data);
    }
    
    public function sendFaildJob($data)
    {
        return $this->sendTo('failed-job', $data);
    }


    protected function sendTo($url, $data)
    {
        if ($this->enabled) {
            return $this->client->post($url, [
                'form_params' => $data
            ]);
        }
        return false;
    }


}
