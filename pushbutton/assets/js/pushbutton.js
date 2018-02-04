jQuery(document).ready(function ($) {
  
    // Detect If Browser is IE
      function detectIE() {
        var ua = window.navigator.userAgent;

        var msie = ua.indexOf('MSIE ');
        if (msie > 0) {
          // IE 10 or older => return version number
          return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
        }

        var trident = ua.indexOf('Trident/');
        if (trident > 0) {
          // IE 11 => return version number
          var rv = ua.indexOf('rv:');
          return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
        }

        var edge = ua.indexOf('Edge/');
        if (edge > 0) {
          // Edge (IE 12+) => return version number
          return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
        }

        // other browser
        return false;
      }

    var version = detectIE();

  // Slider Functionality
    var slideCount = $('.radio-slide-logo ul li').length;
    if(version > 0) {
      var slideWidth = $('.radio-slide-logo ul li img').width() + 80;
    } else {
      var slideWidth = $('.radio-slide-logo ul li').width() + 80;
    }
    var slideHeight = $('.radio-slide-logo').height();
    var sliderUlWidth = slideCount * slideWidth;
    
    $('.radio-slide-logo .slide-wrap').css({ width: slideWidth - 80, height: slideHeight });
    
    $('.radio-slide-logo ul').css({ width: sliderUlWidth, marginLeft: - slideWidth - 40, height: slideHeight });
    
    $('.radio-slide-logo ul li:last-child').prependTo('.radio-slide-logo ul');


    // Add active class for previous slide
    function prevSlide() {
      // Main Slide
        var active = $('.radio-slide-logo ul li.active').removeClass('active');
        if(active.prev() && active.prev().length){
            active.prev().addClass('active');
        } else{
              active.siblings(":first").addClass('active');
        }

      // Tuner Icon
        var activeTuner = $('ul.radio-clients li.active').removeClass('active');
        if(activeTuner.prev() && activeTuner.prev().length){
          activeTuner.prev().addClass('active');
        } else{
          activeTuner.siblings(":last").addClass('active');
        }
    };


    // Add active class for next slide
    function nextSlide() {
      // Main Slide
        var active = $('.radio-slide-logo ul li.active').removeClass('active');
        if(active.next() && active.next().length){
          active.next().addClass('active');
        } else{
          active.siblings(":first").addClass('active');
        }

      // Tuner Icon
        var activeTuner = $('ul.radio-clients li.active').removeClass('active');
        if(activeTuner.next() && activeTuner.next().length){
          activeTuner.next().addClass('active');
        } else{
          activeTuner.siblings(":first").addClass('active');
        }
    };


    // Move to previous slide
    function moveLeft() {
        $('.radio-slide-logo ul').animate({
            left: + slideWidth
        }, 400, function () {
            $('.radio-slide-logo ul li:last-child').prependTo('.radio-slide-logo ul');
            $('.radio-slide-logo ul').css('left', '');
        });
    };


    // Move to next slide
    function moveRight() {
        $('.radio-slide-logo ul').animate({
            left: - slideWidth
        }, 400, function () {
            $('.radio-slide-logo ul li:first-child').appendTo('.radio-slide-logo ul');
            $('.radio-slide-logo ul').css('left', '');
        });
    };

  
    // Swap audio source
    function audioSource() {
      var audioPlayer = $('.radio-play-btn .music');
      var currentAudio = $('.radio-slide-logo li.active').data('audio-src');
      audioPlayer.attr('src', currentAudio);
    }

  
    // Swap slide text
    function slideText() {
      var slideTitle = $('.radio-slide-logo li.active').data('title');
      var slideDescription = $('.radio-slide-logo li.active').data('description');
      var slideLink = $('.radio-slide-logo li.active').data('link');
      var currentTitle = $('.radio-slide-content .radio-slide-title');
      var currentDescription = $('.radio-slide-content p');
      var currentLink = $('.radio-slide-content a');
      
      currentTitle.text(slideTitle);
      currentDescription.text(slideDescription);
      currentLink.attr('href', slideLink);
    }

    slideText();


    // Adjust slide content height
    function slideContentHeight() {
      var contentHeight = $('.active-content').height();
      $('.radio-slide-content').css('height', contentHeight + 25);
    }

    //slideContentHeight();


    // Reposition turner depending on active slide
    if ($('body').hasClass('home') ) {
      function tunerDial() {
          var tunerOffset = $('.radio-clients li.active').offset();
          var tunerLeft = tunerOffset.left;
          var tunerWidth = $('.radio-clients li.active').width();
          var containerOffset = $('.radio-tuner').offset()
          var containerLeft = containerOffset.left;
          var tunerMath = tunerWidth / 2 + tunerLeft - containerLeft + 10;
          var tunerPosition = Math.round(tunerMath);
          $('.tuner-dial').css('left', tunerPosition + 'px' );
      };

      // Update tuner position
      $(function(){
        setInterval(function () {
          tunerDial();
        }, 0);
      });
    }


    // Responsive Slider Width
    $(window).resize(function() {
      var slideCount = $('.radio-slide-logo ul li').length;
      var slideWidth = $('.radio-slide-logo ul li').width() + 80;
      var slideHeight = $('.radio-slide-logo').height();
      var sliderUlWidth = slideCount * slideWidth;
      
      $('.radio-slide-logo .slide-wrap').css({ width: slideWidth - 80, height: slideHeight });
      
      $('.radio-slide-logo ul').css({ width: sliderUlWidth, marginLeft: - slideWidth - 40, height: slideHeight });
    });

    



  // Home Page Audio Functionality
  $(".radio-play-btn i").on("click", function() {
    var currentPlayer = $(".radio-play-btn").find(".music")[0];

    if (currentPlayer.paused == false) {
      currentPlayer.pause();
      $(".radio-play-btn i").addClass("fa-play");
      $(".radio-play-btn").find(".fa-play.fa-pause").removeClass("fa-pause");

    } else {
      var sounds = document.getElementsByTagName('audio');
      for (i = 0; i < sounds.length; i++) sounds[i].pause();
      $(".fa-pause").addClass("fa-play");
      $(".fa-play.fa-pause").removeClass("fa-pause");

      currentPlayer.play();
      $(".radio-play-btn").find(".fa-play").addClass("fa-pause");
      $(".radio-play-btn").find(".fa-play.fa-pause").removeClass("fa-play");
    }

    // Remove Play Button On Audio End
    currentPlayer.onended = function() {
      $(".fa-pause").addClass("fa-play");
      $(".fa-play.fa-pause").removeClass("fa-pause");
    }
  });

  // Audio Auto Play
  function autoPlay() {
    var currentPlayer = $(".radio-play-btn").find(".music")[0];
    if ($(".radio-play-btn i").hasClass("fa-pause")) {
      currentPlayer.play();
    }
  }

  // Reset play button class
  function playReset() {
    $(".radio-play-btn i").addClass("fa-play");
    $(".radio-play-btn").find(".fa-play.fa-pause").removeClass("fa-pause");
  }


  // Previous button
    $('.radio-nav-previous').click(function () {
      prevSlide();
      audioSource();
      //playReset();
      slideText();
      //slideContentHeight();
      moveLeft();
      autoPlay();
    });


  // Next button
    $('.radio-nav-next').click(function () {
      nextSlide();
      audioSource();
      //playReset();
      slideText();
      //slideContentHeight();
      moveRight();
      autoPlay();
    });


  // Auto Cycle Through Slides
  var timer;

  $('.radio-slider').mouseenter(function() {
    if (timer) { clearInterval(timer) }
  })
  $('.radio-slider').mouseleave(function() {
      timer = setInterval(function() {
        if ( $(".radio-play-btn i").hasClass("fa-play") ) {
            nextSlide();
            audioSource();
            slideText();
            moveRight();
            autoPlay();
      }}, 10000);
  });

  //$('.radio-slider').mouseleave();
















  // Nav Replace On Scroll
  if ($('body').hasClass('home') && ( window.innerWidth >= 768 ) ) {
    var targetOffset = $(".home .site-content-contain").offset().top;

    var $w = $(window).scroll(function() {
      if ( ($w.scrollTop() > 300) && ($w.scrollTop() < targetOffset - 100) ) {
        $('.home .site-navigation-fixed').css('top', '-200px');
      } else if ( $w.scrollTop() > targetOffset - 100 ) {
        $('.home .site-navigation-fixed').addClass('sticky-nav');
        $('.home .site-navigation-fixed .header-logo').css('margin-top', '-15px');
        $('.home .site-navigation-fixed .header-logo').attr('src', 'http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/push-button-logo-blue.png');
        $('.home .site-navigation-fixed').css('top', '0');
      } else {
        $('.home .site-navigation-fixed').removeClass('sticky-nav');
        $('.home .site-navigation-fixed .header-logo').css('margin-top', '0');
        $('.home .site-navigation-fixed .header-logo').attr('src', 'http://pushbuttonproductions.com/wp-content/themes/pushbutton/assets/images/push-button-logo-01.png');
        $('.home .site-navigation-fixed').css('top', '0');
      }
    });
  }















  // Interior Page Audio Player
  $('.player-wrap').each(function() {
    $(this).find(".play-img-wrap i").on("click", function() {

      var currentPlayer = $(this).parent().parent().parent().parent().find(".music")[0];

      if (currentPlayer.paused == false) {
        currentPlayer.pause();
        $(".player-wrap").removeClass("active-player");
        $(this).parent().find(".fa-pause-circle").addClass("fa-play-circle");
        $(this).parent().find(".fa-play-circle.fa-pause-circle").removeClass("fa-pause-circle");

      } else {
        $(".player-wrap").removeClass("active-player");
        var sounds = document.getElementsByTagName('audio');
        for (i = 0; i < sounds.length; i++) sounds[i].pause();
        $(".fa-pause-circle").addClass("fa-play-circle");
        $(".fa-pause-circle.fa-play-circle").removeClass("fa-pause-circle");

        currentPlayer.play();
        $(this).parent().find(".fa-play-circle").addClass("fa-pause-circle");
        $(this).parent().find(".fa-play-circle.fa-play-circle").removeClass("fa-play-circle");
        $(this).parent().parent().parent().parent().addClass("active-player");
      }

    });

  });

  function audioTime() {
    if ($(".players").find(".active-player").length != 0) {
      playhead = $(".active-player .playhead");
      timeline = $(".active-player .timeline");
      musicTime = $(".active-player .music")[0];
      currentTime = musicTime.currentTime;
      maxTime = musicTime.duration;
      timeLog = currentTime / maxTime * 100;
      for (var i = 0; i < playhead.length; i++) {
        playhead[i].style.width = Math.abs(timeLog) + "%";
      }
    }
  }

  setInterval(function() {
    audioTime();
  }, 10);














  // Image Replace Gallery
  if ( $('body').hasClass('page-id-3346') ) {
    $('.thumbnails-wrap img').click(function() {
      var src = $(this).attr('src');
      $('.main-img img').attr('src', src);
      $('.studio-modal-image').attr('src', src);
    });
  }













  // Video Modal
  if ( ($('body').hasClass('page-id-3130')) || ($('body').hasClass('postid-4915')) || ($('body').hasClass('postid-4897')) ) {

    $('.play-img-wrap i').click(function() {
      var src = $(this).data('video-src');
      $('.modal-body iframe').attr('src', src);
    });
    
    $('#video-modal').on('hide.bs.modal', function () { 
      $('.modal-body iframe').removeAttr('src');
    });

  }













  // Bootstrap Carousel - Stop Slider Audio On Slide Cycle
  $('#featured-slider').on('slide.bs.carousel', function () {
    var sounds = $('#featured-slider audio');
      for (i = 0; i < sounds.length; i++) sounds[i].pause();
  });

  // Bootstrap Carousel - Stop All Other Audio On Play
  $('#featured-slider audio').click(function() {
    if (this.paused == false) {
        this.pause();
    } else {
      var sounds = document.getElementsByTagName('audio');
      for (i = 0; i < sounds.length; i++) sounds[i].pause();
      this.play();
    }
  });

  // Bootstrap Carousel - Slide Interval
  $('#featured-slider').carousel({
    interval: 7000
  })















  // Fade In On Scroll
  if ( window.innerWidth >= 767 ) {
    // Fade Left
    $('.fade-left, .players .col-xs-12:nth-child(odd) .player-wrap').css({'opacity':'0', 'transform': 'translateX(' + 2 + 'em)'});

    // Trigger fade in as window scrolls
    $(window).on('scroll load', function(){
      $('.fade-left, .players .col-xs-12:nth-child(odd) .player-wrap').each( function(i){
        var bottom_of_object = $(this).offset().top + 150;
        var bottom_of_window = $(window).scrollTop() + $(window).height();
        if( bottom_of_window > bottom_of_object ){  
          $(this).css({'opacity':'1', 'transform': 'translateX(' + 0 + 'em)'});        
        } else {
          $(this).css({'opacity':'0', 'transform': 'translateX(' + 2 + 'em)'});
        }
      });
    });

    // Fade Right
    $('.fade-right, .players .col-xs-12:nth-child(even) .player-wrap').css({'opacity':'0', 'transform': 'translateX(' + -2 + 'em)'});

    // Trigger fade in as window scrolls
    $(window).on('scroll load', function(){
      $('.fade-right, .players .col-xs-12:nth-child(even) .player-wrap').each( function(i){
        var bottom_of_object2 = $(this).offset().top + 150;
        var bottom_of_window2 = $(window).scrollTop() + $(window).height();
        if( bottom_of_window2 > bottom_of_object2 ){  
          $(this).css({'opacity':'1', 'transform': 'translateX(' + 0 + 'em)'});        
        } else {
          $(this).css({'opacity':'0', 'transform': 'translateX(' + -2 + 'em)'});
        }
      });
    });
  }



  // YouTube Load on Scroll
  // $(window).on('scroll load', function(){
  //   $('.responsive-vid iframe').each( function(i){
  //     player.pauseVideo();
  //     var scroll_position = $(window).scrollTop();
  //     var bottom_of_video = $(this).offset().top + $(this).outerHeight();
  //     var bottom_of_window3 = $(window).scrollTop() + $(window).height();
  //     if( bottom_of_window3 > bottom_of_video && scroll_position < bottom_of_video ) {  
  //       player.playVideo();
  //     } else {
  //       player.pauseVideo();
  //     }
  //   });
  // });



});