<?php
	class Pages extends CI_Controller{
		public function view($page = 'home'){
			
            
            if($page == 'home'){
            $data['article'] = $this->Article_model->get_article();
            
			$this->load->view('template/header');
			$this->load->view('pages/'.$page, $data);
            $this->load->view('template/footer');
           
            } 
            
            if(preg_replace('/[0-9]+/', '', $page ) == 'article') {

                $data['article'] = $this->Article_model->get_article(
                    preg_replace('/[a-z]+/', '', strtolower ($page)));
    
                $this->load->view('template/header');
                $this->load->view('pages/article', $data);
                $this->load->view('template/footer');

            }else{

            if(!file_exists(APPPATH.'views/pages/'.$page.'.php') ){
				show_404();
            } 
            }
            }

        public function category($category){
            $articles = $this->Article_model->get_article();

            $articles_by_category = [];
            

                foreach($articles as $article) {     

                    if(strpos($article['category'],  $category) !== false ){
                        array_push($articles_by_category, $article);
                    }
                };

                $data['articles_by_category'] = $articles_by_category;
                $data['category'] = $category;

                $this->load->view('template/header');
                $this->load->view('pages/category', $data);
                $this->load->view('template/footer');
        }
	}