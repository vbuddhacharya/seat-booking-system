
@extends('layout.app')

@section('content')
<main class="flex flex-col h-full justify-center items-center">
    <div class="mx-auto w-1/3">
        <span class="font-bold text-2xl text-center w-full block">Login</span>
        <form action="{{route('login')}}" method="post" class="space-y-2">
            @csrf
            <x-form.input label="Email" name="email" type="email" placeholder="Eg. ram@gmail.com"/>
            <x-form.input label="Password" name="password" type="password" placeholder="Must have atleast 8 characters"/>
            <button class="button" type="submit">Confirm</button>
        </form>
    </div>
    <div class="w-full text-center mt-2">Dont have an account? <a href="{{route('register')}}" class="font-medium text underline">Register Account</a></div>
</main>
@endsection