jQuery(document).ready(function($) {
  let currentCategory = 'africa';
  let page = 1;
  const perPage = 16;

  function loadPosts(reset = false) {
    $.ajax({
      url: mna_ajax.ajax_url,
      type: 'POST',
      data: {
        action: 'load_mna_posts',
        category: currentCategory,
        page: page,
        per_page: perPage,
      },
      beforeSend: function() {
        $('.lm_btn').text('Loading...');
      },
      success: function(response) {
        if (reset) {
          $('.page-id-39 .bgrid').html(response);
        } else {
          $('.page-id-39 .bgrid').append(response);
        }

        if ($.trim(response) === '') {
          $('.lm_btn').hide();
        } else {
          $('.lm_btn').text('LOAD MORE').show();
        }
      }
    });
  }

  // Initial load
  loadPosts(true);

  // Category filter click
  $('.mnafilter a').on('click', function(e) {
    e.preventDefault();
    $('.mnafilter a').removeClass('actived');
    $(this).addClass('actived');
    currentCategory = $(this).data('category');
    page = 1;
    loadPosts(true);
  });

  // Load more
  $('.lm_btn').on('click', function() {
    page++;
    loadPosts();
  });
});