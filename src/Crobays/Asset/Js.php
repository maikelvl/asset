<?php namespace Crobays\Asset;

class Js extends Asset {
    
    protected $attributes = [
		'type' => 'text/javascript',
    	'src' => FALSE,
	];

    /**
     * Get the Javascript uri
     *
     * @return string
     */
    public function uri()
    {
        return $this->uri ?: $this->fetchPath($this->config->get('asset::js'));
    }

    /**
     * Get the Javascript html script element
     *
     * @return string
     */
    public function html()
    {
    	$this->addAttribute('src', $this->url());
    	return '<script'.$this->attributesString().'></script>';
    }
}