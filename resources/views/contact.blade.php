@extends('layout.extra-layout')
@section('title')
<title>Contact</title>
@endsection


@section('dashboard-action')
<div class="big">
    <div class="page-about-header">
        <h1>Contact Us</h1>
        <p>We are avialible 24h / 24h and 7 Days / 7 Days</p>
    </div>
    <div class="section-contact_us">
        <div class="input-contact-us-group">
            <div class="title-contact">
                <h3>Contact Us</h3>
            </div>
            <div class="contact-us-form">
                <form action="">
                    <div class="contact-us-group-input">
                        <label for="email" class="contact-us-lable">Email</label>
                        <input type="email" name="email" class="contact-us-input">
                    </div>
                    <div class="contact-us-group-input">
                        <label for="email" class="contact-us-lable">Information:</label>
                        <textarea class="contact-us-input-textarea " name="contact_us_informaion"></textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="contact-us-about">
            <h4>learn more About OOPLink </h4>
            <a href="{{ route('about') }}">About Us</a>
        </div>
    </div>
</div>