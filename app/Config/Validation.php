<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    
    public $training = [
        'nama' => 'required',
        'tempat' => 'required',
        'tanggal' => 'required|valid_date[tanggal, Y-m-d]|greater_than_today',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required|greater_than[jam_mulai]',
    ];

    // Custom validation rules
    public function greater_than_today(string $str, string $fields, array $data): bool
    {
        return $str >= date('Y-m-d');
    }

    public function greater_than(string $str, string $fields, array $data): bool
    {
        $compareField = $data[$fields] ?? null;
        return $str > $compareField;
    }
}
