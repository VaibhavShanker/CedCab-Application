 <!-- Footer -->
 <footer class="w3-container w3-padding-16 w3-light-grey" style="margin-top: 600px">
              <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 mt-4 text-center">
                  <h1 style="font-size: 35px;color:rgb(221, 236, 81)">Ced Taxi</h1>
                  <p><i style="color:rgb(221, 236, 81) ;"></i>crafted By <strong>Vaibhav Shanker</strong></p>
              </div>
            </footer>
            <!-- End page content -->
          </div>
            <script>
            // Get the Sidebar
            var mySidebar = document.getElementById("mySidebar");
            // Get the DIV with overlay effect
            var overlayBg = document.getElementById("myOverlay");
            // Toggle between showing and hiding the sidebar, and add overlay effect
            function w3_open() {
              if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
              } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
              }
            }
            // Close the sidebar with the close button
            function w3_close() {
              mySidebar.style.display = "none";
              overlayBg.style.display = "none";
            }
            </script>
          </body>
</html>