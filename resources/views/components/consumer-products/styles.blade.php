<style>

  html, body {
  overflow-x: hidden;
}


  @media (min-width: 1440px) {

    .images-preview{

    width: 100%;
    height: 100%;          /* same as h-[180px] */
    object-fit: cover;      /* same as object-cover */
    border-radius: 0;       /* same as rounded-none */


    }
    

  }


  /* Medium screen and up (md = 768px) */
@media (min-width: 768px) {
  .image-container {
    height: 60%;          /* same as h-[180px] */
  }

  .images-preview{
    width: 100%;
    height: 100%;          /* same as h-[180px] */



  }
}




  @keyframes scroll {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
  }

  .animate-scroll {
    animation: scroll 50s linear infinite;
    width: max-content;
  }


  .full-bleed {
    width: 100%;
    position: relative;
    left: auto;
    right: auto;
    margin-left: 0;
    margin-right: 0;
  }


    [x-cloak] { display: none !important; }

</style>
