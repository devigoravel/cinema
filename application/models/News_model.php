<?php

class News_model extends CI_Model 
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

    // Метод создания новости
    public function setNews($slug, $title, $text)
    {
        $data = array(
            'title' => $title,
            'text' => $text,
            'slug' => $slug
        );

        return $this->db->insert('news', $data);
    }

    // Метод для редактирования новостей
    public function updateNews($slug, $title, $text)
    {
        $data = array(
            'title' => $title,
            'text' => $text,
            'slug' => $slug
        );

        return $this->db->update('news', $data, array('slug' => $slug));
    }

}