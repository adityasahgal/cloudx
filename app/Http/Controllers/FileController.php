<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Str;
use Google\client as GoogleClient;

class FileController extends Controller
{
    private function token()
    {
        $client_id = \config('services.google-drive.client_id');
        $client_secret = \config('services.google-drive.client_secret');
        $refresh_token = \config('services.google-drive.refresh_token');
        $response = Http::post('https://oauth2.googleapis.com/token', [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'refresh_token' => $refresh_token,
            'grant_type' => 'refresh_token',
        ]);
        $accessToken = json_decode((string)$response->body(), true)['access_token'];
        return $accessToken;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'file' => 'required',
            'file_name' => 'required'
        ]);
        $accessToken = $this->token();


        $file = $request->file('file');
        $tmp = $file->move('/tmp', $file->getClientOriginalName());
        // dd($tmp);



        $response = Http::withHeader([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json'
        ])
            ->attach('file', file_get_contents($request->file), $tmp)
            ->post('https://www.googleapis.com/upload/drive/v3/files?uploadType=media', [
                'data' => $tmp,
                // 'mimeType' => $mime,
                'uploadType' => 'resumaable',
                'parents' => [\config('services.google-drive.folder_id')]
            ]);
        if ($response->successful()) {
            $file_id = json_decode($response->body(), true)['id'];
            $uploadedfile = new File();
            $uploadedfile->file_name = $request->file_name;
            $uploadedfile->file_id = $file_id;
            // $file->name = $request->file_name;
            // $file->url = $response->json()['webContentLink'];
            $uploadedfile->save();
            return response()->json(['message' => 'File uploaded successfully'], 200);
        } else {
            return response()->json(['message' => 'File upload failed'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
