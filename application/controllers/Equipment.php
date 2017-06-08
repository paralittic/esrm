<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
        
        //Equipment

        class Equipment extends CI_Controller {
                public function index(){

                    $data['equipment'] = $this->Equipment_model->get_equipment();

                    $data['title'] = 'Logi - Equipment';

                    $this->load->view('templates/header/header-resources-datatable', $data);
                    $this->load->view('templates/header/header-nav');
                    $this->load->view('templates/header/header-container-95');
                    $this->load->view('equipment/index', $data);
                    $this->load->view('templates/footer/footer-datatable');
                    $this->load->view('templates/footer/footer-container');
                    $this->load->view('templates/footer/footer-required');
                }

                public function view($eq_id = null){

                    $data['equipment'] = $this->Equipment_model->get_equipment($eq_id);
                    $data['categories'] = $this->Equipment_model->get_categories();
                    $data['equipmentgroups'] = $this->Equipment_model->get_equipment_groups();
                    $data['issues'] = $this->Equipment_model->get_equipment_issues($eq_id);
                    $data['locations'] = $this->Equipment_model->get_equipment_locations($eq_id);

                    if(empty($data['equipment'])){
                            show_404();
                    } 
                    
                    $data['title'] = $data['equipment']['eq_name'];

                    $this->load->view('templates/header/header-resources-std', $data);
                    $this->load->view('templates/header/header-nav');
                    $this->load->view('templates/header/header-container');
                    $this->load->view('equipment/view', $data);
                    $this->load->view('templates/footer/footer-container');
                    $this->load->view('templates/footer/footer-required');
                }

                public function create(){

                    $data['categories'] = $this->Equipment_model->get_categories();
                    $data['equipmentgroups'] = $this->Equipment_model->get_equipment_groups();
                    $data['equipmentlocations'] = $this->Equipment_model->get_equipment_locations(FALSE);
                    $data['title'] = 'Logi - Create Equipment';

                    $this->form_validation->set_rules('eq_name', 'Name', 'required');

                    if($this->form_validation->run() === FALSE){
                        $this->load->view('templates/header/header-resources-std', $data);
                        $this->load->view('templates/header/header-nav');
                        $this->load->view('templates/header/header-container');
                        $this->load->view('equipment/create', $data);
                        $this->load->view('templates/footer/footer-container');
                        $this->load->view('templates/footer/footer-required');
                    } else {
                        $this->Equipment_model->create_equipment();
                        redirect('equipment');
                    }
                }

                public function delete($eq_id){

                    $this->Equipment_model->delete_equipment($eq_id);
                    redirect('equipment');
                }

                public function edit($eq_id){

                    $data['equipment'] = $this->Equipment_model->get_equipment($eq_id);
                    $data['categories'] = $this->Equipment_model->get_categories();
                    $data['equipmentgroups'] = $this->Equipment_model->get_equipment_groups();

                    if(empty($data['equipment'])){
                            show_404();
                    }

                    $data['title'] = $data['equipment']['eq_name'];

                    $this->load->view('templates/header/header-resources-std', $data);
                    $this->load->view('templates/header/header-nav');
                    $this->load->view('templates/header/header-container');
                    $this->load->view('equipment/update', $data);
                    $this->load->view('templates/footer/footer-container');
                    $this->load->view('templates/footer/footer-required');
                }

                public function update(){

                    $this->Equipment_model->update_equipment();
                    redirect('equipment');
                }


                public function select_edit(){ 

                    $data['equipment'] = $this->Equipment_model->get_equipment();

                    $data['title'] = 'Logi - Edit';
                        
                    $this->load->view('templates/header/header-resources-std', $data);
                    $this->load->view('templates/header/header-nav');
                    $this->load->view('templates/header/header-container');
                    $this->load->view('equipment/edit', $data);
                    $this->load->view('templates/footer/footer-container');
                    $this->load->view('templates/footer/footer-required');
                }
                
                public function select_delete(){ 

                    $data['equipment'] = $this->Equipment_model->get_equipment();

                    $data['title'] = 'Logi - Delete';
                        
                    $this->load->view('templates/header/header-resources-std', $data);
                    $this->load->view('templates/header/header-nav');
                    $this->load->view('templates/header/header-container');
                    $this->load->view('equipment/delete', $data);
                    $this->load->view('templates/footer/footer-container');
                    $this->load->view('templates/footer/footer-required');
                }


                //Equipment Groups

                public function eqgroups_index(){

                    $data['equipmentgroups'] = $this->Equipment_model->get_equipment_groups();

                    $data['title'] = 'Equipment Groups';

                    $this->load->view('templates/header/header-resources-datatable', $data);
                    $this->load->view('templates/header/header-nav');
                    $this->load->view('templates/header/header-container-95');
                    $this->load->view('equipmentgroups/index', $data);
                    $this->load->view('templates/footer/footer-container');
                    $this->load->view('templates/footer/footer-required');
                }

                public function eqgroups_view($eqgroup_id = null){

                    $data['equipmentgroup'] = $this->Equipment_model->get_equipment_groups($eqgroup_id);
                    $data['items'] = $this->Equipment_model->get_group_equipment($eqgroup_id);
                    $data['categories'] = $this->Equipment_model->get_categories();

                    if(empty($data['equipmentgroup'])){
                            show_404();
                    }

                    $data['title'] = $data['equipmentgroup']['eqgroup_name'];

                    $this->load->view('templates/header/header-resources-std', $data);
                    $this->load->view('templates/header/header-nav');
                    $this->load->view('templates/header/header-container');
                    $this->load->view('equipmentgroups/view', $data);
                    $this->load->view('templates/footer/footer-container');
                    $this->load->view('templates/footer/footer-required');
                }

                public function eqgroups_create(){

                    $data['categories'] = $this->Equipment_model->get_categories();
                    $data['equipment'] = $this->Equipment_model->get_equipment();

                    $data['title'] = 'Create Equipment';

                    $this->form_validation->set_rules('eq_name', 'Name', 'required');

                    if($this->form_validation->run() === FALSE){
                        $this->load->view('templates/header/header-resources-std', $data);
                        $this->load->view('templates/header/header-nav');
                        $this->load->view('templates/header/header-container');
                        $this->load->view('equipmentgroups/create', $data);
                        $this->load->view('templates/footer/footer-container');
                        $this->load->view('templates/footer/footer-required');
                    } else {
                            $this->Equipment_model->create_equipment();
                            redirect('equipment');
                    }
                }

                public function eqgroups_delete($eqgroup_id){

                    $this->Equipment_model->delete_equipment($eq_id);
                    redirect('equipment');
                }

                public function eqgroups_edit($eqgroup_id){

                    $data['equipmentgroup'] = $this->Equipment_model->get_equipment_groups($eqgroup_id);
                    $data['categories'] = $this->Equipment_model->get_categories();
                    $data['equipment'] = $this->Equipment_model->get_equipment();

                    if(empty($data['equipmentgroup'])){
                            show_404();
                    }

                    $data['title'] = 'Edit Equipment Group';

                    $this->load->view('templates/header/header-resources-std', $data);
                    $this->load->view('templates/header/header-nav');
                    $this->load->view('templates/header/header-container');
                    $this->load->view('equipmentgroups/update', $data);
                    $this->load->view('templates/footer/footer-container');
                    $this->load->view('templates/footer/footer-required');
                }

                public function eqgroups_update(){

                    $this->Equipment_model->update_equipment_group();
                    redirect('equipment-groups');
                }


                public function eqgroups_select_edit(){ 

                    $data['equipmentgroups'] = $this->Equipment_model->get_equipment_groups();
                    
                    $data['title'] = 'Logi - Edit';

                    $this->load->view('templates/header/header-resources-std', $data);
                    $this->load->view('templates/header/header-nav');
                    $this->load->view('templates/header/header-container');
                    $this->load->view('equipmentgroups/edit', $data);
                    $this->load->view('templates/footer/footer-container');
                    $this->load->view('templates/footer/footer-required');
                }
                
                public function eqgroups_select_delete(){ 

                    $data['equipmentgroups'] = $this->Equipment_model->get_equipment_groups();

                    $data['title'] = 'Logi - Delete';
                        
                    $this->load->view('templates/header/header-resources-std', $data);
                    $this->load->view('templates/header/header-nav');
                    $this->load->view('templates/header/header-container');
                    $this->load->view('equipmentgroups/delete', $data);
                    $this->load->view('templates/footer/footer-container');
                    $this->load->view('templates/footer/footer-required');
                }
                public function delete_equipment_location($eq_id,$loc_id){ 
                    $this->Equipment_model->delete_equipment_location();
                    redirect('equipment/view/$eq_id');
                }
        }
