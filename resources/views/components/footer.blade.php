{{-- Footer --}}
<footer class="bg-gray-900 text-white relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center sm:text-left">
                <img src="{{ asset('images/McAsia_White_Red_Logo.png') }}" alt="McAsia Logo" class="w-36 h-auto mx-auto sm:mx-0 mb-4">
                <p class="text-sm leading-relaxed text-gray-200">
                    <strong>Main Office:</strong> 158 Apo St., Brgy. Sta Mesa Heights, Mahalika, Quezon City, Philippines, 1114<br>
                    <strong>Manila Office:</strong> (02) 8251-3625 loc 102<br>
                    <strong>Cebu Office (Fax):</strong> 0917-624-9442
                </p>
            </div>

            <div class="text-center sm:text-left">
                <h4 class="font-semibold text-lg mb-3">Links</h4>
                <div class="space-y-2">
                    <a href="/" class="block hover:text-gray-300 transition">Home</a>
                    <a href="/privacy_policy" class="block hover:text-gray-300 transition">Privacy Policy</a>
                    <a href="/termsandcondition" class="block hover:text-gray-300 transition">Terms and Conditions</a>
                </div>
            </div>

            <div class="text-center sm:text-left">
                <h4 class="font-semibold text-lg mb-3">Email Us</h4>
                <div class="space-y-3">
                    <a href="mailto:sales@mcasiafoodtrade.ph" class="flex items-center justify-center sm:justify-start gap-2 hover:text-gray-300 transition">
                        <img src="{{ asset('images/FOOTER ICON/email_us.png') }}" alt="Email icon" class="w-8 h-8 object-contain">
                        <span class="text-sm">sales@mcasiafoodtrade.ph</span>
                    </a>
                    <a href="mailto:purchasing@mcasiafoodtrade.ph" class="flex items-center justify-center sm:justify-start gap-2 hover:text-gray-300 transition">
                        <img src="{{ asset('images/FOOTER ICON/email_us.png') }}" alt="Email icon" class="w-8 h-8 object-contain">
                        <span class="text-sm">purchasing@mcasiafoodtrade.ph</span>
                    </a>
                </div>
            </div>

            <div class="text-center sm:text-left">
                <h4 class="font-semibold text-lg mb-3">Follow Us</h4>
                <div class="flex justify-center sm:justify-start gap-3">
                    <a href="https://www.facebook.com/mcasiafoodtrade" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 flex items-center justify-center bg-white/15 rounded-full hover:bg-white/30 transition">
                        <img src="{{ asset('images/facebook_icon.png') }}" alt="Facebook" class="w-5 h-5 object-contain">
                    </a>
                    <a href="https://www.linkedin.com/company/mcasia-foodtrade-corporation?originalSubdomain=ph" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 flex items-center justify-center bg-white/15 rounded-full hover:bg-white/30 transition">
                        <img src="{{ asset('images/linkedin_icon.png') }}" alt="LinkedIn" class="w-5 h-5 object-contain">
                    </a>
                    <a href="https://www.youtube.com/@mcasiamartphilippines" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 flex items-center justify-center bg-white/15 rounded-full hover:bg-white/30 transition">
                        <img src="{{ asset('images/youtube_icon.png') }}" alt="YouTube" class="w-5 h-5 object-contain">
                    </a>
                    <a href="https://www.instagram.com/mcasiafoodtradecorp" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 flex items-center justify-center bg-white/15 rounded-full hover:bg-white/30 transition">
                        <img src="{{ asset('images/instagram_icon.png') }}" alt="Instagram" class="w-5 h-5 object-contain">
                    </a>
                    <a href="https://www.tiktok.com/@mcasiafoodtrade_" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 flex items-center justify-center bg-white/15 rounded-full hover:bg-white/30 transition">
                        <img src="{{ asset('images/tiktok_icon.png') }}" alt="TikTok" class="w-5 h-5 object-contain">
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-white/20 mt-8 pt-4 text-center text-gray-300 text-sm">
            &copy; {{ date('Y') }} MCASIA FOODTRADE CORPORATION
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
