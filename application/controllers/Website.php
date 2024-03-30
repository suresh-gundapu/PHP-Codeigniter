<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Website_model');
    }

    public function index()
    {
        $this->data['data'] = [];
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/home', $this->data);
        $this->load->view('website/includes/footer');
    }
    public function saveForm()
    {
        $data = $this->input->post('data');

        $name = $data['name'];
        $email = $data['email'];
        $pword = $data['pword'];

        $resultData = $this->Website_model->insert($name, $email, $pword);
        if ($resultData == true) {
            $result = ["status" => 1, "message" => "Inserted data "];
        } else {
            $result = ["status" => 0, "message" => "Faailed to insert data "];
        }
        echo json_encode($result);
    }
    public function readData()
    {
        $this->data['data'] = $this->Website_model->readData();
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/home_read', $this->data);
        $this->load->view('website/includes/footer');
    }
    public function edit_form($id = "")
    {
        $this->data['data'] = $this->Website_model->editData($id);
        $this->load->view('website/includes/header', $this->data);
        $this->load->view('website/home_edit', $this->data);
        $this->load->view('website/includes/footer');
    }

    public function editSaveForm()
    {
        $data = $this->input->post('data');

        $name = $data['name'];
        $email = $data['email'];
        $id = $data['id'];

        $resultData = $this->Website_model->update($name, $email, $id);
        if ($resultData == true) {
            $result = ["status" => 1, "message" => "Updated data "];
        } else {
            $result = ["status" => 0, "message" => "Faailed to update data "];
        }
        echo json_encode($result);
    }
    public function deleteForm()
    {

        $id = $this->input->post("id");

        $resultData = $this->Website_model->delete($id);
        if ($resultData == true) {
            $result = ["status" => 1, "message" => "Deleted data "];
        } else {
            $result = ["status" => 0, "message" => "Faailed to delete data "];
        }
        echo json_encode($result);
    }
}
