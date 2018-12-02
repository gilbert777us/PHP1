<html>
   <head>
      <title>change picture</title>
      <script type = "text/javascript">
          function displayNextImage() {
              x = (x === images.length - 1) ? 0 : x + 1;
              document.getElementById("img").src = images[x];
          }

          function startTimer() {
              setInterval(displayNextImage, 3000);
          }

          var images = [], x = -1;
          images[0] = "cards/brb11.png";
          images[1] = "cards/brb12.png";
          images[2] = "cards/brb13.png";
          images[3] = "cards/brb14.png";
      </script>
   </head>

   <body onload = "startTimer()">
       <img id="img" src="cards/brb11.png"/>

   </body>
</html>