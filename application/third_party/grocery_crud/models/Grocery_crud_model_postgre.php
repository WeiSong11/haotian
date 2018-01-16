<?php

class Grocery_crud_model_Postgre extends Grocery_CRUD_Generic_Model {

    function get_primary_key($table_name = null)
    {
        return "id";

        /*if ($table_name == null) {
            if (isset($this->primary_keys[$this->table_name])) {
                return $this->primary_keys[$this->table_name];
            }

            if (empty($this->primary_key)) {
                $this->db->select('pg_attribute.attname');
                $this->db->from('pg_index');
                $this->db->join('pg_attribute', 'pg_attribute.attrelid = pg_index.indrelid AND pg_attribute.attnum = ANY(pg_index.indkey)');
                $this->db->where('pg_index.indrelid', "'" . $this->table_name . "'" . '::regclass');
                $query = $this->db->get();
                $result = $query->result();

                return $result;
            } else {
                return $this->primary_key;
            }
        } else {
            if (isset($this->primary_keys[$table_name])) {
                return $this->primary_keys[$table_name];
            }

            $this->db->select('pg_attribute.attname');
            $this->db->from('pg_index');
            $this->db->join('pg_attribute', 'pg_attribute.attrelid = pg_index.indrelid AND pg_attribute.attnum = ANY(pg_index.indkey)');
            $this->db->where('pg_index.indrelid', "'" . $this->table_name . "'" . '::regclass');
            $query = $this->db->get();
            $result = $query->result();

            return $result;
        }*/
    }

}
