@extends('layouts.app')
@section('title', 'Privacy Policy')
@section('content')

<div class="min-h-screen bg-gray-50 py-16 px-4 sm:px-6 lg:px-20">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8 sm:p-12">
        
        <!-- Header -->
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center sm:text-left">
            Privacy Policy
        </h1>
        
        <!-- Introduction -->
        <p class="text-gray-700 mb-4">
            <span class="font-semibold">Data Privacy Clause</span><br>
            McAsia Foodtrade Corporation (“the Company”) is committed to protecting the privacy and security of personal data in compliance with the Data Privacy Act of 2012, its Implementing Rules and Regulations, and other applicable privacy laws and regulations. By engaging with the Company, you acknowledge and consent that:
        </p>

        <!-- Sections -->
        <ol class="list-decimal list-inside space-y-4 text-gray-700">
            <li>
                <span class="font-semibold">Collection and Use of Personal Data</span><br>
                The Company may collect, process, and store personal data, including but not limited to names, contact details, addresses, identification numbers, and other information necessary for legitimate business purposes.
            </li>

            <li>
                <span class="font-semibold">Purpose of Processing</span><br>
                Personal data shall be used only for purposes relevant to business operations, including but not limited to:
                <ul class="list-disc list-inside ml-5 mt-2 space-y-1 text-gray-700">
                    <li>Contract fulfillment and service delivery</li>
                    <li>Human resource</li>
                    <li>Compliance with legal, regulatory, and contractual obligations</li>
                    <li>Business planning, reporting, and auditing</li>
                    <li>Communication of official notices, advisories, and updates</li>
                </ul>
            </li>

            <li>
                <span class="font-semibold">Data Sharing and Disclosure</span><br>
                Personal data may be shared with third-party service providers, business partners, government agencies, and regulatory bodies only when necessary for the above purposes, subject to confidentiality agreements and legal safeguards.
            </li>

            <li>
                <span class="font-semibold">Data Protection and Retention</span><br>
                The Company shall implement reasonable organizational, physical, and technical measures to safeguard personal data against loss, unauthorized access, alteration, or disclosure. Personal data will be retained only for as long as necessary to fulfill the purposes stated above, or as required by applicable laws and regulations.
            </li>

            <li>
                <span class="font-semibold">Rights of Data Subjects</span><br>
                Data subjects have the right to access, correct, and update their personal data, as well as the right to withdraw consent, object to processing, or request data deletion in accordance with applicable laws. Requests may be coursed through McAsia Foodtrade Corporation Human Resources and forwarded to the IT Department upon approval.
            </li>

            <li>
                <span class="font-semibold">Data Protection Officer Contact</span><br>
                For any concerns or inquiries regarding personal data, you may contact the Company’s IT Department.
            </li>
        </ol>

        <!-- Footer Note -->
        <p class="text-gray-600 mt-6 text-sm">
            By continuing to engage with McAsia Foodtrade Corporation, you signify your understanding and agreement to this Data Privacy Clause.
        </p>
    </div>
</div>
@include('components.footer')
@endsection
