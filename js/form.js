window.onload = function () {

  formInit()
  calculateSpj()
  if (window.location.href.includes('Breakdown')) $('[name="jabatan_group[]"]').siblings().css('width','100%')
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
    for (var u in uuids) $.ajax({url: controller + '/subformread/' + uuids[u], success: function (form) {
      fchild.prepend(form)
      if (uuids.length === fchild.find('[data-urutan]').length) {
        var elements = fchild.find('[data-urutan]')
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
        fchild.prepend(html)
        formInit()
      }
    }})
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
      })
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
  calculateAkunProgram()
}

function calculateAkunProgram () {
  if (window.location.href.indexOf ('Akun/read') < 0) return true
  $('[data-number="true"]').keyup(function () {
    var record = $(this).parent().parent()
    var vol = getNumber(record.find('[name*="vol"]'))
    var hargasat = getNumber(record.find('[name*="hargasat"]'))
    var pagu = vol * hargasat
    record.find('[name*="pagu"]').val(currency(pagu))
    calculatePaguTotal()
  })
  $('.btn-delete[data-uuid]').click(calculatePaguTotal)
  function calculatePaguTotal () {
    var paguTotal = 0
    $('[name^="Detail_pagu"]').each(function () {
      paguTotal += getNumber($(this))
    })
    $('[name="pagu"]').val(currency(paguTotal))
  }
}

function calculateProgramDetail () {
  if (window.location.href.indexOf ('/Detail/') < 0) return true
  $('[name="vol"], [name="hargasat"]').keyup(function () {
    $('[name="pagu"]').val(currency (getNumber ($('[name="vol"]')) * getNumber ($('[name="hargasat"]'))))
  })
  $('.form-child[data-controller="Spj"]').each (function () {
    var spj = $(this)
    spj.find('[data-number="true"]').keyup(function () {
      var total_spj = 0
      spj.find('[data-number="true"]').each(function () {
        total_spj += getNumber($(this))
      })
      spj.find('[name="Spj_total_spj[]"]').val(total_spj)
    })
  })

  $('[name="last_submit"]').parent().submit(function () {
    var total_spj = 0
    $('.form-child[data-controller="Spj"] [name="Spj_total_spj[]"]').each(function () {
      total_spj += getNumber($(this))
    })
    if (total_spj > getNumber($('[name="pagu"]'))) {
      showError('Formulir gagal dikirim, perhitungan minus')
      return false
    } else return true
  })
}

function calculateSpj () {
  if (window.location.href.indexOf ('/Spj/') < 0) return true
  $('[name="vol"], [name="hargasat"]').keyup(function () {
    $('[name="total_spj"]').val(currency (getNumber ($('[name="vol"]')) * getNumber ($('[name="hargasat"]'))))
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

function markMinus (spj_total) {
  var inlineStyle = $('[name="total_spj"]').attr('style') || ''
  if (spj_total > getNumber ($('[name="pagu"]'))) $('[name="total_spj"]').css('background-color', '#ffcccc')
  else $('[name="total_spj"]').attr('style', inlineStyle.replace('background-color: rgb(255, 204, 204);', ''))
}