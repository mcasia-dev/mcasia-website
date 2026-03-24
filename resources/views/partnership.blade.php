@extends('layouts.app')
@section('title', 'McAsia - Partnership')
@section('content')

    <style>
        .partnership-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.35));
        }

        .form-card {
            border: 1px solid #e5e7eb;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.08);
        }

        .field-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.15);
        }
    </style>

    <main class="w-full overflow-x-hidden">
        <section class="partnership-hero relative h-[34vh] sm:h-[44vh] lg:h-[56vh] overflow-hidden">
            <img src="{{ asset('images/partnership/banner.png') }}" alt="Partnership"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="relative z-10 h-full flex items-center justify-center text-center px-4 sm:px-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-white">Partnership</h1>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-14 lg:py-16">
            <div class="max-w-4xl mx-auto form-card rounded-2xl p-5 sm:p-7 lg:p-10">
                <div class="flex items-center justify-between gap-4 mb-6">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">Partners Information Sheet</h2>
                    <a href="#" onclick="history.back(); return false;"
                        class="inline-flex items-center gap-2 text-sm sm:text-base text-gray-700 hover:text-red-600 transition-colors">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Back</span>
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="partnership-form" action="{{ url('/partnership/submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="font-semibold text-gray-700" for="name">Name*</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-xl @error('name') field-error @enderror"
                            placeholder="Enter full name">
                        @error('name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-4">
                        <label class="font-semibold text-gray-700">Address</label>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-600 text-sm" for="blk_no">Block #</label>
                                <input type="text" id="blk_no" name="blk_no" value="{{ old('blk_no') }}"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="Blk #">
                            </div>
                            <div>
                                <label class="text-gray-600 text-sm" for="street">Street*</label>
                                <input type="text" id="street" name="street" value="{{ old('street') }}"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl @error('street') field-error @enderror"
                                    placeholder="Street name">
                                @error('street')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-600 text-sm" for="barangay">Barangay*</label>
                                <input type="text" id="barangay" name="barangay" value="{{ old('barangay') }}"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl @error('barangay') field-error @enderror"
                                    placeholder="Barangay">
                                @error('barangay')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="text-gray-600 text-sm" for="subdivision">Subdivision</label>
                                <input type="text" id="subdivision" name="subdivision" value="{{ old('subdivision') }}"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl"
                                    placeholder="Subdivision (optional)">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-600 text-sm" for="country">Country*</label>
                                <select id="country" name="country"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl @error('country') field-error @enderror"
                                    data-old="{{ old('country', 'Philippines') }}">
                                    <option value="">Loading...</option>
                                </select>
                                @error('country')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="text-gray-600 text-sm" for="zip_code">Zip Code*</label>
                                <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl @error('zip_code') field-error @enderror"
                                    placeholder="Zip code">
                                @error('zip_code')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="font-semibold text-gray-700" for="mobile_number">Mobile Number*</label>
                            <input type="text" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-xl @error('mobile_number') field-error @enderror"
                                placeholder="+639XXXXXXXXX or 09XXXXXXXXX">
                            @error('mobile_number')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="font-semibold text-gray-700" for="landline_number">Landline Number</label>
                            <input type="text" id="landline_number" name="landline_number" value="{{ old('landline_number') }}"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="(Optional)">
                        </div>
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700" for="business_name">Business Name*</label>
                        <input type="text" id="business_name" name="business_name" value="{{ old('business_name') }}"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-xl @error('business_name') field-error @enderror"
                            placeholder="Enter business name">
                        @error('business_name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700" for="business_address">Business Address*</label>
                        <input type="text" id="business_address" name="business_address" value="{{ old('business_address') }}"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-xl @error('business_address') field-error @enderror"
                            placeholder="Complete business address">
                        @error('business_address')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="font-semibold text-gray-700" for="business_number">Business Number</label>
                            <input type="text" id="business_number" name="business_number" value="{{ old('business_number') }}"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="Telephone / Mobile">
                        </div>
                        <div>
                            <label class="font-semibold text-gray-700" for="business_website">Business Website</label>
                            <input type="text" id="business_website" name="business_website" value="{{ old('business_website') }}"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="https://">
                        </div>
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700" for="business_email">Business Email Address*</label>
                        <input type="email" id="business_email" name="business_email" value="{{ old('business_email') }}"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-xl @error('business_email') field-error @enderror"
                            placeholder="email@company.com">
                        @error('business_email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-2">
                        <button id="partnership-submit-btn" type="submit"
                            class="w-full sm:w-auto bg-black hover:bg-yellow-700 disabled:bg-gray-500 disabled:cursor-not-allowed text-white px-6 py-2.5 rounded-md transition-all duration-300">
                            <span id="partnership-submit-text">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        @include('components.footer')
    </main>

    <script>
        const partnershipForm = document.getElementById('partnership-form');
        const partnershipSubmitBtn = document.getElementById('partnership-submit-btn');
        const partnershipSubmitText = document.getElementById('partnership-submit-text');

        $(document).ready(function () {
            $.ajax({
                url: "https://countriesnow.space/api/v0.1/countries/positions",
                method: "GET",
                success: function (response) {
                    const $country = $("#country");
                    const oldCountry = $country.data("old") || "Philippines";
                    $country.empty();

                    let countries = response.data || [];
                    countries.sort((a, b) => a.name.localeCompare(b.name));

                    countries.forEach(function (country) {
                        $country.append(`<option value="${country.name}">${country.name}</option>`);
                    });

                    $country.val(oldCountry);
                },
                error: function () {
                    $("#country").html(`<option value="">Failed to load countries</option>`);
                }
            });
        });

        if (partnershipForm && partnershipSubmitBtn && partnershipSubmitText) {
            let isSubmitting = false;

            partnershipForm.addEventListener('submit', (event) => {
                if (isSubmitting) {
                    event.preventDefault();
                    return;
                }

                isSubmitting = true;
                partnershipSubmitBtn.disabled = true;
                partnershipSubmitText.textContent = 'Submitting...';
            });
        }
    </script>
@endsection
