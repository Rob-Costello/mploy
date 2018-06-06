<?php

class CampaignsModel extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    function getCampaigns($where = null, $request = null, $limit = null, $offset = null)
    {
       
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
            $query = $this->db->get('mploy_campaigns');
            $count = $this->db->from('mploy_campaigns')->count_all_results();
        } else {
            $this->db->join('mploy_organisations','mploy_organisations.school_id = mploy_campaigns.select_school','left');
            $query = $this->db->get_where('mploy_campaigns', $where);
            $count = $this->db->from('mploy_campaigns')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);
    }

    function getEmployers($where = null, $request = null, $limit = null, $offset = null)
    {
       
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        if( $where == null ) {
            $query = $this->db->get('mploy_organisations');
            $count = $this->db->from('mploy_organisations')->count_all_results();
        } else {
            $this->db->join('mploy_contacts','mploy_organisations.main_contact_id = mploy_contacts.id','left');
            $query = $this->db->get_where('mploy_organisations', $where);
            $count = $this->db->from('mploy_organisations')->where($where)->count_all_results();
        }
        return array('data' => $query->result(), 'count' => $count);
    }


    public function availableCampaigns(){

		$this->db->group_by('select_school');
		$company = $this->db->get_where('mploy_campaigns','active =1');

		return $company->result();

	}


   

    public function updateCompanyContact($id,$data){

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('mploy_contacts', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();

    }


    public function getCompanyContact($id){

        $query = $this->db->get_where('mploy_contacts','id ='.$id);
        return $query->row_array();

    }

    public function createCampaign($data){

        $this->db->insert('mploy_campaigns', $data);

    }


    public function employerDetails($ref, $id)
    {
       
        $this->db->join('mploy_contacts','mploy_organisations.comp_id = mploy_contacts.org_id','left');
        $company = $this->db->get_where('mploy_organisations','comp_id ='.$id);
        
        //$this->db->join('mploy_contacts','mploy_campaign_activity.user_id = mploy_contacts.id');
        
        //$calls = $this->db->get_where('mploy_campaign_activity','campaign_ref='.$ref);
        
        return ['company' => $company->result()];

    }

    public function campaignEmployerCalls($ref,$id){

        $this->db->where('org_id='.$id);
        $calls = $this->db->get_where('mploy_campaign_activity','campaign_ref='.$ref);
        return $calls->result();
    }

    public function newCall($data){
        
        $this->db->insert('mploy_campaign_activity', $data);
        
    }

    public function getActivity(){

        $query = $this->db->get('mploy_campaign_activity_types');
        return $query->result();

    }

    public function listCampaigns($campaign){

    	$query = $this->db->get_where('mploy_campaigns');

    	return $query->result_array();
	}

}
