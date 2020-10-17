<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;
use Request as IpRequest;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mails.index');
    }

    public function fetchmails () {
        //logic to fetch mails using imap
        if (! function_exists('imap_open')) {
            echo "IMAP is not configured.";
            exit();
        } else {
            $connection = imap_open('{imap.gmail.com:993/imap/ssl}INBOX', 'sajithsocedge@gmail.com', 'sajith123*') or die('Cannot connect to Gmail: ' . imap_last_error());

            $emailData = imap_search($connection, 'SUBJECT "contest"');
            if (! empty($emailData)) {
                $insert = array();
                foreach ($emailData as $emailIdent) {
                    $overview = imap_fetch_overview($connection, $emailIdent, 0);
                    $message = imap_fetchbody($connection, $emailIdent, '1.1');
                    $messageExcerpt = substr($message, 0, 150);
                    $partialMessage = trim(quoted_printable_decode($messageExcerpt)); 
                    $date = date("d F, Y", strtotime($overview[0]->date));

                    $insert[]['content']    = $message;
                    $insert[]['subject']    = $overview[0]->subject;
                    $insert[]['from']       = $overview[0]->from;
                    $insert[]['message_id'] = $overview[0]->message_id;
                    $insert[]['date'] = $date;
                    $insert['created_by'] = auth()->user()->id;
                    $insert['ip_address'] = IpRequest::ip();

                
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
