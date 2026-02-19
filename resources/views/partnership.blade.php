    @extends('layouts.app')
    @section('title', 'McAsia - Partnership')
    @section('content')




    <style>
  
/*-------------Viewing for Monitor going 2k - 4k resolution----------*/
    @media (min-width: 1440px) {
    .content-wrapper {
      margin-left: -17rem; /* Move content slightly right */
      margin-top: 8rem; /* Optional vertical offset */
      }

 

    .image_slideshow
    {

        height: 170%;
        width: 100%;
        object-fit: contain;

    }



    .image_cover
    {
        height: 80%;
        width: 100%;
        object-fit: contain;
    }

    }


/*---------------------------------------------------------------------*/



/*------------------------Smaller Screens-----------------------------*/
@media (min-width: 641px) and (max-width: 1439px) 
{

    
     .image_slideshow
    {

        height: 170%;
        width: 100%;
        object-fit: contain;

    }



    .image_cover
    {
        height: 80%;
        width: 100%;
        object-fit: contain;
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



  }
  /*-------------------------------------------------*/






</style>





<div class="relative overflow-hidden min-h-screen">

<!--------------------------------------------SLIDESHOW---------------------------------------------------->
<section class="partnership relative h-screen overflow-hidden">



<!-- Slideshow -->
<div class="image_slideshow relative w-full overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/partnership/banner.png') }}"
         class="image_cover" />
    <!-- Overlay Content Box -->
  </div>
</div>





</section>




<!-------------------------------------------->
<section class="content_text min-h-screen flex items-center justify-center px-4 py-12">
        <div class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-3xl">


        <br>

    <a href="#" onclick="history.back(); return false;"
   class="btn btn-outline-light d-inline-flex align-items-center gap-2 -px-6 py-2"
   style="font-size: 16px;">

    <i class="fa-solid fa-arrow-left"></i>
    <span>Back</span>
</a>

            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                PARTNERS INFORMATION SHEET
            </h2>

            <!-- FORM -->
            <form id="partnerForm" class="space-y-6">

                <!-- NAME -->
                <div>
                    <label class="font-semibold text-gray-700">Name</label>
                    <input type="text" id="name" name="name"
                           class="w-full mt-1 p-3 border rounded-xl"
                           placeholder="Enter full name">
                </div>

                <!-- ADDRESS SECTION -->
                <div class="space-y-4">
                    <label class="font-semibold text-gray-700">Address</label>


                    <!---------------------Block # and Street ----------------->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-gray-600 text-sm">Block #</label>
                            <input type="text" id="blk_no" name="blk_no"
                                   class="w-full mt-1 p-3 border rounded-xl"
                                   placeholder="Blk #">
                        </div>

                        <div>
                            <label class="text-gray-600 text-sm">Street</label>
                            <input type="text" id="street" name="street"
                                   class="w-full mt-1 p-3 border rounded-xl"
                                   placeholder="Street name">
                        </div>
                    </div>
                    <!-------------------------------------------------------------->





                   <!--------------------- Barangay and Subdivision ----------------->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-gray-600 text-sm">Barangay</label>
                            <input type="text" id="barangay" name="barangay"
                                   class="w-full mt-1 p-3 border rounded-xl"
                                   placeholder="Barangay">
                        </div>

                        <div>
                            <label class="text-gray-600 text-sm">Subdivision</label>
                            <input type="text" id="subdivision" name="subdivision"
                                   class="w-full mt-1 p-3 border rounded-xl"
                                   placeholder="Subdivision (optional)">
                        </div>
                    </div>
                    <!-------------------------------------------------------------->




                   <!--------------------- Country and Zip Code ----------------->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-gray-600 text-sm">Country</label>
                            <select id="country" name="country"
                                    class="w-full mt-1 p-3 border rounded-xl">
                                <option value="">Loading...</option>
                            </select>                        
                            </div>
                        <div>
                            <label class="text-gray-600 text-sm">Zip Code</label>
                            <input type="text" id="zip_code" name="zip_code"
                                   class="w-full mt-1 p-3 border rounded-xl"
                                   placeholder="Zip code">
                        </div>
                    </div>
                    <!-------------------------------------------------------------->

                </div>

                <!-- CONTACT INFORMATION -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="font-semibold text-gray-700">Mobile Number</label>
                        <input type="text" id="mobile_number" name="mobile_number"
                               class="w-full mt-1 p-3 border rounded-xl"
                               placeholder="09XX-XXX-XXXX">
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700">Landline Number</label>
                        <input type="text" id="landline_number" name="landline_number"
                               class="w-full mt-1 p-3 border rounded-xl"
                               placeholder="(Optional)">
                    </div>
                </div>

                <!-- BUSINESS NAME -->
                <div>
                    <label class="font-semibold text-gray-700">Business Name</label>
                    <input type="text" id="business_name" name="business_name"
                           class="w-full mt-1 p-3 border rounded-xl"
                           placeholder="Enter business name">
                </div>

                <!-- BUSINESS ADDRESS -->
                <div>
                    <label class="font-semibold text-gray-700">Business Address</label>
                    <input type="text" id="business_address" name="business_address"
                           class="w-full mt-1 p-3 border rounded-xl"
                           placeholder="Complete business address">
                </div>

                <!-- BUSINESS CONTACT & WEBSITE -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="font-semibold text-gray-700">Business Number</label>
                        <input type="text" id="business_number" name="business_number"
                               class="w-full mt-1 p-3 border rounded-xl"
                               placeholder="Telephone / Mobile">
                    </div>

                    <div>
                        <label class="font-semibold text-gray-700">Business Website</label>
                        <input type="text" id="business_website" name="business_website"
                               class="w-full mt-1 p-3 border rounded-xl"
                               placeholder="https://">
                    </div>
                </div>

                <!-- BUSINESS EMAIL -->
                <div>
                    <label class="font-semibold text-gray-700">Business Email Address</label>
                    <input type="email" id="business_email" name="business_email"
                           class="w-full mt-1 p-3 border rounded-xl"
                           placeholder="email@company.com">
                </div>

                <!-- SUBMIT BUTTON -->
                    <div class="pt-4">
                    <button type="button" id="submitBtn"
                            class="w-full bg-black text-white py-3 rounded-xl text-lg font-semibold hover:bg-gray-800 transition">
                        SUBMIT
                    </button>   
                    </div>

            </form>

        </div>
    </section>



<!-------------------------------------------->









</div>







@include('components.footer')





<script>
$("#submitBtn").on("click", function(e) {
    e.preventDefault();




    //-----------------ID FORM FIELDS------------//

    let name             = $("#name").val().trim();
    let blk_no           = $("#blk_no").val().trim();
    let street           = $("#street").val().trim();
    let barangay         = $("#barangay").val().trim();
    let subdivision      = $("#subdivision").val().trim();
    let country          = $("#country").val().trim();
    let zip_code         = $("#zip_code").val().trim();
    let mobile_number    = $("#mobile_number").val().trim();
    let landline_number  = $("#landline_number").val().trim();
    let business_name    = $("#business_name").val().trim();
    let business_address = $("#business_address").val().trim();
    let business_number  = $("#business_number").val().trim();
    let business_website = $("#business_website").val().trim();
    let business_email   = $("#business_email").val().trim();



    //------------------------------------------//







    // -------------------VALIDATION FIELDS-------------------//
    if(name === ''){
        Swal.fire('Error', 'Full Name is required', 'error');
        return false;
    }
    if(street === ''){
        Swal.fire('Error', 'Street is required', 'error');
        return false;
    }
    if(barangay === ''){
        Swal.fire('Error', 'Barangay is required', 'error');
        return false;
    }
    if(country === ''){
        Swal.fire('Error', 'Country is required', 'error');
        return false;
    }
    if(zip_code === ''){
        Swal.fire('Error', 'ZIP Code is required', 'error');
        return false;
    }
    if(mobile_number === ''){
        Swal.fire('Error', 'Mobile Number is required', 'error');
        return false;
    }
    if(business_name === ''){
        Swal.fire('Error', 'Business Name is required', 'error');
        return false;
    }
    if(business_address === ''){
        Swal.fire('Error', 'Business Address is required', 'error');
        return false;
    }
    if(business_email === ''){
        Swal.fire('Error', 'Business Email is required', 'error');
        return false;
    }

    // Optional: Validate email format
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(business_email)){
        Swal.fire('Error', 'Business Email is not valid', 'error');
        return false;
    }

    // Optional: You can also validate numeric fields or URL fields
    // Example: validate mobile number numeric
    if(isNaN(mobile_number)){
        Swal.fire('Error', 'Mobile Number must be numeric', 'error');
        return false;
    }


    //-------------------------------------------------------//  




    Swal.fire({
    title: 'Please wait...',
    html: 'Submitting your form',
    allowOutsideClick: false,
    didOpen: () => {
    Swal.showLoading()
    }
    });




    let data = {
        name:               $("#name").val(),
        blk_no:             $("#blk_no").val(),
        street:             $("#street").val(),
        barangay:           $("#barangay").val(),
        subdivision:        $("#subdivision").val(),
        country:            $("#country").val(),
        zip_code:           $("#zip_code").val(),
        mobile_number:      $("#mobile_number").val(),
        landline_number:    $("#landline_number").val(),
        business_name:      $("#business_name").val(),
        business_address:   $("#business_address").val(),
        business_number:    $("#business_number").val(),
        business_website:   $("#business_website").val(),
        business_email:     $("#business_email").val(),
        _token:             "{{ csrf_token() }}"
    };

    console.log(data);

    $.ajax({
        url: "/partnership/submit",
        type: "POST",
        data: data,
        success: function(response) {
        Swal.close(); // close loading

            Swal.fire({
              title: "Success",
              text: "The Data Information Has Been Send And Recorded",
              icon: "success"
            });
            console.log(response);
            $("input, textarea, select").val("");


            
        },
        error: function(xhr) {
            alert("Something went wrong.");
            console.log(xhr.responseText);
        }
    });
});
</script>








<!------- Fetching Countries ---------->
<script>
$(document).ready(function () {
    $.ajax({
        url: "https://countriesnow.space/api/v0.1/countries/positions",
        method: "GET",
        success: function (response) {

            $("#country").empty(); // Clear loading

            // Extract the list
            let countries = response.data;

            // Sort alphabetically
            countries.sort((a, b) => a.name.localeCompare(b.name));

            // Add dropdown options
            countries.forEach(function (country) {
                $("#country").append(
                    `<option value="${country.name}">${country.name}</option>`
                );
            });

            // Default to Philippines
            $("#country").val("Philippines");
        },
        error: function() {
            $("#country").html(`<option value="">Failed to load countries</option>`);
        }
    });
});
</script>
<!-------------------------------------->








@endsection

