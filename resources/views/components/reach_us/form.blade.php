<div class="contact-card rounded-3xl p-5 sm:p-6 lg:p-7">
    <h3 class="text-2xl font-bold text-gray-800 mb-5">Contact Us</h3>

    @if (session('success'))
        <div
            class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        <form id="reach-us-form" action="{{ url('/send-mail') }}" method="POST" novalidate class="flex flex-col gap-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="first_name" class="block text-gray-700 font-medium mb-1">First
                        Name*</label>
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-red-500 focus:outline-none @error('first_name') field-error @enderror"
                           required>
                    @error('first_name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="middle_name" class="block text-gray-700 font-medium mb-1">Middle
                        Name</label>
                    <input type="text" id="middle_name" name="middle_name"
                           value="{{ old('middle_name') }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-red-500 focus:outline-none">
                </div>
                <div>
                    <label for="last_name" class="block text-gray-700 font-medium mb-1">Last
                        Name*</label>
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                           class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-red-500 focus:outline-none @error('last_name') field-error @enderror"
                           required>
                    @error('last_name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium mb-1">Email*</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-red-500 focus:outline-none @error('email') field-error @enderror"
                       required>
                @error('email')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone" class="block text-gray-700 font-medium mb-1">Phone (PH)*</label>
                <input type="tel" id="phone" name="phone" placeholder="+639XXXXXXXXX"
                       value="{{ old('phone') }}"
                       class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-red-500 focus:outline-none @error('phone') field-error @enderror"
                       required>
                @error('phone')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block text-gray-700 font-medium mb-1">Message*</label>
                <textarea id="message" name="message" rows="5"
                          class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-red-500 focus:outline-none @error('message') field-error @enderror"
                          placeholder="Write your message here..."
                          required>{{ old('message') }}</textarea>
                @error('message')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <button id="reach-us-submit-btn" type="submit"
                        class="w-full sm:w-auto bg-red-700 hover:bg-red-600 disabled:bg-gray-500 disabled:cursor-not-allowed text-white px-6 py-2.5 rounded-md transition-all duration-300">
                    <span id="reach-us-submit-text">Submit</span>
                </button>
            </div>
        </form>
    </div>

</div>
