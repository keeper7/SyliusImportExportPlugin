<?php

declare(strict_types=1);

namespace FriendsOfSylius\SyliusImportExportPlugin\Importer;

use Psr\Log\LoggerInterface;

interface ImportResultLoggerAwareInterface
{
    public function getMessages(): array;

    public function setMessages(array $messages): void;

    public function addMessage(string $message): void;

    public function hasMessages(): bool;

    public function getLogger(): LoggerInterface;
}
