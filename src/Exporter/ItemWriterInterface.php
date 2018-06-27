<?php

declare(strict_types=1);

namespace FriendsOfSylius\SyliusImportExportPlugin\Exporter;

interface ItemWriterInterface
{
    /**
     * @param string $queueName
     */
    public function initQueue(string $queueName): void;

    /**
     * @param array $items
     * @param string $entity
     */
    public function write(array $items, string $entity): void;
}
