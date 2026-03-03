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
        <div class="pt-20 lg:pt-32"></div>

        <section class="partnership-hero relative h-[34vh] sm:h-[44vh] lg:h-[56vh] overflow-hidden">
            <img src="{{ asset('images/partnership/banner.png') }}" alt="Partnership"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="relative z-10 h-full flex items-center justify-center text-center px-4 sm:px-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-white">Partnership</h1>
                    {{-- <p class="text-white/90 mt-3 text-sm sm:text-base lg:text-lg max-w-2xl mx-auto">
                        Submit your partnership details and our team will get in touch with you.
                    </p> --}}
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

                <form id="partnerForm" class="space-y-6">
                    <div>
                        <label class="font-semibold text-gray-700" for="name">Name</label>
                        <input type="text" id="name" name="name" class="w-full mt-1 p-3 border border-gray-300 rounded-xl"
                            placeholder="Enter full name">
                        <p id="name_error" class="hidden mt-1 text-xs text-red-600"></p>
                    </div>

                    <div class="space-y-4">
                        <label class="font-semibold text-gray-700">Address</label>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-600 text-sm" for="blk_no">Block #</label>
                                <input type="text" id="blk_no" name="blk_no"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="Blk #">
                            </div>
                            <div>
                                <label class="text-gray-600 text-sm" for="street">Street</label>
                                <input type="text" id="street" name="street"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="Street name">
                                <p id="street_error" class="hidden mt-1 text-xs text-red-600"></p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-600 text-sm" for="barangay">Barangay</label>
                                <input type="text" id="barangay" name="barangay"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="Barangay">
                                <p id="barangay_error" class="hidden mt-1 text-xs text-red-600"></p>
                            </div>
                            <div>
                                <label class="text-gray-600 text-sm" for="subdivision">Subdivision</label>
                                <input type="text" id="subdivision" name="subdivision"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl"
                                    placeholder="Subdivision (optional)">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="text-gray-600 text-sm" for="country">Country</label>
                                <select id="country" name="country"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl">
                                    <option value="">Loading...</option>
                                </select>
                                <p id="country_error" class="hidden mt-1 text-xs text-red-600"></p>
                            </div>
                            <div>
                                <label class="text-gray-600 text-sm" for="zip_code">Zip Code</label>
                                <input type="text" id="zip_code" name="zip_code"
                                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="Zip code">
                                <p id="zip_code_error" class="hidden mt-1 text-xs text-red-600"></p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="font-semibold text-gray-700" for="mobile_number">Mobile Number</label>
                            <input type="text" id="mobile_number" name="mobile_number"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-xl"
                                placeholder="+639XXXXXXXXX or 09XXXXXXXXX">
                            <p id="mobile_number_error" class="hidden mt-1 text-xs text-red-600"></p>
                        </div>
                        <div>
                            <label class="font-semibold text-gray-700" for="landline_number">Landline Number</label>
                            <input type="text" id="landline_number" name="landline_number"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="(Optional)">
                        </div>
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700" for="business_name">Business Name</label>
                        <input type="text" id="business_name" name="business_name"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="Enter business name">
                        <p id="business_name_error" class="hidden mt-1 text-xs text-red-600"></p>
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700" for="business_address">Business Address</label>
                        <input type="text" id="business_address" name="business_address"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-xl"
                            placeholder="Complete business address">
                        <p id="business_address_error" class="hidden mt-1 text-xs text-red-600"></p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="font-semibold text-gray-700" for="business_number">Business Number</label>
                            <input type="text" id="business_number" name="business_number"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="Telephone / Mobile">
                        </div>
                        <div>
                            <label class="font-semibold text-gray-700" for="business_website">Business Website</label>
                            <input type="text" id="business_website" name="business_website"
                                class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="https://">
                        </div>
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700" for="business_email">Business Email Address</label>
                        <input type="email" id="business_email" name="business_email"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-xl" placeholder="email@company.com">
                        <p id="business_email_error" class="hidden mt-1 text-xs text-red-600"></p>
                    </div>

                    <div class="pt-2">
                        <button type="button" id="submitBtn"
                            class="w-full sm:w-auto bg-black hover:bg-yellow-700 text-white px-6 py-2.5 rounded-md transition-all duration-300">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </section>

        @include('components.footer')
    </main>

    <script>
        $("#submitBtn").on("click", function (e) {
            e.preventDefault();

            const name = $("#name").val().trim();
            const blk_no = $("#blk_no").val().trim();
            const street = $("#street").val().trim();
            const barangay = $("#barangay").val().trim();
            const subdivision = $("#subdivision").val().trim();
            const country = $("#country").val().trim();
            const zip_code = $("#zip_code").val().trim();
            const mobile_number = $("#mobile_number").val().trim();
            const landline_number = $("#landline_number").val().trim();
            const business_name = $("#business_name").val().trim();
            const business_address = $("#business_address").val().trim();
            const business_number = $("#business_number").val().trim();
            const business_website = $("#business_website").val().trim();
            const business_email = $("#business_email").val().trim();

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const mobileRegex = /^(\+63|0)9\d{9}$/;

            const clearFieldError = (id) => {
                $(`#${id}`).removeClass("field-error");
                $(`#${id}_error`).text("").addClass("hidden");
            };

            const showFieldError = (id, text) => {
                $(`#${id}`).addClass("field-error");
                $(`#${id}_error`).text(text).removeClass("hidden");
            };

            ["name", "street", "barangay", "country", "zip_code", "mobile_number", "business_name", "business_address", "business_email"].forEach(clearFieldError);

            let hasError = false;

            if (name === '') {
                showFieldError("name", "Full name is required.");
                hasError = true;
            }
            if (street === '') {
                showFieldError("street", "Street is required.");
                hasError = true;
            }
            if (barangay === '') {
                showFieldError("barangay", "Barangay is required.");
                hasError = true;
            }
            if (country === '') {
                showFieldError("country", "Country is required.");
                hasError = true;
            }
            if (zip_code === '') {
                showFieldError("zip_code", "ZIP Code is required.");
                hasError = true;
            }
            if (mobile_number === '') {
                showFieldError("mobile_number", "Mobile number is required.");
                hasError = true;
            } else if (!mobileRegex.test(mobile_number)) {
                showFieldError("mobile_number", "Use +639XXXXXXXXX or 09XXXXXXXXX format.");
                hasError = true;
            }
            if (business_name === '') {
                showFieldError("business_name", "Business name is required.");
                hasError = true;
            }
            if (business_address === '') {
                showFieldError("business_address", "Business address is required.");
                hasError = true;
            }
            if (business_email === '') {
                showFieldError("business_email", "Business email is required.");
                hasError = true;
            } else if (!emailRegex.test(business_email)) {
                showFieldError("business_email", "Business email is not valid.");
                hasError = true;
            }

            if (hasError) {
                Swal.fire('Error', 'Please fix the highlighted fields.', 'error');
                return false;
            }

            Swal.fire({
                title: 'Please wait...',
                html: 'Submitting your form',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const data = {
                name: name,
                blk_no: blk_no,
                street: street,
                barangay: barangay,
                subdivision: subdivision,
                country: country,
                zip_code: zip_code,
                mobile_number: mobile_number,
                landline_number: landline_number,
                business_name: business_name,
                business_address: business_address,
                business_number: business_number,
                business_website: business_website,
                business_email: business_email,
                _token: "{{ csrf_token() }}"
            };

            $.ajax({
                url: "/partnership/submit",
                type: "POST",
                data: data,
                success: function () {
                    Swal.close();
                    Swal.fire({
                        title: "Success",
                        text: "The data information has been sent and recorded.",
                        icon: "success"
                    });

                    $("#partnerForm")[0].reset();
                    $("#country").val("Philippines");
                    ["name", "street", "barangay", "country", "zip_code", "mobile_number", "business_name", "business_address", "business_email"].forEach(clearFieldError);
                },
                error: function (xhr) {
                    Swal.close();
                    Swal.fire('Error', 'Something went wrong. Please try again.', 'error');
                    console.log(xhr.responseText);
                }
            });
        });

        $("#name, #street, #barangay, #country, #zip_code, #mobile_number, #business_name, #business_address, #business_email").on("input change", function () {
            const id = $(this).attr("id");
            $(this).removeClass("field-error");
            $(`#${id}_error`).text("").addClass("hidden");
        });
    </script>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "https://countriesnow.space/api/v0.1/countries/positions",
                method: "GET",
                success: function (response) {
                    $("#country").empty();

                    let countries = response.data;
                    countries.sort((a, b) => a.name.localeCompare(b.name));

                    countries.forEach(function (country) {
                        $("#country").append(`<option value="${country.name}">${country.name}</option>`);
                    });

                    $("#country").val("Philippines");
                },
                error: function () {
                    $("#country").html(`<option value="">Failed to load countries</option>`);
                }
            });
        });
    </script>
@endsection
