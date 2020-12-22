<?php

declare(strict_types=1);

namespace FriendsOfSylius\SyliusImportExportPlugin\Exception;

use Exception;
use Throwable;

class ImporterException extends Exception
{

    private $options;

    public function __construct($message = "", $code = 0, Throwable $previous = null, array $options = []) {

        parent::__construct($message, $code, $previous);
        $this->options = $options;
    }

    public function getOptions(): array {
        return $this->options;
    }


}
