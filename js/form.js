window.onload = function () {

  formInit()
  $('.form-child').each (function () {
    var fchild = $(this)
    var controller = site_url + fchild.attr('data-controller')
    var uuids = JSON.parse(fchild.attr('data-uuids').split("'").join('"'))
    for (var u in uuids) $.get(controller + '/subformread/' + uuids[u], function (form) {
      fchild.prepend(form)
      formInit()
    })
    fchild.find('.btn-add').click(function () {
        var beforeButton = $(this).parents('.form-group');
      $.get(controller + '/subformcreate/', function (form) {
        $(form).insertBefore(beforeButton)
        formInit()
      })
    })
  })

  $('.select2-selection__rendered .select2-selection__choice').each(function(){
      atr = this.getAttribute('title');
      if (atr === ''){ $(this).remove(); }
      else if (atr === null){ $(this).remove(); } 
  });    

}

function formInit () {
  $('.btn-delete[data-uuid]').click(function () {
    $(this).parent().parent().remove()
  })
  $('select').not('.select2-hidden-accessible').each(function () {
    if ($(this).is ('[data-autocomplete]')) {
      var model = $(this).attr('data-model')
      var field = $(this).attr('data-field')
      $(this).select2({
        ajax: {
          url: current_controller + '/select2/' + model + '/' + field,
          type: 'POST', dataType: 'json'
        }
      }).on('select2:select', function (evt) {
          var selectID = $(this).attr('id');
          var uid = $(".select2-hidden-accessible[id="+selectID+"] option:selected").val();
          // var text = $(".select2-hidden-accessible[id="+selectID+"] option:selected").text();
          if(selectID == 'Provinces'){
              $('#Regencies').select2({
                 ajax: {
                   url: current_controller + '/select2region/'+ model + '/Regencies/' + uid + '/' + field,
                   type: 'POST', dataType: 'json'
                 }
              })     
              $('#Regencies').val(null).trigger('change');
              $('#Districts').val(null).trigger('change');
              $('#Villages').val(null).trigger('change');                                
           }
          else if(selectID == 'Regencies'){    
              $('#Districts').select2({
                ajax: {
                  url: current_controller + '/select2region/'+ model + '/Districts/' + uid + '/' + field,
                  type: 'POST', dataType: 'json'
                }
              })    
              $('#Districts').val(null).trigger('change');
              $('#Villages').val(null).trigger('change');                   
          } 
          else if(selectID == 'Districts'){
              $('#Villages').select2({
                ajax: {
                  url: current_controller + '/select2region/' + model + '/Villages/' + uid + '/' + field,
                  type: 'POST', dataType: 'json'
                }
              })    
              $('#Villages').val(null).trigger('change');                   
          }             
           else{ 
         }
       });                
    } else if ($(this).is ('[data-suggestion]')) {
      $(this).select2({
        tags: true,
        createTag: function (params) {
          return {
            id: params.term,
            text: params.term,
            newOption: true
          }
        },
         templateResult: function (data) {
          var $result = $('<span></span>')
          $result.text(data.text)
          if (data.newOption) $result.append('<em> (add new)</em>')
          return $result
        }
      })
    } else $(this).select2()
  })
  $('[data-date="datepicker"]').datepicker({format: 'yyyy-mm-dd', autoclose: true})
  // $('[data-date="timepicker"]').timepicker({defaultTime: false, showMeridian: false})
  // $('[data-date="datetimepicker"]').daterangepicker({
  //   singleDatePicker: true,
  //   timePicker: true,
  //   timePicker24Hour: true,
  //   locale: {format: 'YYYY-MM-DD HH:mm:ss'},
  //   startDate: moment().format('YYYY-MM-DD HH:mm:ss')
  // })
}