@extends('layouts.app')
@section('title', 'Privacy Policy')
@section('content')
    <main class="bg-slate-50">
        <section class="mx-auto max-w-5xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
            <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 bg-gradient-to-r from-slate-900 to-slate-700 px-6 py-8 text-gray-900 sm:px-10">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-Gray-700">McAsia Foodtrade Corporation</p>
                    <h1 class="mt-3 text-3xl font-bold sm:text-4xl">Privacy Policy</h1>
                </div>

                <div class="px-6 py-8 sm:px-10 sm:py-10">
                    <div class="max-w-none space-y-8 text-sm leading-7 text-slate-700 sm:text-base text-justify leading-l">
                        <section>
                            <h2 class="text-lg font-semibold text-slate-900">Data Privacy Clause</h2>
                            <p class="mt-3">
                                McAsia Foodtrade Corporation (&quot;the Company&quot;) is committed to protecting the privacy and security of
                                personal data in compliance with the Data Privacy Act of 2012, its Implementing Rules and
                                Regulations, and other applicable privacy laws and regulations. By engaging with the Company, you
                                acknowledge and consent that:
                            </p>
                        </section>

                        <ol class="space-y-6 pl-5 marker:font-semibold marker:text-slate-900">
                            <li>
                                <h3 class="inline font-semibold text-slate-900">Collection and Use of Personal Data</h3>
                                <p class="mt-2">
                                    The Company may collect, process, and store personal data, including but not limited to
                                    names, contact details, addresses, identification numbers, and other information necessary
                                    for legitimate business purposes.
                                </p>
                            </li>

                            <li>
                                <h3 class="inline font-semibold text-slate-900">Purpose of Processing</h3>
                                <p class="mt-2">
                                    Personal data shall be used only for purposes relevant to business operations, including but
                                    not limited to:
                                </p>
                                <ul class="mt-3 list-disc space-y-1 pl-5">
                                    <li>Contract fulfillment and service delivery</li>
                                    <li>Human resource</li>
                                    <li>Compliance with legal, regulatory, and contractual obligations</li>
                                    <li>Business planning, reporting, and auditing</li>
                                    <li>Communication of official notices, advisories, and updates</li>
                                </ul>
                            </li>

                            <li>
                                <h3 class="inline font-semibold text-slate-900">Data Sharing and Disclosure</h3>
                                <p class="mt-2">
                                    Personal data may be shared with third-party service providers, business partners,
                                    government agencies, and regulatory bodies only when necessary for the above purposes,
                                    subject to confidentiality agreements and legal safeguards.
                                </p>
                            </li>

                            <li>
                                <h3 class="inline font-semibold text-slate-900">Data Protection and Retention</h3>
                                <p class="mt-2">
                                    The Company shall implement reasonable organizational, physical, and technical measures to
                                    safeguard personal data against loss, unauthorized access, alteration, or disclosure.
                                    Personal data will be retained only for as long as necessary to fulfill the purposes stated
                                    above, or as required by applicable laws and regulations.
                                </p>
                            </li>

                            <li>
                                <h3 class="inline font-semibold text-slate-900">Rights of Data Subjects</h3>
                                <p class="mt-2">
                                    Data subjects have the right to access, correct, and update their personal data, as well as
                                    the right to withdraw consent, object to processing, or request data deletion in
                                    accordance with applicable laws. Requests may be coursed through McAsia Foodtrade
                                    Corporation Human Resources and forwarded to the IT Department upon approval.
                                </p>
                            </li>

                            <li>
                                <h3 class="inline font-semibold text-slate-900">Data Protection Officer Contact</h3>
                                <p class="mt-2">
                                    For any concerns or inquiries regarding personal data, you may contact the Company&apos;s IT Department.
                                </p>
                            </li>
                        </ol>

                        <section class="rounded-xl bg-slate-50 px-5 py-4 text-sm text-slate-600 ring-1 ring-inset ring-slate-200">
                            By continuing to engage with McAsia Foodtrade Corporation, you signify your understanding and
                            agreement to this Data Privacy Clause.
                        </section>
                    </div>
                </div>
            </article>
        </section>

        @include('components.footer')
    </main>
@endsection
