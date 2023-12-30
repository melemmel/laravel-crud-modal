
<style>
  /* .fade-in-content {
      animation: fadeIn 2s;
  } */

  @keyframes fadeIn {
      0% {
          opacity: 0.5;
      }

      100% {
          opacity: 1;
      }
  }

  .loader-wrapper {
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0vh;
      left: 0;
      background-color: #242f3f;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
  }

  .loader {
      display: inline-block;
      width: 30px;
      height: 30px;
      position: relative;
      border: 4px solid #fff;
      animation: loader 2s infinite ease;
      top: -1vh;
  }

  .loader-inner {
      /* padding: 12px; */
      vertical-align: top;
      display: inline-block;
      width: 100%;

      @media screen {}

      background-color: #fff;
      animation: loader-inner 2s infinite ease-in;
  }

  @keyframes loader {
      0% {
          transform: rotate(0deg);
      }

      25% {
          transform: rotate(180deg);
      }

      50% {
          transform: rotate(180deg);
      }

      75% {
          transform: rotate(360deg);
      }

      100% {
          transform: rotate(360deg);
      }
  }

  @keyframes loader-inner {
      0% {
          height: 0%;
      }

      25% {
          height: 0%;
      }

      50% {
          height: 100%;
      }

      75% {
          height: 100%;
      }

      100% {
          height: 0%;
      }
  }
</style>

<div class="loader-wrapper">
  <span class="loader"><span class="loader-inner"></span></span>
</div>

<script>
  $(window).on("load", function() {
      setTimeout(function() {
          $(".loader-wrapper").fadeOut(500); // Adjust the duration in milliseconds
      }, 500); // 0.5 seconds
  });
</script>