<?php
// Для безопасности
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Подключаем модель
        $this->load->model('NewsModel');
    }

    // Метод для главной странице новостей
    public function index()
    {
        $data['title'] = "Все новости";

        $data['news'] = $this->NewsModel->getNews();

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');

    }

    // Метод для просмотра одной новости
    public function view($slug = NULL)
    {
        $data['news_item'] = $this->NewsModel->getNews($slug);

        if(empty($data['news_item'])) {
            show_404();
        }

        $data['title'] =  $data['news_item']['title'];
        $data['content'] =  $data['news_item']['text'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');

    }

    // Метод для создания новости
    public function create()
    {
        $data['title'] = "Добавить новость";

        $this->load->view('templates/header', $data);
        $this->load->view('news/create', $data);
        $this->load->view('templates/footer');

    }
}