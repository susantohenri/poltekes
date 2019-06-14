<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends MY_Controller {

  function cetak ($uuid)
  {
    // $this->load->database();
    // $data = array();
    // $baseQuery = "
    //   SELECT 
    //     ent.*, SUM(detail.vol * detail.hargasat) jumlah
    //   FROM program
    //   LEFT JOIN kegiatan ON program.uuid = kegiatan.program
    //   LEFT JOIN output ON kegiatan.uuid = output.kegiatan
    //   LEFT JOIN sub_output ON output.uuid = sub_output.output
    //   LEFT JOIN komponen ON sub_output.uuid = komponen.sub_output
    //   LEFT JOIN sub_komponen ON komponen.uuid = sub_komponen.komponen
    //   LEFT JOIN akun ON sub_komponen.uuid = akun.sub_komponen
    //   LEFT JOIN detail ON akun.uuid = detail.akun
    //   WHERE program.uuid = '{$uuid}'
    //   GROUP BY ent.uuid
    // ";

    // $program = $this->db->query(str_replace('ent', 'program', $baseQuery))->row_array();
    // $data[] = $program;

    // $vocab = array();
    // $vocab['kegiatan'] = array();
    // $records = $this->db->query(str_replace('ent', 'kegiatan', $baseQuery))->result_array();
    // foreach ($records as $rec) $vocab['kegiatan'][$rec['uuid']] = $rec;
    // $data = array_merge($data, $records);

    // $parent = 'kegiatan';
    // foreach (array('output', 'sub_output', 'komponen', 'sub_komponen', 'akun', 'detail') as $child)
    // {
    //     $vocab[$child] = array();
    //     foreach ($this->db->query(str_replace('ent', $child, $baseQuery))->result_array() as $rec)
    //     {
    //         $vocab[$child][$rec['uuid']] = $rec;
    //         array_splice($data, array_search($vocab[$parent][$rec[$parent]], $data) + 1, 0, array($rec));
    //     }
    //     $parent = $child;
    // }

    $data = $this->Programs->getDataCsv($uuid);
    $filename = 'Export-Program.csv';
    $delimiter= ';';
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    $f = fopen('php://output', 'w');
    fputcsv($f, array('kode', 'uraian', 'vol', 'sat', 'hargasat', 'jumlah', 'kdblokir', 'sdana'), $delimiter);
    foreach ($data as $line)
    {
        foreach (array('kode', 'vol', 'sat', 'hargasat', 'jumlah') as $col)
        {
            $line[$col] = !isset($line[$col]) ? '' : $line[$col];
        }
        $row = array($line['kode'], $line['uraian'], $line['vol'], $line['sat'], $line['hargasat'], $line['jumlah']);
        fputcsv($f, $row, $delimiter);
    }

  }

}