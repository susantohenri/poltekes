$(document).ready(function () {
	activateExpandButton()
	markMinus($('li[data-uuid]'))

	$('.btn-save').click(function () {
		if ($('li[data-uuid]').filter(function () {
		  return $(this).css('background-color') === 'rgb(255, 204, 204)'
		}).length > 0) {
			showError('Formulir gagal dikirim, perhitungan minus')
		} else {
			$('[data-number]').each (function () {
				$(this).val(getNumber($(this)))
			})
			$('form#form_list').submit()
		}
	})
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

function expandItem (btn, cb) {
	var li = btn.parent().parent().parent().parent()
	var parent = {
		uuid: li.attr('data-uuid'),
		childUuids: li.attr('data-child-uuid').split(','),
		childController: li.attr('data-child-controller'),
		indent: parseInt(li.css('padding-left').replace('px', ''), 10)
	}
	if (parent.childUuids[0].length < 1) {
		cb()
		return
	}
	var requests = []

	for (var uuid of parent.childUuids) {
		var url = site_url + parent.childController + '/subformlist/' + uuid
		if (window.location.href.includes('Breakdown')) {
			url += '/' + window.location.href.split('/').pop()
		}
		requests.push($.ajax({
			url: url,
			success: function (item) {
				$(item).insertAfter(li)
			}
		}))
	}
	$.when.apply(undefined, requests).then(function () {
		sortItem(li)
		$('[data-parent="' + li.attr('data-uuid') + '"]').css('padding-left', parent.indent + 10 + 'px')
		.each(function () {
			markMinus($(this))
		})
		if (window.location.href.includes('Breakdown')) activateLinkToAssignment()
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
		return aValue - bValue
	})

  var html = ''
  $('[data-parent="' + li.attr('data-uuid') + '"]').remove()
  for( var i = 0; i < sorted.length; ++i ) html += sorted[i].outerHTML
  $(html).insertAfter(li)
}

function getNumber (element) {
  var val = element.val() || element.html()
  val = val.split(',').join('')
  return isNaN(val) || val.length < 1 ? 0 : parseInt (val)
}

function markMinus (li) {
	var inlineStyle = li.attr('style') || ''
	if (li.find('.pagu').length < 1) return true
	if (getNumber(li.find('.total_spj')) > getNumber(li.find('.pagu'))) li.css('background-color', '#ffcccc')
	else li.attr('style', inlineStyle.replace('background-color: rgb(255, 204, 204);', ''))
}

function activateLinkToAssignment () {
	$('li.item[data-uuid]').each(function () {
		$(this).find('a[href*="read/"]').hide()
		var uuid = $(this).attr('data-uuid')
		var linkToChange = $(this).find('a[href*="readList"]')
		var href = linkToChange.attr('href')
		if (!href) return true
		var entity = href.split('index.php/')[1].split('/')[0]
		var site_url = href.split(entity)[0]
		linkToChange.attr('href', `${site_url}Breakdown/Assign/${entity}/${uuid}`)
	})
}