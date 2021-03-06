<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Breakdown extends MY_Controller {

	function Assign ($entity, $uuid) {
		$entity = array(
			'table' => strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $entity)),
			'controller' => $entity,
			'model' => "{$entity}s"
		);
	    $data = array();
	    $data['page_name'] = 'form';
	    $model = $this->model;
	    $data['form'] = $this->$model->getAssignmentForm($entity, $uuid);
	    $data['subform'] = $this->$model->getFormChild($uuid);
	    $data['entity'] = $entity;
	    $data['uuid'] = $uuid;
	    $this->loadview('index', $data);
	}

	function readlist ($id) {
	    $data = array();
	    $data['page_name'] = 'breakdown-list';
	    $model = $this->model;
	    $record = $this->$model->findOne($id);

	    $this->load->model('Programs');
	    $programs = $this->Programs->find();
	    if (!isset ($programs[0])) redirect(site_url ('Breakdown'));
	    $data['item'] = $this->$model->getListItem($programs[0]->uuid, $id);

	    $data['nama_jabatan_group'] = $record['nama'];
	    $data['allow_edit_pagu'] = true;
	    $this->loadview('index', $data);
	}

	public function index () {
		$model = $this->model;
		if ($post = $this->$model->lastSubmit($this->input->post())) {
			$this->$model->updateAssignment($post['entity'], $post['uuid'], $post['jabatan_group']);
		}
		$vars = array();
		$vars['page_name'] = 'table';
		$vars['thead'] = $this->$model->thead;
		$this->loadview('index', $vars);
	}

}