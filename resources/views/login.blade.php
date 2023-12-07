@extends('welcome')
@section('view')

<div class="container">
    <div class="flex flex-col justify-center items-center" style="min-height:70vh;">
        @if(session('success'))
            <div class="text-sm text-green-500">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="text-sm text-red-500">
                {{ session('error') }}
            </div>
        @endif
        <div class="relative flex flex-col text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
            <h4 class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
              Login
            </h4>
            <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
              Nice to meet you! Enter your details to register.
            </p>
            <form method="post" action="{{route('login')}}" class="max-w-screen-lg mt-8 mb-2 ">
                @csrf
             <div class="grid grid-cols-1 gap-4">
                  <div class="w-72">
                    <div class="relative w-full min-w-[200px] h-10">
                      <input
                      type="email"
                      name="email"
                        class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900"
                        placeholder=" " /><label
                        class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900">
                        Email
                      </label>
                    </div>
                    @if($errors && $errors->has('email'))
                    <span class="test-sm text-red-500">{{$errors->first('email')}}</span>
                    @endif
                  </div>  
                  <div class="w-72">
                    <div class="relative w-full min-w-[200px] h-10">
                      <input
                      type="password"
                      name="password"
                        class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-gray-900"
                        placeholder=" " /><label
                        class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[3.75] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900">
                        Password
                      </label>
                    </div>
                    @if($errors && $errors->has('password'))
                    <span class="test-sm text-red-500">{{$errors->first('password')}}</span>
                    @endif
                  </div>                                                                                                        
             </div>
              <button
                class="mt-6 block w-full select-none rounded-lg bg-gray-900 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="submit">
                Login
              </button>
              <p class="block mt-4 font-sans text-base antialiased font-normal leading-relaxed text-center text-gray-700">
                Don't have an account?
                <a href="{{route('register')}}" class="font-medium text-gray-900">
                  Sign Up
                </a>
              </p>
            </form>
        </div>  
    </div>
</div>
@endsection