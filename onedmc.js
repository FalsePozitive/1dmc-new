var $ = jQuery;

$('.testimonialslider').slick({
    arrows: false,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });


window.addEventListener('scroll', function() {
  const header = document.getElementById('masthead');
  if (window.scrollY > 50) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
});  


document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.tripdayslide').forEach(function(slider) {
    const slides = slider.querySelectorAll('img');
    if (!slides.length) return;

    let current = 0;

    // Create dots
    const dotsContainer = document.createElement('div');
    dotsContainer.className = 'tripdays-dots';
    slides.forEach((_, i) => {
      const dot = document.createElement('button');
      dot.addEventListener('click', () => showSlide(i));
      dotsContainer.appendChild(dot);
    });
    slider.parentNode.insertBefore(dotsContainer, slider.nextSibling);

    function showSlide(index) {
      slides[current].classList.remove('active');
      dotsContainer.children[current].classList.remove('active');
      current = index;
      slides[current].classList.add('active');
      dotsContainer.children[current].classList.add('active');
    }

    // Initialize first slide
    slides[0].classList.add('active');
    dotsContainer.children[0].classList.add('active');

    // Auto advance every 4 seconds
    setInterval(() => {
      let next = (current + 1) % slides.length;
      showSlide(next);
    }, 6000);
  });
});
//menu

document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.querySelector('.menu-toggle');
  const menu = document.querySelector('#primary-menu');

  menuToggle.addEventListener('click', function() {
    menu.classList.toggle('active');
    const expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
    menuToggle.setAttribute('aria-expanded', !expanded);
  });
});


document.addEventListener("DOMContentLoaded", function () {
  // RFP MODAL
  var modalx = document.getElementById("rfpmodal");
  var btnx = document.getElementById("rfplaunch");
  var spanx = document.getElementsByClassName("close")[0];

  // Open modal
  btnx.onclick = function () {
    modalx.style.display = "flex";
    modalx.classList.add("modopened");
  };

  // Close modal (X button)
  spanx.onclick = function () {
    modalx.style.display = "none";
    modalx.classList.remove("modopened");
  };

  // Close modal when clicking outside
  window.onclick = function (event) {
    if (event.target === modalx) {
      modalx.style.display = "none";
      modalx.classList.remove("modopened");
    }
  };
});


$('#listbt').on('click', function() {
  $('.bgrid').addClass('listview');
});

$('#gridbt').on('click', function() {
  $('.bgrid').removeClass('listview');
});