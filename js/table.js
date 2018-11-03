window.onload = function () {

  for (var th in thead) {
    if (['realisasi', 'hargasat', 'pagu', 'sisa'].indexOf(thead[th].mData) > -1)
      thead[th].render = $.fn.dataTable.render.number( ',', '.', 0, 'Rp ' )
    if ('prosentase' === thead[th].mData) thead[th].render = $.fn.dataTable.render.number( ',', '.', 0, '', ' %' )
  }

  $('.table-model').DataTable( {
    processing: true,
    serverSide: true,
    ajax: {url: current_controller + '/dt', type: 'POST'},
    columns: thead,
    createdRow: function( row, data, dataIndex){
      if (data.prosentase && parseInt(data.prosentase.replace('%', '').split(',').join('')) > 100) $(row).css('background-color', '#ffcccc')
    },
    fnRowCallback: function(nRow, aData, iDisplayIndex ) {
      $(nRow).css('cursor', 'pointer').click( function () {
        if (current_controller.indexOf('Program') > -1 || current_controller.indexOf('Detail') > -1) window.location.href = current_controller + '/readList/' + aData.uuid
        else window.location.href = current_controller + '/read/' + aData.uuid
      })
    }
  })
}