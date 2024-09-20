<div class="bg-gray-50 my-8 rounded-xl">
    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
        <div class="max-w-md w-full">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo-creaidea.svg') }}" alt="logo" class='w-40 mb-8 mx-auto block' />
            </a>
            <div class="p-8 rounded-2xl bg-white shadow">
                <h2 class="text-gray-800 text-center text-2xl font-bold">Register</h2>
                <form class="mt-8 space-y-4" method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name Field -->
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">User name</label>
                        <div class="relative flex items-center">
                            <input name="name" type="text" required
                                class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="Enter user name" value="{{ old('name') }}" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                            </svg>
                        </div>
                        @error('name')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">User email</label>
                        <div class="relative flex items-center">
                            <input name="email" type="email" required
                                class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="Enter user email" value="{{ old('email') }}" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                            </svg>
                        </div>
                        @error('email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Password</label>
                        <div class="relative flex items-center">
                            <input name="password" id="password" type="password" required
                                class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="Enter password" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128"
                                onclick="togglePassword('password')">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                    data-original="#000000"></path>
                            </svg>
                        </div>
                        @error('password')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label class="text-gray-800 text-sm mb-2 block">Confirm Password</label>
                        <div class="relative flex items-center">
                            <input name="password_confirmation" id="password_confirmation" type="password" required
                                class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                                placeholder="Confirm password" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128"
                                onclick="togglePassword('password_confirmation')">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                    data-original="#000000"></path>
                            </svg>
                        </div>
                        @error('password_confirmation')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Register Button -->
                    <div class="!mt-8">
                        <button type="submit"
                            class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-black hover:bg-transparent focus:outline-none">
                            Register
                        </button>
                    </div>
                    <p class="text-gray-800 text-sm !mt-8 text-center">Already have an account? <a
                            href="{{ route('login') }}"
                            class="text-black hover:underline ml-1 whitespace-nowrap font-semibold">Sign in here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to toggle password visibility
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        if (field.type === 'password') {
            field.type = 'text';
        } else {
            field.type = 'password';
        }
    }
</script>
