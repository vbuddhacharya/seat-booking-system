
@extends('layout.app')
@php
    $value="Name"
@endphp
@section('content')
    <main class="flex h-full justify-center items-center">
        <div class="mx-auto w-1/3 pt">
            <span class="font-bold text-2xl text-center w-full block">Register</span>
            <form action="{{ route('create') }}" method="post" class="space-y-2">
                @csrf
                <x-form.input :label="$value" name="name" helper="Enter your full name."/>
                <x-form.input label="Contact" name="contact" helper="Contact must be of 10 digits." type="contact"/>
                <x-form.input label="Email" name="email" helper="Enter a valid email address." type="email"/>
                <x-form.input label="Password" name="password" helper="Password must be at least 8 characters." type="password"/>
                <button class="button" type="submit">Create Account</button>
                <div class="w-full text-center mt-2"><span>Already have an account? </span><a href="{{route('login')}}" class="font-medium text underline">Login</a></div>
            </form>
        </div>
    </main>
@endsection
