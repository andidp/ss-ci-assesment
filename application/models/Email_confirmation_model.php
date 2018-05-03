<?php
 
class Email_confirmation_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get email_confirmation by id
     */
    function get_email_confirmation($id)
    {
        return $this->db->get_where('email_confirmations',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all email_confirmations
     */
    function get_all_email_confirmations()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('email_confirmations')->result_array();
    }
        
    /*
     * function to add new email_confirmation
     */
    function add_email_confirmation($params)
    {
        $this->db->insert('email_confirmations',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update email_confirmation
     */
    function update_email_confirmation($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('email_confirmations',$params);
    }
    
    /*
     * function to delete email_confirmation
     */
    function delete_email_confirmation($id)
    {
        return $this->db->delete('email_confirmations',array('id'=>$id));
    }
}
