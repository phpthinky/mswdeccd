$(function(){

  $('.birthday').prop('max',function(){
    return new Date().toJSON().split('T')[0];
  })

  
  $('.birthday').on('change',function(){
    var value = $(this).val()
    var max = new Date().toJSON().split('T')[0];

    if (value > max) {
      $(this).val('')
      alert('Invalid date');

    }
  })
  $.fn.replaceOptions = function(options) {
    var self, $option;

    this.empty();
    self = this;

    $.each(options, function(index, option) {
      $option = $("<option></option>")
        .attr("value", option.value)
        .text(option.text);
      self.append($option);
    });
  };
  
})
