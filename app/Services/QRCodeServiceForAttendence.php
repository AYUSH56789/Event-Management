<?php

namespace App\Services;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Symfony\Component\HttpFoundation\Response;
use Endroid\QrCode\Color\Color;

class QRCodeServiceForAttendence
{
    public function generateQRCode($data)
    {
        $qrCode = new QrCode($data);

        // Set additional options (optional)
        $qrCode
            ->setSize(250)
            ->setMargin(10)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Use PngWriter to generate the PNG image
        $pngData = (new PngWriter())->write($qrCode);

        // Set up the Symfony Response
        $response = new Response($pngData->getString()); // Retrieve string content
        $response->headers->set('Content-Type', 'image/png');

        return $response;
    }
}
