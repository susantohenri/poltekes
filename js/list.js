$(document).ready(activateExpandButton)
$('.btn-save').click(function () {
	$('[data-number]').each (function () {
		$(this).val(getNumber($(this)))
	})
	$('form#form_list').submit()
})

function activateExpandButton () {
	$('.expand-btn').unbind('click').bind('click', function () {
		if ($(this).is('.fa-plus-square')) {
			expandItem ($(this), function () {
				activateExpandButton ()
			})
			$(this).removeClass('fa-plus-square').addClass('fa-minus-square')
		} else if ($(this).is('.fa-minus-square')) {
			foldItem ($(this))
			$(this).removeClass('fa-minus-square').addClass('fa-plus-square')
		}
	})
}

function activateBtnDelete () {
	$('.btn-delete').unbind('click').bind('click', function () {
		var li = $(this).parent().parent().parent().parent().parent()
		li.remove()
		calculateBottomUp (li)
	})
}

function activateAddBtn (li) {
	var last = $('[data-parent="' + li.uuid + '"]').last()
	var indent = last.css('padding-left')
	var addBtn = '<li class="item" data-uuid="" data-parent="' + li.uuid + '" style="padding-left: ' + indent + '">\
	    <div class="item-row">\
        <div class="item-col">\
					<a class="add-btn btn btn-info"><i class="fa fa-plus"></i></a>\
				</div>\
			</div>\
	</li>'
	$(addBtn).insertAfter(last).find('.btn').click(function () {
		var blankForm = last.clone().insertAfter(last)
		blankForm.attr('data-uuid', '')
		blankForm.attr('data-urutan', parseInt(last.attr('data-urutan')) + 1)
		blankForm.find('input').val('').attr('value', '')
		blankForm.find('[name*="uuid"]').remove()
		activateBtnDelete()
		activateRealtimeCalculation()
	})

}

function expandItem (btn, cb) {
	var li = btn.parent().parent().parent().parent()
	var parent = {
		uuid: li.attr('data-uuid'),
		childUuids: li.attr('data-child-uuid').split(','),
		childController: li.attr('data-child-controller'),
		indent: parseInt(li.css('padding-left').replace('px', ''), 10)
	}
	if (parent.childUuids[0].length < 1) cb()
	var requests = []
	for (var uuid of parent.childUuids) requests.push($.ajax({
		url: site_url + parent.childController + '/subformlist/' + uuid,
		success: function (item) {
			$(item).insertAfter(li)
		}
	}))
	$.when.apply(undefined, requests).then(function () {
		sortItem(li)
		$('[data-parent="' + li.attr('data-uuid') + '"]').css('padding-left', parent.indent + 10 + 'px')
		activateBtnDelete()
		activateRealtimeCalculation()
		if ('Spj' === parent.childController) activateAddBtn(parent)
		cb()
	})
}

function foldItem (btn) {
	var li = btn.parent().parent().parent().parent()

	var sibling = $('li[data-uuid]').filter(function () {
		return $(this).css('padding-left') === li.css('padding-left') && $(this).index() > li.index()
	}).eq(0)

	$('li[data-uuid]').filter(function () {
		$filterBool = $(this).css('padding-left') > li.css('padding-left') && $(this).index() > li.index()
		return sibling.index() > -1 ? $filterBool * sibling.index() > $(this).index() : $filterBool
	}).remove()
}

function sortItem (li) {
	var elements = $('[data-parent="' + li.attr('data-uuid') + '"]')
	var elems = []
	for( var i = 0; i < elements.length; ++i ) {
		var el = elements[i]
		elems.push(el)
	}
	var sorted = elems.sort(function (a, b) {
		var aValue = parseInt(a.getAttribute('data-urutan'), 10)
		var bValue = parseInt(b.getAttribute('data-urutan'), 10)
		return aValue > bValue
	})

  var html = ''
  $('[data-parent="' + li.attr('data-uuid') + '"]').remove()
  for( var i = 0; i < sorted.length; ++i ) html += sorted[i].outerHTML
  $(html).insertAfter(li)

}

function activateRealtimeCalculation () {
	$('[data-number]').unbind('keyup').bind('keyup', function () {
		var li = $(this).parent().parent().parent().parent().parent()
		li.find('.jumlah').val(currency (getNumber (li.find('.input-vol')) * getNumber (li.find('.input-hargasat'))))
		$(this).val(currency (getNumber ($(this))))
		calculateBottomUp (li)
	})
}

function calculateBottomUp (li) {
	if (!li.is('[data-parent]')) return true
	else {
		var parentUuid = li.attr('data-parent')
		var parentLi = $('[data-uuid="' + li.attr('data-parent') + '"]')
		var jumlah = 0
		$('[data-parent="' + parentUuid + '"]').each(function () {
			jumlah += $(this).find('.jumlah').length > 0 ? getNumber($(this).find('.jumlah')) : 0
		})
		parentLi.find('.jumlah').html(currency (jumlah))
		calculateBottomUp (parentLi)
	}
}

function getNumber (element) {
  var val = element.val() || element.html()
  val = val.split(',').join('')
  return isNaN(val) || val.length < 1 ? 0 : parseInt (val)
}

function currency (number) {
	var	reverse = number.toString().split('').reverse().join(''),
	currency 	= reverse.match(/\d{1,3}/g)
	return currency.join(',').split('').reverse().join('')
}