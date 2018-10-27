window.onload = function () {
  $('.table-model').DataTable( {
    processing: true,
    serverSide: true,
    ajax: {url: current_controller + '/dt', type: 'POST'},
    columns: thead,
    fnRowCallback: function(nRow, aData, iDisplayIndex ) {
      $(nRow).css('cursor', 'pointer').click( function () {
        if (current_controller.indexOf('Program') > -1) window.location.href = current_controller + '/readList/' + aData.uuid
        else window.location.href = current_controller + '/read/' + aData.uuid
      })
    }
  })
}