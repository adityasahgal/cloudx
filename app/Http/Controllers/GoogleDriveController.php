<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client as GoogleClient;
use Google\Service\Drive;

class GoogleDriveController extends Controller
{
    // Show the Google Drive directories and files
    public function index(Request $request)
    {
        // Authenticate with Google and fetch the directory structure
        $directories = $this->fetchDriveDirectories($request);

        // Return the directory structure as JSON
        return response()->json($directories);
    }

    // Authenticate with Google and fetch directory structure
    private function fetchDriveDirectories(Request $request)
    {
        // Create Google client
        $client = new GoogleClient();
        $client->setAuthConfig([
            'client_id' => config('services.google-drive.client_id'),
            'client_secret' => config('services.google-drive.client_secret'),
            'redirect_uris' => [config('services.google-drive.redirect')],
        ]);
        $client->addScope(\Google_Service_Drive::DRIVE);

        // Check if we have access token in session
        if ($request->session()->has('access_token')) {
            // Set access token from session
            $client->setAccessToken($request->session()->get('access_token'));

            // If token expired, refresh it
            if ($client->isAccessTokenExpired()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                $request->session()->put('access_token', $client->getAccessToken());
            }
        } else {
            // Redirect to Google OAuth flow to authenticate
            return redirect()->to($client->createAuthUrl());
        }

        // Initialize Drive service
        $driveService = new Drive($client);

        // Fetch root directory
        $rootDirectory = $driveService->files->get('root');

        // Fetch all directories and files recursively
        return $this->fetchDirectoriesRecursively($driveService, $rootDirectory);
    }

    // Fetch directory structure recursively
    private function fetchDirectoriesRecursively($driveService, $parent)
    {
        $directories = [];

        // Fetch files and directories
        $files = $driveService->files->listFiles([
            'q' => "'{$parent->getId()}' in parents",
            'fields' => 'files(id, name, mimeType)',
        ]);

        foreach ($files as $file) {
            if ($file->getMimeType() === 'application/vnd.google-apps.folder') {
                // If directory, fetch its children recursively
                $directories[] = [
                    'name' => $file->getName(),
                    'children' => $this->fetchDirectoriesRecursively($driveService, $file),
                ];
            } else {
                // If file, add it to the list
                $directories[] = [
                    'name' => $file->getName(),
                    'type' => 'file',
                ];
            }
        }

        return $directories;
    }
}
