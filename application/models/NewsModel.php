<?php

class NewsModel extends CI_Model 
{

	public function __construct()
	{
        // подгрузили БД
        $this->load->database();
	}

    // Метод для отображения всех новостей
    public function getNews($slug = FALSE)
    {
        if($slug === FALSE) {
            //news - имя таблицы
            $query = $this->db->get('news'); 
            return $query->result_array();
        }

        $query =  $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

}