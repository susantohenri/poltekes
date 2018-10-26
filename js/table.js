window.onload = function () {
  $('.table-model').DataTable({
    bProcessing: true,
    aaData: records,
    aoColumns: thead,
    fnRowCallback: function(nRow, aData, iDisplayIndex ) {
      $(nRow).css('cursor', 'pointer').click( function () {
        if (current_controller.indexOf('Program') > -1) window.location.href = current_controller + '/readList/' + aData.uuid
        else window.location.href = current_controller + '/read/' + aData.uuid
      })
    }
  })
}