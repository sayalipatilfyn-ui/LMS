@extends('layouts.app')

@section('title', 'Contact Us | MyLMS')

@section('content')

<!-- Hero -->
<section class="contact-hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We’d love to hear from you</p>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container two-column">

        <!-- Contact Info -->
        <div class="contact-info">
            <h2>Get in Touch</h2>
            <p>If you have any questions about courses, enrollment, or support, feel free to contact us.</p>

            <ul>
                <li><strong>Email:</strong> support@mylms.com</li>
                <li><strong>Phone:</strong> +91 98765 43210</li>
                <li><strong>Address:</strong> Mumbai, India</li>
            </ul>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <h2>Send a Message</h2>
            @if(session('success'))
                <p style="color: green; margin-bottom: 15px;">
                         {{ session('success') }}
                </p>
            @endif

                <form method="POST" action="{{ route('contact.add') }}">
                    @csrf

                    <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}">
                    @error('name') <small style="color:red">{{ $message }}</small> @enderror

                    <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}">
                    @error('email') <small style="color:red">{{ $message }}</small> @enderror

                    <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                    @error('subject') <small style="color:red">{{ $message }}</small> @enderror

                    <textarea name="message" rows="5" placeholder="Your Message">{{ old('message') }}</textarea>
                    @error('message') <small style="color:red">{{ $message }}</small> @enderror

                    <button type="submit" class="btn-primary">Send Message</button>
                </form> 
        </div>

    </div>
</section>

@endsection
