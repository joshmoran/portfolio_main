// Only run code when the window has been loaded
window.onload = function () {
    // Create array of banner images and alt text
    const imgs = new Array(
        [ 'banners/banner1.png', 'Banner Image 1' ],
        [ 'banners/banner2.png', 'Banner Image 2' ],
        [ 'banners/banner3.png', 'Banner Image 3' ],
        [ 'banners/banner4.png', 'Banner Image 4' ],
        [ 'banners/banner5.png', 'Banner Image 5' ]
    );
    // Slideshow Time
    let time = 3000;
    // Get next image button (arrow right)
    let nextBtn = document.getElementById('nextImage');
    // Get previous image button (arrow left)
    let prevBtn = document.getElementById('prevImage');
    // Get button elements
    let btns = document.getElementsByClassName('bannerBtn');
    // Get image element for the banners
    let carImg = document.getElementById('carouselImg');
    // Get the notification heading 1 
    let notificationEl = document.getElementById('notification');
    // Start the slideshow
    let myInterval = setInterval(nextImageFunction, 3000);

    // Cycle through the buttons and apply relevant event handlers 
    for( a = 0; a< btns.length; a++ ) {
        // When window has been loaded, put the first image on the screen
        window.addEventListener('onload', changeImage(0) ); ;
        // Event handler for the buttons
        btns[a].addEventListener('click', function() {
            // Get buttons from the array
            no = Array.from(btns).indexOf(this);
            // Change image with the relevant button value
            changeImage(no);
        });
        // Event handler for when the image has been hovered over
        carImg.addEventListener('mousemove', resetInterval );
        // Event handler for when the mouse exited
        carImg.addEventListener('mouseleave', startInterval  );
        // Set next button event handler
        nextBtn.addEventListener('click', nextImageFunction );
        // Set previous button event handler 
        prevBtn.addEventListener('click', prevImageFunction );
    }

    // Function for stop the slideshow
    function  resetInterval() {
        // Clear the interval 
        clearTimeout( myInterval );
        // Function to show a notification banner
        showNotification();
    }

    // Function to start the slideshow 
    function startInterval() {
        // Set an interval to run the slideshow 
        myInterval = setInterval(nextImageFunction, time);
        // Function to hide the notification banner
        hideNotification();
    }
    
    // Function to show the notification banner 
    function showNotification() {
        // On the banner show some text
        notificationEl.textContent = 'Slideshow has stopped';
        // Unhide the banner element 
        notificationEl.style.display = 'block';
    }

    // Function to hide the notification banner
    function hideNotification() {
        // Do not display the banner 
        notificationEl.style.display = 'none';
        // Remove any text in the banner element
        notificationEl.textContent = '';
    }

    // Function to change the image
    function changeImage( number ) {
        // Change the image source
        carImg.src = imgs[number][0];
        // Change the image description
        carImg.alt = imgs[number][1];

        // Cycle through and make sure it is not the end
        for( b = 0; b < btns.length; b++ ){
            // If the number is the active button, change button style
            if ( b == number ) {
                // Change to solid circle
                btns[b].src = 'img/circle_solid.svg';
            } else {
                // If not, change to a hollow circle
                btns[b].src = 'img/circle.svg';
            }
        }
    }

    // Function to get the image number from the alt text
    function getImageNo( src ) {
        // Split the description tah and get the number at the end
        let imgNo = src.replace("Banner Image ", "");
        // Return the number
        return imgNo;
    }

    // Function for the next image button 
    function nextImageFunction() {
        // Run the function to get the active image number
        let imgNo = getImageNo( carImg.alt );
        // Conditional to check if the image/button is at the end
        if ( imgNo >= btns.length ) {
            // IF yes, show the first image
            changeImage(0);
        } else {
            // IF not set the image
            changeImage(imgNo);
        }
    }

    // Function for the previous image button
    function prevImageFunction() {
        // Run the function to get the active image number
        let imgNo = getImageNo( carImg.alt ) ;
        // Conditional to check if the image/button is at the end
        if ( imgNo <= 1  ) {
            // If yes, show the last image
            changeImage(btns.length - 1);
        } else { 
            // If not, set the image
            changeImage(imgNo - 2);
        }
    }
}