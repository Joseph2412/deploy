<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function su_di_noi()
    {
        $team = [
            [
                'id'=> 1,
                'name' => 'Giuseppe Randisi',
                'avatar' => 'Giuseppe.jpg',
            ],
            [
                'id'=> 2,
                'name' => 'Alessandro Barrale',
                'avatar' => 'Alessandro.jpg',
            ],
            [
                'id'=> 3,
                'name' => 'Catalina Clius',
                'avatar' => 'Catalina.jpg',
            ],
            [
                'id'=> 4,
                'name' => 'Antonio Visca',
                'avatar' => 'Antonio.jpg',
                ]
        ];
    
        return view('footer.su_di_noi', compact('team'));
    }
    public function privacy() {
        return view('footer.privacy');
    }
  
    public function cookiePolicy() {
        return view('footer.cookie_policy');
      }  

    public function noteLegali() {
        return view('footer.note_legali');

    }
    
}
