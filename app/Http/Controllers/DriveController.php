<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Service\Drive;
use Google\Client;

class DriveController extends Controller
{
    protected $drive;

    public function __construct(Client $client)
    {
        $this->drive = new Drive($client);
    }

    public function index()
    {
        return $this->getDriveFiles();
    }

    private function getDriveFiles()
    {
        $files = [];

        // Fetch files from Google Drive
        do {
            $results = $this->drive->files->listFiles([
                'pageToken' => isset($results) ? $results->getNextPageToken() : null
            ]);

            foreach ($results->getFiles() as $file) {
                $files[] = [
                    'name' => $file->getName(),
                    'id' => $file->getId(),
                    'mimeType' => $file->getMimeType(),
                ];
            }
        } while ($results->getNextPageToken());

        return $files;
    }
}
