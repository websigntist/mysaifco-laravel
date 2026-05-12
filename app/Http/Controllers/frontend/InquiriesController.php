<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\frontend\Inquiry;
use Illuminate\Support\Facades\Validator;


class InquiriesController
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                // Validate input
                $validated = $request->validate([
                    'first_name' => 'required|string|max:255',
                    'last_name'  => 'required|string|max:255',
                    'email'      => 'required|email|max:255',
                    'phone'      => 'required|string|max:255',
                    'subject'    => 'required|string|max:255',
                    'message'    => 'nullable|string',
                    'document'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xlsx|max:2048',
                ]);

                // Handle file upload
                $fileName = null;
                if ($request->hasFile('document')) {
                    $file = $request->file('document');
                    $path = getPublicAssetPath('assets/documents');

                    if (!file_exists($path)) {
                        mkdir($path, 0755, true);
                    }

                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move($path, $fileName);
                    Log::info('File uploaded successfully: ' . $fileName);
                }

                // Save to database
                $inquiry = Inquiry::create([
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'email'      => $request->email,
                    'phone'      => $request->phone,
                    'subject'    => $request->subject,
                    'message'    => $request->message,
                    'document'   => $fileName,
                    'status'     => 'Pending',
                ]);

                // Send email
                $adminEmail = 'websigntist@gmail.com';
                Mail::send('frontend.email-message.contact', ['data' => $inquiry], function ($message) use ($inquiry,
                    $adminEmail, $fileName) {
                    $message->to($adminEmail)
                            ->cc($inquiry->email)
                            ->subject('New Contact Message: ' . $inquiry->subject);

                    if ($fileName) {
                        $path = getPublicAssetPath('assets/documents/' . $fileName);
                        if (file_exists($path)) {
                            $message->attach($path);
                        }
                    }
                });

                return redirect()->back()->with('success', 'Your message has been sent successfully!');

            } catch (\Exception $e) {
                Log::error('Contact form error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Something went wrong while sending your message.');
            }
        }

        return redirect()->back()->with('error', 'Invalid request method.');
    }
}
