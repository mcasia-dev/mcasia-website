
{{-- Footer --}}
<footer class="bg-gray-900 text-white relative z-20">
<div class="w-screen px-6 md:px-12 py-12 grid grid-cols-1 md:grid-cols-4 gap-6 md:gap-8">

        {{------------------------------------------Logo & About---------------------------}}
        <div class="flex flex-col space-y-4 items-center md:items-start text-center md:text-left">
            <img src="{{ asset('images/McAsia_White_Red_Logo.png') }}" alt="Logo" class="w-36 h-auto">

                  <p class="text-sm">
            <strong>Main Office:</strong> 158 Apo St., Brgy. Sta Mesa Heights, Mahalika, Quezon City, Philippines, 1114<br>
            <strong>Manila Office:</strong> (02) 8251-3625 loc 102<br>
            <strong>Cebu Office (Fax):</strong> 0917-624-9442
        </p>


        </div>

        
  
        {{----------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
        {{-- Related Links --}}
        <div class="flex flex-col space-y-2 text-center md:text-left">
            <h4 class="font-semibold text-lg mb-2">Links</h4>
            <a href="/" class="hover:text-gray-200 transition">Home</a>
            <a href="/privacy_policy" class="hover:text-gray-200 transition">Privacy Policy</a>
            <a href="/termsandcondition" class="hover:text-gray-200 transition">Terms and Condition</a>
        </div>

        {{-- Contact Info --}}
        <div class="flex flex-col space-y-2 text-center md:text-left">
        <h4 class="font-semibold text-lg mb-2">Email Us</h4>
  
        <div class="flex items-center justify-center md:justify-start gap-2">
        <img src="/images/FOOTER ICON/email_us.png" alt="Email Icon" class="w-10 h-10">
        <p>sales@mcasiafoodtrade.ph</p>
        </div>
  
        <div class="flex items-center justify-center md:justify-start gap-2">
        <img src="/images/FOOTER ICON/email_us.png" alt="Email Icon" class="w-10 h-10">
        <p>purchasing@mcasiafoodtrade.ph</p>
        </div>
        </div>

          <!-- Social Links Column -->
    <div class="flex flex-col space-y-2 text-center md:text-left">
        <h4 class="font-semibold text-lg mb-2">Follow Us</h4>
        <div class="flex justify-center md:justify-start space-x-4">


            <a href="https://www.facebook.com/mcasiafoodtrade" target="_blank" 
               class="w-10 h-10 flex items-center justify-center bg-white/20 rounded-full hover:bg-white/40 transition overflow-hidden">
               <img src="/images/facebook_icon.png" alt="Facebook" class="w-[200%] h-[200%] object-contain">
            </a>

            <a href="https://www.linkedin.com/company/mcasia-foodtrade-corporation?originalSubdomain=ph" target="_blank" 
               class="w-10 h-10 flex items-center justify-center bg-white/20 rounded-full hover:bg-white/40 transition overflow-hidden">
               <img src="/images/linkedin_icon.png" alt="Facebook" class="w-[200%] h-[200%] object-contain">
            </a>


            <a href="https://www.youtube.com/@mcasiamartphilippines" target="_blank" 
               class="w-10 h-10 flex items-center justify-center bg-white/20 rounded-full hover:bg-white/40 transition overflow-hidden">
            <img src="/images/youtube_icon.png" alt="YouTube" class="w-[200%] h-[200%] object-cover">
            </a>

            
            <a href="https://www.instagram.com/mcasiafoodtradecorp" target="_blank" 
               class="w-10 h-10 flex items-center justify-center bg-white/20 rounded-full hover:bg-white/40 transition overflow-hidden">
               <img src="/images/instagram_icon.png" alt="Instagram" class="w-full h-full object-contain">
            </a>

            <a href="https://www.tiktok.com/@mcasiafoodtrade_" target="_blank" 
               class="w-10 h-10 flex items-center justify-center bg-white/20 rounded-full hover:bg-white/40 transition overflow-hidden">
               <img src="/images/tiktok_icon.png" alt="TikTok" class="w-full h-full object-fill">
            </a>

        </div>
    </div>
    </div>

    {{-- Copyright --}}
    <div class="border-t border-white/20 mt-6 pt-4 text-center text-gray-300 text-sm">
        &copy; {{ date('Y') }} MCASIA FOODTRADE CORPORATION
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
