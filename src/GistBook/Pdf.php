<?php

namespace GistBook;

use DOMPDF;

define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once __DIR__ . "/../../vendor/dompdf/dompdf/dompdf_config.inc.php";

class Pdf
{
    public static function fromGist(Gist $gist)
    {
        return new Pdf($gist);
    }

    private function __construct(Gist $gist)
    {
        foreach ($gist->files() as $file) {
            $this->createPdf($file['filename'], $file['content']);
        }
    }

    private function createPdf($filename, $content)
    {
        $pdf = new DOMPDF();
        $pdf->load_html($this->escapeContent($content));
        $pdf->render();
        file_put_contents($this->appendPdfToFilename($filename), $pdf->output());
    }

    private function escapeContent($content)
    {
        return "<pre>" . htmlentities($content) . "</pre>";
    }

    private function appendPdfToFilename($filename)
    {
        return rtrim($filename, '.pdf') . '.pdf';
    }
}
