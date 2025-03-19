<?php

namespace App\Twig;

use Twig\TwigFilter;
use Twig\Extension\AbstractExtension;

class CustomTwig extends AbstractExtension
{
    public function __construct (
    ) 
    {}
    
    function getFunctions() : array 
    {
        return [
        ];    
    }

    public function getFilters()
    {
        return [
            new TwigFilter('strip_html', [$this, 'stripHtml']),
        ];
    }

    public function stripHtml($content)
    {
        // Decode HTML entities if the content is already escaped
        $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // Remove HTML tags
        return preg_replace('/<[^>]*>/', '', $content);
    }
}
