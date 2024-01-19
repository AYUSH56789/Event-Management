<?php

namespace App\Services;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;

class QRCodeServiceForCertificate
{
    public function generateQRCode($data, $size=200)
    {
        $qrCode = new QrCode($data);

        // Set additional options (optional)
        $qrCode
            ->setSize($size)
            ->setMargin(10)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Use PngWriter to generate the PNG image
        $pngData = (new PngWriter())->write($qrCode);

        // Return the PNG data as a string
        return $pngData->getString();
    }
}
