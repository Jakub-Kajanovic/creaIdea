<x-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 text-gray-900 my-2 rounded-2xl">
        <h1 class="text-2xl font-semibold mb-4">Verify Your Email</h1>
        <p class="mb-4 text-center text-gray-600">We’ve sent a verification link to your email. Please check your inbox.</p>
    
        @if (session('message'))
            <p class="mb-4 text-green-600">{{ session('message') }}</p>
        @endif
    
        <form method="POST" action="{{ route('verification.send') }}" class="flex flex-col items-center">
            @csrf
            <button type="submit" class="px-6 py-2 bg-gray-900 text-white rounded-full hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                Resend Email
            </button>
        </form>
    </div>    
</x-layout>