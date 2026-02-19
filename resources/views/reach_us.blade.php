    @extends('layouts.app')
    @section('title', 'McAsia')
    @section('content')

<style>
        body.fade-in {
            opacity: 1;
        }

        /* Fade-in animation for sections */
        .fade-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }
        .fade-section.visible {
            opacity: 1;
            transform: translateY(0);
        }





/*-------------Viewing for Monitor going 2k - 4k resolution----------*/
    @media (min-width: 1440px) {
    .content-wrapper {
      margin-left: -17rem; /* Move content slightly right */
      margin-top: 8rem; /* Optional vertical offset */
      }

 

    .image_slideshow
    {

        height: 190%;
        width: 100%;
        object-fit: contain;

    }



    .image_cover
    {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    }


/*---------------------------------------------------------------------*/



/*------------------------Smaller Screens-----------------------------*/
@media (min-width: 641px) and (max-width: 1439px) 
{

    
  .image_slideshow
    {

        height: 190%;
        width: 100%;
        object-fit: contain;

    }



    .image_cover
    {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }




}
/*-------------------------------------------------------------------*/








  /*--------------------Mobile Resolution-------------*/
  @media (max-width: 414px) {
  .image_slideshow
  {
    height: 23rem;
    margin-top: 2%;
  }


  .content_text
  {
    margin-top: -110%;
  }

  .partnership
  {
    margin-top: 10%;
  }

  .image_cover
  {
    height: 25rem;
    width: 28rem;

  }

    /* Make Google Maps fully responsive */
  iframe {
    width: 100% !important;
    height: 250px !important;
    border: 0 !important;
    display: block;
    margin: 0 auto;
  }




  }
  /*-------------------------------------------------*/




















</style>




    <div class="reach_us relative overflow-hidden min-h-screen">

  {{-- Hero Section --}}
<section class="relative h-screen overflow-hidden"> {{-- Reduced height --}}
<img src="{{ asset('images/HOMEPAGE/4.jpg') }}" 
     alt="Background" 
     class="image_cover">


</section>


<!-----------------------------------ABOUT US SECTION--------------------------------------------------------->
<section class="content_text max-w-7xl mx-auto px-4 py-12 space-y-10">
    <!-- Intro Section -->
    <div class="fade-section">
    <h2 class="text-2xl font-bold text-gray-900">Reach Us</h2>
    </div>

    <div class="fade-section">
    <p class="text-gray-600 leading-relaxed text-justify">
    At <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>, we value meaningful connections with our partners, clients, and customers. Whether you’re a supplier looking to collaborate, a retailer interested in our brands, or a customer with an inquiry, our team is ready to assist you.    
    </p>
    </div>


    <div class="fade-section">
    <p class="text-gray-600 leading-relaxed text-justify">
     We believe that open communication is key to lasting partnerships. Our dedicated representatives are here to provide support, answer your questions, and explore opportunities that align with your business needs.    
    </p>
    </div>



        <div class="fade-section">
        <p class="text-gray-600 leading-relaxed text-justify">
        Let’s build something great together. Reach us today.        
        </p>
        </div>

        <br>

    <a href="#" onclick="history.back(); return false;"
   class="btn btn-outline-light d-inline-flex align-items-center gap-2 -px-6 py-2"
   style="font-size: 16px;">

    <i class="fa-solid fa-arrow-left"></i>
    <span>Back</span>
</a>

        <center><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.4398514532104!2d120.99464470973412!3d14.630955576275623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b664691d8169%3A0xa01ff34f48ad9591!2sMcAsia%20Foodtrade%20Corporation!5e0!3m2!1sen!2sph!4v1762934600495!5m2!1sen!2sph" 
            width="600" 
            height="450"

            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe></center>



</section>
<!------------------------------------------------------------------------------------------------------------------------------->








<!-----------------------------------ABOUT US SECTION--------------------------------------------------------->
<section class="max-w-7xl mx-auto px-4 py-12 space-y-10">


      <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Contact Us</h2>
      
      <div class="rounded-lg overflow-hidden shadow-lg bg-gray-50 p-8 max-w-2xl mx-auto">
          <!-- Name Fields -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
              <label for="first_name" class="block text-gray-700 font-medium mb-1">First Name</label>
              <input type="text" id="first_name" name="first_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required>
            </div>
            <div>
              <label for="middle_name" class="block text-gray-700 font-medium mb-1">Middle Name</label>
              <input type="text" id="middle_name" name="middle_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
            </div>
            <div>
              <label for="last_name" class="block text-gray-700 font-medium mb-1">Last Name</label>
              <input type="text" id="last_name" name="last_name" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required>
            </div>
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" required>
          </div>

          <!-- Phone -->
          <div>
            <label for="phone" class="block text-gray-700 font-medium mb-1">Phone (PH)</label>
            <input type="number" 
            id="phone" 
            name="phone" 
            placeholder="+639XXXXXXXXX" 
            pattern="^\+?\d*$" 
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" 
            required>          
          </div>

          <!-- Message -->
           <div>
            <label for="message" class="block text-gray-700 font-medium mb-1">Message</label>
            <textarea id="message" name="message" rows="4" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none" placeholder="Write your message here..." required></textarea>
          </div>

          <!-- Submit Button -->
          <div class="text-center pt-4">
            <button type="button" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-md transition-all duration-300" id="contact_us_submit">
              Submit
            </button>
          </div>
      </div>




</section>
<!------------------------------------------------------------------------------------------------------------------------------->











@include('components.footer')





    <script>
        // Fade-in for entire page
        window.addEventListener("load", () => {
            document.body.classList.add("fade-in");
        });

        // Fade-in each section on scroll
        const fadeSections = document.querySelectorAll('.fade-section');

        const fadeInOnScroll = () => {
            const triggerBottom = window.innerHeight * 0.85;
            fadeSections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                if (sectionTop < triggerBottom) {
                    section.classList.add('visible');
                }
            });
        };

        window.addEventListener('scroll', fadeInOnScroll);
        window.addEventListener('load', fadeInOnScroll);
    </script>




<script>
$("#contact_us_submit").click(function(){
  
    const first_name       = $("#first_name").val().trim();
    const middle_name      = $("#middle_name").val().trim();
    const last_name        = $("#last_name").val().trim();
    const email            = $("#email").val().trim();
    const phone            = $("#phone").val().trim();
    const message          = $("#message").val().trim();
    const full_name        = first_name+ ' ' +middle_name+ ' ' +last_name+ ' ';


    if(first_name == '')
    {
          Swal.fire({
          title: "Error",
          text: "Missing First Name Field",
          icon: "error"
          });
          return;
    }


    if(last_name == '')
    {
          Swal.fire({
          title: "Error",
          text: "Missing Last Name Field",
          icon: "error"
          });
          return;
    }

    if(email == '')
    {
          Swal.fire({
          title: "Error",
          text: "Missing Email Field",
          icon: "error"
          });
          return;
    }

    if(phone == '')
    {
          Swal.fire({
          title: "Error",
          text: "Missing Phone Number Field",
          icon: "error"
          });
          return;
 
    }

    if(message == '')
    {
          Swal.fire({
          title: "Error",
          text: "Insert Your Message",
          icon: "error"
          });
          return;
    }

      // Show loading alert
Swal.fire({
    title: 'Sending...',
    html: 'Please wait while we process your request',
    allowOutsideClick: false,
    didOpen: () => {
        Swal.showLoading(); // This shows the spinner
    }
});



        $.ajax({
          url: "/send-mail",
          type: "POST",
          data: {
            full_name      : full_name,
            email          : email,
            phone          : phone,
            message        : message,
           _token          : $('meta[name="csrf-token"]').attr('content') // CSRF token

          
          },
          success: function(data) {
            
          Swal.close(); // Close loading

          
          Swal.fire({
            title: "Success",
            text: "Your Concern Has Been Emailed",
            icon: "success"
          });


          $("#first_name").val('');
          $("#middle_name").val('');
          $("#last_name").val('');
          $("#email").val('');
          $("#phone").val('');
          $("#message").val('');






          }
        })


});
</script>
