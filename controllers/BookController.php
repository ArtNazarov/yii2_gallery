<?php

namespace app\controllers;

 use yii;
 use yii\web\Response;
use yii\web\Controller;
 
class BookController extends Controller {
    
    public $layout = 'book';
    
    public function actionGreeter(){
        
               return $this->render('greeter',
                        [ 
                            'arts' => 
                               [
                                [
                                    'phrase' => "Название первой картины",
                                    'picture_src' => '/images/nude.png'
                                ],
                            
                                [
                                    'phrase' => "Название второй картины",
                                    'picture_src' => '/images/nude2.jpg'
                                ]
                               
                               ],
                            ]
                            
                            );
                       
        
    }
    
}