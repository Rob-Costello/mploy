<?php

class CompaniesModel extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function getContacts($where = null, $request = null, $limit = null, $offset = null)
    {
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
            $query = $this->db->get('mploy_contacts');
            $count = $this->db->from('mploy_contacts')->count_all_results();
        } else {
            
            $query = $this->db->get_where('mploy_contacts', $where);
            
            $count = $this->db->from('mploy_contacts')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);
    }


    public function updateCompanyContact($id,$data){

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_company_contacts', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

    }


    public function getCompanyContact($id){

        $query = $this->db->get_where('mploy_contacts','id ='.$id);
        return $query->row_array();

    }

    function getDropDown(){

        $query = $this->db->get('mploy_ref_employer_status');
        return $query->result();

    }

    function getCompanies($where = null, $request = null, $limit = null, $offset = null)
    {
        $this->db->select('* ');
        $this->db->limit($limit, $offset);
        //$this->db->join('mploy_company_contacts mcc', 'mcc.id = mc.contact_id', 'left');
        if( $where == null ) {
            $query = $this->db->get('mploy_organisations');
            $count = $this->db->from('mploy_organisations')->count_all_results();
        } else {
            
            $this->db->from('mploy_organisations');
            $this->db->join('mploy_contacts','mploy_contacts.id = mploy_organisations.main_contact_id','left');
            //$this->db->join('mploy_contact_history', 'mploy_contact_history.receiver = mploy_contacts.id','left');
            $this->db->where($where);
            $query=$this->db->get();
            $count = $this->db->from('mploy_organisations')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

    }

    public function updateCompany($id,$data){

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_companies', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

    }


    public function getCompany($id){

        $query = $this->db->get_where('mploy_organisations','org_id ='.$id);
        return $query->row_array();

    }


    function getHistory($where = null, $request = null, $limit = null, $offset = null)
    {
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
            $query = $this->db->get('mploy_company_history');
            $count = $this->db->from('mploy_company_history')->count_all_results();
        } else {
            $query = $this->db->get_where('mploy_company_history', $where);
            $count = $this->db->from('mploy_company_history')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

    }

    function createCall($data){


        $this->db->insert('mploy_company_history', $data);

    }

    function getPlacements($where = null, $request = null, $limit = null, $offset = null)
    {
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
            $query = $this->db->get('mploy_company_placements');
            $count = $this->db->from('mploy_company_placements')->count_all_results();
        } else {
            $query = $this->db->get_where('mploy_company_placements', $where);
            $count = $this->db->from('mploy_company_placements')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);

    }

}
