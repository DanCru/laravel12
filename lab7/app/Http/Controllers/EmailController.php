<?php

namespace App\Http\Controllers;

use App\Mail\GuiEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

class EmailController extends Controller
{
    public function index()
    {
        return view('mail.index');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Giới hạn 2MB
        ]);

        try {
            Mail::to($request->email)->send(new GuiEmail(
                $request->title,
                $request->content,
                $request->file('file')
            ));

            return back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}