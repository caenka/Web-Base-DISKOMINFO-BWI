<?php

class Db_migrations extends CI_Controller
{

        public function index()
        {
                $this->load->library('migration');

                if ($this->migration->current() === FALSE)
                {
                        show_error($this->migration->error_string());
                }
                else{
                    echo"Migration Success";
                }
        }

}