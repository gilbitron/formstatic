<?php

namespace Formstatic\Processors;

class TestProcessor extends Processor
{
    /**
     * @param array $data
     * @param array $options
     * @return string|null
     */
    protected function process($data, $options)
    {
        return $this->dataToString($data);
    }
}
