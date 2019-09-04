<?php

namespace Formstatic\Processors;

use Formstatic\Exceptions\ValidationException;

abstract class Processor
{
    /**
     * @return array
     */
    private function defaultValidationRules()
    {
        return [
            'redirect_to' => 'valid_url',
        ];
    }

    /**
     * @return array
     */
    protected function validationRules()
    {
        return [];
    }

    /**
     * @param array $options
     * @return array
     */
    protected function validate($options)
    {
        $validationRules = array_merge($this->defaultValidationRules(), $this->validationRules());

        $gump = new \GUMP();
        $gump->validation_rules($validationRules);
        $validatedOptions = $gump->run($options);

        if (empty($validatedOptions)) {
            throw new ValidationException($gump->get_readable_errors(true));
        }

        return $validatedOptions;
    }

    /**
     * @param array $data
     * @param array $options
     * @return string|null
     */
    public function processData($data, $options)
    {
        $gump    = new \GUMP();
        $data    = $gump->xss_clean($data);
        $data    = $gump->sanitize($data);
        $options = $gump->xss_clean($options);
        $options = $gump->sanitize($options);

        $options = $this->validate($options);

        return $this->process($data, $options);
    }

    /**
     * @param array $data
     * @param array $options
     * @return string|null
     */
    abstract protected function process($data, $options);

    /**
     * @param array $data
     * @return string
     */
    protected function dataToString($data)
    {
        $output = '';

        foreach ($data as $key => $value) {
            $key   = ucwords(str_replace('_', ' ', $key));
            $value = filter_var($value, FILTER_SANITIZE_STRING);

            $output .= "{$key}: $value\n\n";
        }

        return $output;
    }
}
