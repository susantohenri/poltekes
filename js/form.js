window.onload = function () {

  formInit()
  calculateSpj()
  $('[name="last_submit"]').parent('form').submit(function () {
    $('[data-number]').each (function () {
      $(this).val(getNumber($(this)))
    })
    return true
  })

  $('.form-child').each (function () {
    var fchild = $(this)
    var controller = site_url + fchild.attr('data-controller')
    var uuids = JSON.parse(fchild.attr('data-uuids').split("'").join('"'))
    var requests = []
    for (var u in uuids) requests.push($.ajax({url: controller + '/subformread/' + uuids[u], success: function (form) {
      fchild.prepend(form)
      formInit()
    }}))
    $.when.apply(undefined, requests).then(function () {
      var elements = $('.form-child .row')
      var elems = []
      for( var i = 0; i < elements.length; ++i ) {
        var el = elements[i]
        elems.push(el)
      }
      var sorted = elems.sort(function (a, b) {
        var aValue = parseInt(a.getAttribute('data-urutan'), 10)
        var bValue = parseInt(b.getAttribute('data-urutan'), 10)
        return aValue - bValue
      })

      var html = ''
      elements.remove()
      for( var i = 0; i < sorted.length; ++i ) html += sorted[i].outerHTML
      $(html).insertBefore($('.btn.btn-warning.btn-sm.btn-add'))
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

  if (window.location.href.indexOf('ChangePassword') > -1) $('form a[href*="ChangePassword/delete"]').hide()
  if (window.location.href.indexOf('Jabatan') > -1) jabatanDropDown()
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
  $('[data-number="true"]').keyup(function () {
    $(this).val(currency(getNumber($(this))))
  })
  calculateProgramDetail()
}

function calculateProgramDetail () {
  if (window.location.href.indexOf ('/Detail/') < 0) return true
  markMinus(getNumber ($('[name="realisasi"]')))
  $('[name="vol"], [name="hargasat"]').keyup(function () {
    $('[name="pagu"]').val(currency (getNumber ($('[name="vol"]')) * getNumber ($('[name="hargasat"]'))))
  })
  $('[name^="Spj_vol["], [name^="Spj_hargasat["]').keyup(function () {
    var row = $(this).parent().parent()
    var vol = getNumber(row.find('[name^="Spj_vol["]'))
    var hargasat = getNumber(row.find('[name^="Spj_hargasat["]'))
    var realisasi= currency(vol * hargasat)
    row.find('[name^="Spj_realisasi["]').val(realisasi)
    var realisasi_total = 0
    $('[name^="Spj_realisasi["]').each(function () {
      realisasi_total += getNumber($(this))
    })
    $('[name="realisasi"]').val(currency (realisasi_total))
    markMinus(realisasi_total)
  })
}

function calculateSpj () {
  if (window.location.href.indexOf ('/Spj/') < 0) return true
  $('[name="vol"], [name="hargasat"]').keyup(function () {
    $('[name="realisasi"]').val(currency (getNumber ($('[name="vol"]')) * getNumber ($('[name="hargasat"]'))))
  })
}

function getNumber (element) {
  var val = element.val() || element.html()
  val = val.split(',').join('')
  return isNaN(val) || val.length < 1 ? 0 : parseInt (val)
}

function currency (number) {
  var reverse = number.toString().split('').reverse().join(''),
  currency  = reverse.match(/\d{1,3}/g)
  return currency.join(',').split('').reverse().join('')
}

function markMinus (realisasi_total) {
  var inlineStyle = $('[name="realisasi"]').attr('style') || ''
  if (realisasi_total > getNumber ($('[name="pagu"]'))) $('[name="realisasi"]').css('background-color', '#ffcccc')
  else $('[name="realisasi"]').attr('style', inlineStyle.replace('background-color: rgb(255, 204, 204);', ''))
}

function jabatanDropDown () {
  $('[name="akses_level"]').change(function () {
    var model = $(this).val().replace(' ', '') + 's'
    $('[name="items[]"]').attr('data-model', model).val('').select2('destroy')
    formInit()
  })
}