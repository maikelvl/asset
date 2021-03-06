<?php namespace Crobays\Asset;

class File extends Asset {

    /**
     * Get the File uri prefixed by the files folder
     *
     * @return string
     */
    public function uri()
    {
        return $this->fetchPath($this->config->get('asset::file'), $this->uri);
    }
}