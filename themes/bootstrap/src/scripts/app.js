$(document).ready(function() {
        //12 hrs
        var timeout = 12 * 60 * 60 * 1000;
        //10 min 
        // var timeout = 10 * 60 * 1000;
        //1 min (for debugging)
        // var timeout = 60 * 1000;

        var lastTimestamp = Number(localStorage.getItem("check-in-modal-dismissed"));
        var currentTimestamp = Date.now();       
   
     if (document.getElementById('check-in-modal') && ((currentTimestamp - lastTimestamp) >= timeout)) {
        // retrieved this line of code from http://dimsemenov.com/plugins/magnific-popup/documentation.html#api
        $.magnificPopup.open({
            items: {
                src: '#check-in-modal',
                closeOnContentClick: true
            },
            type: 'inline',
              callbacks: {
                open: function() {
                  // Will fire when this exact popup is opened
                  // this - is Magnific Popup object
                },
                close: function() {
        
                    var lastTimestamp = Number(localStorage.getItem("check-in-modal-dismissed"));
                    var currentTimestamp = Date.now();              
                    window.localStorage.setItem('check-in-modal-dismissed', JSON.stringify(currentTimestamp));
                }
                // e.t.c.
              }


          // You may add options here, they're exactly the same as for $.fn.magnificPopup call
          // Note that some settings that rely on click event (like disableOn or midClick) will not work here
        }, 0);
    }
    });


$(document).on('click', '.check-in-modal__dismiss', function (e) {
  e.preventDefault();
  $.magnificPopup.close();
});  

$(document).on('click', '.check-in-modal__button', function (e) {
 
  $.magnificPopup.close();
});  

$('.donor-gallery').magnificPopup({
  delegate: 'a.donor-gallery-link', // child items selector, by clicking on it popup will open
  type: 'image',
  gallery: {
    enabled: true
  }
  // other options
});

$('.donor-gallery-sm').magnificPopup({
  delegate: 'a.donor-gallery-link', // child items selector, by clicking on it popup will open
  type: 'image',
  gallery: {
    enabled: true
  }
  // other options
});