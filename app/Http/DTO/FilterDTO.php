<?php
namespace App\Http\DTO;

class FilterDTO {

    public function __construct(
        public string $name,
        public string $dateFrom,
        public string $dateTo,
        public string $type
    )
    {
        
    }
}
