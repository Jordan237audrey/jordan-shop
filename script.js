$(document).ready(function() {
    var currentIndex = 0;
    var images = [
      'adults-plain-cotton-tshirt-2-pack-teal.jpg',
      'men-navigator-sunglasses-brown.jpg',
      'men-golf-polo-t-shirt-red.jpg',
      'men-athletic-shoes-green.jpg',
      'adults-plain-cotton-tshirt-2-pack-black.jpg',
      'duvet-cover-set-blue-queen.jpg',
      'liquid-laundry-detergent-lavender.jpg',
      'men-slim-fit-summer-shorts-gray.jpg'
    ];
    var totalImages = images.length;
    var interval;
  
    function showImage(index) {
      $('.products-slider img').removeClass('active');
      $('.products-slider img').eq(index).addClass('active');
      $('.slider-navigation span').removeClass('active');
      $('.slider-navigation span').eq(index).addClass('active');
    }
  
    function startSlider() {
      interval = setInterval(function() {
        currentIndex++;
        if (currentIndex >= totalImages) {
          currentIndex = 0;
        }
        showImage(currentIndex);
      }, 3000);
    }
  
    function stopSlider() {
      clearInterval(interval);
    }
  
    $('.slider-navigation span').click(function() {
      var index = $(this).index();
      currentIndex = index;
      showImage(currentIndex);
      stopSlider();
      startSlider();
    });
  
    startSlider();
  });