
//slug
var slug = function(str) {
  var $slug = '';
  var trimmed = $.trim(str);
  $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
  replace(/-+/g, '-').
  replace(/^-|-$/g, '');
  return $slug.toLowerCase();
}

$('.slug-input').keyup(function() {
  var takedata = $('.slug-input').val()
  $('.slug-output').val(slug(takedata));
  $('.slug-output').val($('.slug-output').val() + '.html' );
});

//slug for edit
var slug = function(str) {
  var $slug = '';
  var trimmed = $.trim(str);
  $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
  replace(/-+/g, '-').
  replace(/^-|-$/g, '');
  return $slug.toLowerCase();
}

$('.slug-input-edit').keyup(function() {
  var takedata = $('.slug-input-edit').val()
  $('.slug-output-edit').val(slug(takedata));
  $('.slug-output-edit').val($('.slug-output-edit').val() + '.html');

});

  //Mobile Number
  $('[data-mask]').inputmask()

