window.onload = function () {
  $('.table-model').DataTable({
    bProcessing: true,
    aaData: records,
    aoColumns: thead,
    fnRowCallback: function(nRow, aData, iDisplayIndex ) {
      $(nRow).css('cursor', 'pointer').click( function () {
        window.location.href = current_controller + '/read/' + aData.uuid
      })
    }
  })
}