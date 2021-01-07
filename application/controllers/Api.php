
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function articles_get()
    {
        // articles from database
        $articles = $this->Article_model->get_article();
        
       

        $id = $this->get( 'id' );
        $page = $this->get( 'page' );

        if ( $id === null && $page === null)
        {
            // Check if the db contains articles
            if ( $articles )
            {    
                $articles_trimmed = [];

                foreach($articles as $article) {

                    unset($article['content']);
                    unset($article['image']);
                    unset($article['category']);
                    array_push($articles_trimmed, $article);
                    
                };
                // Set the response and exit
                $this->response( $articles_trimmed, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No articles found'
                ], 404 );
            }
        }
        elseif($id !== null)
        {
            if ( array_key_exists( $id, $articles ) )
            {
                $this->response( $articles[($id -1)], 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No such id found'
                ], 404 );
            } 
        }   else{

            
            if ( $page )
            {    
                $articles_trimmed = [];

                foreach($articles as $article) {

                    unset($article['content']);
                    unset($article['image']);
                    unset($article['category']);

                    array_push($articles_trimmed, $article);
                   
                    
                };

                $articles_per_page = array_splice($articles_trimmed, ($page -1)*10, 10);

                if (!empty($articles_per_page)) {
                    $this->response( $articles_per_page, 200 );
                } else {
                    $this->response( [
                        'status' => false,
                        'message' => 'Page requested is currently empty'
                    ], 404 );
                }
                
                
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No articles found'
                ], 404 );
            }
        }  
    }

    public function category_get()
    {
        // articles from database
        $articles = $this->Article_model->get_article();
       

        $category = array_keys($this->get())[0];


        if($category !== null)
        {
            $articles_by_category = [];

                foreach($articles as $article) {

                      

                     if(strpos($article['category'],  $category) !== false ){
                        unset($article['content']);
                        unset($article['image']);
                        unset($article['category']);
                        $article['page'] = ceil($article['id'] /10);
                        array_push($articles_by_category, $article);
                    }  


            
                    
                };
                // Set the response and exit
                $this->response( $articles_by_category, 200 );
        } 
    }
}