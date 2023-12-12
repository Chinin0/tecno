@extends('adminlte::page')

@section('title')
    planes
@endsection

@section('stylesheets')
    @parent
@endsection

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="{{ asset('static/build/css/plans.css') }}">
        <title>Planes</title>

        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }

            .page-container {
                background-color: #fff;
                width: 100%;
                height: 100vh;
                overflow-y: scroll;
                padding: 20px;
            }
        </style>
    </head>

    <body>
        <div class="page-container">
            <h4>Plans</h4>
            <div class="tablabasic">
                <h2>Basic</h2>
                <h3>Your current plan</h3>
                <h3 id="tiempo">282 mins left</h5>
                    <h3 id="dias">Minutes reset in 28 days</h5>
                        <ul id="ulbasic">
                            <li id="item">AI meeting assistant records and transcribes in real time</li>
                            <li id="item">Joins Zoom, MS Teams, and Google Meet to automatically write and share notes
                            </li>
                            <li id="item">Automatically captures slides and generates meeting summaries</li>
                            <li id="item">300 monthly transcription minutes; 30 minutes per conversation; Import and
                                transcribe 3* audio
                                or video files
                                lifetime</li>
                        </ul>
                        <p></p>
            </div>
            <div class="contenedor">

                <div class="tabla">
                    <h2>Pro</h2>
                    <h3>For individuals and small teams who need more minutes and features</h3>
                    <h2 id="precio">$10 USD</h2>
                    <h3 id="userMonth">/user/month</h3>
                    <h3 id="userMonth">billed annually</h3>
                    <a href="/card" class="boton">Buy Now</a>
                    <ul>
                        <li id="item">Everything in Basic +</li>
                        <li id="item">Add teammates to your workspace (maximum of 5 paid seats)</li>
                        <li id="item">Team features: shared custom vocabulary; tag speakers; assign action items to
                            teammates</li>
                        <li id="item">Advanced search, export, and playback</li>
                        <li id="item">1200 monthly transcription minutes; 90 minutes per conversation</li>
                        <li id="item">Import and transcribe 10* audio or video files per month</li>
                    </ul>

                </div>
                <div class="tabla">
                    <h2>Business</h2>
                    <h3>For small teams and organizations that need to share & collaborate</h3>
                    <h2 id="precio">$20 USD</h2>
                    <h3 id="userMonth">/user/month</h3>
                    <h3 id="userMonth">billed annually</h3>
                    <a href="/cardBusiness" class="boton">Buy Now</a>
                    <ul>
                        <li id="item">Everything in Pro +</li>
                        <li id="item">Team features: shared custom vocabulary and speakers, assign action items to
                            teammates</li>
                        <li id="item">TJoins virtual meetings when you are triple booked</li>
                        <li id="item">Admin features: usage analytics, centralized billing, prioritized support</li>
                        <li id="item">6000 monthly transcription minutes; 4 hours per conversation</li>
                        <li id="item">Import and transcribe unlimited* audio or video files per month</li>
                    </ul>

                </div>
                <div class="tabla">
                    <h2>Enterprise</h2>
                    <h3>For large organizations that need additional security, control, and support</h3>
                    <a href="" class="boton" id="enterprise">Contact Sales</a>
                    <ul>
                        <li id="item">Everything in Business +</li>
                        <li id="item">Single Sign-On (SSO)</li>
                        <li id="item">Organization-wide deployment</li>
                        <li id="item">Domain capture</li>
                        <li id="item">Advanced security and compliance controls</li>
                    </ul>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection

@section('javascripts')
    @parent
    <!-- Chart.js -->
@endsection
