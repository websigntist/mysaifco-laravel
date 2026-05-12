<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\frontend\Inquiry;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ContactApiController
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('API_CONTACT_KEY', 'default-key-please-change');
    }

    /**
     * Handle contact form submission from external website
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // ✅ Step 1: Validate API Key
        $apiKey = $request->header('X-API-KEY');

        if (empty($apiKey) || $apiKey !== $this->apiKey) {
            Log::warning('Unauthorized API access attempt', [
                'ip' => $request->ip(),
                'provided_key' => $apiKey ? 'PROVIDED' : 'MISSING'
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: Invalid or missing API Key'
            ], 401);
        }

        // ✅ Step 2: Validate Input
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:20',
            'subject'    => 'required|string|max:255',
            'message'    => 'required|string|max:5000',
            'document'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx,xls|max:5120', // Max 5MB
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            // ✅ Step 3: Handle File Upload
            $documentPath = null;
            $fileName = null;
            
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $path = getPublicAssetPath('assets/documents');

                // Create directory if it doesn't exist
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }

                // Get file info BEFORE moving (temp file will be gone after move)
                $fileSize = $file->getSize();
                $fileMime = $file->getMimeType();
                $fileOriginalName = $file->getClientOriginalName();

                // Generate unique filename
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($path, $fileName);
                $documentPath = $fileName;

                Log::info('File uploaded via API', [
                    'filename' => $fileName,
                    'original_name' => $fileOriginalName,
                    'size' => $fileSize,
                    'mime' => $fileMime
                ]);
            }

            // ✅ Step 4: Save to Database
            $inquiry = Inquiry::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'subject'    => $request->subject,
                'message'    => $request->message,
                'document'   => $documentPath,
                'status'     => 'Pending',
            ]);

            // ✅ Step 5: Send Notification Email to Admin
            try {
                $adminEmail = env('ADMIN_EMAIL', 'websigntist@gmail.com');

                Mail::raw(
                    "New Contact Form Submission\n\n" .
                    "First Name: {$request->first_name}\n" .
                    "Last Name: {$request->last_name}\n" .
                    "Email: {$request->email}\n" .
                    "Phone: {$request->phone}\n" .
                    "Subject: {$request->subject}\n\n" .
                    "Message:\n{$request->message}\n\n" .
                    ($documentPath ? "Attachment: {$fileName}\n\n" : "") .
                    "---\n" .
                    "Submitted from: External Website\n" .
                    "IP Address: {$request->ip()}\n" .
                    "Date: " . now()->format('Y-m-d H:i:s'),
                    function ($message) use ($adminEmail, $request, $documentPath) {
                        $message->to($adminEmail)
                                ->subject('New Contact Form Submission - ' . $request->subject);
                        
                        // Attach file if present
                        if ($documentPath) {
                            $filePath = getPublicAssetPath('assets/documents/' . $documentPath);
                            if (file_exists($filePath)) {
                                $message->attach($filePath);
                            }
                        }
                    }
                );
            } catch (\Exception $e) {
                // Log email error but don't fail the API request
                Log::error('Failed to send contact form email: ' . $e->getMessage());
            }

            // ✅ Step 6: Log successful submission
            Log::info('Contact form submitted via API', [
                'inquiry_id' => $inquiry->id,
                'email' => $request->email,
                'ip' => $request->ip(),
                'has_document' => $documentPath ? true : false
            ]);

            // ✅ Step 7: Send JSON Response
            return response()->json([
                'success' => true,
                'message' => 'Your message has been received successfully. We will contact you soon!',
                'data'    => [
                    'inquiry_id' => $inquiry->id,
                    'status' => 'pending',
                    'document_uploaded' => $documentPath ? true : false
                ]
            ], 201);

        } catch (\Exception $e) {
            Log::error('Contact API error: ' . $e->getMessage(), [
                'request_data' => $request->except(['password']),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request. Please try again later.'
            ], 500);
        }
    }

    /**
     * Test endpoint to verify API is working
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function test(Request $request)
    {
        $apiKey = $request->header('X-API-KEY');

        if (empty($apiKey) || $apiKey !== $this->apiKey) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: Invalid or missing API Key'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'API is working correctly!',
            'timestamp' => now()->toDateTimeString(),
            'version' => '1.0'
        ]);
    }
}

