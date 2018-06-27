<?php

declare(strict_types=1);

namespace FriendsOfSylius\SyliusImportExportPlugin\Writer;

use Port\Csv\CsvWriter as PortCsvWriter;

class CsvWriter implements WriterInterface
{
    /**
     * @var PortCsvWriter
     */
    private $writer;

    /**
     * @param PortCsvWriter $writer
     */
    public function __construct(PortCsvWriter $writer)
    {
        $this->writer = $writer;
    }

    /**
     * {@inheritdoc}
     */
    public function write(array $data): void
    {
        $this->writer->writeItem($data);
    }

    /**
     * {@inheritdoc}
     */
    public function setFile(string $filename): void
    {
        $file = fopen($filename, 'w+');
        if (!$file) {
            throw new \Exception('File open failed.');
        }

        $this->writer->setStream($file);
    }

    /**
     * {@inheritdoc}
     */
    public function getFileContent(): string
    {
        $this->writer->setCloseStreamOnFinish(true);

        rewind($this->writer->getStream());
        $contents = stream_get_contents($this->writer->getStream());

        $this->finish();

        return $contents;
    }

    /**
     * {@inheritdoc}
     */
    public function finish(): void
    {
        $this->writer->finish();
    }
}
