<?php
    /**
     * Created by PhpStorm.
     * Author: evolution
     * Date: 16-9-17
     * Time: 下午3:49
     *
     * license GPL
     */

    namespace App\Http\Controllers;


    class StudentController extends Controller
    {
        public function index()
        {
            return view('student.index');
        }
    }