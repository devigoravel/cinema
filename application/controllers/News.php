<?php
// Для безопасности
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Подключаем модель
        $this->load->model('news_model');
    }

    // Метод для главной странице новостей
    public function index()
    {
        $data['title'] = "Все новости";

        $data['news'] = $this->news_model->getNews();

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    // Метод для просмотра одной новости
    public function view($slug = NULL)
    {
        $data['news_item'] = $this->news_model->getNews($slug);

        if (empty($data['news_item'])) {
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

        $slug = $this->input->post('slug');
        $title = $this->input->post('title');
        $text = $this->input->post('text');

        // Проверка на наличие данных в форме
        if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
            if ($this->news_model->setNews($slug, $title, $text)) {
                $this->load->view('templates/header', $data);
                $this->load->view('news/success', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('news/create', $data);
            $this->load->view('templates/footer');
        }
    }

    // Метод для редактирования новостей
    public function edit($slug = NULL)
    {
        $data['title'] = "Редактировать новость";
        $data['news_item'] = $this->news_model->getNews($slug);

        // if (empty($data['news_item'])) {
        //     show_404();
        // }

        $data['title_news'] = $data['news_item']['title'];
        $data['content_news'] = $data['news_item']['text'];
        $data['slug_news'] = $data['news_item']['slug'];

        if ($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {

            $slug = $this->input->post('slug');
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            if ($this->news_model->updateNews($slug, $title, $text)) {
                echo 'Новость успешно отредактирована';

            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('news/edit', $data);
        $this->load->view('templates/footer');
    }

}
